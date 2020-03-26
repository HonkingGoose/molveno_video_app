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

    public function update(Request $request, Category $category) {
        $category->name = $request->input('name');
        if ($category->save()) {
            return redirect()->route('category.index');
        } else {
            var_dump("niet opgeslagen");
        }

    }

    public function delete(Category $category) {
        if ($category->delete()) {
            return redirect()->route('category.index');
        } else {
            echo "Error while deleting category";
        }
    }

}
