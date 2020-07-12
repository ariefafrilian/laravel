<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
	protected $fillable = [
		'country', 'company', 'city', 'address', 'email', 'phone'
	];
}
