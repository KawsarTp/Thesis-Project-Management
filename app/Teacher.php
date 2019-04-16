<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use Notifiable;
    protected $guard = 'teacher';
    
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
    public function projects(){
        return $this->hasMany(Project::class);
    }
    public function student(){
        return $this->hasMany(Student::class);
    }
    public function scopeActive($query){
        return $query->where('active',1)->where('id',\Auth::guard('teacher')->user()->id);
    }

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }
}
