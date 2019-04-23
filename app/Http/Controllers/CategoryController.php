<?php

namespace App\Http\Controllers;

use App\Category;
use App\Location;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'getCategoryLocation']);
        $this->middleware('isAdmin')->except(['index', 'getCategoryLocation']);
    }

    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => "required|unique:categories"]);
        Category::create($request->only('name'));
        return redirect('/');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {

        $category = Category::find($id);
        $category->update($request->except(['_token', '_method']));
        return redirect(route('category.index'));
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect(route('category.index'));
    }

    public function show($id)
    {
        $locations = Location::where('category_id', $id)->get();
        if ($locations->count() !== 0) {
            return view('location.index', compact('locations'));
        } else {
            return 'There not Location for this Category';
        }
    }


}
