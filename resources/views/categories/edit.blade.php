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

    <form method="post" action="{{ route('categories.update', [$category->id]) }}">
        @csrf
        <label>
            Category Name
        </label>
        <input type="text" name="name" value="{{ old('title') ?? $category->name }}">
        <br>
        <div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>

@endsection
