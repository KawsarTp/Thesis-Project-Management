<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Hootlex\Friendships\Traits\Friendable;

class Student extends Authenticatable
{
    use Friendable;
    protected $guard = 'student';

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
    public function project(){
        return $this->hasOne(Project::class);
    }
    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }

    public function friendships()
    {
        return $this->hasMany(Friendship::class,'sender_id');
    }

    
    
}
