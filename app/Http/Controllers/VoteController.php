<?php

namespace App\Http\Controllers;

use Auth;
use App\Candidate;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    //
    public function __construct()
	{
		$this->middleware('auth');
	}

    public function vote()
    {
    	$user = Auth::user();
    	$all = Candidate::where('place', $user->permanent_upazilla)->orWhere('place', $user->permanent_division)->with('user')->get();
        $candidates = ['chairman' => [], 'member' => [], 'mayor' => []];
        foreach ($all as $user) {
            $candidates[$user->type][] = $user;
        }
    	return view('vote', compact('candidates'));
    }

    public function voteAction(Candidate $candidate)
    {
        $user = Auth::user();
        if(!$user->hasVoted($candidate->type)){
            $user->voted()->attach($candidate->id, ['type' => $candidate->type]);
            return back()->with('success', 'Your vote has been counted.');
        }else{
            return back()->with('danger', 'You cannot vote more than once.');
        }
    }
}
