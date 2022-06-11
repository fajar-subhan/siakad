@extends('layouts.app',$data)
@section('content')
    <div class="post d-flex flex-column-fluid">
        <div class="container-xxl">
            <div class="card">
                <div class="card-body p-lg-17">
                    <!--begin::Form-->
                    <form onsubmit="eventSubmit(event)" class="form fv-plugins-bootstrap5 fv-plugins-framework">
                        @php echo hidden('id_campus_info') @endphp
                        <!--Start::Input Nama Ruangan-->
                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span class="required">Nama Universitas</span>
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title=""
                                            data-bs-original-title="Maksimal 50 karakter"
                                            aria-label="Maksimal 50 karakter"></i>
                                    </label>
                                    <!--end::Label-->
                                    @php echo input_text('name_campus','form-control',null,null,['placeholder' => 'masukan nama universitas']); @endphp
                                    <div class="fv-plugins-message-container invalid-feedback" id="name_campus_error"></div>
                                </div>
                            </div>
                        </div>
                        <!--End::Input Nama Ruangan-->

                        <!--Start::Input Email -->
                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span class="required">Email</span>
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title=""
                                            data-bs-original-title="Masukan email dengan format yang benar"
                                            aria-label=""></i>
                                    </label>
                                    <!--end::Label-->
                                    @php echo input_email('email','form-control',null,null,['placeholder' => 'masukan email']); @endphp
                                    <div class="fv-plugins-message-container invalid-feedback" id="email_error"></div>
                                </div>
                            </div>
                        </div>
                        <!--End::Input Email-->

                        <!--Start::Input Alamat Situs Web -->
                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span>Alamat Situs Web</span>
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title=""
                                            data-bs-original-title="Masukan situs web universitas" aria-label=""></i>
                                    </label>
                                    <!--end::Label-->
                                    @php echo input_text('web','form-control',null,null,['placeholder' => 'https://universitas.com']); @endphp
                                    <div class="fv-plugins-message-container invalid-feedback" id="web_error"></div>
                                </div>
                            </div>
                        </div>
                        <!--End::Input Situs Web -->


                        <!--Start::Input No Phone -->
                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span>No Phone</span>
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title=""
                                            data-bs-original-title="Masukan nomor phone" aria-label=""></i>
                                    </label>
                                    <!--end::Label-->
                                    @php echo input_number('phone_number','form-control',null,null,['placeholder' => '021xxx']); @endphp
                                    <div class="fv-plugins-message-container invalid-feedback" id="web_error"></div>
                                </div>
                            </div>
                        </div>
                        <!--End::Input Situs Web -->

                        <!--Start::Input No Fax -->
                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span>Fax</span>
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title=""
                                            data-bs-original-title="Masukan nomor fax" aria-label=""></i>
                                    </label>
                                    <!--end::Label-->
                                    @php echo input_number('fax_number','form-control',null,null,['placeholder' => '021xxx']); @endphp
                                    <div class="fv-plugins-message-container invalid-feedback" id="web_error"></div>
                                </div>
                            </div>
                        </div>
                        <!--End::Input Situs Web -->


                        <!-- begin::status  -->
                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            Alamat
                                        </label>
                                        <!--end::Label-->
                                        @php echo textarea('address','form-control') @endphp
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end::status -->

                        <!-- begin::address  -->
                        <div id="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            Status
                                        </label>
                                        <!--end::Label-->
                                        @php echo select('status','form-control',status_form()) @endphp
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end::status -->

                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                        <!--end::Actions-->
                        <div></div>
                    </form>
                    <!--end::Form-->
                </div>
            </div>
        </div>
    @endsection

    @section('script')
        <script>
            $(document).ready(function()
            {
                $.ajax({
                    url : 'informasi-kampus/data',
                    method : 'get',
                    success : function(xhr)
                    {
                        $("#id_campus_info").val(xhr.id);
                        $("#name_campus").val(xhr.name_campus);
                        $("#email").val(xhr.email);
                        $("#web").val(xhr.web);
                        $("#phone_number").val(xhr.phone_number);
                        $("#fax_number").val(xhr.fax_number);
                        $("#address").val(xhr.address);
                        if(xhr.active != null)
                        {
                            $("#status").val(xhr.active);
                        }
                    }
                });
            });

            var dt;

            const icons = `<span class="svg-icon svg-icon-1 svg-icon-light"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"/>
            <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black"/>
            <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black"/>
            </svg></span>`;

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

            $("#name_campus").on('keyup', function (e) {
                if (e.code != 'Enter') {
                    var name = e.target.value.length;
                    if(name > 50) {
                        showError('Nama universitas maksimal 50 karakter', '#name_campus_error', '#name_campus');
                    }
                    else if (name) {
                        removeError('#name_campus_error', '#name_campus');
                    } else {
                        showError('Nama universitas wajib di isi', '#name_campus_error', '#name_campus');
                    }
                }
            });

            $("#phone_number").on('keyup', function (e) {
                if (e.code != 'Enter') {
                    var value   = e.target.value;
                    $(this).val(value.replace('-',''));
                }
            });

            $("#fax_number").on('keyup', function (e) {
                if (e.code != 'Enter') {
                    var value   = e.target.value;
                    $(this).val(value.replace('-',''));
                }
            });

            $("#email").on('keyup', function (e) {
                if (e.code != 'Enter') {
                    var email     = $(this).val();
                    var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
                    if(email == '')
                    {
                        showError('Email wajib di isi','#email_error','#email');
                    }
                    else if(!testEmail.test(email))
                    {
                        showError('Format email tidak valid', '#email_error', '#email');
                    }    
                    else 
                    {
                        removeError('#email_error', '#email');
                    }
                }
            });

            /** 
             * This function is save data and update data
             */
            var eventSubmit = function(e) {
                e.preventDefault();

                var nameCampus  = $("#name_campus").val();
                var email       = $("#email").val();
                var web         = $("#web").val();
                var phoneNumber = $("#phone_number").val();
                var faxNumber   = $("#fax_number").val();
                var address     = $("#address").val();
                var status      = $("#status").val();
                var id          = $("#id_campus_info").val();
                var error = 0;

                if(nameCampus == "")
                {
                    showError('Nama universitas wajib di isi','#name_campus_error','#name_campus');
                    error++;
                }
                else if(nameCampus.length > 50)
                {
                    showError('Nama universitas maksimal  50 karakter','#name_campus_error','#name_campus');
                }
                else 
                {
                    removeError('#name_campus_error','#name_campus');
                }

                var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
                if(email == "")
                {
                    showError('Email wajib di isi','#email','#email_error');
                    error++;
                }
                else if(!testEmail.test(email))
                {
                    showError('Format email tidak valid', '#email_error', '#email');
                    error++;
                }    
                else 
                {
                    removeError('#email_error', '#email');
                }

                if (error == 0) {
                    $.ajax({
                        url: 'informasi-kampus',
                        method: 'post',
                        data: {
                            name_campus : nameCampus,
                            email       : email,
                            web         : web,
                            phone_number: phoneNumber,
                            fax_number  : faxNumber,
                            address     : address,
                            active      : status,
                            id          : id
                        },
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(xhr) {
                            if (xhr.success) {
                                $("#id_campus_info").val(xhr.id);
                                
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: xhr.message,
                                });

                                $("#name_campus").removeAttr('style');
                                $("#name_campus_error").hide();

                                $("#email").removeAttr('style');
                                $("#email_error").hide();
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal',
                                    text: xhr.message,
                                });
                            }
                        }
                    })
                }
            }
        </script>
    @endsection
