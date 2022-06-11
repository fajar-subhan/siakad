<?php

namespace App\Http\Controllers;

use App\Models\M_CollegeStudent;
use Illuminate\Http\Request;
use App\Models\M_CourseSchedule;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class CourseScheduleController extends Controller
{
    public function data(Request $request)
    {
        $data = [];

        $data   = M_CourseSchedule::with('hour')
        ->with('subject')
        ->with('room')
        ->with('lecturer')
        ->with('major')
        ->with('semester');

        if(IsRolesUser())
        {
            $major_code = M_CollegeStudent::where('nim',Auth::user()->nim)->first()->major_code;
            $data->where('major_code',$major_code);
        }        

        if(!is_null($request->get('day_filter')))
        {
            $data->where('day',$request->get('day_filter'));
        }

        if(!is_null($request->get('major_filter')))
        {
            $data->where('major_code',$request->get('major_filter'));
        }

        if(!is_null($request->get('subject_filter')))
        {
            $data->where('subject_code',$request->get('subject_filter'));
        }

        if(IsRolesAdmin())
        {
            return DataTables::eloquent($data)
            ->addIndexColumn()
            ->addColumn('roles',function($row)
            {
                return Auth::user()->roles->first()->id;
            })
            ->addColumn('action', function ($row) {
                $action = '
                <button class="btn btn-icon btn-primary me-2 mb-2 btn-hover-scale" data-bs-toggle="modal" data-bs-target="#kt_modal_course_schedule" onclick="eventEdit(' . $row->id . ')">
                <span class="svg-icon svg-icon-muted svg-icon-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"/>
                <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"/>
                </svg>
                </span>
                </button>
                ';
                return $action;
            })
            ->toJson();
        }
        else 
        {
            return DataTables::eloquent($data)
            ->addIndexColumn()
            ->addColumn('roles',function($row)
            {
                return Auth::user()->roles->first()->id;
            })
            ->addColumn('action', function ($row) {
                $action = '';
                return $action;
            })
            ->toJson();
        }
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
        <li class="breadcrumb-item text-dark">Jadwal Kuliah</li>
        <!--end::Item-->';
        $data =
            [
                'title'         => 'Jadwal Kuliah',
                'breadcrumb'    => $breadcrumb
            ];

        return view('course_schedule.view_course_schedule_index', compact('data'));
    }

    public function checkCode(Request $request)
    {
        $result = array('count' => 0);

        $data = M_CourseSchedule::where('code',$request->code_room)->count();

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
            $order = M_CourseSchedule::all()->last();
            
            if(is_null($order))
            {
                $order = 1;
            }
            else 
            {
                $order = $order->order + 1;
            }

            $result = M_CourseSchedule::create([
                'day'            => $request->day_course_schedule,
                'subject_code'   => $request->subject_course_schedule,
                'nidn'           => $request->lecturer_course_schedule,
                'hours_id'       => $request->lecture_hours_schedule,
                'major_code'     => $request->major_course_schedule,
                'room_code'      => $request->room_course_schedule,
                'created_by'     => Auth::user()->id,
                'order'          => $order,
                'active'         => 1
            ]);
    
            $result = ['success' => true,'message' => 'Berhasil menambahkan jadwal kuliah'];
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
        $data = M_CourseSchedule::where('id',$id)->first();
        
        return response()->json($data);
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
            M_CourseSchedule::where('id',$id)
            ->update([
                'day'            => $request->day_course_schedule,
                'subject_code'   => $request->subject_course_schedule,
                'nidn'           => $request->lecturer_course_schedule,
                'hours_id'       => $request->lecture_hours_schedule,
                'major_code'     => $request->major_course_schedule,
                'room_code'      => $request->room_course_schedule,
                'updated_by'     => Auth::user()->id,
                'active'         => $request->status
            ]);

            $result = ['success' => true,'message' => 'Berhasil mengubah jadwal kuliah'];
        }
        catch(QueryException $e)
        {
            $result = ['success' => false,'message' => $e->getPrevious()->getMessage()];
        }

        return response()->json($result);
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
            M_CourseSchedule::whereIn('id',$id)->delete();
            $result = ['success' => true,'message' => 'Berhasil menghapus jadwal kuliah'];
        }
        catch(QueryException $e)
        {
            $result = ['success' => false,'message' => $e->getPrevious()->getMessage()];
        }

        return response()->json($result);
    }
}
