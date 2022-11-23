<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Art;
use App\Models\Artcategories;
use App\Models\Comment;
use App\Models\User;
use App\Models\View;
use PDO;

use function PHPUnit\Framework\isEmpty;

class ArtController extends Controller
{
    public function __construct()
    {
        $this->middleware('AuthCheck', ['except' => ['index', 'details']]);
    }

    public function index(Request $request)
    {
        $data = NULL;
        $cat = Artcategories::join('art', 'category_id', '=', 'artcategories.id')->select('art.category_id', 'artcategories.name')->distinct()->get();

        //Sort checking
        $query = "select * from art INNER JOIN artcategories on art.category_id = artcategories.id where ";
        $subQry = [];
        $category = $request->get('category');
        $style = $request->get('style');
        $price = $request->get('price');
        $sort = $request->get('sort');
        $count = 0;

        if ($category != null) {
            $count++;
            array_push($subQry, (" category_id = '" . $category . "' "));
        }

        if ($style != "") {
            $count++;
            array_push($subQry, (" artStyle = '" . $style . "' "));
        }

        if ($price != NULL) {
            $count++;
            if ($price == 1) {
                array_push($subQry, (" artPrice BETWEEN 0 AND 5000"));
            } else if ($price == 2) {
                array_push($subQry, (" artPrice BETWEEN 5000 AND 10000"));
            } else if ($price == 3) {
                array_push($subQry, (" artPrice BETWEEN 10000 AND 20000"));
            } else if ($price == 4) {
                array_push($subQry, (" artPrice BETWEEN 20000 AND 30000"));
            } else if ($price == 5) {
                array_push($subQry, (" artPrice > 30000"));
            }
        }

        if ($sort != NULL) {
            $count++;
            if ($sort == 1) {
                array_push($subQry, (" ORDER BY datetime ASC"));
            } else if ($sort == 2) {
                array_push($subQry, (" ORDER BY artPrice ASC"));
            } else if ($sort == 3) {
                array_push($subQry, (" ORDER BY artPrice DESC"));
            } else if ($sort == 4) {
                array_push($subQry, (" ORDER BY artName ASC"));
            } else if ($sort == 5) {
                array_push($subQry, (" ORDER BY artName DESC"));
            }
        }

        if ($count != 0) {
            $qry = "";
            if ($count == 1 && $sort != NULL) {
                $data = DB::select('select * from art INNER JOIN artcategories on art.category_id = artcategories.id' . $subQry[0]);
            } else {
                for ($i = 0; $i < count($subQry); $i++) {
                    if ($i == count($subQry) - 1) {
                        $qry = $qry . '' . $subQry[$i];
                    } else {
                        if (str_contains($subQry[$i + 1], 'ORDER BY')) {
                            $qry = $qry . '' . $subQry[$i];
                        } else {
                            $qry = $qry . '' . $subQry[$i] . ' and ';
                        }
                    }
                }

                $data = DB::select($query . '' . $qry);
                // $data = Art::paginate(12)->withQueryString($query . '' . $qry);
            }

            // error_log($query . '' . $qry);

        } else {
            $data = Art::inRandomOrder()->paginate(30);
        }

        return view('store', compact('data', 'cat'));
    }

    public function details($artID)
    {
        $username = Session::get('username');
        $data = Art::findOrFail($artID);
        $cat = Artcategories::join('art', 'category_id', '=', 'artcategories.id')->select('art.category_id', 'artcategories.name')->distinct()->get();
        $artCountExist = View::where('artID', $artID)->where('username', Session::get('username'))->first();

        if ($username != null) {
            if (!$artCountExist) {
                $views = new View();
                $views->artID = $artID;
                $views->username = $username;
                $views->save();
            }
        }

        if ($data->first()) {
            $artistWork = Art::where(['artistName' => $data->artistName, ['artID', '!=', $artID]])->take(4)->get();
        }

        $comments = Comment::where('artID', $artID)->orderBy('datetime', 'DESC')->paginate(10);
        $com = Comment::where('artID', $artID)->where('username', Session::get('username'))->get();
        $counts = Comment::where('artID', $artID)->count();

        $artcount = View::where('artID', $artID)->count();


        return view('storeDetails', compact('data', 'artistWork', 'comments', 'cat', 'counts', 'com', 'artcount'));
    }

    public function removeComment($artID)
    {
        $removecmt = Comment::where('username', Session::get("username"))->where('artID', $artID)->first();

        if ($removecmt != null) {
            $removecmt->delete();
            return redirect("/storeDetails/" . $artID)->with('message', 'Comment removed successfully');
        }

        return redirect("/storeDetails/" . $artID)->with(['fail' => 'Wrong ID!!']);
    }
}
