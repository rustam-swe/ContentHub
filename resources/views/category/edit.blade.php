@extends('home')
@section('content')
    <form action="/categories/{{$category->id}}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{$category->name}}">
        <button type="submit">Saqlash</button>
    </form>
@endsection
