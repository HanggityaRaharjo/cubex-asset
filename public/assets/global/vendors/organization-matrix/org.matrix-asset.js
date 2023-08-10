 /*!
    * Magina.Js v1.0 (https://maginajs.com/)
    * Licensed under MIT (https://github.com/twbs/magina/blob/main/LICENSE)
    * This File for showing list organization matrix
    * 02/07/2021
    */

let layout =  {
    container: $('#list-organization'),
    containerContent: $('#content-organization'),
    organizations: [],
    sop: [],
    form: [],
    totalChild: 0,
    totalWidthForm: 200,
    defaultWidthForm: 175,
    defaultWidthHeader: 1180,
    init: function () {
        $('.prev').on('click', mouse.clickPrev);
        $('.next').on('click', mouse.clickNext);
        $('.fa-plus').on('click', function(){
            alert('add group')
        });
        $('.task-tooltip').on('mousemove', mouse.moveTooltip);

        utils.getListSop();
    },
    clean: function () {
        this.container.empty();
        this.containerContent.empty();
        this.organizations = [];
        this.sop = [];
        this.form = [];

        this.totalWidthForm = '100%';
        this.totalChild = 0;
    },
    draw: function () {
        this.clean();
        this.init();

        this.createLayout();

        utils.scrollOverMatrix();
    },
    createLayout: function () {
        layoutOrgMatrix.createLeftHeaderTable();
        layoutOrgMatrix.createListBodyTable();

        layoutOrgMatrix.createHeader();
        layoutOrgMatrix.createSopHeader();
        layoutOrgMatrix.createFormHeader();
        layoutOrgMatrix.createMatrix();

    }
}

let layoutOrgMatrix = {
    createLeftHeaderTable: function () {
        let leftHeader = `
        <div class="scheduler_default_corner"
                style="width: 100%;
                    height: 60px;
                    overflow: hidden;
                    position: relative;
                    background-color:#2C9ED7;
                    color:#FCFCFA;
                    ">
            <div class="text-center" style="padding: 20px; border:1px solid #dee2e6;">
                List Of Category

            </div>
        </div>`;

        layout.container.append(leftHeader);
    },
    createListBodyTable: function () {
        let index = 0;
        let positionTop = 0;
        let bodyList = '';

        let list = $('<div></div>')
            .addClass('scheduler_default_rowheader_scroll')
            .css({
                'width': '100%',
                'height': 'auto',
                'overflow-x': 'hidden',
                'overflow-y': 'hidden',
                'position': 'relative',
                'border': '1px solid gainsboro',
            });

        let appendedList = $('<div></div>')
            .attr('id', 'appended-list-cf')
            .css({
                'width': '120px',
                 //'height': '750px'
            });

        list.append(appendedList);

        layout.container.append(list);

        $.ajax({
            url: `${APP_URL}/asset/list-category`,
            type: "GET",
            dataType: "json",
            async: false,
            success: function (response) {
                const listOrg = response.data;
                // console.log('listorg', `${APP_URL}/bussines/corporate/list-feature`);
                listOrg.forEach(element => {
                    const data = {
                        id: element.id,
                        nama: element.name,
                        code: element.code,
                        parent: element.parent_id,

                    };

                    layout.organizations.push(data);
                });

                //console.log(listOrg.length)
            },
            error: function () {}
        });

        layout.organizations.forEach(element => {

            let backgroundList = '';
            let paddingleft='';

            if (index % 3 == 0) {
                backgroundList +=  'rgb(249, 249, 249)';
            } else {
                backgroundList += '';
            }

            if (element.parent != 0){
                paddingleft = 'padding-left:30px;';
            }else{
                backgroundList = '#598470 !important';
            }
            bodyList += `
            <div
                style="position: absolute; top: ${positionTop}px; width: 120px; border: 0px none;">
                <div class="scheduler_default_rowheader"
                    style="width: 800px; height: 50px; overflow: hidden; position: relative; background:${backgroundList}">
                    <div class="scheduler_default_rowheader_inner" style="">
                        <div class="scheduler_default_rowheader_inner_indent"
                            style="margin-left: 20px; position: relative;">

                            <div class="scheduler_default_rowheader_inner_text"
                                style="
                                    margin-left: 15px;
                                    margin-top: 12px;${paddingleft}">
                                ${element.nama}
                            </div>
                        </div>
                    </div>
                    <div class="scheduler_default_resourcedivider"
                        style="position: absolute; bottom: 0px; width: 100%; height: 0px; box-sizing: content-box; border-bottom: 1px solid transparent;">
                    </div>
                </div>
            </div>`;

            index ++;
            positionTop += 50;
        });
        // console.log('total height ', positionTop)
        $('#appended-list-cf').css('height',positionTop);
        $('#appended-list-cf').append(bodyList);
    },
    createHeader: function () {
        let header = $('<div></div>')
            .addClass('scheduler_default_timeheader_scroll')
            .css({
                'overflow': 'hidden',
                'display': 'block',
                'position': 'absolute',
                'top': '0px',
                'width': '100%',
                'height': '60px',
                'border': '1px solid gainsboro',
                'margin-left': '-1px'
            });

        layout.containerContent.append(header);

        let fullWidthHeader = $('.scheduler_default_timeheader_scroll').append(`
            <div class="default_fullwidth_header" style="width:100%; position:absolute;"></div>
        `);
    },
    createSopHeader: function () {

        let leftSopHeader = 0 ;

        layout.sop.forEach(element => {
            let widthSopHeader = 175 * element.countChild;

            let totalChild = layout.totalChild * 175;
            let SopHeader = `
                <div
                    class="scheduler_default_timeheadergroup scheduler_default_timeheader_cell"
                        style="position: absolute;
                        top: 0px;
                        left: ${leftSopHeader}px;
                        width: calc(${layout.defaultWidthHeader}px / ${layout.sop.length});
                        height: 30px;
                        user-select: none;
                        overflow: hidden;
                        white-space: nowrap;
                        background-color: #2C9ED7;
                        color:#FCFCF9;
                        border-right: 1px solid #000;">
                    <div unselectable="on"
                        class="scheduler_default_timeheadergroup_inner scheduler_default_timeheader_cell_inner text-center">
                        <span>${element.name}</span>
                    </div>
                </div>`;

            leftSopHeader += widthSopHeader;
            $('.default_fullwidth_header').append(SopHeader);
        });

    },
    createFormHeader: function () {
        let positionLeft = 0;
        let FormHeader = '';
        const totalChild =layout.form.length;
        //fungsi create header child
        layout.form.forEach(element => {
            let widthSopHeader = 100 *  element.countChild / 10;

            //console.log('count ',layout.form.length);

            FormHeader += `
            <div aria-hidden="true"
                class="scheduler_default_timeheadercol scheduler_default_timeheader_cell"
                    style="position: absolute;
                    top: 30px;
                    left: ${positionLeft}px ;
                    width: calc(${layout.defaultWidthHeader}px / ${totalChild});
                    height: 30px;
                    user-select: none;
                    overflow: hidden;
                    white-space: nowrap;
                    background-color:#90D6FA;
                    color:#000;
                    border-right: 1px solid gainsboro;">
                <div class="text-center">${element.name} </div>
            </div>`;

            positionLeft += layout.defaultWidthHeader / totalChild;
        });


        $('.scheduler_default_timeheader_scroll').append(FormHeader);
    },
    createMatrix: function () {
        let positionTop = 0;
        let loadertest = `
        <div class="d-flex justify-content-center">
            <div class="spinner-grow text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        </div>
        `;
        let matrixBody = `
        <div class="scheduler_default_scrollable"
            style="overflow: auto;height: 870px;top: 61px;position: absolute;width: 100%; margin-left: -1px">

            <div class="scheduler_default_matrix"
                style="user-select: none; min-height: 1px; position: absolute; height: 400px; width:calc(${layout.defaultWidthHeader}   / ${layout.form.length})px;">
            </div>
        </div>`;


        layout.containerContent.append(matrixBody);
        //layout.containerContent.append(loadertest);
        // $('.scheduler_default_matrix').css('display','none')

        let url = `${APP_URL}/asset/matrix`;
        let formSetup = {url:url,method:'get'}
        commit(formSetup).then((response)=>{
            let datas = response.data;
//            console.log(demo)

            //data.forEach((data)=>{
                //console.log(data.position)

                $('.scheduler_default_scrollable').append(loadertest);


                let listMatrix;
                let showDataAfterDelay =  () => {


                for (let index = 0; index < layout.organizations.length; index++) {
                    const element = layout.organizations[index];
                    const itemid = element.id;
                    // console.log('id '+element.id)
                    //setTimeout(() => {
                        let matrix = '<div class="d-flex flex-row" style="margin-top:-1px">';
                        let classParent = '';

                        if (index % 3 == 0) {
                            classParent += 'scheduler_default_cell text-center padding-matrix-cell';
                        } else {
                            classParent +=
                                'scheduler_default_cell scheduler_default_cell_business text-center padding-matrix-cell';
                        }
                        let i=1;
                        layout.form.forEach(item => {
                            let filter = datas.filter((data)=> data.position == element.id+''+item.id)
                            //console.log(filter[0])

                            if(filter){
                                let val = '';
                                var parentBg='';
                                if(element.parent == '0'){
                                    val = '';
                                    parentBg = 'background:#598470 !important;'
                                }else{

                                    if(filter[0].count > 0){
                                        val = `<a href="javascript:void(0)" class="text-white" onclick="showdetail('${filter[0].category}','${filter[0].phase}','${filter[0].category_name}')">`+filter[0].count+`</a>
                                        `;
                                    }else{
                                        val = `- `;
                                    }
                                }

                                matrix += `
                                            <div class="${classParent} text-white pointer"

                                                style="width:calc(${layout.defaultWidthHeader}px / ${layout.form.length}); height:51px;${parentBg};font-weight:bold;font-size:13pt;padding-top:10px">${val}
                                            </div>`;
                            }

                        })

                        classParent = '';
                        matrix += '</div>';

                        $('.scheduler_default_matrix').append(matrix);

                        $('.spinner-grow').css('display','none');

//                    }, 50 * index);
                    positionTop += 50;
                }

            $('.scheduler_default_scrollable').css('height',positionTop+30);

            }
            setTimeout(showDataAfterDelay, 1000);
            //})


        }).catch((err)=>{
            console.log(err)
        })
    }
}



let utils = {
    scrollOverMatrix: function () {
        const target = $(".scheduler_default_rowheader_scroll");
        const targetTime = $('.scheduler_default_timeheader_scroll');

        $(".scheduler_default_scrollable").scroll(function () {
            target.prop("scrollTop", this.scrollTop);
            targetTime.prop("scrollLeft", this.scrollLeft);
        });
    },

    getListSop: function() {
        $.ajax({
            url: `${APP_URL}/asset/list-phase`,
            type: "GET",
            dataType: "json",
            async: false,
            success: function (data) {
                // console.log(data.data)

                const listSop = data.data;
                listSop.forEach(element => {
                    // console.log(element.child.length)

                    const data = {
                        id: element.id,
                        name: element.name,
                        countChild: element.child.length,
                        // picId: element.picId
                    };

                    element.child.forEach(elementFrame => {
                        const dataForm = {
                            id: elementFrame.id,
                            name: elementFrame.name,
                            type: elementFrame.type_id,
                            code: elementFrame.code,
                            // icon: elementFrame.IconWF,
                            // orgId: elementFrame.OrgId2
                        }

                        layout.form.push(dataForm);
                    })

                    layout.sop.push(data);

                    // total child
                    layout.totalChild += element.child.length;
                });

                // total width form
                layout.totalWidthForm = layout.totalChild * layout.defaultWidthForm;
                // console.log('total width ',layout.totalWidthForm);
            },
            error: function () {}
        });
    },

    iconTimes: function() {
        return `<i class="fa fa-times-circle fa-2x" aria-hidden="true" style="color:#fa7f8b !important"></i>`;
    }
}

let mouse = {
    clickPrev: function (ev) {
        alert('prev')
    },
    clickNext: function (ev) {
    },
    showDetailValue: function (ev) {
    }
}




