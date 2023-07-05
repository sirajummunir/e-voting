<?php

namespace App\Http\Controllers\Auth;

use Cache;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
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
        $this->middleware('guest');
    }

     public function reset()
    {
        return view('auth.passwords.reset');
    }

    public function sendReset(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email'
        ]);
        if (User::where('email', $request->email)->count() == 0) {
            return back()->with('danger', 'The email you entered dosen\'t exist in our database.');
        }
        $code = rand(100000, 999999);
        \Log::info('Password reset code for '.$request->email. ' is '. $code);
        Cache::put(md5($request->email), $code, 5);
        return redirect(route('password.resetCode'))->with('success', 'A password reset code has been sent to your inbox.');
    }

    public function code()
    {
        return view('auth.passwords.resetCode');
    }

    public function resetCode(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'code'  => 'required',
            'password' => 'required|min:6|confirmed'
        ]);
        $code = Cache::get(md5($request->email));
        if ($code == null) {
            return back()->with('danger', 'No Reset code exists for this eamil.');
        }
        if ($code != $request->code) {
            return back()->with('danger', 'The code didn\'t match.');
        }else{
            $user = User::where('email', $request->email)->first();
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect(route('login'))->with('success', 'Your password has been reset. Please login.');
        }
    }
}
