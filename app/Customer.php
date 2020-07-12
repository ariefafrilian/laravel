<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
    	'code', 'first_name', 'last_name', 'gender', 'city', 'birth', 'address', 'email', 'phone', 'photo', 'points', 'api_token'
    ];

    public function transactions()
    {
    	return $this->hasMany('App\Transaction');
    }

    public function gifts()
    {
    	return $this->belongsToMany('App\Gift');
    }
}
