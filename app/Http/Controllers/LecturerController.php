<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Lecturer;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class LecturerController extends Controller
{
    public function data()
    {
        $data   = M_Lecturer::query()->get();

        return DataTables::of($data)
            ->addColumn('showing',function($row)
            {
                $showing = '
                <button class="btn btn-icon btn-info me-2 mb-2 btn-hover-scale" data-bs-toggle="modal" data-bs-target="#kt_modal_lecturer" onclick="eventShowing(' . $row->id . ')">
                <!--begin::Svg Icon | path: assets/media/icons/duotune/files/fil024.svg-->
                <span class="svg-icon  svg-icon-muted svg-icon-2x"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path opacity="0.3" d="M14 2H6C4.89543 2 4 2.89543 4 4V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V8L14 2Z" fill="black"/>
                <path d="M20 8L14 2V6C14 7.10457 14.8954 8 16 8H20Z" fill="black"/>
                <rect x="13.6993" y="13.6656" width="4.42828" height="1.73089" rx="0.865447" transform="rotate(45 13.6993 13.6656)" fill="black"/>
                <path d="M15 12C15 14.2 13.2 16 11 16C8.8 16 7 14.2 7 12C7 9.8 8.8 8 11 8C13.2 8 15 9.8 15 12ZM11 9.6C9.68 9.6 8.6 10.68 8.6 12C8.6 13.32 9.68 14.4 11 14.4C12.32 14.4 13.4 13.32 13.4 12C13.4 10.68 12.32 9.6 11 9.6Z" fill="black"/>
                </svg></span>
                <!--end::Svg Icon-->
                </button>
                ';
                
                return $showing;
            })
            ->addColumn('action', function ($row) {
                $action = '
                <button class="btn btn-icon btn-primary me-2 mb-2 btn-hover-scale" data-bs-toggle="modal" data-bs-target="#kt_modal_lecturer" onclick="eventEdit(' . $row->id . ')">
                <span class="svg-icon svg-icon-muted svg-icon-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"/>
                <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"/>
                </svg>
                </span>
                </button>
                ';
                return $action;
            })
            ->rawColumns(['showing','action'])
            ->addIndexColumn()
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
        <li class="breadcrumb-item text-dark">Dosen</li>
        <!--end::Item-->';
        $data =
        [
            'title'         => 'Dosen',
            'breadcrumb'    => $breadcrumb
        ];

        return view('lecturer.view_lecturer_index', compact('data'));
    }

    public function checkCode(Request $request)
    {
        $result = array('count' => 0);

        $data = M_Lecturer::where('nidn',$request->nidn)->count();

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
            $order = M_Lecturer::all()->last();
            
            if(is_null($order))
            {
                $order = 1;
            }
            else 
            {
                $order = $order->order + 1;
            }

            $result = M_Lecturer::create([
                'nidn'          => $request->get('nidn'),
                'name'          => $request->get('name'),
                'email'         => $request->input('email'),
                'faculty_code'  => $request->faculty,
                'number_phone'  => $request->nohp,
                'created_by'    => Auth::user()->id,
                'order' => $order,
                'active'=> 1
            ]);

            if($result)
            {
                $lecturer = User::create([
                    'name'              => $request->get('name'),
                    'email'             => $request->input('email'),
                    'password'          => bcrypt($request->get('nidn')),
                    'nidn'              => $request->get('nidn'),
                    'user_active'       => 1,
                    'user_order'        => 1,
                    'user_created_by'   => Auth::user()->id
                ]);

                $lecturer->assignRole('Dosen');

                $result = ['success' => true,'message' => 'Berhasil menambahkan dosen'];
            }
    
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
        $lecturer = M_Lecturer::where('id',$id)->first();
        
        return response()->json($lecturer);
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
            $update = M_Lecturer::where('id',$id)
            ->update([
                'name'          => $request->name,
                'email'         => $request->email,
                'faculty_code'  => $request->faculty,
                'number_phone'  => $request->nohp,
                'active'        => $request->status,
                'updated_by'    => Auth::user()->id
            ]);

            if($update)
            {
                $update_user = User::where('nidn',$request->nidn)
                ->update([
                    'name'              => $request->name,
                    'email'             => $request->email,
                    'user_active'       => $request->status,
                    'user_updated_by'   => Auth::user()->id
                ]);
                if($update_user)
                {
                    $result = ['success' => true,'message' => 'Berhasil mengubah dosen'];
                }
            }
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

            $data = M_Lecturer::select('nidn')
            ->whereIn('id',$id)->get()->toArray();

            foreach($data as $rows)
            {
                $user = User::select('id')
                ->where('nidn',$rows['nidn'])
                ->first();

                $has_roles = DB::table('model_has_roles')
                ->where('model_id',$user->id)
                ->delete();
                
                if($has_roles)
                {
                    $user_delete = User::where('nidn',$rows['nidn'])
                    ->delete();

                    if($user_delete)
                    {
                        $lecturer = M_Lecturer::where('nidn',$rows['nidn'])
                        ->delete();

                        if($lecturer)
                        {
                            $result = ['success' => true,'message' => 'Berhasil menghapus dosen'];
                        }
                    }
                }
            }
        }
        catch(QueryException $e)
        {
            $result = ['success' => false,'message' => $e->getPrevious()->getMessage()];
        }

        return response()->json($result);
    }
}
