<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    public function index()
    {
        $category = Category::all();

        return view('dashboard.categories.category-index', compact('category'));
    }

    public function create()
    {
        return view('dashboard.categories.category-create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        Category::create($request->all());

        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('dashboard.categories.category-edit', compact('category'));
    }

    public function update($id, Request $request)
    {
        $category = Category::find($id);

        $this->validate($request, [
            'name' => 'required',
        ]);
        $category->update($request->all());

        return redirect()->route('category.index');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('category.index');
    }
}
