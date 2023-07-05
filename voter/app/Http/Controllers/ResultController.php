<?php

namespace App\Http\Controllers;

use App\Candidate;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class ResultController extends Controller
{
	public function __construct()
	{
		$this->middleware('role:admin');
	}
    public function show()
    {
    	$board = ['chairman' => [], 'member' => [], 'mayor' => []];
    	$all = Candidate::with('votes')->get();
    	foreach ($all as $one) {
    		$one->total = count($one->votes);
    		$board[$one->type][] = $one;
    	}
    	foreach ($board as $type => $value) {
    		$board[$type] = Collection::make($value)->sortBy('total', SORT_REGULAR, true)->all();
    	}
    	return view('results', compact('board'));
    }
}
