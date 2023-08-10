 /*!
    * Magina.Js v1.0 (https://maginajs.com/)
    * Licensed under MIT (https://github.com/twbs/magina/blob/main/LICENSE)
    * This File for showing list organization matrix
    * 02/07/2021
    */

 let matrix_layout =  {
    container: $('#matrix-list-organization'),
    containerContent: $('#matrix-content-organization'),

    components: [],
    organizations: [],
    sop: [],
    form: [],
    iot:[],

    totalWidthHeader:0,
    totalWidthHeaderWithInput:0,

    totalWidthOrganization:0,

    defaultWidthOrganization: 200,
    defaultWidthForm: 200,
    defaultWidthSop: 200,

    init: function () {
        utils.getAllData();
        utils.getAllServer();
        // utils.getH2Hlist();
        // utils.getIOTlist();
    },
    clean: function () {
        this.container.empty();
        this.containerContent.empty();
        this.organizations = [];
        this.sop = [];
        this.form = [];
        this.components = [];
        this.h2h = [];
        this.iot = [];

        this.totalWidthHeader = 0;
        this.totalWidthOrganization = 0;

    },
    draw: function () {
        this.clean();
        this.init();

        this.createLayout();

        utils.scrollOverMatrix();
    },
    createLayout: function () {

        $('#loading').show();
        setTimeout(() => {

            $('#loading').hide();
            layoutOrgMatrixx.createLeftHeaderTable();
            layoutOrgMatrixx.createListBodyTable();
    
            layoutOrgMatrixx.createHeader();
            layoutOrgMatrixx.createOrganizationHeader();
            // layoutOrgMatrixx.createSopHeader();
            layoutOrgMatrixx.createFormHeader();
    
            // layoutOrgMatrixx.createH2HChildHeader();
            layoutOrgMatrixx.createIOTChildHeader();
    
            layoutOrgMatrixx.createMatrix();
            
            
        }, 1000);

    }
}

let layoutOrgMatrixx = {
    createLeftHeaderTable: function () {
        let leftHeader = `
        <div class="scheduler_default_corner"
                style=" width: 100%; height: 120px; overflow: hidden; position: relative; padding: 30px; border-top:1px solid #dee2e6; border-right:1px solid #dee2e6; border-left:1px solid #dee2e6;">
        </div>`;

        matrix_layout.container.append(leftHeader);
    },
    createListBodyTable: async () => {
        let index = 0;
        let positionTop = 0;
        let bodyList = '';

        let form_scroller = $('<div></div>').addClass('form_scroll');

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
            .attr('id', 'appended-list-cf-matrix')
            .css({
                'width': '120px',
                'height': '400px'
            });

        list.append(appendedList);

        form_scroller.append(list);

        matrix_layout.container.append(form_scroller);
            
        /**
         * @param {integer} api_id
         */
        matrix_layout.components.forEach(element => {

            let backgroundList = '';

            if (index % 3 == 0) {
                backgroundList += 'rgb(231, 228, 228)';
                // backgroundList += 'rgb(249, 249, 249)';
            } else {
                backgroundList += 'rgb(249, 249, 249)';
            }

            // class button remove
            const classButtonDanger    = utils.classButtonDangerDimension(element.IsRemoved);
            const disabledButtonRemove = utils.disabledButtonRemove(element.IsRemoved);
            const classTestEnvironment = utils.classTestEnvironment(element.is_tested);

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

                                    <button class="btn ${classButtonDanger} btn-sm rounded-pill" ${disabledButtonRemove}
                                        onclick="deleteApi(${element.id})"
                                        title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    <button class="btn btn-outline-warning btn-sm rounded-pill"
                                        onclick="addFormula(${element.id})"
                                        title="Formula">
                                        <i class="fa fa-calculator"></i>
                                    </button>
                                    <button class="btn btn-outline-success btn-sm rounded-pill"
                                        onclick="cutDimension(${element.id})"
                                        title="Cut">
                                        <i class="fa fa-cut"></i>
                                    </button>
                                    <button class="btn btn-outline-${classTestEnvironment} btn-sm rounded-pill"
                                        onclick="testEnvironment(${element.id})"
                                        title="Cut">
                                        <i class="fa fa-play-circle ${classTestEnvironment}"></i>
                                    </button>

                                    &nbsp; ${element.nama} - ${element.id} - ${element.is_tested}
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


        $('#appended-list-cf-matrix').append(bodyList);
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
                'height': '120px',
                'border': '1px solid gainsboro',
                'margin-left': '-1px'
            });

        matrix_layout.containerContent.append(header);

        let fullWidthHeader = $('.scheduler_default_timeheader_scroll').append(`
            <div class="default_fullwidth_header" style="width:${matrix_layout.totalWidthHeaderWithInput}px; position:absolute;"></div>
        `);
    },
    createOrganizationHeader: function () {
        let leftSopHeader = 0 ;

        // layoutOrgMatrixx.createInternalProcessHeader();
        // layoutOrgMatrixx.createH2HHeader();
        layoutOrgMatrixx.createIOTHeader();

        // matrix_layout.organizations.forEach(element => {

        //     let SopHeader = `
        //         <div
        //             class="scheduler_default_timeheadergroup scheduler_default_timeheader_cell" style="position: absolute; top: 30px; left: ${leftSopHeader}px; width: ${element.totalWidth}px; height: 30px; user-select: none; overflow: hidden; white-space: nowrap; background-color: #ffce00; border-right: 1px solid gainsboro;">
        //             <div class="scheduler_default_timeheadergroup_inner scheduler_default_timeheader_cell_inner text-center">
        //                 <span style="font-size:20px">${element.name}</span>
        //             </div>
        //         </div>`;

        //     leftSopHeader += element.totalWidth;
        //     $('.default_fullwidth_header').append(SopHeader);
        // });
    },
    createSopHeader: function () {

        let positionLeft = 0;
        let SopHeader = '';

        console.log(matrix_layout.sop);

        matrix_layout.sop.forEach(element => {
            let widthSopHeader =
            element.countForm == 0 ? 200 : matrix_layout.defaultWidthSop * element.countForm;

            SopHeader += `
            <div aria-hidden="true"
                class="scheduler_default_timeheadercol scheduler_default_timeheader_cell" style="position: absolute; top: 60px; left: ${positionLeft}px; width: ${widthSopHeader}px; height: 30px; user-select: none; overflow: hidden; white-space: nowrap; background: linear-gradient(62deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 0%, rgba(59,189,215,1) 0%, rgba(45,140,189,1) 52%); color:white; border-right: 1px solid gainsboro; border-bottom: 1px solid gainsboro;">
                <div class="text-center">${element.name}</div>
            </div>`;

            positionLeft += widthSopHeader;
        });


        $('.scheduler_default_timeheader_scroll').append(SopHeader);

    },
    createFormHeader: function () {
        let positionLeft = 0;
        let FormHeader = '';

        matrix_layout.form.forEach(element => {
            let widthFormHeader = matrix_layout.defaultWidthForm;

                FormHeader += `
                <div aria-hidden="true"
                    class="scheduler_default_timeheadercol scheduler_default_timeheader_cell"
                        style="position: absolute;
                        top: 90px;
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
    createMatrix: async ()  => {
        let matrixBody = `
        <div class="form_scroll">
        <div id="default_matrix_n" class="scheduler_default_scrollable"
            style="overflow: auto;height: 419px;top: 120px;position: absolute;width: 100%; margin-left: -1px; border: 1px solid gainsboro;">

            <div class="scheduler_default_matrix"
                style="user-select: none; min-height: 1px; position: absolute; height: 420px; width:${matrix_layout.totalWidthHeaderWithInput}px;">
            </div>
        </div>
        </div>`;

        matrix_layout.containerContent.append(matrixBody);

        // console.log('COMPONENT:' + matrix_layout.components);

        for (let index = 0; index < matrix_layout.components.length; index++) {
            const element = matrix_layout.components[index];

            // setTimeout(() => {
                let matrix = '<div class="d-flex flex-row" style="margin-top:-1px">';
                let classParent = '';

                if (index % 3 == 0) {
                    classParent += 'scheduler_default_cell text-center padding-matrix-cell';
                } else {
                    classParent +=
                        'scheduler_default_cell scheduler_default_cell_business text-center padding-matrix-cell';
                }

               
                for (let i = 0; i < matrix_layout.iot.length; i++) {

                    try {
                        const response = await axios.post(`${APP_URL_API_SWITCHING}monitor/transaction`, {
                            apiId: element.id,
                            serverId: matrix_layout.iot[i].id
                        });

                        const transactionCount = response.data.count;
                        const transactionApi   = response.data.transaction_api;
                        const dataApi          = response.data.data_api;
                        const dataLicenseKey   = response.data.data_license;
                        const dataJunction     = response.data.data_junction;

                        matrix += `
                          <div class="${classParent}"
                              style="
                                  width:${matrix_layout.defaultWidthForm}px;
                                  height:51px;"> 
                                      ${utils.iconCheck(transactionCount, transactionApi, dataJunction, dataApi, dataLicenseKey)}

                                      ${utils.iconSchedule({
                                          count: transactionCount,
                                          transactionApi: transactionApi,
                                          dataJunction: dataJunction,
                                          dataApi: dataApi,
                                          dataLicenseKey: dataLicenseKey
                                      })}

                                      ${utils.iconAlert(transactionCount, dataLicenseKey, transactionApi, dataJunction)}
                          </div>`;

                    } catch (error) {
                        console.log(error);
                    }
                }


                classParent = '';
                matrix += '</div>';

                $('#default_matrix_n .scheduler_default_matrix').append(matrix);


            // }, 10 * index);
        }
    },
    createInternalProcessHeader: function () {
        let element = `
        <div aria-hidden="true"
                class="scheduler_default_timeheadercol scheduler_default_timeheader_cell" style="position: absolute; top: 0px; left: 0px; width: ${matrix_layout.totalWidthHeader}px; height: 30px; user-select: none; overflow: hidden; white-space: nowrap; background-color:#4d4d4c; color:white; border-right: 1px solid gainsboro; border-bottom: 1px solid gainsboro;">
                <div class="text-center">Internal Process</div>
            </div>
        `

        $('.scheduler_default_timeheader_scroll').append(element);
    },
    createIOTHeader: function() {
        let widthHeader = matrix_layout.iot.length * matrix_layout.defaultWidthForm;
        let startLeft = matrix_layout.totalWidthHeader + (matrix_layout.defaultWidthForm * matrix_layout.h2h.length);
        let element = `
            <div aria-hidden="true"
                class="scheduler_default_timeheadercol scheduler_default_timeheader_cell" style="position: absolute; top: 0px; left: ${startLeft}px; width: ${widthHeader}px; height: 30px; user-select: none; overflow: hidden; white-space: nowrap; background-color:#4d4d4c; color:white; border-right: 1px solid gainsboro; border-bottom: 1px solid gainsboro;">
                <div class="text-center">SERVER PENERIMA</div>
            </div>
        `

        $('.scheduler_default_timeheader_scroll').append(element);
    },
    createH2HChildHeader: function() {
        let elementH2h = ''
        let leftWidthElement = 0;

        matrix_layout.h2h.forEach(element => {
            elementH2h += ` <div aria-hidden="true"
            class="scheduler_default_timeheadercol scheduler_default_timeheader_cell"
                style="position: absolute;
                top: 30px;
                left: ${matrix_layout.totalWidthHeader + leftWidthElement}px;
                width: ${matrix_layout.defaultWidthForm}px;
                height: 90px;
                user-select: none;
                overflow: hidden;
                white-space: nowrap;
                background-color:#3e6fc2;
                color:white;
                border-right: 1px solid gainsboro;
                line-height:80px;">
            <div class="text-center">${element.name}</div>
            </div>`

            leftWidthElement += matrix_layout.defaultWidthForm;
        });

        $('.scheduler_default_timeheader_scroll').append(elementH2h);
    },
    createIOTChildHeader: async () => {
        let startLeft = matrix_layout.totalWidthHeader + (matrix_layout.defaultWidthForm * matrix_layout.h2h.length);
        let elementIot = ''
        let widthElement = 0;
        // console.log('IOT:' + matrix_layout.iot);

        await matrix_layout.iot.forEach(element => {
            elementIot += ` <div aria-hidden="true"
            class="scheduler_default_timeheadercol scheduler_default_timeheader_cell"
                style="position: absolute;
                top: 30px;
                left: ${startLeft + widthElement}px;
                width: ${matrix_layout.defaultWidthForm}px;
                height: 90px;
                user-select: none;
                overflow: hidden;
                white-space: nowrap;
                background-color:#3e6fc2;
                color:white;
                border-right: 1px solid gainsboro;">
                <div class="text-center" style="height: 100%; margin-top:20px;">
                    ${element.name} - ${element.id} <br>
                <small>${element.ip} - ${element.port}</small>
                </div>
            </div>`

            widthElement += matrix_layout.defaultWidthForm;

        });

        $('.scheduler_default_timeheader_scroll').append(elementIot);
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

    getAllData: async () => {
        try {
            const response = await axios.get(`${APP_URL_API_SWITCHING}monitor/list/server`);
            const dataIot = response.data.data;
    
            let width = 0;
            dataIot.forEach(element => {
                matrix_layout.iot.push({
                    'id': element.id,
                    'name': element.domain,
                    'ip': element.ip,
                    'port': element.port,
                });

                width += matrix_layout.defaultWidthForm;
            });

            matrix_layout.totalWidthHeaderWithInput += width;
           
        } catch (error) {
            console.log(error);
        }

    },  

    getAllServer: async () => {
        try {
            const response = await axios.get(`${APP_URL_API_SWITCHING}monitor/list/api`);           
            const listOrg = response.data.data;
            listOrg.forEach(element => {
                matrix_layout.components.push({
                    id: element.id,
                    nama: element.nama,
                    code: element.code,
                    is_tested: element.is_tested,
                });
            });

        } catch (error) {
            console.log(error);
        }
    },

    iconCheck: function(count, transactionApi, dataJunction, dataApi, dataLicenseKey) {
        const licenseId = dataLicenseKey == null ? null : dataLicenseKey.id;
        const pathImageLock = APP_URL_SWITCHING + 'assets/images/switching/icon-lock.png';
        const pathImageUnlock = APP_URL_SWITCHING + 'assets/images/switching/icon-unlock.png';
        const imageInActive = APP_URL_SWITCHING + 'assets/images/switching/icon-inactive.png';

      
            if(count > 0 ) {
                if(transactionApi.active == 1) {
                    return `<img src="${pathImageUnlock}" class="img-fluid" width="50" 
                    onclick="showLicenseKey('${dataApi.api_id}','${dataApi.api_name}','${dataApi.domain_name}','${dataLicenseKey.license_key}', '${transactionApi.start_date}', '${transactionApi.end_date}', '${transactionApi.created_at}', '${transactionApi.updated_at}', '${transactionApi.created_by}', '${transactionApi.updated_by}')" style="cursor:pointer;">`;
                } else if(transactionApi.active == 2) {
                    return `<img src="${imageInActive}" class="img-fluid" width="50"
                        onclick="alertLicenseKey('${transactionApi.id}','${dataLicenseKey.license_key}','${dataJunction.api_id}', '${dataJunction.api_name}', '${dataJunction.server_id}', '${dataJunction.server_name}', '${transactionApi.start_date}', '${transactionApi.end_date}', '${transactionApi.active}', 1)"  style="cursor:pointer;">`;
                }
                
                    // return `<img src="../assets/img/YOGI/CHART/100px/Dimension-3-trans-icon.png" width="50"></img>`;
            } else {
                return `<img src="${pathImageLock}" class="img-fluid" width="50" 
                onclick="generateLicenseKey(${licenseId}, '${dataJunction.api_id}', '${dataJunction.api_name}', '${dataJunction.server_id}', '${dataJunction.server_name}')" style="cursor:pointer;">`;
    
                // return `<img src="../assets/img/YOGI/CHART/100px/Dimension-2-trans-icon.png" width="50"></img>`;
            }
      
    },

    iconSchedule:function({count, transactionApi, dataJunction, dataApi, dataLicenseKey}) {
        const pathImageSchedule = APP_URL_SWITCHING + 'assets/images/switching/scheduler/scheduler-logo.png';

        if(count > 0 ) {
            if(transactionApi.active == 1) {
                return `<img src="${pathImageSchedule}" class="img-fluid" width="50"
                onclick="addScheduler('${transactionApi.api_id}', '${dataJunction.server_id}', '${dataApi.api_name}','${dataApi.domain_name}','${dataLicenseKey.license_key}', '${transactionApi.start_date}', '${transactionApi.end_date}', '${transactionApi.created_at}', '${transactionApi.updated_at}', '${transactionApi.created_by}', '${transactionApi.updated_by}')" style="cursor:pointer;">`; 
            }
        }

        return '';
    },

    iconAlert: function(count, dataLicenseKey, transactionApi, dataJunction) {
        const pathImageAlert = APP_URL_SWITCHING + '/assets/images/switching/icon-exclamation.png';

     
            if(count > 0) {
                if(transactionApi.active == 1) {
                    return `<img src="${pathImageAlert}" class="img-fluid" width="50"
                    onclick="alertLicenseKey('${transactionApi.id}','${dataLicenseKey.license_key}','${dataJunction.api_id}', '${dataJunction.api_name}', '${dataJunction.server_id}', '${dataJunction.server_name}', '${transactionApi.start_date}', '${transactionApi.end_date}', '${transactionApi.active}', 2)"  style="cursor:pointer;">`;
                } else {
                    return '';
                }

            } else {
                return '';

            }
    },

    classButtonDangerDimension: function(remove) {
        if(remove == 1) {
            return 'btn-secondary';
        } else {
            return 'btn-outline-danger';
        }
    },

    disabledButtonRemove: function(remove) {
        if(remove == 1) {
            return 'disabled';
        } else {
            return '';
        }
    },

    classTestEnvironment: function(is_tested) {
        if(is_tested == 1) {
            return 'danger';
        } else {
            return 'success';
        }
    },

    iconCheckActive: () => {
        $('.check').iCheck({
            checkboxClass: 'icheckbox_flat-blue'
        });
    },

    iconCheckUpdate: ({value, method, api_id}) => {
        $('.check').on(method, function(event){
                const elementInput = $(this).closest('tr').find('input')[0];
                const field_id = $(elementInput).val();
                const attributeName = $(this).attr('name');
                // const valueStatus = $(this).parent().parent().find('input')[1];

                axios.post(`${APP_URL_API_SWITCHING}monitor/field/update`, {
                    api_id: api_id,
                    active: value,
                    field_id: field_id,
                    attribute_name: attributeName
                })
                .then((response) => {
                    console.log(response);
                })
                .catch((error) => {
                    console.log(error);
                });
        });
    },
    
}

function getMatrixField(formCode, formId, formName, leftId, leftName) {
    form_id_global_matrix = formId;
    left_id_global_matrix = leftId;


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

            matrixTable.clear().draw();

            let no = 1;

            listField.forEach(element => {
                let checked = element.FieldStatus != 0 ? 'checked' : '';

                matrixTable.row.add([
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

                        matrix_layout.draw();
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
                        matrix_layout.draw();
                    },
                    error: function () {}
                });
            });

            $('.value-name-matrix').html(`Field ${formName} from ${leftName}`);
            $('#modalDetailField').modal('show');

        },
        error: function () {}
    });


}


function addNewDimension() {
    $('#modalAddNewDimension').modal('show');
}


function showLicenseKey(api_id, api_name, domain_name, license, start_date, end_date, created_at, updated_at, created_by, updated_by) {
    const createdDate = created_at == 'null' ? '-' : created_at;
    const updatedDate = updated_at == 'null' ? '-' : updated_at;
    const updatedBy = updated_by == 'null' ? '-' : updated_by;
    
    $('#license-server').html(`${license}`);

    $('#from-api').html(`${api_name}`);
    $('#to-server').html(`${domain_name}`);

    $('#valid-date').html(`From ${start_date} To ${end_date}`);
    $('#created-date').html(`${createdDate} &nbsp; &nbsp; ${created_by}`);
    $('#updated-date').html(`${updatedDate} &nbsp; &nbsp; ${updatedBy}`);

    // get all field from API

    async function getField() {
        try {
            const response = await axios.post(`${APP_URL_API_SWITCHING}monitor/list/api/${api_id}/field`, {
                apiId: api_id,
            });

            const listData = response.data.data;

            let no = 1;

            table_field.clear().draw();
            
            listData.forEach(element => {
                let checkedCreate = element.create == 1 ? 'checked' : '';
                let checkedRead = element.read == 1 ? 'checked' : '';
                let checkedUpdate = element.update == 1 ? 'checked' : '';
                let checkedDelete = element.delete == 1 ? 'checked' : '';

                table_field.row.add([
                    "<tr><td class='text-center'>" + no + ".</td><input type='hidden' value='"+element.id+"' class='field-id'>",
                    "<td class='text-center'>" + element.nama + "</td>",
                    "<td class='text-center'>" + element.type_name + "</td>",
                    `<td class="text-center">
                        <div>
                            <input class="form-check-input check" name="create" type="checkbox"
                                value="" ${checkedCreate}>
                        </div>
                    </td>`,
                    `<td class="text-center">
                        <div>
                            <input class="form-check-input check" name="read" type="checkbox"
                                value="" ${checkedRead}>
                        </div>
                    </td>`,
                    `<td class="text-center">
                        <div>
                            <input class="form-check-input check" name="update" type="checkbox"
                                value="" ${checkedUpdate}>
                        </div>
                    </td>`,
                    `<td class="text-center">
                        <div>
                            <input class="form-check-input check" name="delete" type="checkbox"
                                value="" ${checkedDelete}>
                        </div>
                    </td>`,
                ]).draw(false);
                no++;
            });

            utils.iconCheckActive();
            utils.iconCheckUpdate({value: 1, method: 'ifChecked', api_id: api_id});
            utils.iconCheckUpdate({value: 0, method: 'ifUnchecked', api_id: api_id});


        } catch (error) {
            
        }
    }

    getField();


    $('#modalLicense').modal('show');
}

function alertLicenseKey(tj_api_id, license_key, api_id, api_name, server_id, server_name, start_date, end_date, active, flag) {

    const badgeClassActive =  active == 1 ? 'badge-success' : 'badge-danger';
    const textClassActive =  active == 1 ? 'active' : 'in-active';

    $('#alert-active').empty();
    $('#alert-button').empty();
    $('#alert-note').empty();

    if(active == 1)
        $('#alert-active').append(`<badge class="badge ${badgeClassActive}" style="font-size: 15px">${textClassActive}</badge>`);
    else
        $('#alert-active').append(`<badge class="badge ${badgeClassActive}" style="font-size: 15px">${textClassActive}</badge>`);
    
    if(flag == 1)
        $('#alert-button').append(`<button type="button" class="btn btn-block btn-secondary" onclick="alertGenerateKey()">REACTIVE</button>`);
    else
        $('#alert-button').append(`<button type="button" class="btn btn-block btn-danger" onclick="alertGenerateKey()">EMERGENCY</button>`);

    if(flag == 1)
        $('#alert-note').append(` <p>
        Please click REACTIVE Button to start again </p>`);
    else
        $('#alert-note').append(` <p>
        Please click EMERGENCY STOP  Button to STOP and send information to data provider and  data receiver 
        To Edit their license permit duration , you may please edit valid date and click edit button to continue
    </p>`);

    if(flag == 1)
        $('#button-edit').css('display', 'none')
    else
        $('#button-edit').css('display', 'block')
        
    $('#alert_flag').val(flag);
    $('#alert_tj_api_id').val(tj_api_id);


    $('#alert-license-key').html(license_key);
    $('#alert_api_id').val(api_id);
    $('#alert_server_id').val(server_id);
    $('#alert-from-api').html(api_name);
    $('#alert-to-server').html(server_name);

    $('#alert_start_date').val(start_date);
    $('#alert_end_date').val(end_date);
    $('#modalAlertLicenseKey').modal('show');
}

function generateLicenseKey(license_id, api_id, api_name, server_id, server_name) {

    // const apiId = dataJunction.api_id;
    // const apiName = dataJunction.api_name;
    // const serverId = dataJunction.server_id;
    // const serverName = dataJunction.server_name;

    $('#api_id').val(api_id);
    $('#server_id').val(server_id);
    $('#generate-from-api').html(api_name);
    $('#generate-to-server').html(server_name);
    $('#modalGenerateLicense').modal('show');
}

function testEnvironment(api_id) {

    axios.get(`${APP_URL_API_SWITCHING}environment/${api_id}`)
        .then(response => {
            const dataApi = response.data.data;
            const dataServer = response.data.data.server;
            const fieldKeyIn = response.data.data.fields_key_in;
            const fieldKeyOut = response.data.data.fields_key_out;
            const method = response.data.is_type == 1 ? 'POST' : 'GET';

            $('#environtment-ip').html(`${dataServer.ip}`);
            $('#environtment-domain').html(`${dataServer.domain} <br> ${dataApi.url}`);
            $('#environtment-token').html(`${dataServer.token}`);
            $('#environtment-api-url').val(`${dataApi.url}`);
            $('#method-api').text(`${method}`);

            $('#jsonres-beautified').empty();

            if(dataApi.is_tested == 1) {
                $('#tested-icon').attr('src', 'https://switching.cube-x.net/assets/images/monitoring/red-button.png');
                $('#environtment-tested').addClass('btn-danger').removeClass('btn-success').html('Untested');
            }else {
                $('#tested-icon').attr('src', 'https://switching.cube-x.net/assets/images/monitoring/green-button.png');
                $('#environtment-tested').addClass('btn-success').removeClass('btn-danger').html('Tested');
            }


            // append all field key in to table api key
            $('#table-key-in tbody').empty();

            fieldKeyIn.forEach(field => {
                let html = 
                `<tr>
                    <td><input type="text" name="field_name[]" class="form-control" style="padding:2px" value="${field.nama}"></td>
                    <td><input type="text" name="field_value[]" class="form-control" style="padding:2px"></td>
                    <td><span class="text-muted">Description..</span></td>
                </tr>`

                $('#table-key-in tbody').append(html);
            });

            // append all field key out to table api key
            $('#table-key-out tbody').empty();

            fieldKeyOut.forEach(field => {
                let html = 
                `<tr>
                    <td><input type="text" name="field_name[]" class="form-control" style="padding:2px" value="${field.nama}"></td>
                    <td><input type="text" name="field_value[]" class="form-control" style="padding:2px"></td>
                    <td><span class="text-muted">Description..</span></td>
                </tr>`

                $('#table-key-out tbody').append(html);
            });

            $('#modalEnvironment').modal('show');
        })
        .catch(err => {
            console.log(err);
        })
}

/** Add formula */
function addFormula(api_id) {
    
    $('#formula_api_id').val(api_id);

    $.ajax({
        url: APP_URL + '/monitor/list/api/' + api_id + '/field',
        type: "POST",
        data: {
            apiId: api_id,
        },
        dataType: "json",
        beforeSend:function(xhr){
            var token = $('meta[name="csrf-token"]').attr('content');
            if(token){
                return xhr.setRequestHeader('X-CSRF-TOKEN',token);
            }
        },
        success: function (response) {
            const listData = response.data;
            let no = 1;

            table_formula.clear().draw();
            
            listData.forEach(element => {

                table_formula.row.add([
                    "<tr><td class='text-center'>" + no + ".</td><input type='hidden' value='"+element.id+"' class='field-id'>",
                    "<td class='text-center'><input type='hidden' value='"+element.nama+"' class='name-attr'>" + element.nama + "</td>",
                    "<td class='text-center'><input type='hidden' value='"+element.id+"' class='code-attr'>" + element.type_name + "</td>",
                    `<td class="text-center">
                        <input type="text" class="form-control value-attr">
                    </td>`,
                    `<td class="text-center">
                        <button class="btn btn-sm btn-info chooseFormulaField" title="Choose Field" data-id="${element.id}"><i class="fa fa-hand-o-right fa-lg"></i></button>
                    </td>`,
                ]).draw(false);
                no++;
            }); 
            
            
            $('.chooseFormulaField').on('click', function(e) {
                const selfAttr = $(this);

                // Pilih Attribute
                let code = selfAttr.closest('tr').find('td .code-attr').val();
                let name = selfAttr.closest('tr').find('td .name-attr').val();
                let simbol = selfAttr.closest('tr').find('td .simbol-attr').text();
                let value = selfAttr.closest('tr').find('td .value-attr').val();

                if(!value){
                    swal('Perhatian','Harap isi nilai untuk melakukan simulasi perhitungan','info')
                    return false;
                }

                // display
                // let parseName = name.split('-')[1];

                console.log(name+'-'+code);

                charFormula.push(value);
                charFormulaId.push('#'+code);

                updateDisplayFormula();
                updateDisplayId();


                addToken(value);

               
            });

        },
        error: function () {}
    });

    $.ajax({
        url: APP_URL + '/monitor/list/api/description',
        type: 'POST',
        data: {
            apiId: api_id,
        },
        dataType: "json",
        beforeSend:function(xhr){
            var token = $('meta[name="csrf-token"]').attr('content');
            if(token){
                return xhr.setRequestHeader('X-CSRF-TOKEN',token);
            }
        },
        success: function (response) {
            if(response.status == true) {
                const dataApi = response.dataApi;
                const dataServer = response.dataServer;

                $('#api-formula-title').text(`${dataApi.nama}`);
                $('#from-api-formula').text(dataApi.nama);
                $('#to-server-formula').text(dataServer.domain);
                $('#created-date-formula').text(dataApi.created_at);
                $('#updated-date-formula').text(dataApi.updated_at);
            }
        },
        error: function () {}
    });


    $('#table-formula').dataTable();
    $('#modalFormula').modal('show');
}

$('#modalEnvironment').on('hidden.bs.modal', function (e) {
    $('#jsonres-encrypted-beautified').text('');
    $('#jsonres-beautified').text('');
})

/** Delete Api */
function deleteApi(api_id) {
    swal({
        title: 'Anda yakin menghapus data ini?',
        text: 'Data yang sudah dihapus tidak dapat dikembalikan!',
        icon: 'warning',
        dangerMode: true,
        closeOnCancel: false,
        buttons: {
            delete: {
                text : 'Ya, hapus data ini',
                value: 'delete',
                className: 'swal-button--danger'
            },
            cancel: 'Batal'
        }
    })
    .then((isConfirm) => {
        if(isConfirm !== 'delete') {
            swal.close();
            return;
        }

        if(isConfirm == 'delete'){
          
        } 
    })
}



