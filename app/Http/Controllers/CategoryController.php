<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
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

    public function edit(Request $request) {
        $category = Category::find($request->id);

        $pictures = Storage::files('public/pictures');
        $picturenames = [];

        foreach($pictures AS $picture) {
            $picFile = explode('/', $picture);
            $picName = explode('.', $picFile[2]);
            $picturenames[] = $picName[0];

        }
        return view('category-views.edit-view', ['categorys' => $category, 'pictures' => $picturenames]);
    }
    public function update(Request $request) {
        
        $validateMIME = explode('.', $request->picture);
        $validateMIME[0] .= '.jpg';
        $request->validate([
            'name' => ['required', 'min:3'],
            'description' => ['required', 'max:100']
        ]);
        $category = Category::findOrFail($request->id);
        $category->category_name = $request->name;
        $category->category_description = $request->description;
        $category->picture_path = $validateMIME[0];
        $category->save();

        return redirect('categorys');
    } 
}
