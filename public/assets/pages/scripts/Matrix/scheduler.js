/** 
 * @params {api_id, server_id}
 * 
*/
function addScheduler(api_id, server_id, api_name, domain_name, license_key, start_date, end_date, created_at, updated_at, created_by, updated_by) {
    
    const createdDate = created_at == 'null' ? '-' : created_at;
    const updatedDate = updated_at == 'null' ? '-' : updated_at;
    const updatedBy = updated_by == 'null' ? '-' : updated_by;
    
    $('#schedule-license-server').html(`${license_key}`);

    $('#schedule-from-api').html(`${api_name}`);
    $('#schedule-to-server').html(`${domain_name}`);

    $('#schedule-valid-date').html(`From ${start_date} To ${end_date}`);
    $('#schedule-created-date').html(`${createdDate} &nbsp; &nbsp; ${created_by}`);
    $('#schedule-updated-date').html(`${updatedDate} &nbsp; &nbsp; ${updatedBy}`);

     // get all field from API
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

            table_field_active.clear().draw();
            table_field_optional.clear().draw();
            
            listData.forEach(element => {
                let checkedCreate = element.create == 1 ? 'fa fa-check text-success' : 'fa fa-times text-danger';
                let checkedRead = element.read == 1 ? 'fa fa-check text-success' : 'fa fa-times text-danger';
                let checkedUpdate = element.update == 1 ? 'fa fa-check text-success' : 'fa fa-times text-danger';
                let checkedDelete = element.delete == 1 ? 'fa fa-check text-success' : 'fa fa-times text-danger';

                table_field_active.row.add([
                    "<tr><td class='text-center'>" + no + ".</td><input type='hidden' value='"+element.id+"' class='field-id'>",
                    "<td class='text-center'>" + element.nama + "</td>",
                    "<td class='text-center'>" + element.type_name + "</td>",
                    `<td class="text-center">
                        <div>
                          <i class="${checkedCreate}"></i>
                        </div>
                    </td>`,
                    `<td class="text-center">
                        <div>
                           <i class="${checkedRead}"></i>
                        </div>
                    </td>`,
                    `<td class="text-center">
                        <div>
                           <i class="${checkedUpdate}"></i>
                        </div>
                    </td>`,
                    `<td class="text-center">
                        <div>
                            <i class="${checkedDelete}"></i>
                        </div>
                    </td>`,
                ]).draw(false);

                // append to table field optional
                table_field_optional.row.add([
                    "<tr><td class='text-center'>" + no + ".</td><input type='hidden' value='"+element.id+"' class='field-id'>",
                    "<td class='text-center'>" + element.nama + "</td>",
                    "<td class='text-center'>" + element.type_name + "</td>",
                    `<td class="text-center">
                        <div>
                           <select class="form-control">
                             <option value=">"> > </option>
                             <option value=">="> > = </option>
                             <option value="<"> < </option>
                             <option value="<="> < = </option>
                           </select>
                        </div>
                    </td>`,
                    `<td class="text-center">
                        <div>
                            <input type="text" class="form-control">
                        </div>
                    </td>`,,
                ]).draw(false);

                no++;
            });                       
        },
        error: function () {}
    });

    $('#modalScheduler').modal('show');
}
