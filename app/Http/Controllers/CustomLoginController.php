<?php

namespace App\Http\Controllers;
use Filament\Facades\Filament;
use Illuminate\Http\Request;

class CustomLoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function authenticate(Request $request){
        dd($request->all());
        $request->validate([
             'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentiels=$request->only('email', 'password');

        if(auth()->attempt($credentiels)){
            $request->session()->regenerate();
            $user=auth()->user();

            filament::auth()->login($user);

            if($user->role=='admin'){
            return redirect(filament::getpanel('admin')->getUrl());
        }
         if($user->role=='user'){
            return redirect(filament::getpanel('user')->getUrl());
        }

        }
        return back()->with(['error']);
    }
}
