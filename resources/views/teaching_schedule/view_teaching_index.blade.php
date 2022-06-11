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

                    </div>
                    <!--end::Wrapper-->

                    <!--begin::Datatable-->
                    <table id="teaching_table"
                        class="table table-striped table-row-bordered align-middle table-hover border  fs-6 gy-5">
                        <thead>
                            <tr class="text-center text-dark-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th class="text-center">No</th>
                                <th class="text-center">Matakuliah</th>
                                <th class="text-center">Hari</th>
                                <th class="text-center">Jam</th>
                                <th class="text-center">Ruang</th>
                                <th class="text-center">Jurusan</th>
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
                                        </svg></span>
                                    <!--end::Svg Icon-->
                                </th>
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
                                        </svg></span>
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

@include('teaching_schedule.modal_value')
@include('teaching_schedule.modal_input_presence')
@include('teaching_schedule.modal_presence')
@include('teaching_schedule.modal_absent_list')

@section('script')
    <script>
        var duplicate   = 0;
        var dt;

        var eventPresence = (id) => {

            $("#id_schedule").val(id);

            $.ajax({
                url : 'jadwal-mengajar/kehadiran/' + id,
                method : 'get',
                data : { id : id },
                datatType : 'json',
                success : function(xhr)
                {
                    if(xhr.count_college > 0)
                    {
                        $("#input_presence_button").show();
                    }
                    else 
                    {
                        $("#input_presence_button").hide();
                    }

                    $("#subject_code_presence").text(xhr.schedule.subject_code);
                    $("#subject_name_presence").text(xhr.schedule.subject_name);
                    $("#lecturer_name_presence").text(xhr.schedule.lecturer_name);

                    $("#data-presence").html(xhr.table);
                }
            })
        }
        
        var eventFormInputPresence = () => {
            var id = $("#id_schedule").val();

            $("#id_input_presence").val(id);
            $("#discussion_topic_input").val('');
            $("#discussion_topic_input").removeAttr('style');
            $("#topic_error").hide();

            $.ajax({
                url : 'jadwal-mengajar/kehadiran/create/' + id,
                method : 'get',
                data : { id : id},
                dataType : 'json',
                success : function(xhr)
                {
                    $("#subject_code_input").text(xhr.schedule.subject_code);
                    $("#subject_name_input").text(xhr.schedule.subject_name);
                    $("#lecturer_name_input").text(xhr.schedule.lecturer_name);
                    $("#meeting_to_input").text(xhr.meeting_to);
                }
            })
        }

        var eventProsesPresence = () => {
            var meeting_to = $("#meeting_to_input").text();
            var topic      = $("#discussion_topic_input").val();
            var id         = $("#id_input_presence").val();
            var error      = 0;

            if(topic == "") {
                showError('Topik pembahasan wajib di isi','#topic_error','#discussion_topic_input')
                error++;
            }
            else if(topic.length > 100)
            {
                showError('Topik maksimal 100 karakter','#topic_error','#discussion_topic_input');
                error++;
            }
            else 
            {
                removeError('#topic_error','#discussion_topic_input');
            }
        
            if(error == 0)
            {
                var data       = 
                { 
                    id          : id,
                    meeting_to  : meeting_to,
                    topic       : topic
                };

                $.ajax({
                    url : 'jadwal-mengajar',
                    method : 'post',
                    dataType : 'json',
                    data     : data,
                    headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success : function(xhrs)
                    {
                        if(xhrs.success)
                        {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: xhrs.message,
                            });

                            $("#kt_modal_input_presence").modal('toggle');
                            $("#kt_modal_input_presence").modal('hide');

                            $("#kt_modal_absent").modal('show');
                            $("#kt_modal_absent").modal('toggle');

                            $.ajax({
                                url : 'jadwal-mengajar/kehadiran/input/show-attendence',
                                method : 'get',
                                dataType : 'json',
                                data : {id: xhrs.id},
                                success : function(xhr)
                                {
                                    $("#subject_code_data").val(xhr.data1.subject_code);
                                    $("#nidn_data").val(xhr.data1.nidn);
                                    $("#subject_name_absent").text(xhr.data1.subject_name);
                                    $("#lecturer_name_absent").text(xhr.data1.lecturer_name);
                                    $("#meeting_to_absent").text(xhr.data1.meeting_to);
                                    $("#topic_absent").text(xhr.data1.topic);
                                    $("#id_input_absent").val(xhrs.id);

                                    var table  = "<table class='table'>";
                                        table += "<tr>";
                                        table += "<th style='width: 25%;font-weight:bold;text-align:center;'>NIM</th>";
                                        table += "<th style='width: 25%;font-weight:bold;text-align:center;'>Nama Mahasiswa</th>";
                                        table += "<th style='width: 25%;font-weight:bold;text-align:center;'>Kehadiran</th>";
                                        table += "</tr>";

                                        $.each(xhr.data2,function(index,value)
                                        {
                                            table += "<tr>";
                                            table += "<td style='text-align:center;'>"+value.nim+"</td>";
                                            table += "<td>"+value.name+"</td>";
                                            table += "<td style='text-align:center;'>";
                                            table += "<select id='absent-"+value.nim+"' class='form-control' onchange='eventSavePresence("+xhr.data1.meeting_to+","+value.nim+")'>";
                                            table += "<option>-- Silahkan Pilih --</option>";
                                            table += "<option value='1'>Hadir</option>";
                                            table += "<option value='2'>Izin</option>";
                                            table += "<option value='3'>Tidak Hadir</option>";
                                            table += "<option value='4'>Sakit</option>";
                                            table += "</select>";
                                            table += "</td>";
                                            table += "</tr>";
                                        });
                                        table += "</table>";

                                        $("#data-absent-list").html(table);
                                }
                            })
                        }
                        else 
                        {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: xhrs.message,
                            });
                        }
                    }
                });
            }
        }


        var eventSavePresence = (meeting_to,nim) => {
            var status_presence = $("#absent-"+nim).val();
            var csrf_token      = $('meta[name="csrf-token"]').attr('content');
            var id              = $("#id_input_absent").val();
            var subject_code    = $("#subject_code_data").val();
            var nidn            = $("#nidn_data").val();
        
            $.ajax({
                url : 'jadwal-mengajar/kehadiran/input-kehadiran',
                method : 'post',
                data : {
                    id : id,
                    meeting_to : meeting_to,
                    status : status_presence,
                    nim : nim,
                    subject_code : subject_code,
                    nidn : nidn
                },
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success : function(xhr)
                {
                    if(xhr.success)
                    {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: xhr.message,
                        });
                    }
                    else 
                    {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: xhr.message,
                        });
                    }
                }
            })
        }

        var eventAddValue = (id) => {
            $.ajax({
                url : 'jadwal-mengajar/' + id,
                method : 'get',
                data : { id : id },
                datatType : 'json',
                success : function(xhr)
                {
                    $("#subject_code").text(xhr.schedule.subject_code);
                    $("#subject_name").text(xhr.schedule.subject_name);
                    $("#lecturer_name").text(xhr.schedule.lecturer_name);
                    
                    var table = `
                    <table class="table">
                    <thead style="font-weight: bold;font-size; text-align:center">
                        <tr>
                            <th>NIM</th>
                            <th style="width:35% !important">Nama Mahasiswa</th>
                            <th>Kehadiran</th>
                            <th>Tugas</th>
                            <th>UTS</th>
                            <th>UAS</th>
                        </tr>
                    </thead>
                    <tbody>`;

                    $.each(xhr.college_student,function(index,value)
                    {   
                        table += "<tr>";
                        table += "<td>" + value.nim + "</td>";
                        table += "<td>" + value.name + "</td>";
                        table += '<td><input type="number" class="form-control" id="kehadiran-'+ value.id +'" min="1" value="'+value.kehadiran+'" oninput="eventSave('+value.id+')"></td>';
                        table += '<td><input type="number" class="form-control" id="tugas-'+value.id+'" min="1" value="'+value.tugas+'" oninput="eventSave('+value.id+')"></td>';
                        table += '<td><input type="number" class="form-control" id="uts-'+value.id+'" min="1" value="'+value.uts+'" oninput="eventSave('+value.id+')"></td>';
                        table += '<td><input type="number" class="form-control" id="uas-'+value.id+'" min="1" value="'+value.uas+'" oninput="eventSave('+value.id+')"></td>';
                        table += "</tr>";
                    });

                    table += `
                    </tbody>
                    </table>`;

                    $("#data-value").html(table);
                }
            })
        }

        const icons = `<span class="svg-icon svg-icon-1 svg-icon-light"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"/>
            <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black"/>
            <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black"/>
            </svg></span>`;

        /* When the plus button outside the modal is clicked */
        var addButtonModal = function() {
            $("#id_room").val('');

            $("#div_status_room").hide();

            $("#code_room").removeAttr('disabled');

            $("#modal_room_title").html(
                '<i class="fa-solid fa-plus" style="font-size:100%;color:black;"></i> Tambah Ruangan');
            
            $('.code').attr('class','required code');
            $('.code_i').attr('class','fas fa-exclamation-circle ms-2 fs-7 code_i');

            $("#kt_modal_room_form").attr('onsubmit', 'eventSave(event)');

            $("#button_submit").text('Tambah');

            $("#code_room_error").hide();
            $("#code_room").removeAttr('style');

            $("#name_room_error").hide();
            $("#name_room").removeAttr('style');

            $("#code_room").val('');
            $("#name_room").val('');
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
         * This function is for save data when typed in numbers
         */
        var eventSave = function(e) {

            var kehadiran   = $("#kehadiran-"+ e).val();
            var tugas       = $("#tugas-"+ e).val();
            var uts         = $("#uts-" + e).val();
            var uas         = $("#uas-"+ e).val();

            if(
                kehadiran   == "" ||
                tugas       == "" ||
                uts         == "" ||
                uas         == ""
                )
            {
                return false;
            }

            kehadiran   = $('#kehadiran-'+e).val(kehadiran.replace('-',''))[0].value;
            tugas       = $('#tugas-'+e).val(tugas.replace('-',''))[0].value;
            uts         = $('#uts-'+e).val(uts.replace('-',''))[0].value;
            uas         = $('#uas-'+e).val(uas.replace('-',''))[0].value;

            $.ajax({
                url : 'jadwal-mengajar/' + e,
                    method: 'PATCH',
                    data: {
                        id : e,
                        kehadiran : kehadiran,
                        tugas     : tugas,
                        uts       : uts,
                        uas       : uas
                    },
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success : function(xhr)
                    {
                        if(xhr.success)
                        {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: xhr.message,
                            });
                        }
                        else 
                        {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: xhr.message,
                            });
                        }
                    }
            })
        }

        /* When the edit button is clicked and the modal form appears the first time */
        var eventEdit = function(e) {
            $("#code_room").attr('disabled', 'disabled');
            $("#div_status_room").show();
            $('#id_room').val(e);
            $("#modal_room_title").html(
                '<i class="fa-solid fa-pencil" style="font-size:100%;color:black;"></i> Ubah Ruangan');

            $("#kt_modal_room_form").attr('onsubmit', 'eventUpdate(event)');

            $('.code').removeClass('required');
            $('.code_i').removeClass('fas fa-exclamation-circle ms-2 fs-7');

            $("#code_room").removeAttr('style');

            $("#name_room").removeAttr('style');
            $("#name_room_error").hide();


            $("#button_submit").text('Ubah');

            $.ajax({
                url: 'ruangan/' + e + '/edit',
                type: 'get',
                dataType: 'json',
                data: {
                    id: e
                },
                success: function(xhr) {
                    $('#code_room').val(xhr.code);
                    $('#name_room').val(xhr.name);
                    $('#status_room').val(xhr.active);
                }
            });
        }

        var eventUpdate = function(e) {
            e.preventDefault();

            var name_room   = $("#name_room").val();
            var status_room = $("#status_room").val();
            var id_room     = $("#id_room").val();
            var error       = 0;

            if (name_room == "") {
                showError('Nama ruangan wajib di isi', '#name_room_error', '#name_room');
                error++;
            } else if (name_room.length > 50) {
                showError('Nama ruangan maksimal 50 karakter', '#name_room_error', '#name_room');
                error++;
            } else {
                removeError('#name_room_error', '#name_room');
            }


            if (error == 0) {
                $.ajax({
                    url: 'ruangan/' + id_room,
                    method: 'PATCH',
                    data: {
                        name_room: name_room,
                        status_room: status_room
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

                            $("#kt_modal_room").attr('aria-hidden', 'true');
                            $("#kt_modal_room").modal('toggle');
                            $("#modal").hide();
                            $(".modal-backdrop").remove();
                            $(".modal").removeClass("show");
                            $(".modal").css("display", "none");
                            $("#kt_body").css('overflow', '');
                            $("#kt_body").css('padding-right', '');
                            $("#kt_body").removeClass('modal-open');
                            $("#kt_modal_room").removeAttr('aria-modal');
                            $("#kt_modal_room").removeAttr('role');

                            $("#name_room").val('');
                            $("#name_room").removeAttr('style');
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: xhr.message,
                            });

                            document.querySelector('[data-kt-docs-table-filter="search"]').value = '';
                            dt.search('').draw();

                            $("#kt_modal_room").attr('aria-hidden', 'true');
                            $("#kt_modal_room").modal('toggle');
                            $("#modal").hide();
                            $(".modal-backdrop").remove();
                            $(".modal").removeClass("show");
                            $(".modal").css("display", "none");
                            $("#kt_body").css('overflow', '');
                            $("#kt_body").css('padding-right', '');
                            $("#kt_body").removeClass('modal-open');
                            $("#kt_modal_room").removeAttr('aria-modal');
                            $("#kt_modal_room").removeAttr('role');

                            $("#name_room").val('');
                            $("#name_room").removeAttr('style');
                        }
                    }
                });
            }
        }

        var eventClose = () => {
            $("#kt_modal_room_form")[0].reset();
            $("#code_room").removeAttr('style');
            $("#name_room").removeAttr('style');
            $("#code_room_error").hide();
            $("#name_room_error").hide();
        }

        $("#code_room").on('keyup', function(e) {
            if (e.code != 'Enter') {
                var code_room = e.target.value.length;
                var value     = e.target.value;

                if (code_room > 6) {
                    showError('Kode ruangan maksimal 6 karakter', '#code_room_error','#code_room');
                } else if (code_room) {
                    removeError('#code_room_error', '#code_room');

                    /* Check if the room code already exists, if it already exists then an error */
                    $.ajax({
                        url: 'ruangan/check_code',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            code_room: value
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(xhr) {
                            if (xhr.count) {
                                showError('Kode ruangan sudah digunakan', '#code_room_error',
                                    '#code_room');
                                duplicate++;
                            } else {
                                duplicate = 0;
                            }
                        }
                    });
                } else {
                    showError('Kode ruangan wajib di isi', '#code_room_error', '#code_room');
                }
            }
        });

        $("#name_room").on('keyup', function(e) {
            if (e.code != 'Enter') {
            
                var name_room = e.target.value.length;

                if(name_room > 50)
                {
                    showError('Nama ruangan maksimal 50 karakter', '#name_room_error', '#name_room');
                }
                else if (name_room) {
                    removeError('#name_room_error', '#name_room');
                } else {
                    showError('Nama ruangan wajib di isi', '#name_room_error', '#name_room');
                }
            }
        });


        // Class definition
        var KTDatatablesServerSide = function() {
            // Shared variables
            var table;
            var filterPayment;

            // Private functions
            var initDatatable = function() {
                dt = $("#teaching_table").DataTable({
                    processing: true,
                    serverSide: true,
                    select: {
                        style: 'os',
                        selector: 'td:first-child',
                        className: 'row-selected'
                    },
                    ajax: 'jadwal-mengajar/data',
                    columns: [
                        {
                            data: 'DT_RowIndex',
                            width: '5%',
                            sClass: 'text-center'
                        },
                        {
                            data: 'subject_name',
                            width: '15%',
                        },
                        {
                            data: 'days',
                            width: '5%',
                            sClass: 'text-center'
                        },
                        {
                            data: 'hours',
                            width: '15%'
                        },
                        {
                            data: 'room_name',
                            width: '10%'
                        },
                        {
                            data: 'major_name',
                            width: '10%'
                        },
                        {
                            data: 'value',
                            width: '10%',
                            sClass: 'text-center'
                        },
                        {
                            data: 'presence',
                            width: '10%',
                            sClass: 'text-center'
                        }
                    ],
                });

                table = dt.$;

                // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
                dt.on('draw', function() {
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

            // Public methods
            return {
                init: function() {
                    initDatatable();
                    handleSearchDatatable();
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
