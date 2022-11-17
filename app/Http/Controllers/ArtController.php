<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Art;
use App\Models\Artcategories;
use App\Models\Comment;
use PDO;

use function PHPUnit\Framework\isEmpty;

class ArtController extends Controller
{
    public function index(Request $request)
    {
        $data = NULL;
        $cat = Artcategories::join('art', 'category_id', '=', 'artcategories.id')->select('art.category_id', 'artcategories.name')->distinct()->get();
        
        //Sort checking
        $query = "select * from art INNER JOIN artcategories on art.category_id = artcategories.id where";  
        $subQry = [];
        $category = $request->get('category');
        $style = $request->get('style');
        $price = $request->get('price');
        $sort = $request->get('sort');
        $count = 0;

        if($category != null ){
            $count++;
            array_push($subQry,( " category_id = '".$category."' "));
        } 

        if($style != "" ){
            $count++;
            array_push($subQry,( " artStyle = '".$style."' "));
        }

        if($price != NULL ){
            if($price == 1){
                array_push($subQry,( " artPrice BETWEEN 0 AND 5000"));
            } else if ($price == 2){
                array_push($subQry,( " artPrice BETWEEN 5000 AND 10000"));
            } else if ($price == 3){
                array_push($subQry,( " artPrice BETWEEN 10000 AND 20000"));
            } else if ($price == 4){
                array_push($subQry,( " artPrice BETWEEN 20000 AND 30000"));
            } else if ($price == 5) {
                array_push($subQry,( " artPrice > 30000"));
            }

            $count++;
        }

        if($count != 0){
            $qry = "";
            for($i=0;$i<count($subQry);$i++){
                if($i==count($subQry)-1){
                    $qry = $qry.''.$subQry[$i];
                } else {
                    $qry = $qry.''.$subQry[$i].' and ';
                }
                
            }
            
            // error_log($query.''.$qry);
            $data = DB::select($query.''.$qry);
  
        } else {
            $data = Art::inRandomOrder()->paginate(12);
        }

        return view('store', compact('data','cat'));
    }

    public function details($artID)
    {
        $data = Art::findOrFail($artID);
        
     
        if ($data->first()) {
            $artistWork = Art::where(['artistName'=>$data->artistName, ['artID', '!=', $artID]])->take(4)->get();
        }

        $comments = Comment::where('artID', $artID)->get();
        return view('storeDetails', compact('data', 'artistWork', 'comments'));
    }

    public function count() {
        $comments = Comment::all();
        return view('/storeDetails', compact('comments'));
    }

}
