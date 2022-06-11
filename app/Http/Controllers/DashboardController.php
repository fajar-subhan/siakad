<?php

namespace App\Http\Controllers;

use App\Models\M_Lecturer;
use App\Models\M_CollegeStudent;
use App\Models\M_Faculty;
use App\Models\M_Major;
use App\Models\M_MenuMaster;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isRolesAdmin())
        {
            $data =
            [
                'tot_mhs'       => (int)M_CollegeStudent::get()->count(),
                'tot_lecturer'  => (int)M_Lecturer::get()->count(),
                'tot_faculty'   => (int)M_Faculty::get()->count(),
                'tot_major'     => (int)M_Major::get()->count(),
                'title'         => 'Dashboard',
                'breadcrumb'    => ''
            ];
    
            return view('dashboard',compact('data'));
        }
        else 
        {
            $data = 
            [
                'title'         => 'Dashboard',
                'breadcrumb'    => ''
            ];

            return view('dashboard')->with('data',$data);
        }
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Retrieve active and inactive student status data
     * 
     * @return array
     */
    public function StatusCollegeStudent()
    {
        $result = array('active' => 0,'inactive' => 0);

        $active     = M_CollegeStudent::where('active',1)->count();
        $inactive   = M_CollegeStudent::where('active',0)->count();

        if($active > 0 || $inactive > 0)
        {
            $result = array('active' => $active,'inactive' => $inactive);
        }
        
        return response()->json($result,200);
    }

    /**
     * Retrieve active and inactive lecturer status data
     * 
     * @return array
     */
    public function StatusLecturer()
    {
        $result = array('active' => 0,'inactive' => 0);

        $active     = M_Lecturer::where('active',1)->count();
        $inactive   = M_Lecturer::where('active',0)->count();

        if($active > 0 || $inactive > 0)
        {
            $result = array('active' => $active,'inactive' => $inactive);
        }
        
        return response()->json($result,200);
    }
}
