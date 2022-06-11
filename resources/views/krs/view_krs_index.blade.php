@extends('layouts.app', $data)
@section('content')
    <div class="post d-flex flex-column-fluid">
        <div class="container-xxl">
            <div class="card">
                <div class="card-body p-lg-17">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack mb-5">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <span
                                class="svg-icon svg-icon-2 svg-icon-gray-700 position-absolute top-50 translate-middle-y ms-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                        transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
                                    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="black"></path>
                                </svg>
                            </span>
                            <input type="text" data-kt-docs-table-filter="search"
                                class="form-control form-control-solid w-250px ps-15" placeholder="Search" />
                        </div>
                        <!--end::Search-->

                        <!--begin::Group actions-->
                        <div class="d-flex justify-content-end align-items-center d-none"
                            data-kt-docs-table-toolbar="selected">
                            <div class="fw-bolder me-5">
                                <span class="me-2" data-kt-docs-table-select="selected_count"></span> Selected
                            </div>

                            <button type="button" class="btn btn-icon btn-danger me-2 mb-2 btn-hover-scale"
                                data-bs-toggle="tooltip" data-kt-docs-table-select="delete_selected" onclick="eventDelete()"
                                title="Hapus Ruangan">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>
                        <!--end::Group actions-->
                    </div>
                    <!--end::Wrapper-->

                    <div class="row">
                        <div class="col-lg-6">
                            <!--begin::Datatable-->
                            <p class="text-center" style="font-weight: bold">
                                Daftar matakuliah yang aktif
                                <hr>
                            </p>
                            <table id="table_krs"
                                class="table table-striped table-row-bordered align-middle table-hover border  fs-6 gy-5">
                                <thead>
                                    <tr class="text-center text-dark-400 fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="text-center">No</th>
                                        <th class="text-center">Kode MK</th>
                                        <th class="text-center">Nama MK</th>
                                        <th class="text-center min-w-100px">
                                            <!--begin::Svg Icon | path: assets/media/icons/duotune/coding/cod001.svg-->
                                            <span class="svg-icon svg-icon-dark svg-icon-2hx"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3"
                                                        d="M22.1 11.5V12.6C22.1 13.2 21.7 13.6 21.2 13.7L19.9 13.9C19.7 14.7 19.4 15.5 18.9 16.2L19.7 17.2999C20 17.6999 20 18.3999 19.6 18.7999L18.8 19.6C18.4 20 17.8 20 17.3 19.7L16.2 18.9C15.5 19.3 14.7 19.7 13.9 19.9L13.7 21.2C13.6 21.7 13.1 22.1 12.6 22.1H11.5C10.9 22.1 10.5 21.7 10.4 21.2L10.2 19.9C9.4 19.7 8.6 19.4 7.9 18.9L6.8 19.7C6.4 20 5.7 20 5.3 19.6L4.5 18.7999C4.1 18.3999 4.1 17.7999 4.4 17.2999L5.2 16.2C4.8 15.5 4.4 14.7 4.2 13.9L2.9 13.7C2.4 13.6 2 13.1 2 12.6V11.5C2 10.9 2.4 10.5 2.9 10.4L4.2 10.2C4.4 9.39995 4.7 8.60002 5.2 7.90002L4.4 6.79993C4.1 6.39993 4.1 5.69993 4.5 5.29993L5.3 4.5C5.7 4.1 6.3 4.10002 6.8 4.40002L7.9 5.19995C8.6 4.79995 9.4 4.39995 10.2 4.19995L10.4 2.90002C10.5 2.40002 11 2 11.5 2H12.6C13.2 2 13.6 2.40002 13.7 2.90002L13.9 4.19995C14.7 4.39995 15.5 4.69995 16.2 5.19995L17.3 4.40002C17.7 4.10002 18.4 4.1 18.8 4.5L19.6 5.29993C20 5.69993 20 6.29993 19.7 6.79993L18.9 7.90002C19.3 8.60002 19.7 9.39995 19.9 10.2L21.2 10.4C21.7 10.5 22.1 11 22.1 11.5ZM12.1 8.59998C10.2 8.59998 8.6 10.2 8.6 12.1C8.6 14 10.2 15.6 12.1 15.6C14 15.6 15.6 14 15.6 12.1C15.6 10.2 14 8.59998 12.1 8.59998Z"
                                                        fill="black" />
                                                    <path
                                                        d="M17.1 12.1C17.1 14.9 14.9 17.1 12.1 17.1C9.30001 17.1 7.10001 14.9 7.10001 12.1C7.10001 9.29998 9.30001 7.09998 12.1 7.09998C14.9 7.09998 17.1 9.29998 17.1 12.1ZM12.1 10.1C11 10.1 10.1 11 10.1 12.1C10.1 13.2 11 14.1 12.1 14.1C13.2 14.1 14.1 13.2 14.1 12.1C14.1 11 13.2 10.1 12.1 10.1Z"
                                                        fill="black" />
                                                </svg></span>
                                            <!--end::Svg Icon-->
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 fw-bold">
                                </tbody>
                            </table>
                            <!--end::Datatable-->
                        </div>

                        <div class="col-lg-6">
                            <p class="text-center" style="font-weight: bold">
                                Daftar matakuliah yang sudah dipilih
                                <hr>
                            </p>
                            <div id="listkrs" style="margin-top: 1.4rem"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function()
        {
            showKRS();
        });

        var dt;

        /** 
         * This function is for when the add button in the modal is submitted
         */
        var eventSave = function(e) {
            e.preventDefault();

            var code_room = $("#code_room").val();
            var name_room = $("#name_room").val();
            var error = 0;

            if (code_room == "") {
                showError('Kode ruangan wajib di isi', '#code_room_error', '#code_room');
                error++;
            } else if (code_room.length > 6) {
                showError('Kode ruangan maksimal 6 karakter', '#code_room_error', '#code_room');
                error++;
            } else {
                removeError('#code_room_error', '#code_room');
            }

            if (name_room == "") {
                showError('Nama ruangan wajib di isi', '#name_room_error', '#name_room');
                error++;
            } else if (name_room.length > 50) {
                showError('Nama ruangan maksimal 50 karakter', '#name_room_error', '#name_room');
                error++;
            } else {
                removeError('#name_room_error', '#name_room');
            }

            if (duplicate > 0) {
                showError('Kode ruangan sudah digunakan', '#code_room_error', '#code_room');
                duplicate++;
            } else {
                duplicate = 0;
            }

            if (error == 0 && duplicate == 0) {
               
            }
        }

        var showKRS = () =>
        {
            $.ajax({
                url : 'krs/show',
                type : 'get',
                success : function(xhr)
                {
                    $("#listkrs").html(xhr);
                }
            })
        }

        var eventDelete = function(id) {

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
            }).then(function(result) {
                if (result.value) {
                    Swal.fire({
                        imageUrl: "delete.gif",
                        buttonsStyling: false,
                        showConfirmButton: false,
                        timer: 2000
                    }).then(function() {
                        $.ajax({
                            url: 'krs/' + id,
                            type: 'delete',
                            headers: {
                                'X-CSRF-TOKEN': $(
                                    'meta[name="csrf-token"]').attr(
                                    'content')
                            },
                            success: function(xhr) {
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
                                    }).then(function() {
                                        // delete row data from server and re-draw datatable
                                        showKRS();
                                    });
                                }
                            }
                        });
                    });
                    }
                });
        }

        // Class definition
        var KTDatatablesServerSide = function() {
            // Shared variables
            var table;
            var filterPayment;

            // Private functions
            var initDatatable = function() {
                dt = $("#table_krs").DataTable({
                    processing: true,
                    serverSide: true,
                    select: {
                        style: 'os',
                        selector: 'td:first-child',
                        className: 'row-selected'
                    },
                    ajax: 'krs/data',
                    columns: [{
                            data: 'DT_RowIndex',
                            width: '5%',
                            sClass: 'text-center'
                        },
                        {
                            data: 'code',
                            width: '20%',
                            sClass: 'text-center'
                        },
                        {
                            data: 'name',
                            width: '20%'
                        },
                        {
                            data: 'action',
                            width: '5%',
                            sClass: 'text-center'
                        }
                    ],
                });

                table = dt.$;

                // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
                dt.on('draw', function() {
                    initToggleToolbar();
                    KTMenu.createInstances();
                });
            }

            // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
            var handleSearchDatatable = function() {
                const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
                if (filterSearch != null) {
                    filterSearch.addEventListener('keyup', function(e) {
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
                    filterButton.addEventListener('click', function() {
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
                    resetButton.addEventListener('click', function() {
                        // Reset payment type
                        filterPayment[0].checked = true;

                        // Reset datatable --- official docs reference: https://datatables.net/reference/api/search()
                        dt.search('').draw();
                    });
                }
            }

            // Add krs 
            window.eventAdd = (subject_code) => {
                $.ajax({
                    url: 'krs',
                    method: 'post',
                    data: {
                        subject_code: subject_code,
                    },
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(xhr) {
                        if (xhr.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: xhr.message,
                            });

                            showKRS();
                        } else {


                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: xhr.message,
                            });

                            showKRS();
                        }
                    }
                })
            }

            // Init toggle toolbar
            var initToggleToolbar = function() {
                // Toggle selected action toolbar
                // Select all checkboxes

                if (document.querySelector('#table_krs') != null) {
                    const container = document.querySelector('#table_krs');

                    const checkboxes = container.querySelectorAll('[type="checkbox"]');
                    // Toggle delete selected toolbar
                    checkboxes.forEach(c => {
                        // Checkbox on click event
                        c.addEventListener('click', function() {
                            setTimeout(function() {
                                toggleToolbars();
                            }, 50);
                        });
                    });
                }
            }



            // Public methods
            return {
                init: function() {
                    initDatatable();
                    handleSearchDatatable();
                    handleFilterDatatable();
                    handleResetForm();
                }
            }
        }();

        // On document ready
        KTUtil.onDOMContentLoaded(function() {
            KTDatatablesServerSide.init();
        });
    </script>
@endsection
