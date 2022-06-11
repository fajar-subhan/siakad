<div class="modal fade" id="kt_modal_email_reset" tabindex="-1" style="display: none;" aria-modal="true"
    role="dialog">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>Reset Password</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                transform="rotate(-45 6 17.3137)" fill="black"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                fill="black"></rect>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <form class="form w-100" id="kt_password_reset_submit_new">
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <label class="form-label fw-bolder text-gray-900 fs-6">Email</label>
                        <input class="form-control form-control-solid" id="email_reset_new" value="" type="email"
                            disabled placeholder="Masukan email anda" />
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <label class="form-label fw-bolder text-gray-900 fs-6">Password</label>
                        <input class="form-control form-control-solid" id="password_reset_new" value="" type="password"
                        placeholder="Password anda anda" />
                        <div class="fv-plugins-message-container invalid-feedback" id="password_reset_new_error"></div>
                    </div>
                    <div class="fv-row mb-10">
                        <label class="form-label fw-bolder text-gray-900 fs-6">Konfirmasi Password</label>
                        <input class="form-control form-control-solid" id="confirm-password_reset_new" value="" type="password"
                        placeholder="Masukan kembali password baru anda" />
                        <div class="fv-plugins-message-container invalid-feedback" id="confirm-password_reset_new_error"></div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="d-flex flex-wrap pb-lg-4">
                        <button type="submit" class="btn btn-lg btn-primary fw-bolder" style="width:100%">
                            <span class="indicator-label">Reset Password</span>
                        </button>
                    </div>

                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
