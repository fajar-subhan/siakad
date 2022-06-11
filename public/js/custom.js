var duplicate_room = 0;
var error_room     = 0;
var dt;

const icons = `<span class="svg-icon svg-icon-1 svg-icon-light"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"/>
            <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black"/>
            <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black"/>
            </svg></span>`;

/* When the plus button outside the modal is clicked */
var addButtonModal = function () {
    $("#id_room").val('');

    $("#div_status_room").hide();

    $("#code_room").removeAttr('disabled');

    $("#modal_room_title").html(
        '<i class="fa-solid fa-plus" style="font-size:100%;color:black;"></i> Tambah Ruangan');

    $("#kt_modal_room_form").attr('onsubmit', 'eventSave(event)');

    $("#button_submit").text('Tambah');

    $("#code_room_error").hide();
    $("#code_room").removeAttr('style');

    $("#name_room_error").hide();
    $("#name_room").removeAttr('style');

    $("#code_room").val('');
    $("#name_room").val('');
}

var showError = function (message, selector_error, selector) {
    $(selector_error).show();

    $(selector_error).html(icons + ' ' + message);
    $(selector_error).css({
        'background-color': '#f1416c',
        'color': 'white',
        'border-radius': '7px',
        'padding': '1rem',
        'margin-top': '1%',
    });

    $(selector).css({
        'border': '2px solid #f1416c'
    });
}

var removeError = function (selector_error, selector) {
    $(selector).css({
        'border': '2px solid #50cd89'
    });

    $(selector_error).hide();
}

/** 
 * This function is for when the add button in the modal is submitted
 */
var eventSave = function (e) {
    e.preventDefault();

    var code_room = $("#code_room").val();
    var name_room = $("#name_room").val();

    if (code_room == "") {
        showError('Kode ruangan wajib di isi', '#code_room_error', '#code_room');
        error_room++;
    } else if (code_room.length > 6) {
        showError('Kode ruangan maksimal 6 karakter', '#code_room_error', '#code_room');
        error_room++;
    } else {
        removeError('#code_room_error', '#code_room');
        error_room = 0;
    }

    if (name_room == "") {
        showError('Nama ruangan wajib di isi', '#name_room_error', '#name_room');
        error_room++;
    } else if (name_room.length > 50) {
        showError('Nama ruangan maksimal 50 karakter', '#name_room_error', '#name_room');
        error_room++;
    } else {
        removeError('#name_room_error', '#name_room');
        error_room = 0;
    }

    if (duplicate_room > 0) {
        showError('Kode ruangan sudah digunakan', '#code_room_error', '#code_room');
        duplicate_room++;
    } else {
        duplicate_room = 0;
    }

    if (error_room == 0 && duplicate_room == 0) {
        $.ajax({
            url: 'ruangan',
            method: 'post',
            data: {
                code_room: code_room,
                name_room: name_room
            },
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (xhr) {
                if (xhr.success) {
                    dt.draw();

                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: xhr.message,
                    });

                    $("#kt_modal_room").attr('aria-hidden', 'true');
                    $("#kt_modal_room").modal('toggle');
                    $("#modal").hide();
                    $(".modal-backdrop").remove();
                    $(".modal").removeClass("show");
                    $(".modal").css("display", "none");
                    $("#kt_body").css('overflow', '');
                    $("#kt_body").css('padding-right', '');
                    $("#kt_body").removeClass('modal-open');
                    $("#kt_modal_room").removeAttr('aria-modal');
                    $("#kt_modal_room").removeAttr('role');

                    $("#code_room").val('');
                    $("#name_room").val('');
                    $("#code_room").removeAttr('style');
                    $("#name_room").removeAttr('style');

                } else {
                    dt.ajax.reload();

                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: xhr.message,
                    });

                    $("#kt_modal_room").attr('aria-hidden', 'true');
                    $("#kt_modal_room").modal('toggle');
                    $("#modal").hide();
                    $(".modal-backdrop").remove();
                    $(".modal").removeClass("show");
                    $(".modal").css("display", "none");
                    $("#kt_body").css('overflow', '');
                    $("#kt_body").css('padding-right', '');
                    $("#kt_body").removeClass('modal-open');
                    $("#kt_modal_room").removeAttr('aria-modal');
                    $("#kt_modal_room").removeAttr('role');

                    $("#code_room").val('');
                    $("#name_room").val('');
                    $("#code_room").removeAttr('style');
                    $("#name_room").removeAttr('style');
                }
            }
        })
    }
}

/* When the edit button is clicked and the modal form appears the first time */
var eventEdit = function (e) {
    $("#code_room").attr('disabled', 'disabled');
    $("#div_status_room").show();
    $('#id_room').val(e);
    $("#modal_room_title").html(
        '<i class="fa-solid fa-pencil" style="font-size:100%;color:black;"></i> Ubah Ruangan');

    $("#kt_modal_room_form").attr('onsubmit', 'eventUpdate(event)');

    $("#button_submit").text('Ubah');

    $.ajax({
        url: 'ruangan/' + e + '/edit',
        type: 'get',
        dataType: 'json',
        data: {
            id: e
        },
        success: function (xhr) {
            $('#code_room').val(xhr.code);
            $('#name_room').val(xhr.name);
            $('#status_room').val(xhr.active);
        }
    });
}

var eventUpdate = function (e) {
    e.preventDefault();

    var code_room = $("#code_room").val();
    var name_room = $("#name_room").val();
    var status_room = $("#status_room").val();
    var id_room = $("#id_room").val();

    if (code_room == "") {
        showError('Kode ruangan wajib di isi', '#code_room_error', '#code_room');
        error_room++;
    } else if (code_room.length > 6) {
        showError('Kode ruangan maksimal 6 karakter', '#code_room_error', '#code_room');
        error_room++;
    } else {
        removeError('#code_room_error', '#code_room');
    }

    if (name_room == "") {
        showError('Nama ruangan wajib di isi', '#name_room_error', '#name_room');
        error_room++;
    } else if (name_room.length > 50) {
        showError('Nama ruangan maksimal 50 karakter', '#name_room_error', '#name_room');
        error_room++;
    } else {
        removeError('#name_room_error', '#name_room');
    }

    if (name_room == "") {
        showError('Nama ruangan wajib di isi', '#name_room_error', '#name_room');
        error_room++;
    } else if (name_room.length > 50) {
        showError('Nama ruangan maksimal 50 karakter', '#name_room_error', '#name_room');
        error_room++;
    } else {
        removeError('#name_room_error', '#name_room');
    }

    if (error_room == 0) {
        $.ajax({
            url: 'ruangan/' + id_room,
            method: 'PATCH',
            data: {
                name_room: name_room,
                status_room: status_room
            },
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (xhr) {
                if (xhr.success) {
                    dt.draw();
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: xhr.message,
                    });

                    $("#kt_modal_room").attr('aria-hidden', 'true');
                    $("#kt_modal_room").modal('toggle');
                    $("#modal").hide();
                    $(".modal-backdrop").remove();
                    $(".modal").removeClass("show");
                    $(".modal").css("display", "none");
                    $("#kt_body").css('overflow', '');
                    $("#kt_body").css('padding-right', '');
                    $("#kt_body").removeClass('modal-open');
                    $("#kt_modal_room").removeAttr('aria-modal');
                    $("#kt_modal_room").removeAttr('role');

                    $("#code_room").val('');
                    $("#name_room").val('');
                    $("#code_room").removeAttr('style');
                    $("#name_room").removeAttr('style');
                } else {
                    dt.ajax.reload();
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: xhr.message,
                    });

                    $("#kt_modal_room").attr('aria-hidden', 'true');
                    $("#kt_modal_room").modal('toggle');
                    $("#modal").hide();
                    $(".modal-backdrop").remove();
                    $(".modal").removeClass("show");
                    $(".modal").css("display", "none");
                    $("#kt_body").css('overflow', '');
                    $("#kt_body").css('padding-right', '');
                    $("#kt_body").removeClass('modal-open');
                    $("#kt_modal_room").removeAttr('aria-modal');
                    $("#kt_modal_room").removeAttr('role');

                    $("#code_room").val('');
                    $("#name_room").val('');
                    $("#code_room").removeAttr('style');
                    $("#name_room").removeAttr('style');
                }
            }
        });
    }
}

var eventClose = () => {
    $("#kt_modal_room_form")[0].reset();
    $("#code_room").removeAttr('style');
    $("#name_room").removeAttr('style');
    $("#code_room_error").hide();
    $("#name_room_error").hide();
}

$("#code_room").on('keyup', function (e) {
    if (e.code != 'Enter') {
        var code_room = e.target.value.length;
        var value = e.target.value;

        if (code_room) {
            removeError('#code_room_error', '#code_room');

            /* Check if the room code already exists, if it already exists then an error */
            $.ajax({
                url: 'ruangan/check_code',
                type: 'post',
                dataType: 'json',
                data: {
                    code_room: value
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (xhr) {
                    console.log('keyup code room >>> ', xhr);
                    if (xhr.count) {
                        showError('Kode ruangan sudah digunakan', '#code_room_error',
                            '#code_room');
                        duplicate_room++;
                    } else {
                        duplicate_room = 0;
                    }
                }
            });
        } else {
            showError('Kode ruangan wajib di isi', '#code_room_error', '#code_room');
        }
    }
});

$("#name_room").on('keyup', function (e) {
    if (e.code != 'Enter') {
        var name_room = e.target.value.length;

        if (name_room) {
            removeError('#name_room_error', '#name_room');
        } else {
            showError('Nama ruangan wajib di isi', '#name_room_error', '#name_room');
        }
    }
});

var eventDelete = function () {
    var id = [];

    $('.room_checkbox:checked').each(function () {
        id.push($(this).val());
    });

    if (id.length > 0) {
        Swal.fire({
            text: "Anda yakin ingin menghapus ?",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Tidak",
            customClass: {
                confirmButton: "btn fw-bold btn-danger",
                cancelButton: "btn fw-bold btn-active-light-primary"
            }
        }).then(function (result) {
            if (result.value) {
                Swal.fire({
                    imageUrl: "delete.gif",
                    buttonsStyling: false,
                    showConfirmButton: false,
                    timer: 2000
                }).then(function () {
                    $.ajax({
                        url: 'ruangan/' + id,
                        type: 'delete',
                        headers: {
                            'X-CSRF-TOKEN': $(
                                'meta[name="csrf-token"]').attr(
                                'content')
                        },
                        success: function (xhr) {
                            if (xhr.success) {
                                Swal.fire({
                                    title: "Berhasil",
                                    text: xhr.message,
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok",
                                    customClass: {
                                        confirmButton: "btn fw-bold btn-primary",
                                    }
                                }).then(function () {
                                    // delete row data from server and re-draw datatable
                                    dt.draw();
                                });
                            }
                        }
                    });
                });
            }
        });
    }
}

// Class definition
var KTDatatablesServerSide = function () {
    // Shared variables
    var table;
    var filterPayment;

    // Private functions
    var initDatatable = function () {
        dt = $("#table_room").DataTable({
            processing: true,
            serverSide: true,
            select: {
                style: 'os',
                selector: 'td:first-child',
                className: 'row-selected'
            },
            ajax: 'ruangan/data',
            columns: [{
                    data: 'id',
                    width: '2%',
                    orderable: false
                },
                {
                    data: 'DT_RowIndex',
                    width: '2%',
                    sClass: 'text-center'
                },
                {
                    data: 'code',
                    width: '5%',
                    sClass: 'text-center'
                },
                {
                    data: 'name',
                    width: '5%'
                },
                {
                    data: 'active',
                    width: '5%',
                    sClass: 'text-center',
                    render: function (data, type, row) {
                        if (data == 1) {
                            return 'Aktif';
                        } else {
                            return 'Tidak Aktif';
                        }
                    }
                },
                {
                    data: 'action',
                    width: '5%',
                    sClass: 'text-center'
                }
            ],
            columnDefs: [{
                targets: 0,
                orderable: false,
                render: function (data) {
                    return `
                        <div class="form-check form-check-sm form-check-custom form-check-solid" style="display:block;text-align:center">
                            <input class="form-check-input room_checkbox" name="room_checkbox[]" type="checkbox" value="${data}" />
                        </div>`;
                }
            }, ],
        });

        table = dt.$;

        // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
        dt.on('draw', function () {
            initToggleToolbar();
            toggleToolbars();
            KTMenu.createInstances();
        });
    }

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = function () {
        const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
        if (filterSearch != null) {
            filterSearch.addEventListener('keyup', function (e) {
                dt.search(e.target.value).draw();
            });
        }
    }

    // Filter Datatable
    var handleFilterDatatable = () => {
        // Select filter options
        filterPayment = document.querySelectorAll(
            '[data-kt-docs-table-filter="payment_type"] [name="payment_type"]');
        const filterButton = document.querySelector('[data-kt-docs-table-filter="filter"]');

        if (filterButton != null) {
            // Filter datatable on submit
            filterButton.addEventListener('click', function () {
                // Get filter values
                let paymentValue = '';

                // Get payment value
                filterPayment.forEach(r => {
                    if (r.checked) {
                        paymentValue = r.value;
                    }

                    // Reset payment value if "All" is selected
                    if (paymentValue === 'all') {
                        paymentValue = '';
                    }
                });

                // Filter datatable --- official docs reference: https://datatables.net/reference/api/search()
                dt.search(paymentValue).draw();
            });
        }
    }

    // Reset Filter
    var handleResetForm = () => {
        // Select reset button
        const resetButton = document.querySelector('[data-kt-docs-table-filter="reset"]');

        if (resetButton != null) {
            // Reset datatable
            resetButton.addEventListener('click', function () {
                // Reset payment type
                filterPayment[0].checked = true;

                // Reset datatable --- official docs reference: https://datatables.net/reference/api/search()
                dt.search('').draw();
            });
        }
    }

    // Init toggle toolbar
    var initToggleToolbar = function () {
        // Toggle selected action toolbar
        // Select all checkboxes

        if (document.querySelector('#table_room') != null) {
            const container = document.querySelector('#table_room');

            const checkboxes = container.querySelectorAll('[type="checkbox"]');
            // Toggle delete selected toolbar
            checkboxes.forEach(c => {
                // Checkbox on click event
                c.addEventListener('click', function () {
                    setTimeout(function () {
                        toggleToolbars();
                    }, 50);
                });
            });
        }
    }

    // Toggle toolbars
    var toggleToolbars = function () {

        // Define variables
        const container = document.querySelector('#table_room');
        const toolbarBase = document.querySelector('[data-kt-docs-table-toolbar="base"]');
        const toolbarSelected = document.querySelector('[data-kt-docs-table-toolbar="selected"]');
        const selectedCount = document.querySelector('[data-kt-docs-table-select="selected_count"]');

        // Select refreshed checkbox DOM elements
        const allCheckboxes = container.querySelectorAll('tbody [type="checkbox"]');

        // Detect checkboxes state & count
        let checkedState = false;
        let count = 0;

        // Count checked boxes
        allCheckboxes.forEach(c => {
            if (c.checked) {
                checkedState = true;
                count++;
            }
        });

        // Toggle toolbars
        if (checkedState) {
            selectedCount.innerHTML = count;
            toolbarBase.classList.add('d-none');
            toolbarSelected.classList.remove('d-none');
        } else {
            toolbarBase.classList.remove('d-none');
            toolbarSelected.classList.add('d-none');
        }
    }

    // Public methods
    return {
        init: function () {
            initDatatable();
            handleSearchDatatable();
            initToggleToolbar();
            handleFilterDatatable();
            handleResetForm();
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTDatatablesServerSide.init();
});
