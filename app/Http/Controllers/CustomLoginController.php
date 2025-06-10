<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\ResetsPasswords;

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
    public function customShowResetForm(Request $request, $token)
    {

       $email = $request->query('email');
        return view('custom-password-reset', ['token' => $token, 'email' => $email]);
    }

    public function customPasswordUpdate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'token' => 'required',
        ]);

       Password::reset($request->only('email', 'password', 'password_confirmation', 'token'), function (User $user, $password) {
            $user->forceFill([
                'password' => bcrypt($password),
            ])->setRememberToken(Str::random(40));

            $user->save();

        });

        return redirect()->route('custom.login')->with('status', __('Your password has been reset!'));
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

