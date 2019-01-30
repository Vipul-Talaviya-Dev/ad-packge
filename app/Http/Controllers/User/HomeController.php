<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
    	return view('user.index');
    }

    public function aboutUs()
    {
    	return view('user.about-us');
    }
}
