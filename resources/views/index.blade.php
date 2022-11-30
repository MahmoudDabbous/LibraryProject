@extends('layout.app')

@section('title', 'Home Page')

@section('content')
    @auth
        <?php $data = Auth::user()->name; ?>
        <x-alert-success :name="$data"></x-alert-success>
    @endauth
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Books</h5>
            <a href="{{ route('books.index') }}" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Categories</h5>
            <a href="{{ route('categories.index') }}" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
@endsection
