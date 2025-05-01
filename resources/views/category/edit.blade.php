@extends('home')
@section('content')
<h1>Kategoriyani tahrirlash</h1>
    <form action="/categories/{{$category->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <input type="text" name="name" value="{{$category->name}}" required class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Saqlash</button>
    </form>
@endsection
