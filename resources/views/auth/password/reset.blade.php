@extends('layouts.auth')
@section('content')
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Password reset -->
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
            style="background-image: url({{ asset('storage/images/media/illustrations/sketchy-1/14.png') }})">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <!--begin::Logo-->
                <a href="#" class="py-9 mb-2 text-center">
                    <img alt="Logo" src="{{ asset('storage/images/logo/logo.svg') }}" style="width:40%;" />
                </a>
                <!--end::Logo-->
                <!--begin::Wrapper-->
                <div class="w-lg-550px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <!--begin::Form-->
                    <form class="form w-100" id="kt_password_reset_submit">
                        <!--begin::Heading-->
                        <div class="text-left mb-10">
                            <!--begin::Title-->
                            <h1 class="text-dark mb-3">Lupa Password ?</h1>
                            <!--end::Title-->
                            <!--begin::Link-->
                            <div class="text-gray-400 fw-bold fs-4">Masukkan email untuk membuat password baru

                                .</div>
                            <!--end::Link-->
                        </div>
                        <!--begin::Heading-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <label class="form-label fw-bolder text-gray-900 fs-6">Email</label>
                            <input class="form-control form-control-solid" id="email_reset" type="email"
                                placeholder="Masukan email anda" />
                            <div class="fv-plugins-message-container invalid-feedback" id="email_reset_error"></div>

                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="d-flex flex-wrap pb-lg-4">
                            <button type="submit" class="btn btn-lg btn-primary fw-bolder" style="width:100%">
                                <span class="indicator-label">Reset Password</span>
                            </button>
                        </div>

                        <div class="d-flex flex-wrap">
                            <a href="{{ route('login') }}" class="btn btn-lg btn-light-info back-login"
                                style="width: 100%">Kembali Ke Halaman Login</a>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
            <div class="d-flex flex-center flex-column-auto p-10">
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Authentication - Password reset-->
    </div>
    <!--end::Main-->
@endsection
@include('auth.password.modal_email')
@section('script')
    <script>
        var email_not_found = 0;

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
        $("#email_reset").on('keyup', function(e) {
            var email = $(this).val();

            if (email.length > 0) {
                if (e.code != 'Enter' || e.code != 'Backspace') {
                    $.ajax({
                        url: '/password/checkuser',
                        method: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType: 'json',
                        data: {
                            email: email
                        },
                        success: function(xhr) {
                            if (!xhr.status && !xhr.count) {
                                showError(
                                    'Kami tidak dapat menemukan pengguna dengan alamat email tersebut.',
                                    '#email_reset_error', '#email_reset');
                                email_not_found++;
                            } else {
                                removeError('#email_reset_error', '#email_reset');
                                email_not_found = 0;
                            }
                        }
                    })
                }
            }
        });

        $("#password_reset_new").on('keyup', function(e) {
            if (e.code != 'Enter') {
                var password = $(this).val().length;

                if (password <= 6) {
                    showError('Minimal 6 karakter', '#password_reset_new_error', '#password_reset_new');
                } else {
                    removeError('#password_reset_new_error', '#password_reset_new');
                }
            }
        });

        $("#confirm-password_reset_new").on('keyup', function(e) {
            if (e.code != 'Enter') {
                var confirmPassword = $(this).val();
                var password = $("#password_reset_new").val();

                if (password != confirmPassword) {
                    showError('Password tidak sama', '#confirm-password_reset_new_error',
                        '#confirm-password_reset_new');
                } else if (confirmPassword == "") {
                    showError('Konfirmasi password wajib di isi', '#confirm-password_reset_new_error',
                        '#confirm-password_reset_new');
                } else {
                    removeError('#confirm-password_reset_new_error', '#confirm-password_reset_new');
                }
            }
        })

        $("#kt_password_reset_submit").on('submit', function(e) {
            e.preventDefault();
            var error = 0;
            var email = $("#email_reset").val();
            var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;


            if (email == "") {
                showError('Email wajib di isi', '#email_reset_error', '#email_reset');
                error++;
            } else if (!testEmail.test(email)) {
                showError('Format email tidak valid', '#email_reset_error', '#email_reset');
                error++;
            } else {
                removeError('#email_reset_error', '#email_reset');
            }

            if (email_not_found > 0) {
                showError('Kami tidak dapat menemukan pengguna dengan alamat email tersebut.', '#email_reset_error',
                    '#email_reset');
                email_not_found++;
            } else {
                email_not_found = 0;
            }

            if (error == 0 && email_not_found == 0) {
                $("#kt_modal_email_reset").modal('show');
                $("#email_reset_new").val(email);
            }
        });

        $("#kt_password_reset_submit_new").on('submit', function(e) {
            e.preventDefault();
            var error = 0;
            var password = $("#password_reset_new").val();
            var confirmPassword = $("#confirm-password_reset_new").val();

            if (password == "") {
                showError('Password wajib di isi', '#password_reset_new_error', '#password_reset_new');
                error++;
            } else if (password.length <= 6) {
                showError('Minimal 6 karakter', '#password_reset_new_error', '#password_reset_new');
                error++;
            } else {
                removeError('#password_reset_new_error', '#password_reset_new');
            }

            if (password == "") {
                showError('Password wajib di isi', '#confirm-password_reset_new_error',
                    '#confirm-password_reset_new');
                error++;
            } else if (confirmPassword != password) {
                showError('Password tidak sama', '#confirm-password_reset_new_error',
                    '#confirm-password_reset_new');
                error++;
            } else {
                removeError('#confirm-password_reset_new_error', '#confirm-password_reset_new');
            }

            if (error == 0) {
                $.ajax({
                    url: 'reset/proses-password',
                    method: 'PATCH',
                    data: {
                        email: $("#email_reset_new").val(),
                        password: $("#confirm-password_reset_new").val()
                    },
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

                            $("#password_reset_new").val('');
                            $("#password_reset_new").removeAttr('style');
                            $("#password_reset_new_error").hide();

                            $("#confirm-password_reset_new").val('');
                            $("#confirm-password_reset_new").removeAttr('style');
                            $("#confirm-password_reset_new_error").hide();

                            $("#email_reset").removeAttr('style');
                            $("#email_reset").val('');

                            $("#kt_modal_email_reset").attr('aria-hidden', 'true');
                            $("#kt_modal_email_reset").modal('toggle');
                            $("#modal").hide();
                            $(".modal-backdrop").remove();
                            $(".modal").removeClass("show");
                            $(".modal").css("display", "none");
                            $("#kt_body").css('overflow', '');
                            $("#kt_body").css('padding-right', '');
                            $("#kt_body").removeClass('modal-open');
                            $("#kt_modal_email_reset").removeAttr('aria-modal');
                            $("#kt_modal_email_reset").removeAttr('role');
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: xhr.message,
                            });

                            $("#kt_modal_email_reset").attr('aria-hidden', 'true');
                            $("#kt_modal_email_reset").modal('toggle');
                            $("#modal").hide();
                            $(".modal-backdrop").remove();
                            $(".modal").removeClass("show");
                            $(".modal").css("display", "none");
                            $("#kt_body").css('overflow', '');
                            $("#kt_body").css('padding-right', '');
                            $("#kt_body").removeClass('modal-open');
                            $("#kt_modal_email_reset").removeAttr('aria-modal');
                            $("#kt_modal_email_reset").removeAttr('role');
                        }
                    }
                })
            }

        });
    </script>
@endsection
