<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Candidate;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // //
    // *
    //  * Show the application dashboard.
    //  *
    //  * @return \Illuminate\Http\Response
     
    // public function index()
    // {
    //     return view('home');
    // }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    // 
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
        $users = User::where('active', true)->paginate(10);
        $maleCount = User::where('gender', 0)->count();
        $femaleCount = User::where('gender', 1)->count();
        return view('voters', compact('users', 'maleCount', 'femaleCount'));
    }

    public function requests()
    {
        $users = User::where('active', false)->paginate(10);
        return view('requests', compact('users'));
    }

    public function judgeRequest(User $user, $verdict)
    {
        if ($verdict == 'accept') {
            $user->active = true;
            $user->save();
            $msg = "User has been verified.";
        }else{
            $user->delete();
            $msg = "Voter's request has been denied.";
        }
        return back()->with('success', $msg);
    }

    public function regCode()
    {
        return view('regCode');
    }

    public function time(Request $request)
    {
        if($request->isMethod('post')){
            if ($request->has('end_time') && $request->has('start_time')) {
                cache()->forever('eet', Carbon::parse($request->end_time)->endOfDay());
                cache()->forever('est', Carbon::parse($request->start_time)->startOfDay());
            }
        }
        return view('time');
    }

    public function search(Request $request)
    {
        $query = User::where('active', true);
        if($request->nid[0] >= '1' && $request->nid[0] <= '9'){
            $query->where('nid', 'like', $request->nid.'%');
        }else{
            $query->where('permanent_district', 'like', $request->nid.'%');
            // $query->orWhere('present_district', 'like', $request->nid.'%');
        }
        $users = $query->paginate(20);
        return view('search', compact('users'));
    }

    public function deleteUser(User $user)
    {
        $user->delete();
        return back()->with('success', 'User has been deleted.');
    }

    public function about()
    {
        return view('about');
    }
}
