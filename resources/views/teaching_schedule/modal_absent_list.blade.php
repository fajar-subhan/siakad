<div class="modal fade" id="kt_modal_absent" tabindex="-1" style="display: none;" aria-modal="true" role="dialog">
    @php echo hidden('id_input_absent') @endphp
    @php echo hidden('nidn_data') @endphp
    @php echo hidden('subject_code_data') @endphp
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>Input Absensi Mahasiswa</h2>
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
                <table class="table table-striped align-middle table-hover">
                    <tr>
                        <td style="width: 20%;padding:2%;font-weight:bold;">Nama Matakuliah</td>
                        <td id="subject_name_absent" width="10"></td>
                    </tr>
                    <tr>
                        <td style="width: 20%;padding:2%;font-weight:bold;">Nama Dosen</td>
                        <td id="lecturer_name_absent"></td>
                    </tr>
                    <tr>
                        <td style="width: 20%;padding:2%;font-weight:bold;">Pertemuan Ke</td>
                        <td id="meeting_to_absent"></td>
                    </tr>
                    <tr>
                        <td style="width: 20%;padding:2%;font-weight:bold;">Topik</td>
                        <td id="topic_absent"></td>
                    </tr>
                </table>

                <div id="data-absent-list">

                </div>
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
