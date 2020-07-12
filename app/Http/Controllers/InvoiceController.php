<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\About;

class InvoiceController extends Controller
{
	public function invoice($id)
	{
		$transaction = Transaction::findOrFail($id);
		$about = About::first();
		return view('invoice.invoice', compact('transaction', 'about'));
	}

	public function deleteInvoice($id)
	{
		$invoice = Transaction::findOrFail($id);
		$invoice->delete();
	}
}
