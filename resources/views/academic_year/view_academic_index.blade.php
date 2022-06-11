@extends('layouts.app',$data)
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

                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
                            <button type="button" class="btn btn-primary" onclick="addButtonModal()" title="Tambah Ruangan"
                                data-bs-toggle="modal" data-bs-target="#kt_modal_academic">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                                            transform="rotate(-90 11.364 20.364)" fill="black"></rect>
                                        <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"></rect>
                                    </svg>
                                </span>
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
                                title="Hapus Ruangan">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>
                        <!--end::Group actions-->
                    </div>
                    <!--end::Wrapper-->

                    <!--begin::Datatable-->
                    <table id="table_academic"
                        class="table table-striped table-row-bordered align-middle table-hover border  fs-6 gy-5">
                        <thead>
                            <tr class="text-center text-dark-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th class="text-center">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid"
                                        style="display: block">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true"
                                            data-kt-check-target="#table_academic .form-check-input" value="0" />
                                    </div>
                                </th>
                                <th class="text-center">No</th>
                                <th class="text-center">Kode</th>
                                <th class="text-center">Akademik</th>
                                <th class="text-center">Perkuliahan</th>
                                <th class="text-center">UTS</th>
                                <th class="text-center">UAS</th>
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
                                        </svg>
                                    </span>
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

@include('academic_year.form_academic')

@section('script')
    <script>
        var duplicate = 0;
        var dt;

        const icons = `<span class="svg-icon svg-icon-1 svg-icon-light"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"/>
            <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black"/>
            <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black"/>
            </svg></span>`;
        
        const icons2 = `
        <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen004.svg-->
        <span class="svg-icon svg-icon-1 svg-icon-light"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
        <path d="M21.7 18.9L18.6 15.8C17.9 16.9 16.9 17.9 15.8 18.6L18.9 21.7C19.3 22.1 19.9 22.1 20.3 21.7L21.7 20.3C22.1 19.9 22.1 19.3 21.7 18.9Z" fill="black"/>
        <path opacity="0.3" d="M11 20C6 20 2 16 2 11C2 6 6 2 11 2C16 2 20 6 20 11C20 16 16 20 11 20ZM11 4C7.1 4 4 7.1 4 11C4 14.9 7.1 18 11 18C14.9 18 18 14.9 18 11C18 7.1 14.9 4 11 4ZM8 11C8 9.3 9.3 8 11 8C11.6 8 12 7.6 12 7C12 6.4 11.6 6 11 6C8.2 6 6 8.2 6 11C6 11.6 6.4 12 7 12C7.6 12 8 11.6 8 11Z" fill="black"/>
        </svg></span>
        <!--end::Svg Icon-->
        `;

        /* When the plus button outside the modal is clicked */
        var addButtonModal = function() {
            $("#id_academic").val('');

            $('.code').attr('class','required code');
            $('.code_i').attr('class','fas fa-exclamation-circle ms-2 fs-7 code_i');

            $("#div_status_academic").hide();

            $("#code_academic").removeAttr('disabled');

            $("#modal_academic_title").html(
                '<i class="fa-solid fa-plus" style="font-size:100%;color:black;"></i> Tambah Tahun Akademik');

            $("#kt_modal_academic_form").attr('onsubmit', 'eventSave(event)');

            $("#button_submit").text('Tambah');

            $("#code_academic").removeAttr('style');
            $("#code_academic_error").hide();
            $("#code_academic").val('');
     
            $("#academic_year").removeAttr('style');
            $("#academic_year_error").hide();
            $("#academic_year").val('');

            $("#start_date_study").removeAttr('style');
            $("#end_date_study").removeAttr('style');
            $("#date_study_error").hide();

            $("#start_date_study").val('');
            $("#end_date_study").val('');

            $("#start_date_uts").val('');
            $("#end_date_uts").val('');

            $("#start_date_uas").val('');
            $("#end_date_uas").val('');
        }

        var showError = function(message, selector_error, selector) {
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

        var removeError = function(selector_error, selector) {
            $(selector).css({
                'border': '2px solid #50cd89'
            });

            $(selector_error).hide();
        }

        /** 
         * This function is for when the add button in the modal is submitted
         */
        var eventSave = function(e) {
            e.preventDefault();

            var code_academic   = $("#code_academic").val();
            var academic_year   = $("#academic_year").val();
            var start_date_study= $("#start_date_study").val();
            var end_date_study  = $("#end_date_study").val();
            var start_date_uts  = $("#start_date_uts").val();
            var end_date_uts    = $("#end_date_uts").val();
            var start_date_uas  = $("#start_date_uas").val();
            var end_date_uas    = $("#end_date_uas").val();
            var error           = 0;

            if (code_academic == "") {
                showError('Kode tahun akademik wajib di isi', '#code_academic_error', '#code_academic');
                error++;
            } else if (code_academic.length > 6) {
                showError('Kode tahun akademik maksimal 6 karakter', '#code_academic_error', '#code_academic');
                error++;
            } else {
                removeError('#code_academic_error', '#code_academic');
            }

            if (academic_year == "") {
                showError('Tahun akademik wajib di isi', '#academic_year_error', '#academic_year');
                error++;
            } else if (academic_year.length > 50) {
                showError('Tahun akademik maksimal 50 karakter', '#academic_year_error', '#academic_year');
                error++;
            } else {
                removeError('#academic_year_error', '#academic_year');
            }

            if (start_date_study == "" || end_date_study == "") {
                showError('Tanggal perkuliahan wajib di isi', '#date_study_error', '#start_date_study');
                showError('Tanggal perkuliahan wajib di isi', '#date_study_error', '#end_date_study');
                error++;
            }
            else if(start_date_study > end_date_study)
            {
                showError('Tanggal awal lebih besar dari tanggal akhir', '#date_study_error', '#start_date_study');
                showError('Tanggal awal lebih besar dari tanggal akhir', '#date_study_error', '#end_date_study');
                error++;
            }
            else {
                removeError('#date_study_error', '#start_date_study');
                removeError('#date_study_error', '#end_date_study');
            }

            if(start_date_uts > end_date_uts)
            {
                showError('Tanggal awal lebih besar dari tanggal akhir', '#date_uts_error', '#start_date_uts');
                showError('Tanggal awal lebih besar dari tanggal akhir', '#date_uts_error', '#end_date_uts');
                error++;
            }
            else
            {
                removeError('#date_uts_error', '#start_date_uts');
                removeError('#date_uts_error', '#end_date_uts');
            }

            if(start_date_uas > end_date_uas)
            {
                showError('Tanggal awal lebih besar dari tanggal akhir', '#date_uas_error', '#start_date_uas');
                showError('Tanggal awal lebih besar dari tanggal akhir', '#date_uas_error', '#end_date_uas');
                error++;
            }
            else
            {
                removeError('#date_uas_error', '#start_date_uas');
                removeError('#date_uas_error', '#end_date_uas');
            }

            if (duplicate > 0) {
                showError('Kode ruangan sudah digunakan', '#code_academic_error', '#code_academic');
                duplicate++;
            } else {
                duplicate = 0;
            }

            if (error == 0 && duplicate == 0) {
                $.ajax({
                    url: 'tahun-akademik',
                    method: 'post',
                    data: {
                        code_academic   : code_academic,
                        academic_year   : academic_year,
                        start_date_study: start_date_study,
                        end_date_study  : end_date_study,
                        start_date_uts  : start_date_uts,
                        end_date_uts    : end_date_uts,
                        start_date_uas  : start_date_uas,
                        end_date_uas    : end_date_uas
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

                            document.querySelector('[data-kt-docs-table-filter="search"]').value = '';
                            dt.search('').draw();

                            $("#kt_modal_academic").attr('aria-hidden', 'true');
                            $("#kt_modal_academic").modal('toggle');
                            $("#modal").hide();
                            $(".modal-backdrop").remove();
                            $(".modal").removeClass("show");
                            $(".modal").css("display", "none");
                            $("#kt_body").css('overflow', '');
                            $("#kt_body").css('padding-right', '');
                            $("#kt_body").removeClass('modal-open');
                            $("#kt_modal_academic").removeAttr('aria-modal');
                            $("#kt_modal_academic").removeAttr('role');

                            $("#code_academic").val('');
                            $("#name_academic").val('');
                            $("#code_academic").removeAttr('style');
                            $("#name_academic").removeAttr('style');

                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: xhr.message,
                            });

                            document.querySelector('[data-kt-docs-table-filter="search"]').value = '';
                            dt.search('').draw();

                            $("#kt_modal_academic").attr('aria-hidden', 'true');
                            $("#kt_modal_academic").modal('toggle');
                            $("#modal").hide();
                            $(".modal-backdrop").remove();
                            $(".modal").removeClass("show");
                            $(".modal").css("display", "none");
                            $("#kt_body").css('overflow', '');
                            $("#kt_body").css('padding-right', '');
                            $("#kt_body").removeClass('modal-open');
                            $("#kt_modal_academic").removeAttr('aria-modal');
                            $("#kt_modal_academic").removeAttr('role');

                            $("#code_academic").val('');
                            $("#name_academic").val('');
                            $("#code_academic").removeAttr('style');
                            $("#name_academic").removeAttr('style');
                        }
                    }
                })
            }
        }

        var showDate = function(start_date,end_date,title)
        {
            Swal.fire({
            title: title,
            html: '<input type="date" class="swal2-input text-muted" id="start_date" value="'+start_date+'" disabled><input type="date" class="swal2-input text-muted" id="end_date" value="'+end_date+'" disabled>',
            confirmButtonText: 'Tutup',
            focusConfirm: false,
            showCancelButton: false
            });
        }

        /* When the edit button is clicked and the modal form appears the first time */
        var eventEdit = function(e) {
            $("#code_academic").attr('disabled', 'disabled');
            $("#div_status_academic").show();
            $('#id_academic').val(e);
            $("#modal_academic_title").html(
                '<i class="fa-solid fa-pencil" style="font-size:100%;color:black;"></i> Ubah Tahun Akademik');
            $('.code').removeClass('required');
            $('.code_i').removeClass('fas fa-exclamation-circle ms-2 fs-7');
            $("#kt_modal_academic_form").attr('onsubmit', 'eventUpdate(event)');

            $("#button_submit").text('Ubah');

            $("#academic_year").removeAttr('style');
            $("#academic_year_error").hide();

            $("#start_date_study").removeAttr('style');
            $("#end_date_study").removeAttr('style');
            $("#date_study_error").hide();

            $("#start_date_uts").removeAttr('style');
            $("#end_date_uts").removeAttr('style');
            $("#date_uts_error").hide();

            $("#start_date_uas").removeAttr('style');
            $("#end_date_uas").removeAttr('style');
            $("#date_uas_error").hide();

            $.ajax({
                url: 'tahun-akademik/' + e + '/edit',
                type: 'get',
                dataType: 'json',
                data: {
                    id: e
                },
                success: function(xhr) {
                    $('#code_academic').val(xhr.code);
                    $('#academic_year').val(xhr.name);
                    $('#start_date_study').val(xhr.start_date_study);
                    $('#end_date_study').val(xhr.end_date_study);
                    $('#start_date_uts').val(xhr.start_date_uts);
                    $('#end_date_uts').val(xhr.end_date_uts);
                    $('#start_date_uas').val(xhr.start_date_uas);
                    $('#end_date_uas').val(xhr.end_date_uas);
                    $('#status_academic').val(xhr.active);
                }
            });
        }

        var eventUpdate = function(e) {
            e.preventDefault();

            var code            = $("#code_academic").val();
            var academic_year   = $("#academic_year").val();
            var start_date_study= $("#start_date_study").val();
            var end_date_study  = $("#end_date_study").val();
            var start_date_uts  = $("#start_date_uts").val();
            var end_date_uts    = $("#end_date_uts").val();
            var start_date_uas  = $("#start_date_uas").val();
            var end_date_uas    = $("#end_date_uas").val();
            var status          = $("#status_academic").val();
            var id              = $("#id_academic").val();
            var error           = 0;

            if (academic_year == "") {
                showError('Tahun akademik wajib di isi', '#academic_year_error', '#academic_year');
                error++;
            } else if (academic_year.length > 50) {
                showError('Tahun akademik maksimal 50 karakter', '#academic_year_error', '#academic_year');
                error++;
            } else {
                removeError('#academic_year_error', '#academic_year');
            }

            if (start_date_study == "" || end_date_study == "") {
                showError('Tanggal perkuliahan wajib di isi', '#date_study_error', '#start_date_study');
                showError('Tanggal perkuliahan wajib di isi', '#date_study_error', '#end_date_study');
                error++;
            }
            else if(start_date_study > end_date_study)
            {
                showError('Tanggal awal lebih besar dari tanggal akhir', '#date_study_error', '#start_date_study');
                showError('Tanggal awal lebih besar dari tanggal akhir', '#date_study_error', '#end_date_study');
                error++;
            }
            else {
                removeError('#date_study_error', '#start_date_study');
                removeError('#date_study_error', '#end_date_study');
            }

            if(start_date_uts > end_date_uts)
            {
                showError('Tanggal awal lebih besar dari tanggal akhir', '#date_uts_error', '#start_date_uts');
                showError('Tanggal awal lebih besar dari tanggal akhir', '#date_uts_error', '#end_date_uts');
                error++;
            }
            else
            {
                removeError('#date_uts_error', '#start_date_uts');
                removeError('#date_uts_error', '#end_date_uts');
            }

            if(start_date_uas > end_date_uas)
            {
                showError('Tanggal awal lebih besar dari tanggal akhir', '#date_uas_error', '#start_date_uas');
                showError('Tanggal awal lebih besar dari tanggal akhir', '#date_uas_error', '#end_date_uas');
                error++;
            }
            else
            {
                removeError('#date_uas_error', '#start_date_uas');
                removeError('#date_uas_error', '#end_date_uas');
            }

            if (error == 0) {
                $.ajax({
                    url: 'tahun-akademik/' + id,
                    method: 'PATCH',
                    data: {
                        academic_year   : academic_year,
                        start_date_study: start_date_study,
                        end_date_study  : end_date_study,
                        start_date_uts  : start_date_uts,
                        end_date_uts    : end_date_uts,
                        start_date_uas  : start_date_uas,
                        end_date_uas    : end_date_uas,
                        status          : status,
                        code            : code
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
                            
                            document.querySelector('[data-kt-docs-table-filter="search"]').value = '';
                            dt.search('').draw();

                            $("#kt_modal_academic").attr('aria-hidden', 'true');
                            $("#kt_modal_academic").modal('toggle');
                            $("#modal").hide();
                            $(".modal-backdrop").remove();
                            $(".modal").removeClass("show");
                            $(".modal").css("display", "none");
                            $("#kt_body").css('overflow', '');
                            $("#kt_body").css('padding-right', '');
                            $("#kt_body").removeClass('modal-open');
                            $("#kt_modal_academic").removeAttr('aria-modal');
                            $("#kt_modal_academic").removeAttr('role');

                            $("#name_academic").removeAttr('style');
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: xhr.message,
                            });

                            document.querySelector('[data-kt-docs-table-filter="search"]').value = '';
                            dt.search('').draw();

                            $("#kt_modal_academic").attr('aria-hidden', 'true');
                            $("#kt_modal_academic").modal('toggle');
                            $("#modal").hide();
                            $(".modal-backdrop").remove();
                            $(".modal").removeClass("show");
                            $(".modal").css("display", "none");
                            $("#kt_body").css('overflow', '');
                            $("#kt_body").css('padding-right', '');
                            $("#kt_body").removeClass('modal-open');
                            $("#kt_modal_academic").removeAttr('aria-modal');
                            $("#kt_modal_academic").removeAttr('role');
                        }
                    }
                });
            }
        }

        var eventClose = () => {
            $("#kt_modal_academic_form")[0].reset();
            $("#code_academic").removeAttr('style');
            $("#name_academic").removeAttr('style');
            $("#code_academic_error").hide();
            $("#name_academic_error").hide();
        }

        $("#code_academic").on('keyup', function(e) {
            if (e.code != 'Enter') {
                var code_academic = e.target.value.length;
                var value = e.target.value;

                if (code_academic > 6) {
                    showError('Kode tahun akademik maksimal 6 karakter', '#code_academic_error', '#code_academic');
                } else if (code_academic) {
                    removeError('#code_academic_error', '#code_academic');

                    /* Check if the academic code already exists, if it already exists then an error */
                    $.ajax({
                        url: 'tahun-akademik/check_code',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            code_academic: value
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(xhr) {
                            // console.log('keyup code academic >>> ', xhr);
                            if (xhr.count) {
                                showError('Kode tahun akademik sudah digunakan', '#code_academic_error',
                                    '#code_academic');
                                duplicate++;
                            } else {
                                duplicate = 0;
                            }
                        }
                    });
                } else {
                    showError('Kode tahun akademik wajib di isi', '#code_academic_error', '#code_academic');
                }
            }
        });

        $("#academic_year").on('keyup', function(e) {
            if (e.code != 'Enter') {
                var name_academic = e.target.value.length;

                if (name_academic > 50) {
                    showError('Tahun akademik maksimal 50 karakter', '#academic_year_error', '#academic_year');
                } else if (name_academic) {
                    removeError('#academic_year_error', '#academic_year');
                } else {
                    showError('Tahun akademik wajib di isi', '#academic_year_error', '#academic_year');
                }
            }
        });

        var eventDelete = function() {
            var id = [];

            $('.academic_checkbox:checked').each(function() {
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
                }).then(function(result) {
                    if (result.value) {
                        Swal.fire({
                            imageUrl: "delete.gif",
                            buttonsStyling: false,
                            showConfirmButton: false,
                            timer: 2000
                        }).then(function() {
                            $.ajax({
                                url: 'tahun-akademik/' + id,
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
                                            document.querySelector('[data-kt-docs-table-filter="search"]').value = '';
                                            dt.search('').draw();
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
        var KTDatatablesServerSide = function() {
            // Shared variables
            var table;
            var filterPayment;

            // Private functions
            var initDatatable = function() {
                dt = $("#table_academic").DataTable({
                    processing: true,
                    serverSide: true,
                    select: {
                        style: 'os',
                        selector: 'td:first-child',
                        className: 'row-selected'
                    },
                    ajax: 'tahun-akademik/data',
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
                            width: '6%',
                            sClass: 'text-center small',
                        },
                        {
                            data: 'name',
                            width: '10%',
                            sClass: 'small'
                        },
                        {
                            data: 'study_date',
                            width: '10%',
                            sClass: 'small text-center',
                            render: function(data, type, row) {
                                if ( data.start_date_study != null && data.end_date_study != null) {
                                    var startDate = data.start_date_study;
                                    var endDate   = data.end_date_study;
                                    var title     = 'Tanggal Perkuliahan';

                                    var a = '<button class="btn btn-info btn-sm" onclick="showDate(\''+startDate+'\',\''+endDate+'\',\''+title+'\')">';
                                        a += icons2;
                                        a += '</button>';
                                    return a;
                                } else {
                                    return `
                                    <!--begin::Svg Icon | path: assets/media/icons/duotune/arrows/arr014.svg-->
                                        <span class="svg-icon svg-icon svg-icon-danger svg-icon-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM18 12C18 11.4 17.6 11 17 11H7C6.4 11 6 11.4 6 12C6 12.6 6.4 13 7 13H17C17.6 13 18 12.6 18 12Z" fill="black"/>
                                        </svg></span>
                                    <!--end::Svg Icon-->
                                    `;                                
                                }
                            }
                        },
                        {
                            data: 'uts',
                            width: '10%',
                            sClass: 'small text-center',
                            render: function(data, type, row) {
                                if (data.start_date_uts != null && data.end_date_uts != null) {
                                    var startDate = data.start_date_uts;
                                    var endDate   = data.end_date_uts;
                                    var title     = 'Tanggal UTS';

                                    var a = '<button class="btn btn-info btn-sm" onclick="showDate(\''+startDate+'\',\''+endDate+'\',\''+title+'\')">';
                                        a += icons2;
                                        a += '</button>';
                                    return a;
                                } else {
                                    return `
                                    <!--begin::Svg Icon | path: assets/media/icons/duotune/arrows/arr014.svg-->
                                        <span class="svg-icon svg-icon svg-icon-danger svg-icon-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM18 12C18 11.4 17.6 11 17 11H7C6.4 11 6 11.4 6 12C6 12.6 6.4 13 7 13H17C17.6 13 18 12.6 18 12Z" fill="black"/>
                                        </svg></span>
                                    <!--end::Svg Icon-->
                                    `;
                                }
                            }
                        },
                        {
                            data: 'uas',
                            width: '10%',
                            sClass: 'small text-center',
                            render: function(data, type, row) {
                                if (data.start_date_uas != null && data.end_date_uas != null) {
                                    var startDate = data.start_date_uas;
                                    var endDate   = data.end_date_uas;
                                    var title     = 'Tanggal UTS';

                                    var a = '<button class="btn btn-info btn-sm" onclick="showDate(\''+startDate+'\',\''+endDate+'\',\''+title+'\')">';
                                        a += icons2;
                                        a += '</button>';
                                    return a;
                                } else {
                                    return `
                                    <!--begin::Svg Icon | path: assets/media/icons/duotune/arrows/arr014.svg-->
                                        <span class="svg-icon svg-icon svg-icon-danger svg-icon-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM18 12C18 11.4 17.6 11 17 11H7C6.4 11 6 11.4 6 12C6 12.6 6.4 13 7 13H17C17.6 13 18 12.6 18 12Z" fill="black"/>
                                        </svg></span>
                                    <!--end::Svg Icon-->
                                    `;
                                }
                            }
                        },
                        {
                            data: 'active',
                            width: '3%',
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
                            width: '3%',
                            sClass: 'text-center'
                        }
                    ],
                    columnDefs: [{
                        targets: 0,
                        orderable: false,
                        render: function(data) {
                            return `
                        <div class="form-check form-check-sm form-check-custom form-check-solid" style="display:block;text-align:center">
                            <input class="form-check-input academic_checkbox" name="academic_checkbox[]" type="checkbox" value="${data}" />
                        </div>`;
                        }
                    }, ],
                });

                table = dt.$;

                $('a[data-toggle="tooltip"]').tooltip({
                    animated: 'fade',
                    placement: 'bottom',
                    trigger: 'hover'
                });

                // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
                dt.on('draw', function() {
                    initToggleToolbar();
                    toggleToolbars();
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

            // Init toggle toolbar
            var initToggleToolbar = function() {
                // Toggle selected action toolbar
                // Select all checkboxes

                if (document.querySelector('#table_academic') != null) {
                    const container = document.querySelector('#table_academic');

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

            // Toggle toolbars
            var toggleToolbars = function() {

                // Define variables
                const container = document.querySelector('#table_academic');
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
                init: function() {
                    initDatatable();
                    handleSearchDatatable();
                    initToggleToolbar();
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
