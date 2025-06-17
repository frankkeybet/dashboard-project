<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;



class CustomRegistrationController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }
    
    
    public function customRegister(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ]);

      $inputs = $request->only('firstname', 'lastname', 'email', 'password', );

        $user = User::create($inputs);

        Auth::login($user);
       

        return redirect()->route('admin.posts.index');
    }
}
