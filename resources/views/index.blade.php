@extends('layout.app')

@section('title', 'Home Page')

@section('content')
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <a href="{{ route('books.index') }}" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <a href="{{route('categories.index')}}" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
@endsection
