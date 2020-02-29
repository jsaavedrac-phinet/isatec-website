<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/welcome';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm(){
        return view('admin.login');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function username(){
        return 'user';
    }

    public function login(Request $request){
        $credentials = $request->only('user', 'password');

        if (Auth::attempt($credentials)) {
        	return response()->json(["rpta"=>"1","msje"=>"LOGEADO"]);
        }else{
        	return response()->json(["rpta"=> "2","credentials"=>$credentials]);
        }
    }
}
