<?php

namespace App;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Foundation\Auth\User as Model;
//use Laratrust\Traits\LaratrustUserTrait;
//use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
//class User extends Model 
{
    //use LaratrustUserTrait;
    use Notifiable;

    // *
    //  * The attributes that are mass assignable.
    //  *
    //  * @var array
     
    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];

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

    public function getImageAttribute($image)
    {
        if (!$image) {
            $image = 'male.jpg';
        }
        return asset("images/$image");
    }

    public function hasVoted($type)
    {
        return (bool) $this->voted()->wherePivot('type', $type)->count();
    }

    public function canVote($type)
    {
        $time = ((cache('est') < now()) && (cache('eet') > now()));
        return !$this->hasVoted($type) && $time && $this->active;
    }
}
