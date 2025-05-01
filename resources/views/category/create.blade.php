@extends('home')
@section('content')
    <h1>Yangi kategoriya qo'shish</h1>
    <form action="/categories" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Category nomi</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Yaratish</button>
    </form>
@endsection
