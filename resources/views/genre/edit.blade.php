@extends('home')
@section('content')
<h1>Janrni tahrirlash</h1>
<form action="/genres/{{$genre->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <input type="text" value="{{$genre->name}}" name="name" required class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Saqlash</button>
    </form>
@endsection
