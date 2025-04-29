@extends('home')
@section('content')
    <form action="/authors" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Ism">
        <br>
        <input type="text" name="url" placeholder="Url">
        <br>
        <button type="submit" class="btn btn-primary">Saqlash</button>
    </form>
@endsection
