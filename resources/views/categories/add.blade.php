@extends('layout.app')
@section('title', 'Add New Category')
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

    <form method="post" action="{{ route('categories.create') }}">
        @csrf
        <label>
            Category
        </label>
        <input type="text" name="name">
        
        <br>
        <div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>

@endsection
