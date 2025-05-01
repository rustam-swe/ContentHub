@extends('home')
@section('content')
    <h1>Yangi janr qo'shish</h1>

    <form action="/genres" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Genre nomi</label>
            <input type="text" class="form-control" id="name" name="name" required placeholder="Janr nomi">
        </div>
        <button type="submit" class="btn btn-primary">Yaratish</button>
    </form>
@endsection
