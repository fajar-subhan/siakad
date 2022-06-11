<?php

namespace App\Http\Controllers;

use App\Models\M_Khs;
use Illuminate\Http\Request;
use App\Models\M_TeachingSchedule;
use Illuminate\Database\QueryException;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\M_Presence;

class TeachingScheduleController extends Controller
{
    public function data()
    {
        $data   =  M_TeachingSchedule::_getDataTeaching();
        
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('value', function ($row) {
                $action = '
                <button class="btn btn-sm btn-info mb-2 btn-hover-scale" data-bs-toggle="modal" data-bs-target="#kt_modal_value" onclick="eventAddValue(' . $row->id . ')">
                <i class="fa-solid fa-grip-vertical"></i>
                Nilai
                </button>
                ';
                return $action;
            })
            ->addColumn('presence',function($row)
            {
                $action = '
                <button class="btn btn-sm btn-primary mb-2 btn-hover-scale" data-bs-toggle="modal" data-bs-target="#kt_modal_presence" onclick="eventPresence(' . $row->id . ')">
                <i class="fa-solid fa-hand"></i>
                Kehadiran
                </button>
                ';  
                return $action;
            })
            ->rawColumns(['value','presence'])
            ->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumb = '
        <!--begin::Item-->
        <li class="breadcrumb-item text-muted">
            <a href="{{ route(dashboard.index) }}" class="text-muted text-hover-primary">Dashboard</a>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item">
            <!--begin::Svg Icon | path: assets/media/icons/duotune/arrows/arr023.svg-->
            <span class="svg-icon svg-icon-muted">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M6 4L14 12L6 20H10L17.3 12.7C17.7 12.3 17.7 11.7 17.3 11.3L10 4H6Z" fill="black"/>
                </svg>
            </span>
            <!--end::Svg Icon-->
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-dark">Jadwal Mengajar</li>
        <!--end::Item-->';
        $data =
            [
                'title'         => 'Jadwal Mengajar',
                'breadcrumb'    => $breadcrumb
            ];

        return view('teaching_schedule.view_teaching_index', compact('data'));
    }

    public function checkCode(Request $request)
    {
        $result = array('count' => 0);

        $data = M_TeachingSchedule::where('code',$request->code_room)->count();

        if($data > 0)
        {
            $result = array('count' => $data);
        }

        return response()->json($result);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try 
        {
            $schedule = DB::table('mst_course_schedule')
            ->where('id',$request->id)
            ->first();

            $data = M_Presence::create(
                [
                    'subject_code'      => $schedule->subject_code,
                    'nidn'              => $schedule->nidn,
                    'major_code'        => $schedule->major_code,
                    'room_code'         => $schedule->room_code,
                    'discussion_topic'  => $request->topic,
                    'meeting_to'        => $request->meeting_to,
                    'active'            => 1
                ]
            );

            $result = ['success' => true,'message' => 'Berhasil menyimpan kehadiran','id' => $data->id];
        }
        catch(QueryException $e)
        {
            $result = ['success' => false,'message' => $e->getPrevious()->getMessage()];
        }

        return response()->json($result);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teaching = M_TeachingSchedule::where('id',$id)->first();
        return response()->json($teaching);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try 
        {
            M_Khs::where('id',$id)
            ->update([
                'nilai_uts'         => $request->uts,
                'nilai_uas'         => $request->uas,
                'nilai_tugas'       => $request->tugas,
                'nilai_kehadiran'   => $request->kehadiran,
                'created_at'        => date('Y-m-d H:i:s')
            ]);

            $result = ['success' => true,'message' => 'Berhasil mengubah nilai mahasiswa'];
        }
        catch(QueryException $e)
        {
            $result = ['success' => false,'message' => $e->getPrevious()->getMessage()];
        }

        return response()->json($result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePresence(Request $request)
    {
        try 
        {
            $check = DB::table('mst_attendence_history')
            ->where('nim',$request->nim)
            ->where('presence_id',$request->id)
            ->count();
    
            if($check > 0)
            {
                DB::table('mst_attendence_history')
                ->where('presence_id',$request->id)
                ->update(['status_presence_id' => $request->status,'updated_at' => date('Y-m-d H:i:s')]);
            }
            else 
            {
                DB::table('mst_attendence_history')
                ->insert([
                    'nim'                   => $request->nim,
                    'presence_id'           => $request->id,
                    'subject_code'          => $request->subject_code,
                    'nidn'                  => $request->nidn,
                    'status_presence_id'    => $request->status,
                    'meeting_to'            => $request->meeting_to,
                    'created_at'            => date('Y-m-d H:i:s'),
                    'updated_at'            => date('Y-m-d H:i:s')
                ]);
            }

            $result = ['success' => true,'message' => 'Berhasil mengupdate absen'];
        }
        catch(QueryException $e)
        {
            $result = ['success' => false,'message' => $e->getPrevious()->getMessage()];
        }

        return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try 
        {
            $id = explode(',',$id);
            M_TeachingSchedule::whereIn('id',$id)->delete();
            $result = ['success' => true,'message' => 'Berhasil menghapus ruangan'];
        }
        catch(QueryException $e)
        {
            $result = ['success' => false,'message' => $e->getPrevious()->getMessage()];
        }

        return response()->json($result);
    }

    /**
     * Show student data and schedule by id
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return json 
     */
    public function show(Request $request)
    {
        $schedule = DB::table('mst_course_schedule as a')
        ->select(
            'a.subject_code',
            'c.name as subject_name',
            'b.name as lecturer_name',
            'a.nidn'
        )
        ->join('mst_lecturer as b','a.nidn','=','b.nidn')
        ->join('mst_subject as c','a.subject_code','=','c.code')
        ->where('a.id',$request->id)
        ->first();

        $college_student = DB::table('mst_khs as a')
        ->select(
            'b.nim','b.name','a.id','a.nilai_uts as uts',
            'a.nilai_uas as uas','a.nilai_tugas as tugas',
            'a.nilai_kehadiran as kehadiran'
        )
        ->join('mst_college_student as b','a.nim','=','b.nim','inner')
        ->where('a.nidn',$schedule->nidn)
        ->where('a.subject_code',$schedule->subject_code)
        ->get();

        $data = [
            'college_student'   => $college_student,
            'schedule'          => $schedule
        ];
            
        return response()->json($data,200);
    }    

    /**
     * Display student attendance
     * 
     */
    public function showAttendence(Request $request)
    {
        $presence = DB::table('mst_presence as a')
        ->select(
            'b.nidn',
            'c.name as subject_name',
            'b.name as lecturer_name',
            'a.subject_code',
            'a.meeting_to',
            'a.discussion_topic as topic'
        )
        ->join('mst_lecturer as b','b.nidn','=','a.nidn')
        ->join('mst_subject as c','c.code','=','a.subject_code')
        ->where('a.id',$request->id)
        ->first();

        $college_student = DB::table('mst_khs as a')
        ->join('mst_college_student as b','a.nim','=','b.nim')
        ->where('a.nidn',$presence->nidn)
        ->where('a.subject_code',$presence->subject_code)
        ->get();

        $data = 
        [
            'data1' => $presence,
            'data2' => $college_student
        ];

        return response()->json($data,200);
    }


    /**
     * Showing presence list data
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return json 
     */
    public function showPresence(Request $request)
    {
        $schedule = DB::table('mst_course_schedule as a')
        ->select(
            'a.subject_code',
            'c.name as subject_name',
            'b.name as lecturer_name',
            'a.nidn'
        )
        ->join('mst_lecturer as b','a.nidn','=','b.nidn')
        ->join('mst_subject as c','a.subject_code','=','c.code')
        ->where('a.id',$request->id)
        ->first();

        $college_student = DB::table('mst_khs as a')
        ->select(
            'b.nim','b.name','a.id','a.nilai_uts as uts',
            'a.nilai_uas as uas','a.nilai_tugas as tugas',
            'a.nilai_kehadiran as kehadiran'
        )
        ->join('mst_college_student as b','a.nim','=','b.nim','inner')
        ->where('a.nidn',$schedule->nidn)
        ->where('a.subject_code',$schedule->subject_code)
        ->get();


        $table  = "<table class='table'>";
        $table .= "<tr>";
        $table .= "<th style='width: 25%;font-weight:bold;text-align:center;'>NIM</th>";
        $table .= "<th style='width: 35%;font-weight:bold;text-align:center;'>Nama Mahasiswa</th>";
        for($i=1;$i<17;$i++)
        {
            $table .= "<th style='font-weight:bold;text-align:center;'>$i</th>";
        }
        $table .= "</tr>";
        
        foreach($college_student as $rows)
        {
            $table .= "<tr>";
            $table .= "<td style='text-align:center;'>" . $rows->nim . "</td>";
            $table .= "<td>" . $rows->name. "</td>";

            for($i = 1;$i<=16;$i++)
            {
                $table .= "<td>".check_presence($rows->nim,$i,$schedule)."</td>";
            }

            $table .= "</tr>";
        }

        $table .= "</table>"; 

        $data = [
            'schedule'      => $schedule,
            'table'         => $table,
            'count_college' => $college_student->count()
        ];
            
        return response()->json($data,200);
    }    

    /**
     * Displaying data for attendance form
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return json
     */
    public function showFormInput(Request $request)
    {
        $schedule = DB::table('mst_course_schedule as a')
        ->select(
            'a.subject_code',
            'c.name as subject_name',
            'b.name as lecturer_name',
            'a.nidn',
            'a.major_code'
        )
        ->join('mst_lecturer as b','a.nidn','=','b.nidn')
        ->join('mst_subject as c','a.subject_code','=','c.code')
        ->where('a.id',$request->id)
        ->first();

        $x = DB::table('mst_presence')
                ->where('subject_code',$schedule->subject_code)
                ->where('nidn',$schedule->nidn)
                ->where('major_code',$schedule->major_code)->count() + 1;

        $data = [
            'schedule'      => $schedule,
            'meeting_to'    => $x 
        ];

        return response()->json($data,200);
    }
}
