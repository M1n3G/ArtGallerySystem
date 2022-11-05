<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Forumcategories;

class ForumController extends Controller
{

    public function forumHome()
    {
        return view('forum.forum');

        // $category = Forumcategories::all();
        // return view('forum.forumhome', compact('category'));
    }

    // public function manageHome()
    // {
    //     $category = Forumcategories::all();
    //     return view('forum.manage', compact('category'));
    // }

    // public function category()
    // {
    //     return view('forum.createCategory');
    // }

    // public function storeCategory(CategoryFormRequest $request)
    // {
    //     $data = $request->validated();

    //     $category = new Forumcategories();
    //     $category->name = $data['name'];
    //     $category->description = $data['description'];

    //     if ($request->hasFile('image')) {
    //         $file = $request->file('image');
    //         $filename = time() . '.' . $file->getClientOriginalExtension();
    //         $file->move('storage/upload/', $filename);
    //         $category->image = $filename;
    //     }

    //     $category->keyword = $data['keyword'];
    //     $category->save();

    //     return redirect('forum/forumhome')->with('message', 'Category added successfully');
    // }
}
