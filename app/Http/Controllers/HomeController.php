<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Customer;
use App\Inventorie;
use App\Gift;

class HomeController extends Controller
{
    public function home()
    {
        $transactions = Transaction::all()->count();
        $customers = Customer::all()->count();
        $inventories = Inventorie::all()->count();
        $gifts = Gift::all()->count();

    	return view('home', compact('transactions', 'customers', 'inventories', 'gifts'));
    }

    public function transaction()
    {
    	$transactions = Transaction::all()->sortByDesc('created_at');
    	$signatures = $transactions->pluck('signature')->unique();
    	return view('transaction', compact('signatures', 'transactions'));
    }
}
