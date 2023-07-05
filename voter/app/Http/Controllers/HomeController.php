<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Candidate;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function profile($nid = false)
    {
        if($nid == false){
            $user = Auth::user();
        }else{
            $user = User::where('nid', $nid)->first();
        }
        if ($user == null) {
            abort(404);
        }
        return view('profile', compact('user'));
    }

    public function voters()
    {
        $users = User::paginate(10);
        return view('voters', compact('users'));
    }

    public function regCode()
    {
        return view('regCode');
    }
}
