<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'ASC')
            ->paginate(2);
        return view('categories.index', compact('categories'));
    }

    public function read(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    public function add()
    {
        return view('categories.add');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:5|max:100',
        ]);
        Category::create([
            'name' => $request->name
        ]);

        return redirect()->route('categories.index');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|min:5|max:100',
        ]);
        $category->update([
            'name' => $request->name
        ]);
        return redirect()->route('categories.index');
    }

    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
