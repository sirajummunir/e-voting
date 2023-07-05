<?php

namespace App\Http\Controllers;

use App\User;
use App\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:admin');
    }
    public function candidates()
    {
        $candidates = Candidate::with('user')->paginate(5);
        return view('candidates', compact('candidates'));
    }

    public function search(Request $request)
    {
    	if (!$request->has('id') || !strlen($request->id) == 14) {
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
    	$user = User::where('nid', $request->nid)->first();
        $data = $request->all();
        $data['user_id'] = $user->id;
        $data['mark_img'] = 'male';
        unset($data['_token']);
        unset($data['name']);
        unset($data['nid']);

        if(!$request->has('edit')){
            Candidate::create($data);
        }else{
            unset($data['edit']);
            $s = Candidate::where('id', $request->edit)->update($data);
        }
        return back()->with('success', 'Records Updated');
    }
}
