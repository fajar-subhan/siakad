<?php

namespace App\Http\Controllers;

use App\Models\M_CollegeStudent;
use App\Models\M_Lecturer;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    
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
        <li class="breadcrumb-item text-dark">Profile</li>
        <!--end::Item-->';
        $data =
            [
                'title'         => 'Profile',
                'breadcrumb'    => $breadcrumb
            ];

        return view('profile.view_profile_index', compact('data'));
    }

    public function update(Request $request)
    {
        try 
        {
            if(!is_null($request->password) && !is_null($request->confirmPass))
            {
                $data = [
                    'name'      => $request->name,
                    'email'     => $request->email,
                    'password'  => bcrypt($request->confirmPass)
                ];
            }
            else 
            {
                $data = [
                    'name'      => $request->name,
                    'email'     => $request->email,
                ];
            }
            
            $profile = User::where('id',$request->id)
            ->update($data);
            
            if($profile)
            {
                $check_college_student = M_CollegeStudent::where('nim',Auth::user()->nim)->count();
                
                if($check_college_student > 0)
                {
                    M_CollegeStudent::where('nim',Auth::user()->nim)
                    ->update([
                        'name'  => $request->name,
                        'email' => $request->email
                    ]);
                }
                
                $check_lecturer        = M_Lecturer::where('nidn',Auth::user()->nidn)->count();
                
                if($check_lecturer > 0)
                {
                    M_Lecturer::where('nidn',Auth::user()->nidn)
                    ->update([
                        'name'  => $request->name,
                        'email' => $request->email
                    ]);
                }

            }

            $result = ['success' => true,'message' => 'Berhasil mengubah profile ' . $request->name];
        }
        catch(QueryException $e)
        {
            $result = ['success' => false,'message' => $e->getPrevious()->getMessage()];
        }

        return response()->json($result);
    }
}
