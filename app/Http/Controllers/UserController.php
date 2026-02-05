<?php

namespace App\Http\Controllers;

use App\Http\Requests\registerRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\ViewException;

class UserController extends Controller
{
    //

    public function register(registerRequest $request)
    {
        User::create($request->validated());
        return to_route('loginform');
    }

    public function loginform()
    {
        return view('login');
    }

    public function registerform()
    {
        return view('register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|string|email',
            'password'=>'required|string'
        ]);
        if (!Auth::attempt($request->only('email','password'))) {
            # code...
            return to_route('loginform')->with('error','invalid credentials');
        }else{
            return to_route('Produit.index');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout(); 
        // Invalider la session 
        $request->session()->invalidate(); 
        // Régénérer le token CSRF 
        $request->session()->regenerateToken(); 
        return to_route('login'); 
        // ou vers la page de login
    }
}
