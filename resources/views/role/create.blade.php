@extends('home')
@section('content')
<h1>Yangi role qo'shish</h1>
    <form action="/roles" method="POST">
        @csrf
        <div class="">
            <input type="text" class="form-control" name="name" required placeholder="Roles's name"><br>
        </div>
        <button type="submit" class="btn btn-primary">Yaratish</button>
    </form>
@endsection
