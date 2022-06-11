<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class ResetController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void|middleware
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Displays the reset form by email
     * 
     */
    public function showLinkRequestForm()
    {
        return view('auth.password.reset');
    }

    public function checkUser(Request $request)
    {
        $result = ['status' => false,'count' => 0];

        $check = DB::table('users')
        ->where('email',$request->email)
        ->count();
        
        if($check > 0)
        {
            $result = ['status' => true,'count' => $check];
        }

        return response()->json($result,200);
    }

    public function prosesUpdate(Request $request)
    {
        try 
        {
            DB::table('users')->where('email',$request->email)
            ->update([
                'password'  => bcrypt($request->password),
                'updated_at'=> date('Y-m-d H:i:s')
            ]);

            $result = ['success' => true,'message' => 'Berhasil mereset password'];
        }
        catch(QueryException $e)
        {
            $result = ['success' => false,'message' => $e->getPrevious()->getMessage()];
        }

        return response()->json($result,200);
    }
}
