<div class="modal fade" id="kt_modal_course_schedule" tabindex="-1" style="display: none;" aria-modal="true"
    role="dialog">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 id="modal_course_schedule_title"></h2>
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
                <form id="kt_modal_course_schedule_form" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                    action="#">
                    @php echo hidden('id_course_schedule','') @endphp

                    <!--begin::Input Jurusan -->
                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">Nama Jurusan</span>
                        </label>
                        <!--end::Label-->
                        @php echo select('major_course_schedule','form-control',major()) @endphp
                        <div class="fv-plugins-message-container invalid-feedback" id="major_course_schedule_error">
                        </div>
                    </div>
                    <!--end::Input Jurusan-->


                    <!-- begin::Matakuliah -->
                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">Matakuliah</span>
                        </label>
                        <!--end::Label-->
                        @php echo select('subject_course_schedule','form-control',subject()) @endphp
                        <div class="fv-plugins-message-container invalid-feedback" id="subject_course_schedule_error">
                        </div>
                    </div>
                    <!-- end::Matakuliah -->

                    <!-- begin::Dosen -->
                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">Dosen</span>
                        </label>
                        <!--end::Label-->
                        @php echo select('lecturer_course_schedule','form-control',lecturer()) @endphp
                        <div class="fv-plugins-message-container invalid-feedback" id="lecturer_course_schedule_error">
                        </div>
                    </div>
                    <!-- end::Dosen -->

                    <!-- begin::Ruangan -->
                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">Ruangan</span>
                        </label>
                        <!--end::Label-->
                        @php echo select('room_course_schedule','form-control',room()) @endphp
                        <div class="fv-plugins-message-container invalid-feedback" id="room_course_schedule_error">
                        </div>
                    </div>
                    <!-- end::Ruangan -->

                    <!-- begin::Hari dan Jam -->
                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">Hari Dan Jam</span>
                        </label>
                        <!--end::Label-->
                        <div class="row">
                            <div class="col-lg-5">
                                @php echo select('day_course_schedule','form-control',day()) @endphp
                            </div>
                            <div class="col-lg-5">
                                @php echo select('lecture_hours_schedule','form-control',hour()) @endphp
                            </div>

                        </div>
                    </div>
                    <!-- end::Hari dan Jam -->

                    <!-- begin::status -->
                    <div id="div_status_course_schedule">
                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                Status
                            </label>
                            <!--end::Label-->
                            @php echo select('status','form-control',status_form()) @endphp
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
