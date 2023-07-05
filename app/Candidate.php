<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
	protected $fillable = ['user_id', 'mark_name', 'mark_img', 'income', 'place', 'type'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function getMarkImageAttribute()
    {
    	return asset('images/'.$this->mark_img);
    }

    public function votes()
    {
    	return $this->belongsToMany('App\User')->withPivot(['type']);
    }
}
