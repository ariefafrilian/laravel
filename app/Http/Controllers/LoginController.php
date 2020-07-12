<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Sentinel;

class LoginController extends Controller
{
    public function login()
    {
    	return view('auth.login');
    }

    public function authenticate(Request $request)
    {
    	$data = $request->validate([
    		'email' => 'required|string|email',
    		'password' => 'required|string'
    	]);

    	$remember = Str::of($request->remember)->trim()->isNotEmpty() ? true : false;

    	try {
    		if (Sentinel::authenticate($data, $remember)) {
    			return redirect('home');
    		} else {
    			return redirect()->back()->with('error', 'Email or password incorrect');
    		}
    	} catch (ThrottlingException $e) {
    		return redirect()->back()->with('error', 'Suspicious activity has occured on your IP address and you have been denied access for another '.$e->getDelay().' second(s)');
    	}
    }

    public function logout()
    {
    	//
    }
}
