@extends('layouts.app', $data)
@section('content')
    <div class="post d-flex flex-column-fluid">
        <div class="container-xxl">
            <div class="card">
                <div class="card-body p-lg-17">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack mb-5">
                        <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::College Student Filter -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="name_user_filter">Nama Pengguna</label>
                                    @php echo select('name_user_filter','form-control',list_user()) @endphp
                                </div>
                            </div>
                            <!--end::College Student Filter -->

                            <!--begin::Email Filter -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="email_user_filter">Email Pengguna</label>
                                    @php echo select('email_user_filter','form-control',email()) @endphp
                                </div>
                            </div>
                            <!--end::Email Filter -->

                            <!--begin::Role Filter -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="status_user_filter">Status Pengguna</label>
                                    @php echo select('status_user_filter','form-control',array(1 => 'Aktif',0 => 'Tidak Aktif')) @endphp
                                </div>
                            </div>
                            <!--end::Role Filter -->
                        </div>
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
                            <button type="button" class="btn btn-info" onclick="eventClear()" style="margin-right: 5px"
                                title="Bersihkan filter">
                                <!--begin::Svg Icon | path: assets/media/icons/duotune/art/art004.svg-->
                                <span class="svg-icon svg-icon-2"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3"
                                            d="M8.38 22H21C21.2652 22 21.5196 21.8947 21.7071 21.7072C21.8946 21.5196 22 21.2652 22 21C22 20.7348 21.8946 20.4804 21.7071 20.2928C21.5196 20.1053 21.2652 20 21 20H10L8.38 22Z"
                                            fill="black" />
                                        <path
                                            d="M15.622 15.6219L9.855 21.3879C9.66117 21.582 9.43101 21.7359 9.17766 21.8409C8.92431 21.946 8.65275 22 8.37849 22C8.10424 22 7.83268 21.946 7.57933 21.8409C7.32598 21.7359 7.09582 21.582 6.90199 21.3879L2.612 17.098C2.41797 16.9042 2.26404 16.674 2.15903 16.4207C2.05401 16.1673 1.99997 15.8957 1.99997 15.6215C1.99997 15.3472 2.05401 15.0757 2.15903 14.8224C2.26404 14.569 2.41797 14.3388 2.612 14.145L8.37801 8.37805L15.622 15.6219Z"
                                            fill="black" />
                                        <path opacity="0.3"
                                            d="M8.37801 8.37805L14.145 2.61206C14.3388 2.41803 14.569 2.26408 14.8223 2.15906C15.0757 2.05404 15.3473 2 15.6215 2C15.8958 2 16.1673 2.05404 16.4207 2.15906C16.674 2.26408 16.9042 2.41803 17.098 2.61206L21.388 6.90198C21.582 7.0958 21.736 7.326 21.841 7.57935C21.946 7.83269 22 8.10429 22 8.37854C22 8.65279 21.946 8.92426 21.841 9.17761C21.736 9.43096 21.582 9.66116 21.388 9.85498L15.622 15.6219L8.37801 8.37805Z"
                                            fill="black" />
                                    </svg></span>
                                <!--end::Svg Icon-->
                            </button>
                        </div>
                        <!--end::Toolbar-->

                        <!--begin::Group actions-->
                        <div class="d-flex justify-content-end align-items-center d-none"
                            data-kt-docs-table-toolbar="selected">
                            <div class="fw-bolder me-5">
                                <span class="me-2" data-kt-docs-table-select="selected_count"></span> Selected
                            </div>

                            <button type="button" class="btn btn-icon btn-danger me-2 mb-2 btn-hover-scale"
                                data-bs-toggle="tooltip" data-kt-docs-table-select="delete_selected" onclick="eventDelete()"
                                title="Hapus Pengguna">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>
                        <!--end::Group actions-->
                    </div>
                    <!--end::Wrapper-->

                    <!--begin::Datatable-->
                    <table id="table_user"
                        class="table table-striped table-row-bordered align-middle table-hover border  fs-6 gy-5">
                        <thead>
                            <tr class="text-center text-dark-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th class="text-center">No</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Login</th>
                                <th class="text-center">Status</th>
                                <th class="text-center min-w-100px">
                                    <!--begin::Svg Icon | path: assets/media/icons/duotune/coding/cod001.svg-->
                                    <span class="svg-icon svg-icon-dark svg-icon-2hx"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none">
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
            </div>
        </div>
    </div>
@endsection

@include('user.form_user')

@section('script')
    <script>
        var duplicate = 0;
        var dt;

        $(document).ready(function() {
            $('.select2').css({
                width: '80%',
                margin: 0
            });


            $("#name_user_filter,#email_user_filter,#status_user_filter").change(function() {
                dt.draw();
            });
        });

        $("#name_user_filter").select2({
            placeholder: "-- Silahkan Pilih --",
            allowClear: true
        }).val('').trigger('change');

        $("#email_user_filter").select2({
            placeholder: "-- Silahkan Pilih --",
            allowClear: true
        }).val('').trigger('change');

        $("#status_user_filter").select2({
            placeholder: "-- Silahkan Pilih --",
            allowClear: true
        }).val('').trigger('change');

        /* When the edit button is clicked and the modal form appears the first time */
        var eventEdit = function(e) {
            $('#id_user').val(e);
            $("#modal_user_title").html(
                '<i class="fa-solid fa-pencil" style="font-size:100%;color:black;"></i> Ubah Data Pengguna');

            $("#kt_modal_user_form").attr('onsubmit', 'eventUpdate(event)');

            $("#button_submit").text('Ubah');

            $.ajax({
                url: 'pengguna/' + e + '/edit',
                type: 'get',
                dataType: 'json',
                data: {
                    id: e
                },
                success: function(xhr) {
                    $("#name_user").val(xhr.user.name);
                    $("#email_user").val(xhr.user.email);
                    $("#role_user").val(xhr.role.role_id);
                    $("#status_user").val(xhr.user.user_active);
                }
            });
        }

        var eventUpdate = function(e) {
            e.preventDefault();

            var id_user = $("#id_user").val();
            var status = $("#status_user").val();
            var role = $("#role_user").val();

            $.ajax({
                url: 'pengguna/' + id_user,
                method: 'PATCH',
                data: {
                    id: id_user,
                    status: status,
                    role: role
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

                        $("#name_user_filter").select2({
                            placeholder: "-- Silahkan Pilih --",
                            allowClear: true
                        }).val('').trigger('change');

                        $("#email_user_filter").select2({
                            placeholder: "-- Silahkan Pilih --",
                            allowClear: true
                        }).val('').trigger('change');
                        
                        $("#status_user_filter").select2({
                            placeholder: "-- Silahkan Pilih --",
                            allowClear: true
                        }).val('').trigger('change');

                        $('.select2').css({
                            width: '80%',
                            margin: 0
                        });

                        dt.search('').draw();

                        $("#kt_modal_user").attr('aria-hidden', 'true');
                        $("#kt_modal_user").modal('toggle');
                        $("#modal").hide();
                        $(".modal-backdrop").remove();
                        $(".modal").removeClass("show");
                        $(".modal").css("display", "none");
                        $("#kt_body").css('overflow', '');
                        $("#kt_body").css('padding-right', '');
                        $("#kt_body").removeClass('modal-open');
                        $("#kt_modal_user").removeAttr('aria-modal');
                        $("#kt_modal_user").removeAttr('role');

                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: xhr.message,
                        });

                        dt.search('').draw();

                        $("#kt_modal_user").attr('aria-hidden', 'true');
                        $("#kt_modal_user").modal('toggle');
                        $("#modal").hide();
                        $(".modal-backdrop").remove();
                        $(".modal").removeClass("show");
                        $(".modal").css("display", "none");
                        $("#kt_body").css('overflow', '');
                        $("#kt_body").css('padding-right', '');
                        $("#kt_body").removeClass('modal-open');
                        $("#kt_modal_user").removeAttr('aria-modal');
                        $("#kt_modal_user").removeAttr('role');
                    }
                }
            });
        }

        /**
         * Clear filter 
         * 
         * */
        var eventClear = () => {
            $("#name_user_filter").select2('val', 'All');
            $("#email_user_filter").select2('val', 'All');
            $("#status_user_filter").select2('val', 'All');
        }

        // Class definition
        var KTDatatablesServerSide = function() {
            // Shared variables
            var table;
            var filterPayment;

            // Private functions
            var initDatatable = function() {
                dt = $("#table_user").DataTable({
                    processing: true,
                    serverSide: true,
                    select: {
                        style: 'os',
                        selector: 'td:first-child',
                        className: 'row-selected'
                    },
                    ajax: {
                        url: 'pengguna/data',
                        type: 'get',
                        data: function(data) {
                            data.name_user_filter = $("#name_user_filter").val();
                            data.email_user_filter = $("#email_user_filter").val();
                            data.status_user_filter = $("#status_user_filter").val();
                        }
                    },
                    columns: [{
                            data: 'DT_RowIndex',
                            width: '5%',
                            sClass: 'text-center'
                        },
                        {
                            data: 'name',
                            width: '20%',
                        },
                        {
                            data: 'email',
                            width: '15%'
                        },
                        {
                            data: 'roles',
                            width: '5%'
                        },
                        {
                            data: 'user_login',
                            width: '13%',
                            render: function(data, type, row) {
                                if (data == 1) {
                                    return 'Login';
                                } else {
                                    return 'Tidak Login';
                                }
                            }
                        },
                        {
                            data: 'user_active',
                            width: '10%',
                            sClass: 'text-center',
                            render: function(data, type, row) {
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
                        render: function(data) {
                            return data;
                        }
                    }, ],
                });

                table = dt.$;

                // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
                dt.on('draw', function() {
                    KTMenu.createInstances();
                });
            }

            // Public methods
            return {
                init: function() {
                    initDatatable();
                }
            }
        }();

        // On document ready
        KTUtil.onDOMContentLoaded(function() {
            KTDatatablesServerSide.init();
        });
    </script>
@endsection
