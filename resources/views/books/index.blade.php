@extends('layout.app')
@section('title', 'Books')
@section('content')
    <div class="my-3">
        <a class="btn btn-primary" href="{{ route('books.add') }}">ADD</a>
    </div>
    @foreach ($books as $item)
        <h3><a href="{{ route('books.book', [$item->id]) }}">{{ $item->title }}</a></h3>
        <p>{{ $item->description }}</p>
        <small>{{ $item->price }}</small>
        <br>
        <small>{{ $item->category->name }}</small>
        <div>
            <a href="{{ route('books.edit', [$item->id]) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('books.delete', [$item->id]) }}" class="btn btn-danger">Delete</a>
        </div>
        <hr>
    @endforeach
    {{ $books->links('pagination::bootstrap-5') }}
@endsection
