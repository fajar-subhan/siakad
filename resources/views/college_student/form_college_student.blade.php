<div class="modal fade" id="kt_modal_college_student" tabindex="-1" style="display: none;" aria-modal="true"
    role="dialog">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 id="modal_college_student_title"></h2>
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
                <form id="kt_modal_college_student_form" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                    action="#">
                    @php echo hidden('id_college_student','') @endphp

                    <!--begin::Input NIM -->
                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required code nim">NIM</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7 code_i nim" data-bs-toggle="tooltip" title=""
                                data-bs-original-title="Maksimal 12 nomor" aria-label="Maksimal 12 nomor"></i>
                        </label>
                        <!--end::Label-->
                        @php echo input_number('nim','form-control',null,null,['placeholder' => 'masukan nim']); @endphp
                        <div class="fv-plugins-message-container invalid-feedback" id="nim_error"></div>
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
                        @php echo input_text('name_college','form-control',null,null,['placeholder' => 'masukan nama mahasiswa']); @endphp
                        <div class="fv-plugins-message-container invalid-feedback" id="name_college_error"></div>
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
                        @php echo input_email('email_college','form-control',null,null,['placeholder' => 'masukan email mahasiswa']); @endphp
                        <div class="fv-plugins-message-container invalid-feedback" id="email_college_error"></div>
                    </div>
                    <!--End::Input Email -->

                    <!--Start::Input Jurusan -->
                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required code">Jurusan</span>
                        </label>
                        <!--end::Label-->
                        @php echo select('major_college_students','form-control',major()) @endphp
                    </div>
                    <!--End::Input Jurusan -->


                    <!--Start::Input Tahun Akademik -->
                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required code">Tahun Akademik</span>
                        </label>
                        <!--end::Label-->
                        @php echo select('academic_code_college','form-control',academic_year()) @endphp
                        <div class="fv-plugins-message-container invalid-feedback" id="academic_college_error"></div>
                    </div>
                    <!--End::Input Tahun Akademik -->

                    <!--Start::Input Semester -->
                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required code">Semester</span>
                        </label>
                        <!--end::Label-->
                        @php echo select('semester','form-control',semester()) @endphp
                        <div class="fv-plugins-message-container invalid-feedback" id="semester_college_error"></div>
                    </div>
                    <!--End::Input Semester -->


                    <!--Start::Input address -->
                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required code">Alamat</span>
                        </label>
                        <!--end::Label-->
                        @php echo textarea('address_college_student','form-control') @endphp
                        <div class="fv-plugins-message-container invalid-feedback" id="address_college_student_error">
                        </div>
                    </div>
                    <!--End::Input address -->

                    <!-- begin::status -->
                    <div id="div_status_college_student">
                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                Status
                            </label>
                            <!--end::Label-->
                            @php echo select('status_college_student','form-control',status_form()) @endphp
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
