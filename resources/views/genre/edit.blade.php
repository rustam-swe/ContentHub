@extends('home')
@section('content')
<form action="/genres/{{$genre->id}}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" value="{{$genre->name}}" name="name">
        <button type="submit">Saqlash</button>
    </form>
@endsection
