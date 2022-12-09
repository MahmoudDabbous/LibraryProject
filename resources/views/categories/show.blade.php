@extends('layout.app')
@section('title')
    Category | {{ $category->name }}
@endsection
@section('content')
    <h1>{{ $category->name }}</h1>
    <ul>
        @foreach ($books as $book)
            <li>{{ $book->title }}</li>
        @endforeach
    </ul>
    @auth
        <div class="pt-5">
            <a href="{{ route('categories.edit', [$item->id]) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('categories.delete', [$item->id]) }}" class="btn btn-danger">Delete</a>
            <a href="{{ route('categories.index') }}" class="btn btn-info">Back</a>
        </div>
    @endauth
@endsection
