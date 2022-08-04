@extends('layout.app')
@section('title', 'Categories')
@section('content')
    @foreach ($categories as $item)
        <h3><a href="/categories/{{ $item->id }}">{{ $item->name }}</a></h3>
        <hr>
    @endforeach
    {{ $categories->links('pagination::bootstrap-5') }}
@endsection
