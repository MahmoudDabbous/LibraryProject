@extends('layout.app')
@section('title')
    Category | {{ $category->name }}
@endsection
@section('content')
    <h1>{{ $category->name }}</h1>
    <ul>
        @foreach ($category->books as $item)
            <li>{{ $item->title }}</li>
        @endforeach
    </ul>
    <div class="pt-5">
        <a href="{{ route('categories.index') }}" class="btn btn-info">Back</a>
    </div>
@endsection
