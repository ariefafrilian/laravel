<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    protected $fillable = [
    	'name', 'serial', 'description', 'points', 'photo'
    ];

    public function customers()
    {
    	return $this->belongsToMany('App\Customer');
    }
}
