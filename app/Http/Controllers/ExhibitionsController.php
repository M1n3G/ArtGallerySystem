<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Exhibitions;

class ExhibitionsController extends Controller
{
    public function index()
    {
        $exhibition = Exhibitions::all();
        return view('exhibitions', compact('exhibition'));
    }

    public function details($exhibitionsID){
        $exhibition= Exhibitions::findOrFail($exhibitionsID);
        return view('exhibitions', compact('exhibition'));
    }


}
