@extends('home')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Janrlar ro'yxati</h1>
    <a href="/genres/create" class="btn btn-primary">Yangi janr qo'shish</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Ism</th>
                <th>O'chirish</th>
                <th>Tahrirlash</th>
            </tr>
        </thead>
        <tbody>
            @foreach($genres as $genre)
            <tr>
                <td>{{ $genre->id }}</td>
                <td><a href="/genres/{{$genre->id}}">{{ $genre->name }}</a></td>
                <td>
                    <form action="/genres/{{ $genre->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">O'chirish</button>
                    </form>
                </td>
                <td>
                    <a href="/genres/{{ $genre->id }}/edit" class="btn btn-primary">Tahrirlash</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
