@extends('layout.app')
@section('title')
    Book | {{$book->id}}
@endsection
@section('content')
    <h1>{{$book->title}}</h1>
    <p>{{$book->description}}</p>
    <ul>
        <li>{{$book->price}}</li>
        <li>{{$book->version}}</li>
    </ul>
    <div class="pt-5">
        <a href="/books" class="btn btn-info">Back</a>
    </div>
@endsection