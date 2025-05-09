@extends('home')
@section('content')
<h1>Kontentni tahrirlash</h1>
<form action="/roles/{{$role->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <input type="text" name="name" value="{{$role->name}}" required class="form-control" placeholder="Kontent nomi">
    </div>
    <button type="submit" class="btn btn-primary">Saqlash</button>
</form>
@endsection
