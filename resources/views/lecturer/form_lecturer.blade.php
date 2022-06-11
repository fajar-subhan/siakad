<div class="modal fade" id="kt_modal_lecturer" tabindex="-1" style="display: none;" aria-modal="true"
    role="dialog">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 id="modal_lecturer_title"></h2>
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
                <form id="kt_modal_lecturer_form" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                    action="#">
                    @php echo hidden('id_lecturer','') @endphp

                    <!--begin::Input NIDN -->
                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required code nidn">NIDN</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7 code_i nidn" data-bs-toggle="tooltip" title=""
                                data-bs-original-title="Maksimal 12 nomor" aria-label="Maksimal 12 nomor"></i>
                        </label>
                        <!--end::Label-->
                        @php echo input_number('nidn','form-control',null,null,['placeholder' => 'masukan nidn']); @endphp
                        <div class="fv-plugins-message-container invalid-feedback" id="nidn_error"></div>
                    </div>
                    <!--end::Input NIM-->

                    <!--Start::Input Nama-->
                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required code">Nama</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7 code_i" data-bs-toggle="tooltip" title=""
                                data-bs-original-title="Maksimal 50 karakter" aria-label="Maksimal 50 karakter"></i>
                        </label>
                        <!--end::Label-->
                        @php echo input_text('name_lecturer','form-control',null,null,['placeholder' => 'masukan nama dosen']); @endphp
                        <div class="fv-plugins-message-container invalid-feedback" id="name_lecturer_error"></div>
                    </div>
                    <!--End::Input Nama -->

                    <!--Start::Input Email-->
                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required code">Email</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7 code_i" data-bs-toggle="tooltip" title=""
                                data-bs-original-title="Masukan email dengan format yang benar"
                                aria-label="Masukan email dengan format yang benar"></i>
                        </label>
                        <!--end::Label-->
                        @php echo input_email('email_lecturer','form-control',null,null,['placeholder' => 'masukan email dosen']); @endphp
                        <div class="fv-plugins-message-container invalid-feedback" id="email_lecturer_error"></div>
                    </div>
                    <!--End::Input Email -->

                    <!--Start::Input Fakultas -->
                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required code">Fakultas</span>
                        </label>
                        <!--end::Label-->
                        @php echo select('faculty_lecturer','form-control',faculty()) @endphp
                    </div>
                    <!--End::Input Fakultas -->

                    <!--begin::Input Nomer HP -->
                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required code nim">No HP</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7 code_i nim" data-bs-toggle="tooltip" title=""
                            data-bs-original-title="Maksimal 13 nomor" aria-label="Maksimal 13 nomor"></i>
                        </label>
                        <!--end::Label-->
                        @php echo input_number('number_phone','form-control',null,null,['placeholder' => 'masukan nomer handphone']); @endphp
                        <div class="fv-plugins-message-container invalid-feedback" id="no_hp_error"></div>
                    </div>
                    <!--end::Input Nomer HP -->

                    <!-- begin::status -->
                    <div id="div_status_lecturer">
                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                Status
                            </label>
                            <!--end::Label-->
                            @php echo select('status_lecturer','form-control',status_form()) @endphp
                        </div>
                    </div>
                    <!-- end::status -->

                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="button" class="btn btn-light" onclick="eventClose()"
                            data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary">
                            <span class="indicator-label" id="button_submit"></span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                    <div></div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
