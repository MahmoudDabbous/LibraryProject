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

    public function read(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function add()
    {
        $category = Category::all();
        return view('books.add', compact('category'));
    }

    public function create(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|min:5|max:100',
            'price' => 'required|integer|min:10|max:1000',
            'version' => 'nullable',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,PNG',
            'categories_id' => 'required',
            'categories_id:*' => 'exists:categories,id'
        ]);

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $ext = $img->getClientOriginalExtension();
            $newImg = uniqid() . '.' . $ext;
            $img->move(public_path('uploads/books'), $newImg);
        } else {
            $newImg = null;
        }

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

    public function edit(Book $book)
    {
        $category = Category::all();
        return view('books.edit', compact('book', 'category'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|min:5|max:100',
            'price' => 'required|integer|min:10|max:500',
            'version' => 'nullable',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,JPG,JPEG,PNG',
            'categories_id' => 'nullable',
            'categories_id:*' => 'exists:categories,id'
        ]);

        if ($request->hasFile('image')) {
            if ($book->image != null) {
                unlink(public_path('uploads/books/' . $book->image));
            }
            $book->image = $request->file('image');
            $ext = $book->image->getClientOriginalExtension();
            $newImg = uniqid() . '.' . $ext;
            $book->image->move(public_path('uploads/books/'), $newImg);
        } else {
            $newImg = null;
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

    public function delete(Book $book)
    {
        if ($book->image != null) {
            unlink(public_path('uploads/books/' . $book->image));
        }
        $book->delete();
        return redirect()->route('books.index');
    }
}
