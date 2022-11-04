<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Art;

class ArtController extends Controller
{
    public function index()
    {
        $data = Art::inRandomOrder()->paginate(12);
        return view('store', compact('data'));
    }

    function details($artID)
    {
        $data = Art::findOrFail($artID);
        if ($data->first()) {
            $artistWork = Art::where(['artistName'=>$data->artistName, ['artID', '!=', $artID]])->take(4)->get();
        }
        return view('storeDetails', compact('data', 'artistWork'));
    }

    function search(){
        return view('search');
    }
}
