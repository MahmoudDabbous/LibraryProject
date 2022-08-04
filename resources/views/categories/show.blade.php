@extends('layout.app')
@section('title')
    Category | {{ $category->id }}
@endsection
@section('content')
    <h1>{{ $category->name }}</h1>
    <div class="pt-5">
        <a href="/categories" class="btn btn-info">Back</a>
    </div>
@endsection
