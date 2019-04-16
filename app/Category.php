<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $guarded = [];
    public function teacher()
    {
        return $this->belongsToMany(Teacher::class);
    }

    public function project(){
    	return $this->hasMany(Project::class);
    }
}
