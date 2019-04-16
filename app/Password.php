<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Password extends Model
{
    protected $table = 'password_resets';
    const UPDATED_AT = null;
    protected $guarded = [];
}
