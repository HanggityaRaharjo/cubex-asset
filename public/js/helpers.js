const translatedFormat = () => {
    return {
        processing: '<i class="fa fa-spinner fa-spin fa-2x fa-fw text-gray">',
        sLengthMenu: "Tampilkan _MENU_ data",
        sZeroRecords: "Tidak ditemukan data yang sesuai",
        sInfo: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
        sInfoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
        sInfoFiltered: "(disaring dari _MAX_ data keseluruhan)",
        sInfoPostFix: "",
        sSearch: "Cari:",
        sUrl: "",
        oPaginate: {
            sFirst: "Awal",
            sPrevious: "Sebelumnya",
            sNext: "Selanjutnya",
            sLast: "Akhir",
        },
    };
};

const showSwal = (message) => {
    const iconUrl = `${ICON_URL}`;
    Swal.fire({
        //title: 'You have successfully add your Meta Database',
        html:
            "<b>" +
            message +
            "<b><br><br>" +
            " <button class='button-ok' style='font-color:white' onclick='Swal.close()'><b style='color:white'>OK</b></button>",
        icon: "question",
        iconHtml: "<img src=" + iconUrl + ">",
        showCancelButton: false,
        showConfirmButton: false,
    });
};

const showSwalConfirm = (message) => {
    const iconUrl = `${ICON_URL}`;
    Swal.fire({
        //title: 'You have successfully add your Meta Database',
        html:
            "<b>" +
            message +
            "<b><br><br>" +
            " <button class='button-ok' style='font-color:white;width:100px'><b style='color:white'>OK</b></button>" +
            " <button class='button-close' style='font-color:white;width:100px' onclick='Swal.close()'><b style='color:white'>Cancel</b></button>",
        icon: "question",
        iconHtml: "<img src=" + iconUrl + ">",
        showCancelButton: false,
        showConfirmButton: false,
    });
};

const showSuccessMessage = (messageSuccess) => {
    swal({
        title: messageSuccess,
        icon: `${APP_URL}/assets/icon/success-popup.svg`,
    });
};

const showFailMessage = (messageError) => {
    swal("Error", messageError, "error");
};


const loader = function(){
    return
}


const showLoading = function() {
    swal({
      title: 'Now loading',
      allowEscapeKey: false,
      allowOutsideClick: false,
      onOpen: () => {
        swal.showLoading();
      }
    }).then(
      () => {},
      (dismiss) => {

          console.log('closed by timer!!!!');
          swal({
            title: 'Finished!',
            type: 'success',
            timer: 2000,
            showConfirmButton: false
          })

      }
    )
  };

const setModal = (idModal, state) => {
    $(`#${idModal}`).modal(state);
};

const setDatePicker = (className) => {
    $(`.${className}`).datepicker({
        autoclose: true,
        format: "dd-mm-yyyy",
        orientation: "bottom",
    });
};

const setYearPicker = (className) => {
    $(`.${className}`).datepicker({
        autoclose: true,
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years",
        orientation: "bottom",
        showOnFocus: true,
    });
};

const setDropify = (className) => {
    $(`.${className}`).dropify({
        messages: {
            default: "Drag and drop file atau klik disini",
            replace: "Drag and drop or click to replace",
            remove: "Hapus",
            error: "Ooops, terjadi kesalahan saat melakukan upload",
        },
        error: {
            fileSize: "Ukuran File Foto/Video yg anda upload terlalu besar.",
            imageFormat: `File Foto/Video yg anda upload tidak sesuai.`,
        },
    });
};

const setSelect2 = (className, containerDropdown) => {
    $(`.${className}`).select2({
        theme: "bootstrap4",
        placeholder: "Pilih",
        allowClear: true,
        dropdownParent: $(`#${containerDropdown}`),
    });
};

/**
 * @param object {url, method}
 * @param objectarray formData
 * @returns
 */
const commit = ({ url, type, data: formData = {}, hasCustomForm = false }) =>
    new Promise((resolve, reject) => {
        const finalSetup = {
            url: url,
            type: type,
            data: formData,
            dataType: "json",
            timeout: 500000,
            beforeSend: (xhr) => {
                var token = $('meta[name="csrf-token"]').attr("content");
                if (token) return xhr.setRequestHeader("X-CSRF-TOKEN", token);
            },
        };

        if (hasCustomForm === true) {
            finalSetup.contentType = false;
            finalSetup.processData = false;
        }

        $.ajax(finalSetup)
            .done((response) => {
                resolve(response);
            })
            .fail((xhr, status, errorThrown) => {
                reject(xhr,status,errorThrown);
            });
    });

const getAxiosData = (url) =>
    new Promise((resolve, reject) => {
        axios
            .get(url)
            .then((response) => {
                return resolve(response);
            })
            .catch((err) => {
                return reject(err);
            });
    });
const confirmDelete = ({ url }) =>
    new Promise((resolve, reject) => {
        swal({
            title: "Anda yakin menghapus data ini?",
            icon: `${APP_URL}/assets/icon/warning-popup.svg`,
            dangerMode: true,
            closeOnCancel: false,
            buttons: {
                delete: {
                    text: "Ya, hapus data ini",
                    value: "delete",
                    className: "swal-button--danger",
                },
                cancel: "Batal",
            },
        }).then((result) => {
            if (result == "delete") {
                const finalSetup = {
                    url: url,
                    type: "get",
                    dataType: "json",
                    beforeSend: (xhr) => {
                        var token = $('meta[name="csrf-token"]').attr(
                            "content"
                        );
                        if (token)
                            return xhr.setRequestHeader("X-CSRF-TOKEN", token);
                    },
                };

                $.ajax(finalSetup)
                    .done((response) => {
                        resolve(response);
                    })
                    .fail((xhr, status, errorThrown) => {
                        reject(xhr);
                    });
                // resolve();
            }
        });
    });
