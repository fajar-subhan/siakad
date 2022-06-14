<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void|middleware
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Displays the login form
     * 
     * @return text|html
     */
    public function index(Request $request)
    {
        $cookie = 
        [
            'email'     => $request->cookie('email'),
            'password'  => $request->cookie('password')
        ];

        return view('auth.login',['cookie' => $cookie]);
    }

    /**
     * Proses Login 
     * 
     * @return json $result
     */
    public function login(Request $request)
    {
        try 
        {
            $result    = [];
    
            $validator = Validator::make(
                $request->all(),
                [
                    'email'     => ['required'],
                    'password'  => ['required']
                ],
                [
                    'required'  => ':Attribute wajib di isi',
                    'email'     => 'Format email tidak valid'
                ]
            );
            
            if($validator->fails())
            {
                $result = ['status' => false,'message' => 'Email atau password tidak sessuai'];
            }
            else 
            {
                $credential = $request->only(['email','password']);

                $user = User::where('email',$request->email)->first();

                if(is_null($user))
                {
                    $result = ['status' => false,'message' => 'Email atau password tidak sessuai'];
                }

                if($user->user_active == 0)
                {
                    $result = ['status' => false,'message' => 'Akun anda saat ini tidak aktif,silahkan hubungi admin'];
                }
                else 
                {
                    if(Auth::attempt($credential))
                    {
                        $request->session()->regenerate();
                        User::where('id',1)->update(['user_login' => 1]);
        
                        /** Write Log Login */
                        EventLoger('LoginController','Login','User Login To Apps',Auth::user()->id);
        
                        $result = ['status' => true,'message' => []];
                    }
                    else 
                    {
                        $result = ['status' => false,'message' => 'Email atau password tidak sessuai'];
                    }
                }
            }
        }
        catch(QueryException $e)
        {
            $result = ['status' => false,'message' => $e->getPrevious()->getMessage()];
        }

        return response()->json($result,200)
        ->withCookie(cookie('email',$request->get('email')))
        ->withCookie(cookie('password',$request->get('password')));
    }

    /**
     * Logout users
     * 
     * @return redirect 
     */
    public function logout(Request $request)
    {
        /** Write Log Logout */
        EventLoger('LoginController','Logout','User Logout To Apps',Auth::user()->id);
    
        User::where('id',Auth::user()->id)->update(['user_login' => 0]);

        Auth::guard()->logout();
    
        $request->session()->invalidate();
        
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
