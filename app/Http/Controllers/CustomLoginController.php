<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Ensure you import the User model if needed
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

class CustomLoginController extends Controller
{
    public function customShowLoginForm()
    {
        return view('custom-login');
    }

     public function customLogin(Request $request){

        // $user = User::find(52);
        // Auth::login($user, true);
        if(Auth::attempt(['email'=> $request->email, 'password' => $request->password],$request->remember)) {
            
            return redirect()->route('admin.index');
        }
        return redirect()->route('custom.login');

    }

     public function customLogout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('custom.login');
    }
}

