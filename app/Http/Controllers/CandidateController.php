<?php

namespace App\Http\Controllers;

use App\User;
use App\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('role:admin');
    }
    public function candidates()
    {
        $candidates = Candidate::with('user')->paginate(5);
        return view('candidates', compact('candidates'));
    }

    public function search(Request $request)
    {
    	if (!$request->has('id') || !strlen($request->id) == 17) {
    		return ['status' => 0, 'message' => 'Invalid ID'];
    	}
    	$user = User::where('nid', $request->id)->first();
    	if($user == null){
    		return ['status' => 0, 'message' => 'Invalid ID'];
    	}else{
    		return ['status' => 1, 'name' => $user->name, 'image' => $user->img_src];
    	}
    }

    public function store(Request $request)
    {
        // return $request->all();
    	$user = User::where('nid', $request->nid)->first();
        $data = $request->all();
        $data['user_id'] = $user->id;
        $editing = $request->filled('edit');

        if ($request->file('mark_img')) {
            $data['mark_img'] = md5('candidate-'.$user->nid).'.jpg';
            $request->file('mark_img')->move(public_path('images'), $data['mark_img']);
        }else{
            if(!$editing){
                return back()->with("danger", "Symbol image cannot be empty");
            }
        }

        unset($data['_token']);
        unset($data['name']);
        unset($data['nid']);

        if(!$editing){
            $flag = Candidate::create($data);
        }else{
            unset($data['edit']);
            $flag = Candidate::where('id', $request->edit)->update($data);
        }
        if($flag)
            return back()->with('success', 'Records Updated');
        else
            return back()->with('danger', 'Unsuccessful');
    }

    public function delete(Candidate $candidate)
    {
        $candidate->delete();
        return back()->with('success', 'Candidate has been removed.');
    }
}
