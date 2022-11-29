<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Art;

class ExhibitionsController extends Controller
{
    public function index()
    {
        $art = Art::all();
        return view('exhibitions', compact('art'));
    }

}
