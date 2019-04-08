<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request) {
        if(Auth::attempt(['username' => $request['username'], 'password' => $request['password']])) {
            switch (Auth::user()->role_id) {
                case 1:
                    return redirect('/home');
                    break;
                case 2:
                    return redirect('/client');
                    break;
                case 3:
                    return redirect('/home');
                    break;
            }
            /*if(Auth::user()->role_id==2)
            return redirect()->intended('/home');*/
        }
        return redirect()->back()->with("echec_connexion","Nom d'utilisateur ou mot de passe incorrect(s)");
    }
}
