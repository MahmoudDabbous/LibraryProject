@extends('layout.app')
@section('title', 'Categories')
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
            <a class="btn btn-primary" href="{{ route('categories.add') }}">ADD</a>
        </div>
    @endauth
    @foreach ($categories as $item)
        <h3><a href="{{ route('categories.category', [$item->id]) }}">{{ $item->name }}</a></h3>
        @auth
            <div>
                <a href="{{ route('categories.edit', [$item->id]) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('categories.delete', [$item->id]) }}" class="btn btn-danger">Delete</a>
            </div>
        @endauth
        <hr>
    @endforeach
    {{ $categories->links('pagination::bootstrap-5') }}
@endsection
