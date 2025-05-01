@extends('home')
@section('content')
<h1>Muallifni tahrirlash</h1>
<form action="/authors/{{$author->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <input type="text" name="name" value="{{$author->name}}" required class="form-control">
    </div>
    <div class="mb-3">
        <input type="text" name="url" value="{{$author->url}}" required class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Saqlash</button>
</form>
@endsection
