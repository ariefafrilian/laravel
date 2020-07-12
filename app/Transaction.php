<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Transaction extends Model
{
	protected $fillable = [
		'invoice', 'qty', 'signature', 'inventorie_id', 'customer_id'
	];

	public function getSignatureAttribute($value)
	{
		return Carbon::parse($value)->format('d M Y');
	}

	public function getCreatedAtAttribute($value)
	{
		return Carbon::parse($value)->diffForHumans();
	}

	public function inventorie()
	{
		return $this->belongsTo('App\Inventorie');
	}

	public function customer()
	{
		return $this->belongsTo('App\Customer');
	}
}
