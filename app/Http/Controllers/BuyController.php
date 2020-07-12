<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Transaction;
use App\Customer;

class BuyController extends Controller
{
	public function buy(Request $request, $id)
	{
		$customer = Customer::findOrFail($id);

		$points = ($customer->points + 5);

		$result = Transaction::create([
			'invoice' => Str::random(32),
			'qty' => $request->amount,
			'signature' => now(),
			'inventorie_id' => $request->item,
			'customer_id' => $id
		]);

		$customer->update([
			'points' => $points
		]);

		return '<a href="' . url('invoice/' . $result->id) . '">Successfully. Invoice number ' . $result->invoice . '</a>';
	}
}
