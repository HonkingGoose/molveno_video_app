<?php

namespace App\Http\Controllers;

use App\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        return view('admin_video.category', ['categories' => Category::all()]);
    }

    public function store(Request $request) {
        $category = new Category();
        $category->name = $request->input('name');

        if ($category->save()) {
            return redirect()->route('category.index');
        } else {
            var_dump("niet opgeslagen");
        }
    }
}
