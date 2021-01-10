<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ],
        )->validate();
    }

    public function index()
    {
        if(!empty(Auth::user())){
            $id = Auth::user()->id;
            $user = DB::table('users')->where('id', '=', $id)->select(['name', 'email', 'admin', 'created_at'])->first();
            return view('profile')->with('user', $user);
        }
        return redirect('login')->withErrors(['Erreur' => 'Merci de bien voulour vous connectez']);
        
    }

    public function changePassword(Request $request)
    {
        $data = $request->all();
        $validate = $this->validator($data);
        if(!empty(Auth::user())){
            $id = Auth::user()->id;
            $user = DB::table('users')->where('id', '=', $id)
            ->update(
                [
                'password' => Hash::make($request->input('password')), 
                'updated_at' => now()
                ]
            );
            return redirect('profile')->with(['success' => 'Votre mot de passe à été modifié']);
        }
        return redirect('login')->withErrors(['Erreur' => 'Merci de bien voulour vous connectez']);
    }
}
