<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['birthday'];

    public function candidacy()
    {
        return $this->hasOne('App\Candidate');
    }

    public function voted()
    {
        return $this->belongsToMany('App\Candidate')->withPivot(['type']);
    }

    public function getGenderAttribute($value)
    {
        if ($value == 0) {
            return 'Male';
        }elseif ($value == 1) {
            return 'Female';
        }else{
            return 'Other';
        }
    }

    public function getImgAttribute()
    {
        return asset('/images/'.$this->image.'.jpg');
    }

    public function getMaritalAttribute($value)
    {
        return $value ? 'Married' : 'Unmarried';
    }

    public function hasVoted($type)
    {
        return (bool) $this->voted()->wherePivot('type', $type)->count();
    }
}
