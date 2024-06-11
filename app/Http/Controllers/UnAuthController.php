<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UnAuthController extends Controller
{
	public function index()
	{
		return view('unauth');
	}
}
