<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forumcategories;
use App\Models\Post;


class CategoryController extends Controller
{
    public function create()
    {
        // $categories = Forumcategories::all();
        return view('forum/createCategory');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:forumcategories|max:255',
            'description' => 'required|min:10'
            // 'category_id' => 'required|exists:App\Models\Forumcategories,id'
        ]);

        $category =  new Forumcategories();
        $category->name = $request->get('name');
        $category->description = $request->get('description');

        if ($category->save()) {
            return redirect('/manage')->with('success', 'Category created Successfully');
        }

        return redirect()->back()->with('fail', 'Unable to create category');
    }

    public function index()
    {
        $category = Forumcategories::select('id','name','description')->paginate(10);
        return view('forum/manage', compact('category'));
    }


    public function edit($id)
    {
        // $category = Forumcategories::find($id);
        $category = Forumcategories::where('id', $id)->firstorFail();
        return view('forum.editcategory', compact('category'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'string|max:255',
            'description' => 'string',
        ]);

        $category =  Forumcategories::find($id);
        $category->name = $request->get('name');
        $category->description = $request->get('description');

        if ($category->save()) {
            return redirect('/manage')->with('success', 'Category updated Successfully');
        }

        return redirect()->back()->with('fail', 'Unable to update category');
    }

    public function destroy($id)
    {
        $category = Forumcategories::where('id', $id)->first();

        if ($category != null) {
            $category->delete();
            return redirect('/manage')->with('success', 'Category Delete Successfully');
        }

        return redirect()->route('forum/manage')->with(['fail' => 'Wrong ID!!']);
    }
}