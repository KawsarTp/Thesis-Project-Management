<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded=[];
    public function student(){
    	return $this->belongsTo(Student::class);
    }
    public function teachers(){
    	return $this->belongsTo(Teacher::class);
    }

    public function category(){
    	return $this->belongsTo(Category::class);
    }
}
