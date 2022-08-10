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

    public function read($id)
    {
        $category = Category::findOrFail($id);
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

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|min:5|max:100',
        ]);
        $Category = Category::find($id);
        $Category->update([
            'name' => $request->name
        ]);
        return redirect()->route('categories.index');
    }

    public function delete($id)
    {
        $Category = Category::findOrFail($id);
        $Category->delete();
        return redirect()->route('categories.index');
    }
}
