<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('id', 'ASC')
            ->paginate(2);
        return view('books.index', compact('books'));
    }
    public function read($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    public function add()
    {
        $category = Category::all();
        return view('books.add',compact('category'));
    }

    public function create(Request $request,Book $book)
    {
        $request->validate([
            'title' => 'required|string|min:5|max:100',
            'price' => 'required|integer|min:10|max:1000',
            'version' => 'nullable',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,PNG',
            'categories_id'=>'required',
            'categories_id:*'=>'exists:categories,id'
        ]);
        $img = $request->file('image');
        $ext = $img->getClientOriginalExtension();
        $newImg = uniqid() . '.' . $ext;

        $img->move(public_path('uploads/books'), $newImg);
        $book::create([
            'title' => $request->title,
            'description' => $request->description,
            'version' => $request->version,
            'price' => $request->price,
            'image' => $newImg
        ]);
        $book->categories()->sync($request->categories_id);

        return redirect()->route('books.index');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $category = Category::all();
        return view('books.edit', compact('book','category'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|min:5|max:100',
            'price' => 'required|integer|min:10|max:500',
            'version' => 'nullable',
            'description' => 'required|string',
            'image'=>'nullable|image|mimes:jpg,jpeg,png,JPG,JPEG,PNG',
            'categories_id'=>'required',
            'categories_id:*'=>'exists:categories,id'
        ]);
        $book = Book::find($id);
        $img = $book->image;

        if ($request->hasFile('image')) {
            if ($img != null) {
                unlink(public_path('uploads/books/' . $img));
            }
            $img = $request->file('image');
            $ext = $img->getClientOriginalExtension();
            $newImg = uniqid() . '.' . $ext;
            $img->move(public_path('uploads/books/'), $newImg);
        }

        $book->update([
            'title' => $request->title,
            'description' => $request->description,
            'version' => $request->version,
            'price' => $request->price,
            'image' => $newImg
        ]);
        $book->categories()->sync($request->categories_id);
        return redirect()->route('books.index');
    }

    public function delete($id)
    {
        $book = Book::findOrFail($id);
        $img = $book->image;
        if ($img != null) {
            unlink(public_path('uploads/books/'.$img));
        }
        $book->delete();
        return redirect()->route('books.index');
    }
}
