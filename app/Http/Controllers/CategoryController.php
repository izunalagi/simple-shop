<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        return view('category.index',compact('categories'));
    }

    public function detail(Request $request, $id)
    {
        $category = Category::find($id);

        return view('category.detail',compact('category'));
    }
}
