@extends('layout.app')
@section('title', 'Books')
@section('content')
    @foreach ($books as $item)
        <h3><a href="/books/{{ $item->id }}">{{ $item->title }}</a></h3>
        <p>{{ $item->description }}</p>
        <small>{{ $item->price }}</small>
        <hr>
    @endforeach
    {{ $books->links('pagination::bootstrap-5') }}
@endsection
