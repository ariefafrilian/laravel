<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventorie extends Model
{
    protected $fillable = [
    	'name', 'serial', 'description', 'price', 'photo'
    ];

    public function transactions()
    {
    	return $this->hasMany('App\Transaction');
    }
}
