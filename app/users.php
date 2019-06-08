<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    protected $fillable = ['name','email_id','password','user_role'];
	public $timestamps = false;
}
