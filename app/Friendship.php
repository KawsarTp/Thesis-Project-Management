<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friendship extends Model
{
	public function students()
    {
        return $this->belongsTo(Student::class);
    }
    
}
