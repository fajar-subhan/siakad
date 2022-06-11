<div class="modal fade" id="kt_modal_academic" tabindex="-1" style="display: none;" aria-modal="true" role="dialog">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 id="modal_academic_title"></h2>
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
                <form id="kt_modal_academic_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                    @php echo hidden('id_academic','') @endphp

                    <!--begin::Input Kode Tahun Akademik -->
                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required code">Kode Tahun Akademik</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7 code_i" data-bs-toggle="tooltip" title=""
                                data-bs-original-title="Maksimal 6 karakter" aria-label="Maksimal 6 karakter"></i>
                        </label>
                        <!--end::Label-->
                        @php echo input_text('code_academic','form-control',null,null,['placeholder' => 'masukan kode tahun akademik']); @endphp
                        <div class="fv-plugins-message-container invalid-feedback" id="code_academic_error"></div>
                    </div>
                    <!--end::Input Kode Tahun Akademik-->

                    <!--Start::Input Nama Akademik-->
                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">Akademik</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title=""
                                data-bs-original-title="Maksimal 50 karakter" aria-label="Maksimal 50 karakter"></i>
                        </label>
                        <!--end::Label-->
                        @php echo input_text('academic_year','form-control',null,null,['placeholder' => 'masukan nama tahun akademik']); @endphp
                        <div class="fv-plugins-message-container invalid-feedback" id="academic_year_error"></div>
                    </div>
                    <!--End::Input Nama Akademik-->

                    <!--Start::Input Perkuliahan -->
                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">Perkuliahan</span>
                        </label>
                        <!--end::Label-->
                        <div class="row">
                            <div class="col-lg-4">
                                @php echo input_date('start_date_study','form-control'); @endphp
                            </div>
                            <div class="col-lg-4">
                                @php echo input_date('end_date_study','form-control'); @endphp
                            </div>
                        </div>
                        <div class="fv-plugins-message-container invalid-feedback" id="date_study_error"></div>
                    </div>
                    <!--End::Input Perkuliahan -->

                    <!--Start::Input UTS -->
                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            UTS
                        </label>
                        <!--end::Label-->
                        <div class="row">
                            <div class="col-lg-4">
                                @php echo input_date('start_date_uts','form-control'); @endphp
                            </div>
                            <div class="col-lg-4">
                                @php echo input_date('end_date_uts','form-control'); @endphp
                            </div>
                        </div>
                        <div class="fv-plugins-message-container invalid-feedback" id="date_uts_error"></div>
                    </div>
                    <!--End::Input UTS -->

                    <!--Start::Input UAS -->
                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            UAS
                        </label>
                        <!--end::Label-->
                        <div class="row">
                            <div class="col-lg-4">
                                @php echo input_date('start_date_uas','form-control'); @endphp
                            </div>
                            <div class="col-lg-4">
                                @php echo input_date('end_date_uas','form-control'); @endphp
                            </div>
                        </div>
                        <div class="fv-plugins-message-container invalid-feedback" id="date_uas_error"></div>
                    </div>
                    <!--End::Input UAS -->

                    <!-- begin::status -->
                    <div id="div_status_academic">
                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                Status
                            </label>
                            <!--end::Label-->
                            @php echo select('status_academic','form-control',status_form()) @endphp
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
