<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_CampusInfo;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;

class CampusInfoController extends Controller
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
        <li class="breadcrumb-item text-muted">Pengaturan</li>
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
        <li class="breadcrumb-item text-dark">Informasi Kampus</li>
        <!--end::Item-->';
        $data =
            [
                'title'         => 'Informasi Kampus',
                'breadcrumb'    => $breadcrumb
            ];

        return view('campus_info.form_campus_info', compact('data'));
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
            $count = M_CampusInfo::select()->count();

            if($count)
            {
                M_CampusInfo::where('id',$request->id)
                ->update([
                    'name_campus'   => $request->name_campus,
                    'email'         => $request->email,
                    'web'           => $request->web,
                    'phone_number'  => $request->phone_number,
                    'fax_number'    => $request->fax_number,
                    'address'       => $request->address,
                    'active'        => $request->status,
                    'updated_by'    => Auth::user()->id
                ]);

                $result = ['success' => true,'message' => 'Berhasil merubah informasi kampus'];
            }
            else 
            {

                M_CampusInfo::create([
                    'name_campus'   => $request->name_campus,
                    'email'         => $request->email,
                    'web'           => $request->web,
                    'phone_number'  => $request->phone_number,
                    'fax_number'    => $request->fax_number,
                    'address'       => $request->address,
                    'active'        => 1,
                    'order'         => 1,
                    'created_by'    => Auth::user()->id,
                ]);

                $result = ['success' => true,'message' => 'Berhasil menambahkan informasi kampus','id' => M_CampusInfo::select('id')->first()->id];
            }

        }
        catch(QueryException $e)
        {
            $result = ['success' => false,'message' => $e->getPrevious()->getMessage()];
        }

        return response()->json($result);
    }

    /**
     * Get data campus information 
     * 
     * @return int $data
     */
    public function show()
    {
        $count = M_CampusInfo::select()->count();
        $data  = [];
        
        if($count)
        {
            $data = M_CampusInfo::select('*')->first();
        }

        return $data;
    }
}
