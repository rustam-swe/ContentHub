@extends('home')
@section('content')
    <h1>Yangi muallif qo'shish</h1>
    <form action="/authors" method="POST">
        @csrf
        <div class="mb-3">
            <input type="text" name="name" class="form-control" placeholder="Ism">
        </div>
        <div class="mb-3">
            <input type="text" name="url" placeholder="Url" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Saqlash</button>
    </form>
@endsection
