@extends('layout.app')
@section('title', 'Add New Book')
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

    <form method="post" action="{{ route('categories.update', [$category]) }}">
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
