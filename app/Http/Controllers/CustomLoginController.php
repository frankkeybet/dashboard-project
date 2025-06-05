<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Password;

class CustomLoginController extends Controller
{
    public function customShowLoginForm()
    {
        return view('custom-login');
    }

    public function customShowLinkForm()
    {
        return view('custom-show-link-form');
    }
    public function customReset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

       $status = Password::sendResetLink( $request->only('email'));

        if($status === Password::RESET_LINK_SENT) {
            return back()->with(['status'=>__($status)]);
        } else {
            return back()->withErrors(['email' => __($status)]);
        }
    }

     public function customLogin(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
            
        ]);

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

