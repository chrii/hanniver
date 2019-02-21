<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $category = Category::all();
        return view('category-views.category-view', ['categorys' => $category]);
    }

    public function store(Request $request) {
        request()->validate([
            'category-name' => ['required', 'string', 'min:3', 'max:30'],
            'category-description' => ['required', 'string', 'min:3', 'max:30']
        ]);
        Category::create([
            'category_name' => request('category-name'),
            'category_description' => request('category-description')
        ]);
        return redirect('categorys');
    }
}
