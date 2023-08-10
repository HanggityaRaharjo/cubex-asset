 /*!
    * Magina.Js v1.0 (https://maginajs.com/)
    * Licensed under MIT (https://github.com/twbs/magina/blob/main/LICENSE)
    * This File for showing list organization matrix
    * 02/07/2021
    */

 let layout =  {
    container: $('#list-organization'),
    containerContent: $('#content-organization'),

    components: [],
    organizations: [],
    sop: [],
    form: [],

    totalWidthHeader:0,

    totalWidthOrganization:0,

    defaultWidthOrganization: 200,
    defaultWidthForm: 200,
    defaultWidthSop: 200,

    init: function () {
        utils.getAllData();
    },
    clean: function () {
        $(this.container).empty();
        $(this.containerContent).empty();
        this.organizations = [];
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
        layoutOrgMatrix.createOrganizationHeader();
        layoutOrgMatrix.createSopHeader();
        layoutOrgMatrix.createFormHeader();
        layoutOrgMatrix.createMatrix();

    }
}

let layoutOrgMatrix = {
    createLeftHeaderTable: function () {
        let leftHeader = `
        <div class="scheduler_default_corner"
                style=" width: 100%; height: 90px; overflow: hidden; position: relative; padding: 30px; border-top:1px solid #dee2e6; border-right:1px solid #dee2e6; border-left:1px solid #dee2e6;">

                <div class="text-left">
                    <button class="btn btn-outline-primary btn-sm" onclick="addNewDimension()">Add New Data Dimension </button>
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
                'height': '400px'
            });

        list.append(appendedList);

        layout.container.append(list);

        $.ajax({
            url: "../../JSON/MATRIX/get-MTX2LeftLst.ASP",
            type: "GET",
            dataType: "json",
            async: false,
            success: function (data) {
                const listOrg = data.data;

                listOrg.forEach(element => {
                    const data = {
                        id: element.LeftId,
                        nama: element.LeftNama,
                        code: element.LeftCode
                    };

                    layout.components.push(data);
                });

            },
            error: function () {}
        });

        layout.components.forEach(element => {

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

                                    <button class="btn btn-outline-danger btn-sm rounded-pill"
                                        onclick="deleteDimension(${element.id})"
                                        title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    <button class="btn btn-outline-info btn-sm rounded-pill"
                                        onclick="updateDimension(${element.id})"
                                        title="Edit">
                                        <i class="icon-pencil"></i>
                                    </button>
                                    <button class="btn btn-outline-warning btn-sm rounded-pill"
                                        onclick="addFormula(${element.id})"
                                        title="Formula">
                                        <i class="fa fa-calculator"></i>
                                    </button>
                                    <button class="btn btn-outline-success btn-sm rounded-pill"
                                        onclick="updateDimension(${element.id})"
                                        title="Cut">
                                        <i class="fa fa-cut"></i>
                                    </button>

                                    &nbsp; ${element.nama}
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
                'height': '90px',
                'border': '1px solid gainsboro',
                'margin-left': '-1px'
            });

        layout.containerContent.append(header);

        let fullWidthHeader = $('.scheduler_default_timeheader_scroll').append(`
            <div class="default_fullwidth_header" style="width:${layout.totalWidthHeader}px; position:absolute;"></div>
        `);
    },
    createOrganizationHeader: function () {
        let leftSopHeader = 0 ;
        // console.log()
        layout.organizations.forEach(element => {

            let SopHeader = `
                <div
                    class="scheduler_default_timeheadergroup scheduler_default_timeheader_cell" style="position: absolute; top: 0px; left: ${leftSopHeader}px; width: ${element.totalWidth}px; height: 30px; user-select: none; overflow: hidden; white-space: nowrap; background-color: #ffce00; border-right: 1px solid gainsboro;">
                    <div class="scheduler_default_timeheadergroup_inner scheduler_default_timeheader_cell_inner text-center">
                        <span style="font-size:20px">${element.name}</span>
                    </div>
                </div>`;

            leftSopHeader += element.totalWidth;
            $('.default_fullwidth_header').append(SopHeader);
        });
    },
    createSopHeader: function () {

        let positionLeft = 0;
        let SopHeader = '';

        layout.sop.forEach(element => {
            let widthSopHeader =
            element.countForm == 0 ? 200 : layout.defaultWidthSop * element.countForm;

            SopHeader += `
            <div aria-hidden="true"
                class="scheduler_default_timeheadercol scheduler_default_timeheader_cell" style="position: absolute; top: 30px; left: ${positionLeft}px; width: ${widthSopHeader}px; height: 30px; user-select: none; overflow: hidden; white-space: nowrap; background-color:#151741; color:white; border-right: 1px solid gainsboro; border-bottom: 1px solid gainsboro;">
                <div class="text-center">${element.name}</div>
            </div>`;

            positionLeft += widthSopHeader;
        });


        $('.scheduler_default_timeheader_scroll').append(SopHeader);

    },
    createFormHeader: function () {
        let positionLeft = 0;
        let FormHeader = '';

        layout.form.forEach(element => {
            let widthFormHeader = layout.defaultWidthForm;

                FormHeader += `
                <div aria-hidden="true"
                    class="scheduler_default_timeheadercol scheduler_default_timeheader_cell"
                        style="position: absolute;
                        top: 60px;
                        left: ${positionLeft}px;
                        width: ${widthFormHeader}px;
                        height: 30px;
                        user-select: none;
                        overflow: hidden;
                        white-space: nowrap;
                        background-color:#3e6fc2;
                        color:white;
                        border-right: 1px solid gainsboro;">
                    <div class="text-center">${element.name}</div>
                </div>`;

                positionLeft += widthFormHeader

        });


        $('.scheduler_default_timeheader_scroll').append(FormHeader);
    },
    createMatrix: function () {
        let matrixBody = `
        <div class="scheduler_default_scrollable"
            style="overflow: auto;height: 425px;top: 90px;position: absolute;width: 100%; margin-left: -1px;">

            <div class="scheduler_default_matrix"
                style="user-select: none; min-height: 1px; position: absolute; height: 420px; width:${layout.totalWidthHeader}px;">
            </div>
        </div>`;

        layout.containerContent.append(matrixBody);

        for (let index = 0; index < layout.components.length; index++) {
            const element = layout.components[index];

            setTimeout(() => {
                let matrix = '<div class="d-flex flex-row" style="margin-top:-1px">';
                let classParent = '';

                if (index % 3 == 0) {
                    classParent += 'scheduler_default_cell text-center padding-matrix-cell';
                } else {
                    classParent +=
                        'scheduler_default_cell scheduler_default_cell_business text-center padding-matrix-cell';
                }

                $.ajax({
                    url: "../../JSON/MATRIX/get-MTX2PivotXY.asp",
                    type: "POST",
                    data: {
                        LeftId: element.id
                    },
                    dataType: "json",
                    async: false,
                    success: function (data) {
                       const listMatrix =  data.data;

                       listMatrix.forEach(elementMatrix => {

                             /*start isi*/

                            if(elementMatrix.SOP.length > 0) {
                                elementMatrix.SOP.forEach(elementSop => {

                                    if(elementSop.FORM.length > 0) {
                                        elementSop.FORM.forEach(elementForm => {
                                            matrix += `
                                            <div class="${classParent} pointer"
                                                onclick="getField(
                                                    '${elementForm.FormCode}',
                                                    '${elementForm.FormId}',
                                                    '${elementForm.FormName}',
                                                    '${element.id}',
                                                    '${element.nama}')"

                                                style="
                                                    width:${layout.defaultWidthForm}px;
                                                    height:51px;"> ${utils.iconCheck(elementForm.IsField)}
                                            </div>`;
                                        })
                                    } else {
                                        matrix += `
                                        <div class="${classParent} pointer"
                                            style="
                                                width:${layout.defaultWidthForm}px;
                                                height:51px;"> ${utils.iconTimes()}
                                        </div>`;
                                    }

                                })
                            } else {
                                matrix += `
                                <div class="${classParent}"
                                    style="
                                        width:${layout.defaultWidthForm}px;
                                        height:51px;"> ${utils.iconTimes()}
                                </div>`;
                            }

                            /*end isi*/
                       });
                    },
                    error: function () {}
                });


                classParent = '';
                matrix += '</div>';

                $('.scheduler_default_matrix').append(matrix);

            }, 10 * index);
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

    getAllData: function() {
        $.ajax({
            url: "../../JSON/MATRIX/get-MTX2Header.asp",
            type: "GET",
            dataType: "json",
            async: false,
            success: function (data) {
                const listData = data.data;

                listData.forEach(elementOrganization => {

                    /**
                     * @kind 1
                     * Jika organisasi mempunyai data SOP dan SOP mempunyai data FORM
                     * Maka lakukan perulangan SOP, FORM dan cari total width FORM secara keseluruhan dari tiap SOP
                     *
                     * @kind 2
                     * Jika organisasi mempunyai data SOP tetapi tidak mempunyai data FORM
                     * Maka lakukan perulangan SOP, untuk data FORM nya push dengan data dummy FORM
                     * Dan set Lebar kolom organization
                     *
                     * @kind 3
                     * Jika organisasi tidak mempunyai data SOP dan data FORM
                     * Maka INSERT data dummy SOP dan FORM
                     * Dan set Lebar kolom organization
                     *
                     */
                    if(elementOrganization.SOP.length > 0) {

                        elementOrganization.SOP.forEach(elementSop => {
                            const sop = {
                                id: elementSop.SOPId,
                                name: elementSop.SOPName,
                                countForm: elementSop.FORM.length};

                            layout.sop.push(sop);

                            if(elementSop.FORM.length > 0) {

                                layout.totalWidthOrganization
                                    += layout.defaultWidthOrganization * elementSop.FORM.length;

                                elementSop.FORM.forEach(elementForm => {
                                    const form = {
                                        id: elementForm.FormId,
                                        name: elementForm.FormName};

                                    layout.form.push(form);
                                });

                            } else {

                                const form = { id: '-', name: '-'};

                                layout.form.push(form);

                                layout.totalWidthOrganization += layout.defaultWidthOrganization;
                            }

                        });

                    }  else {
                        const sop = { id: '-', name: '-', countForm: 0};
                        layout.sop.push(sop);

                        const form = { id: '-', name: '-', totalWidth: false };
                        layout.form.push(form);

                        layout.totalWidthOrganization += layout.defaultWidthOrganization;
                    }

                    // get all data organization
                    const organization = {
                        id: elementOrganization.OrgId,
                        name: elementOrganization.OrgName,
                        totalWidth: layout.totalWidthOrganization,
                        countSop: elementOrganization.SOP.length};


                    layout.organizations.push(organization);

                    layout.totalWidthHeader += layout.totalWidthOrganization;
                    layout.totalWidthOrganization = 0;

                });

            },
            error: function () {}
        });
    },

    iconCheck: function(field) {
        if(field == 1) {
            return `<img src="../../assets/img/marker/rubix2.png"></img>`;
        } else {
            return `<img src="../../assets/img/marker/rubix1.png"></img>`;
        }
    },

    iconTimes: function() {
        return `<i class="fa fa-times-circle fa-2x" aria-hidden="true" style="color:#fa7f8b !important"></i>`;
    }
}

let mouse = {

}

function getField(formCode, formId, formName, leftId, leftName) {
    form_id_global = formId;
    left_id_global = leftId;


    $.ajax({
        url: "../../JSON/MATRIX/get-MTX2PivotField.ASP",
        type: "POST",
        data: {
            FormCode: formCode,
            FormId: formId,
            LeftId: leftId},

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
                    url: "../../JSON/MATRIX/get-MTX2PivotAdd.ASP",
                    type: "POST",
                    data: {
                        FormId: formId,
                        LeftId: leftId,
                        FieldId: value },
                    dataType: "json",
                    success: function (data) {
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
                    url: "../../JSON/MATRIX/get-MTX2PivotDel.ASP",
                    type: "POST",
                    data: { PivotId: PivotId },
                    dataType: "json",
                    success: function (data) {
                    },
                    error: function () {}
                });
            });

            $('.value-name').html(`Field ${formName} from ${leftName}`);
            $('#modalDetailField').modal('show');

        },
        error: function () {}
    });


}

function addNewDimension() {
    $('#modalAddNewDimension').modal('show');
}