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
    totalWidthForm: 0,
    defaultWidthForm: 150,
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

        this.totalWidthForm = 0;
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
                    position: relative;">
            <div class="text-center" style="padding: 20px; border:1px solid #dee2e6;">
                List Of Domains Company
                <button  class="btn btn-sm btn-info add-group">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                </button>
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
                'overflow-x': 'auto',
                'overflow-y': 'hidden',
                'position': 'relative',
                'border': '1px solid gainsboro',
            });

        let appendedList = $('<div></div>')
            .attr('id', 'appended-list-cf')
            .css({
                'width': '120px',
                'height': '600px'
            });

        list.append(appendedList);

        layout.container.append(list);

        $.ajax({
            url: `${APP_URL}/access-control/list-domain`,
            type: "GET",
            dataType: "json",
            async: false,
            success: function (response) {
                const listOrg = response.data;
                // console.log(response);
                listOrg.forEach(element => {
                    const data = {
                        id: element.id,
                        nama: element.name,
                        company: element.company.name,

                    };

                    layout.organizations.push(data);
                });

            },
            error: function () {}
        });

        layout.organizations.forEach(element => {

            let backgroundList = '';

            if (index % 3 == 0) {
                backgroundList += 'rgb(249, 249, 249)';
            } else {
                backgroundList += '';
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
                                    margin-top: 12px;">
                                ${element.nama} (${element.company})
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
            <div class="default_fullwidth_header" style="width:${layout.totalWidthForm}px; position:absolute;"></div>
        `);
    },
    createSopHeader: function () {

        let leftSopHeader = 0 ;

        layout.sop.forEach(element => {
            let widthSopHeader = 150 * element.countChild;

            let totalChild = layout.totalChild * 150;
            let SopHeader = `
                <div
                    class="scheduler_default_timeheadergroup scheduler_default_timeheader_cell"
                        style="position: absolute;
                        top: 0px;
                        left: ${leftSopHeader}px;
                        width: ${widthSopHeader}px;
                        height: 30px;
                        user-select: none;
                        overflow: hidden;
                        white-space: nowrap;
                        background-color: #ffce00;
                        border-right: 1px solid #000;">
                    <div unselectable="on"
                        class="scheduler_default_timeheadergroup_inner scheduler_default_timeheader_cell_inner text-center">
                        <span>${element.name} </span>
                    </div>
                </div>`;

            leftSopHeader += widthSopHeader;
            $('.default_fullwidth_header').append(SopHeader);
        });

    },
    createFormHeader: function () {
        let positionLeft = 0;
        let FormHeader = '';
        //fungsi create header child
        layout.form.forEach(element => {
            FormHeader += `
            <div aria-hidden="true"
                class="scheduler_default_timeheadercol scheduler_default_timeheader_cell"
                    style="position: absolute;
                    top: 30px;
                    left: ${positionLeft}px;
                    width: ${layout.defaultWidthForm}px;
                    height: 30px;
                    user-select: none;
                    overflow: hidden;
                    white-space: nowrap;
                    background-color:#151741;
                    color:white;
                    border-right: 1px solid gainsboro;">
                <div class="text-center">${element.name} </div>
            </div>`;

            positionLeft += 150;
        });


        $('.scheduler_default_timeheader_scroll').append(FormHeader);
    },
    createMatrix: function () {
        let matrixBody = `
        <div class="scheduler_default_scrollable"
            style="overflow: auto;height: 623px;top: 61px;position: absolute;width: 100%; margin-left: -1px;">

            <div class="scheduler_default_matrix"
                style="user-select: none; min-height: 1px; position: absolute; height: 400px; width:${layout.totalWidthForm}px;">
            </div>
        </div>`;

        layout.containerContent.append(matrixBody);
        let listMatrix;
        for (let index = 0; index < layout.organizations.length; index++) {
            const element = layout.organizations[index];
            const domainid = element.id;
            // console.log('id '+element.id)
            setTimeout(() => {
                let matrix = '<div class="d-flex flex-row" style="margin-top:-1px">';
                let classParent = '';

                if (index % 3 == 0) {
                    classParent += 'scheduler_default_cell text-center padding-matrix-cell';
                } else {
                    classParent +=
                        'scheduler_default_cell scheduler_default_cell_business text-center padding-matrix-cell';
                }

                layout.form.forEach(features => {
                    // console.log('features',features);
                    // id group (element.id)
                    // id layar (layar.id)
                    $.ajax({
                                url: `${APP_URL}/access-control/group-features-count/${domainid}/${features.id}`,
                                type: "GET",
                                dataType: "json",
                                async:false,
                                success : function (res2){
                                    console.log('data',res2.data.id);
                                    let data = res2.data;
                                    let val;
                                    if(data.active == 1){
                                        // val =`<i class="fa fa-times-circle fa-2x" aria-hidden="true" style="color:#fa7f8b !important"></i>`;
                                        // val = `<i onclick="viewUser('${element.id}','${features.id}')" class="fa fa-user-circle fa-2x view-user" aria-hidden="true" style="color:#151741 !important ;cursor: pointer"></i>`;
                                        val = `<i oncontextmenu="listUser();return false" onclick="activeFeatures('1','${res2.data.id}')" class="fa fa-check-square fa-2x active-features" aria-hidden="true" style="color:#f0c50f !important;cursor: pointer" data-tjid="${data.id}"></i>`;
                                        // $.ajax({
                                        //     url: `${APP_URL}/user-matrix/user-layar/${element.id}/${features.id}`,
                                        //     type: "GET",
                                        //     dataType: "json",
                                        //     async:false,
                                        //     success : function (res3){
                                        //         // console.log('coun '+res3.data);
                                        //         if(res3.userlayar>0 && res3.data >0){
                                        //             val = `<i onclick="viewUser('${element.id}','${features.id}')" class="fa fa-user-circle fa-2x view-user" aria-hidden="true" style="color:#151741 !important ;cursor: pointer"></i>`;
                                        //         }else{
                                        //             val = `<i class="fa fa-check-square fa-2x" aria-hidden="true" style="color:#f0c50f !important"></i>`;
                                        //         }
                                        //     },error : function (){}
                                        // })

                                    }else{
                                        val =`<i onclick="activeFeatures('0','${data.id}')" class="fa fa-times-circle fa-2x active-features" aria-hidden="true" style="color:#fa7f8b !important;cursor: pointer"></i>`;
                                    }
                                    matrix += `
                                    <div class="${classParent} pointer"

                                        style="width:200px; height:51px;">${val}
                                    </div>`;
                                },error : function (){}
                            })
                })

                classParent = '';
                matrix += '</div>';

                $('.scheduler_default_matrix').append(matrix);

            }, 50 * index);
        }
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
            url: `${APP_URL}/access-control/list-features`,
            type: "GET",
            dataType: "json",
            async: false,
            success: function (data) {
                console.log(data.data)

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
                console.log('total width ',layout.totalWidthForm);
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
function listUser(){

    setModal('modallistuser','show');
}
function activeFeatures(type,tjid){
    if(type == "1"){
        //dinonaktifkan
        swal({
            title: 'Anda yakin ingin menonaktifkan ini ?',
            text: '',
            icon: 'warning',
            dangerMode: true,
            closeOnCancel: false,
            buttons: {
                delete: {
                    text : 'Ya',
                    value: 'active',
                    className: 'swal-button--danger'
                },
                cancel: 'Batal'
            }
        }).then((result) => {
            if(result == 'active'){
                $.ajax({
                    url: `${APP_URL}/access-control/deactive/1/${tjid}`,
                    type: "get",
                    dataType: "json",
                    success: function (data) {
                        // const response = data.data;
                        if(data.status == true){
                            setTimeout(function(){
                                window.location.reload();
                             }, 2000);
                           }
                    },
                    error: function () {}
                });
            }
        })
    }else{
        //diaktifkan
        // alert('diaktifkan');
        swal({
            title: 'Anda yakin ingin mengaktifkan ini ?',
            text: '',
            icon: 'warning',
            dangerMode: true,
            closeOnCancel: false,
            buttons: {
                delete: {
                    text : 'Ya',
                    value: 'active',
                    className: 'swal-button--danger'
                },
                cancel: 'Batal'
            }
        }).then((result) => {
            if(result == 'active'){
                $.ajax({
                    url: `${APP_URL}/access-control/deactive/0/${tjid}`,
                    type: "get",
                    dataType: "json",
                    success: function (data) {
                        // const response = data.data;
                        if(data.status == true){
                            setTimeout(function(){
                                window.location.reload();
                             }, 2000);
                           }
                    },
                    error: function () {}
                });
            }
        })
    }
}
function viewUser(groupid,layarid){
    // alert(groupid+" "+layarid);
    // $('#modalViewUser').on('hidden.bs.modal', function () {

    // })
    $.ajax({
        url:`${APP_URL}/user-matrix/view-user/${groupid}/${layarid}`,
        type:"GET",
        dataType:"json",
        success : function(response){
            let data = response.data;
            let url;
            let tableHeader=`
                    <thead class="text-center">
                        <tr style="background-color:#e9ecef;">
                            <th width="70px">NO</th>
                            <th>User Name</th>
                            <th>EMAIL</th>
                        </tr>
                    </thead>
            `;
            let tableContent,no=1,username;

            data.forEach(element => {
                $.ajax({
                    url:`${APP_URL}/user-matrix/data-user/${element.user_code}`,
                    type:"GET",
                    dataType:"json",
                    success : function(response){
                        $('#tabel-view-user tbody').empty();
                        let contacts = response.data.data.contacts;
                        let email;
                        // var namalengkap,namadepan,namabelakang,namatengah;
                        // if(!empty(response.data.data.FIRST_NAME)){namadepan = response.data.data.FIRST_NAME;}else{namadepan="";}
                        // if(!empty(response.data.data.MID_NAME)){namatengah += response.data.data.MID_NAME;}else{namatengah="";}
                        // if(!empty(response.data.data.LAST_NAME)){namabelakang += response.data.data.LAST_NAME;}else{namabelakang="";}
                        // namalengkap = namadepan+" "+namatengah+" "+namabelakang;
                        contacts.forEach(c => {
                            email = c.CODE;
                        })
                        tableContent +=`
                        <tr >
                            <td width="70px">${no}</td>
                            <td>${response.data.data.FIRST_NAME} ${response.data.data.MID_NAME} ${response.data.data.LAST_NAME}</td>
                            <td>${email}</td>
                        </tr>`;
                    no++;
                    // tableHeader += tableContent;
                   $('#tabel-view-user tbody').append(tableContent);
                    },error : function(){}
                });
            });


            $('#modalViewUser').modal('show');
        }, error : function(){

        }
    })
}

function getField(IdOrg,OrgName,IdCol, ColName, Showing) {
    form_id_global = IdCol;
    left_id_global = IdOrg;


    $.ajax({
        url: "../../JSON/MATRIX/get-MTX1PivotField.ASP",
        type: "POST",
        data: {
            FormId: IdCol,
            LeftId: IdOrg,
        },

        dataType: "json",
        success: function (data) {
            const listField = data.data;

            fieldTable.clear().draw();

            let no = 1;

            listField.forEach(element => {
                let checked = element.FieldStatus != 0 ? 'checked' : '';

                fieldTable.row.add([
                    "<tr><td class='text-center'>" + no + ".</td>",
                    "<td class='text-center'>" + element.FieldCode + "</td>",
                    "<td>" + element.FieldName + "</td>",
                    "<td class='text-center'>" + element.FieldType + "</td>",
                    `<td>
                        <div>
                            <input class="form-check-input check" type="checkbox"
                                value="${element.FieldId}" ${checked}>
                                <input type="hidden" class="field-status-id" value="${element.FieldStatus}">
                        </div>
                    </td>`,
                ]).draw(false);
                no++;
            });

            $('.check').iCheck({
                checkboxClass: 'icheckbox_flat-red'
            });

            $('.check').on('ifChecked', function(event){
                const value = $(this).val();
                const valueStatus = $(this).parent().parent().find('input')[1];

                $.ajax({
                    url: "../../JSON/MATRIX/get-MTX1PivotAdd.ASP",
                    type: "POST",
                    data: {
                        FormId: IdCol,
                        LeftId: IdOrg,
                        FieldId: value },
                    dataType: "json",
                    success: function (data) {
                        // location.reload();
                        layout.draw();
                        $(valueStatus).val(data.FieldStatus);
                    },
                    error: function () {}
                });
            });

            $('.check').on('ifUnchecked', function(event){
                const value = $(this).val();
                const valueStatus = $(this).parent().parent().find('input')[1];
                const PivotId = $(valueStatus).val();

                $.ajax({
                    url: "../../JSON/MATRIX/get-MTX1PivotDel.ASP",
                    type: "POST",
                    data: { PivotId: PivotId },
                    dataType: "json",
                    success: function (data) {
                        layout.draw();
                    },
                    error: function () {}
                });
            });

            $('.value-name').html(`Tambahkan Hak Akses ${OrgName} pada atribute Form ${ColName}`);
            $('#modalPopAkses').modal('show');

        },
        error: function () {}
    });


}
