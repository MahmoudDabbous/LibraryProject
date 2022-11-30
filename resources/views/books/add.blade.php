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

    <form method="post" action="{{ route('books.create') }}" enctype="multipart/form-data">
        @csrf
        <label>
            Book Name
        </label>
        <input type="text" name="title">
        <br>

        <label>
            Book Price
        </label>
        <input type="number" name="price">
        <br>

        <label>Book Cover</label>
        <input type="file" name="image">
        <br>

        <label>Book Description</label>
        <textarea name="description" cols="30" rows="5"></textarea>
        <br>

        <label>Book Version</label>
        <select name="version">
            <option value="new">New</option>
            <option value="old">Old</option>
        </select>
        <br>

        <label>Book Category</label>
            @foreach ($category as $item)
                <input type="checkbox" name="categories_id[]" value="{{$item->id}}" class="form-check-input">
                <label >{{$item->name}}</label>
            @endforeach
        <br>
        <div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>

@endsection
