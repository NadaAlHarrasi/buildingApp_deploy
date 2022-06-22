<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    //
    public function login(){
        
        $user = User::first();

        Auth::login($user);

        return redirect('/services');
    }
    public function CustomLogin($id){
        // if the user not there(الطريقة 1)
        // $user = User::first();
        // if(! $user){
        //     Auth::logout();
        //     return redirect('login');
        // }
        $user = User::find($id);
        if(! $user){
            Auth::logout();
            return redirect('login');
        }

        // if the user not there(الطريقة 2)
        // $user = User::findOrFail($id);

        Auth::login($user);

        return redirect('/services');
    }
}
