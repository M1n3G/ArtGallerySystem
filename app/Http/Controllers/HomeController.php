<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Art;

class HomeController extends Controller
{
    public function home()
    {
        return view('home');
    }

}
