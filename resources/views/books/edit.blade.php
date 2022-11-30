@extends('layout.app')
@section('title', 'Add New Book')
@section('content')
    <div class="py-5">
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $msg)
                    <li>{{ $msg }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <form method="post" action="{{ route('books.update', [$book->id]) }}" enctype="multipart/form-data">
        @csrf
        <label>
            Book Name
        </label>
        <input type="text" name="title" value="{{ old('title') ?? $book->title }}">
        <br>

        <label>
            Book Price
        </label>
        <input type="number" name="price" value="{{ old('price') ?? $book->price }}">
        <br>

        <label>Book Cover</label>
        <input type="file" name="image">
        <br>

        <label>Book Description</label>
        <br>
        <textarea name="description" cols="30" rows="5">
            {{ old('description') ?? $book->description }}
        </textarea>
        <br>

        <label>Book Version</label>
        <select name="version">
            <option value="new">New</option>
            <option value="old">Old</option>
        </select>
        <br>

        <div class="my-2">
            <label>Book Category</label>
            @foreach ($category as $item)
                <input class="form-check-input" name="categories_id[]" type="checkbox" value="{{ $item->id }}"
                    id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    {{ $item->name }}
                </label>
            @endforeach

        </div>
        <div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>

@endsection
