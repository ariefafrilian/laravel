<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;

class AboutController extends Controller
{
	public function about()
	{
		$about = About::first();
		return view('about', compact('about'));
	}

	public function updateAbout()
	{
		//
	}

	public function resetAbout()
	{
		//
	}
}
