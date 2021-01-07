<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{


    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('login');
    }





    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $emailoruser = $request->input('email');
        
        if(filter_var($emailoruser, FILTER_VALIDATE_EMAIL)) {
            $credentials = $request->only('email', 'password');
       }
       else 
       {
           $email = DB::table('users')->select(['email'])->where('name', '=', $emailoruser)->first();
           $credentials = ['email' => $email->email, 'password' => $request->input('password')];
       }
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('home');
        }

        return back()->withErrors([
            'email' => 'Les informations d\'identification fournies ne correspondent pas à nos enregistrements.',
            'password' => 'Le mot de passe ne semble pas correspondre !',
        ]);
    }
}