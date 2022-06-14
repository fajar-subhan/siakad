<?php

namespace App\Http\Controllers;

use App\Models\M_CollegeStudent;
use Illuminate\Http\Request;
use App\Models\M_Krs;
use App\Models\M_Subject;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class KrsController extends Controller
{

    public function data()
    {
        $college_student = M_CollegeStudent::select('major_code')
        ->where('nim',Auth::user()->nim)
        ->first();

        $data   = M_Subject::query()
        ->where('active',1)
        ->where('major_code',$college_student->major_code)
        ->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $action = '
                <button class="btn btn-sm btn-success me-2 mb-2 btn-hover-scale" onclick="eventAdd(\'' . $row->code .'\')">
                <span class="svg-icon svg-icon-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path opacity="0.3" d="M18.041 22.041C18.5932 22.041 19.041 21.5932 19.041 21.041C19.041 20.4887 18.5932 20.041 18.041 20.041C17.4887 20.041 17.041 20.4887 17.041 21.041C17.041 21.5932 17.4887 22.041 18.041 22.041Z" fill="black"/>
                <path opacity="0.3" d="M6.04095 22.041C6.59324 22.041 7.04095 21.5932 7.04095 21.041C7.04095 20.4887 6.59324 20.041 6.04095 20.041C5.48867 20.041 5.04095 20.4887 5.04095 21.041C5.04095 21.5932 5.48867 22.041 6.04095 22.041Z" fill="black"/>
                <path opacity="0.3" d="M7.04095 16.041L19.1409 15.1409C19.7409 15.1409 20.141 14.7409 20.341 14.1409L21.7409 8.34094C21.9409 7.64094 21.4409 7.04095 20.7409 7.04095H5.44095L7.04095 16.041Z" fill="black"/>
                <path d="M19.041 20.041H5.04096C4.74096 20.041 4.34095 19.841 4.14095 19.541C3.94095 19.241 3.94095 18.841 4.14095 18.541L6.04096 14.841L4.14095 4.64095L2.54096 3.84096C2.04096 3.64096 1.84095 3.04097 2.14095 2.54097C2.34095 2.04097 2.94096 1.84095 3.44096 2.14095L5.44096 3.14095C5.74096 3.24095 5.94096 3.54096 5.94096 3.84096L7.94096 14.841C7.94096 15.041 7.94095 15.241 7.84095 15.441L6.54096 18.041H19.041C19.641 18.041 20.041 18.441 20.041 19.041C20.041 19.641 19.641 20.041 19.041 20.041Z" fill="black"/>
                </svg></span>
                Ambil
                </button>
                ';
                return $action;
            })
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
        <li class="breadcrumb-item text-muted">Master Data</li>
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
        <li class="breadcrumb-item text-dark">KRS</li>
        <!--end::Item-->';
        $data =
            [
                'title'         => 'KRS',
                'breadcrumb'    => $breadcrumb
            ];

        return view('krs.view_krs_index', compact('data'));
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
            $order = M_Krs::all()->last();
            
            if(is_null($order))
            {
                $order = 1;
            }
            else 
            {
                $order = $order->order + 1;
            }

            $major_code = DB::table('mst_college_student')
            ->select('major_code')
            ->where('nim',Auth::user()->nim)
            ->first()->major_code;

            $result = M_Krs::create([
                'nim'            => Auth::user()->nim,
                'subject_code'   => $request->subject_code,
                'academic_code'  => GetCodeAcademicYears(),
                'semester_id'    => CheckSemester(),
                'nidn'           => GetNidnLecturer($request->subject_code,$major_code),
                'order' => $order,
            ]);
    
            $result = ['success' => true,'message' => 'Berhasil menambahkan krs'];
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
            M_Krs::whereIn('id',$id)->delete();
            $result = ['success' => true,'message' => 'Berhasil menghapus krs'];
        }
        catch(QueryException $e)
        {
            $result = ['success' => false,'message' => $e->getPrevious()->getMessage()];
        }

        return response()->json($result);
    }

    /**
     * Displays the selected krs data
     * 
     * @return string $result
     */
    public function showKrs()
    {
        $icon = '
        <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen027.svg-->
        <span class="svg-icon svg-icon-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
        <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"/>
        <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"/>
        <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"/>
        </svg></span>
        <!--end::Svg Icon-->
        ';

        $data = M_Krs::with('subject')
        ->where('nim',Auth::user()->nim)
        ->get()->toArray();

        $result = '
            <table class="table table-striped table-row-bordered align-middle table-hover border fs-6 gy-5 dataTable no-footer">
            <thead>
                <tr>
                    <th class="text-center" style="font-weight: 600;">Kode MK</th>
                    <th class="text-center" style="font-weight: 600;">Nama MK</th>
                    <th class="text-center" style="font-weight: 600;">SKS</th>
                    <th class="text-center" style="font-weight: 600;">
                        <span class="svg-icon svg-icon-dark svg-icon-2hx"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <path opacity="0.3"
                            d="M22.1 11.5V12.6C22.1 13.2 21.7 13.6 21.2 13.7L19.9 13.9C19.7 14.7 19.4 15.5 18.9 16.2L19.7 17.2999C20 17.6999 20 18.3999 19.6 18.7999L18.8 19.6C18.4 20 17.8 20 17.3 19.7L16.2 18.9C15.5 19.3 14.7 19.7 13.9 19.9L13.7 21.2C13.6 21.7 13.1 22.1 12.6 22.1H11.5C10.9 22.1 10.5 21.7 10.4 21.2L10.2 19.9C9.4 19.7 8.6 19.4 7.9 18.9L6.8 19.7C6.4 20 5.7 20 5.3 19.6L4.5 18.7999C4.1 18.3999 4.1 17.7999 4.4 17.2999L5.2 16.2C4.8 15.5 4.4 14.7 4.2 13.9L2.9 13.7C2.4 13.6 2 13.1 2 12.6V11.5C2 10.9 2.4 10.5 2.9 10.4L4.2 10.2C4.4 9.39995 4.7 8.60002 5.2 7.90002L4.4 6.79993C4.1 6.39993 4.1 5.69993 4.5 5.29993L5.3 4.5C5.7 4.1 6.3 4.10002 6.8 4.40002L7.9 5.19995C8.6 4.79995 9.4 4.39995 10.2 4.19995L10.4 2.90002C10.5 2.40002 11 2 11.5 2H12.6C13.2 2 13.6 2.40002 13.7 2.90002L13.9 4.19995C14.7 4.39995 15.5 4.69995 16.2 5.19995L17.3 4.40002C17.7 4.10002 18.4 4.1 18.8 4.5L19.6 5.29993C20 5.69993 20 6.29993 19.7 6.79993L18.9 7.90002C19.3 8.60002 19.7 9.39995 19.9 10.2L21.2 10.4C21.7 10.5 22.1 11 22.1 11.5ZM12.1 8.59998C10.2 8.59998 8.6 10.2 8.6 12.1C8.6 14 10.2 15.6 12.1 15.6C14 15.6 15.6 14 15.6 12.1C15.6 10.2 14 8.59998 12.1 8.59998Z"
                            fill="black" />
                        <path
                            d="M17.1 12.1C17.1 14.9 14.9 17.1 12.1 17.1C9.30001 17.1 7.10001 14.9 7.10001 12.1C7.10001 9.29998 9.30001 7.09998 12.1 7.09998C14.9 7.09998 17.1 9.29998 17.1 12.1ZM12.1 10.1C11 10.1 10.1 11 10.1 12.1C10.1 13.2 11 14.1 12.1 14.1C13.2 14.1 14.1 13.2 14.1 12.1C14.1 11 13.2 10.1 12.1 10.1Z"
                                    fill="black" />
                            </svg>
                        </span>
                    </th>
                </tr>
            </thead>
            <tbody>
            ';

        $icon = '
        <span class="svg-icon svg-icon svg-icon-danger svg-icon-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM18 12C18 11.4 17.6 11 17 11H7C6.4 11 6 11.4 6 12C6 12.6 6.4 13 7 13H17C17.6 13 18 12.6 18 12Z" fill="black"/>
            </svg>
        </span>
        ';

        foreach($data as $rows) : 
            $subject = $rows['subject']['name'] ?? $icon;
            $sks     = $rows['subject']['sks'] ?? $icon;
            $result .= "
            <tr>
                <td class='text-center'>{$rows['subject_code']}</td>
                <td class='text-center'>$subject</td>
                <td class='text-center'>{$sks}</td>
                <td class='text-center'>
                <button class='btn btn-sm btn-danger me-2 mb-2 btn-hover-scale' onclick='eventDelete({$rows['id']})'>
                $icon Hapus
                </button>
                </td>
            </tr>
            ";
        endforeach;

        $result .= '
            <tr>
                <td colspan="4" class="text-center" style="background-color:grey ">
                    <a href="krs/selesai" class="btn btn-info btn-sm">Selesai mengambil krs</a>
                </td>
            </tr>
            </tbody>
            </table>
        ';

        return $result;
    }

    /**
     * Krs has been successfully selected 
     * and now is the time to enter the data into KHS
     * 
     */
    public function krsFinished()
    {
        $nim = Auth::user()->nim;
        $krs = DB::table('mst_krs')->where('nim',$nim)->get();

        foreach($krs as $rows) :
            $khs = DB::table('mst_khs')
            ->insert([
                'subject_code'      => $rows->subject_code,
                'nim'               => $rows->nim,
                'nilai_uts'         => 0,
                'nilai_uas'         => 0,
                'nilai_tugas'       => 0,
                'nilai_kehadiran'   => 0, 
                'semester_id'       => $rows->semester_id,
                'nidn'              => $rows->nidn
            ]);
        endforeach;

        if($khs)
        {
            return redirect('khs');
        }
        else 
        {
            return false;
        }
    }
}
