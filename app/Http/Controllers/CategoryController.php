<?php

namespace App\Http\Controllers;

use App\Category;
use Exception;

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
        try {
            if ($category->delete()) {
                return redirect()->route('category.index');
            }
        }
        catch (\Exception $e) {
           echo "Error: You're trying to delete a category that still has videos attached.";
       }
    }

}
