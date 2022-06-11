@extends('layouts.app', $data)
@section('content')
    <div class="post d-flex flex-column-fluid">
        <div class="container-xxl">
            <div class="card">
                <div class="card-body p-lg-17">
                    <div class="row">
                        <form onsubmit="eventUpdate(event)" method="post">
                            <div class="col-lg-6">
                                @php echo hidden('id_user_login',Auth::user()->id) @endphp 
                                <div class="form-group">
                                    <label for="name_user_profile" class="form-label">Nama</label>
                                    @php echo input_text('name_user_profile','form-control',Auth::user()->name,null) @endphp
                                    <div class="fv-plugins-message-container invalid-feedback" id="name_user_profile_error">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name_user_profile" class="form-label">Email</label>
                                    @php echo input_text('email_user_profile','form-control',Auth::user()->email,null,array('disabled' => 'disabled')) @endphp
                                    <div class="fv-plugins-message-container invalid-feedback"
                                        id="email_user_profile_error">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password_user_profile" class="form-label">Password</label>
                                    @php echo input_password('password_user_profile','form-control',null,null,['placeholder' => 'Masukan password jika ingin merubah']) @endphp
                                    <div class="fv-plugins-message-container invalid-feedback"
                                        id="password_user_profile_error">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="confirm_password_profile" class="form-label">Konfirmasi Password</label>
                                    @php echo input_password('confirm_password_profile','form-control',null,null,['placeholder' => 'Konfirmasi password baru anda']) @endphp
                                    <div class="fv-plugins-message-container invalid-feedback"
                                        id="confirm_password_profile_error"></div>
                                </div>

                                <div class="form-group mt-4">
                                    <button id="submit_profile" class="btn btn-sm btn-primary" type="submit">Ubah</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
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


        /** 
         * This function is for when the add button in the modal is submitted
         */
        var eventUpdate = function(e) {
            e.preventDefault();

            var name        = $("#name_user_profile").val();
            var id          = $("#id_user_login").val();
            var email       = $("#email_user_profile").val();
            var password    = $("#password_user_profile").val();
            var confirmPass = $("#confirm_password_profile").val();
            var error       = 0;

            if(name == "")
            {
                showError('Nama wajib di isi', '#name_user_profile_error', '#name_user_profile');
                error++;
            }
            else 
            {
                removeError('#name_user_profile_error', '#name_user_profile');
            }

            if(email == "")
            {
                showError('Email wajib di isi', '#email_user_profile_error', '#email_user_profile');
                error++;
            }
            else 
            {
                removeError('#email_user_profile_error','#email_user_profile');
            }

            if(confirmPass.length >= 1 && password.length <= 6)
            {
                showError('Minimal 6 karakter', '#password_user_profile_error', '#password_user_profile');
                error++;
            }
            else 
            {
                removeError('#password_user_profile_error','#password_user_profile');
            }

            if(confirmPass != password)
            {
                showError('Password tidak sama', '#confirm_password_profile_error','#confirm_password_profile');
                error++;
            }
            else if(confirmPass.length >= 1 && confirmPass.length <= 6)
            {
                showError('Minimal 6 karakter', '#confirm_password_profile_error', '#confirm_password_profile');
                error++;
            }
            else 
            {
                removeError('#confirm_password_profile_error','#confirm_password_profile');
            }

            if (error == 0) {
                $.ajax({
                    url: 'profile/' + id,
                    method: 'patch',
                    data: {
                        id : id,
                        name : name,
                        email : email,
                        password : password,
                        confirmPass : confirmPass
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

                            $("#name_user_profile").removeAttr('style');
                            $("#email_user_profile").removeAttr('style');
                            $("#password_user_profile").removeAttr('style');
                            $("#confirm_password_profile").removeAttr('style');

                            $("#password_user_profile").val('');
                            $("#confirm_password_profile").val('');
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: xhr.message,
                            });

                            $("#name_user_profile").removeAttr('style');
                            $("#email_user_profile").removeAttr('style');
                            $("#password_user_profile").removeAttr('style');
                            $("#confirm_password_profile").removeAttr('style');

                            $("#password_user_profile").val('');
                            $("#confirm_password_profile").val('');
                        }
                    }
                })
            }
        }
    </script>
@endsection
