@extends('layout.app')
@section('title', 'Books')
@section('content')
    @if ($errors->any())
        <div class="py-5">
            <ul>
                @foreach ($errors->all() as $msg)
                    <li>{{ $msg }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @auth
        <div class="my-3">
            <a class="btn btn-primary" href="{{ route('books.add') }}">ADD</a>
        </div>
    @endauth
    @foreach ($books as $book)
        <h3><a href="{{ route('books.book', [$book]) }}">{{ $book->title }}</a></h3>
        <p>{{ $book->description }}</p>
        <small>{{ $book->price }}</small>
        <br>
        @foreach ($book->categories as $category)
            <small><a href="{{ route('categories.category', [$category]) }}">{{ $category->name }}</a></small>
        @endforeach
        @auth
            <div>
                <a href="{{ route('books.edit', [$book]) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('books.delete', [$book]) }}" class="btn btn-danger">Delete</a>
            </div>
        @endauth
        <hr>
    @endforeach
    {{ $books->links('pagination::bootstrap-5') }}
@endsection
