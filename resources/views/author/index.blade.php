@extends('home')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Foydalanuvchilar ro'yxati</h1>
    <a href="/authors/create" class="btn btn-primary">Yangi foydalanuvchi qo'shish</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Ism</th>
                <th>Url</th>
                <th>O'chirish</th>
                <th>Tahrirlash</th>
            </tr>
        </thead>
        <tbody>
            @foreach($authors as $author)
            <tr>
                <td>{{ $author->id }}</td>
                <td><a href="authors/{{$author->id}}">{{ $author->name }}</a></td>
                <td><a href='{{ $author->url }}' target="_blank">link</a></td>
                <td>
                    <form action="/authors/{{ $author->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">O'chirish</button>
                    </form>
                </td>
                <td>
                    <a href="/authors/{{ $author->id }}/edit" class="btn btn-primary">Tahrirlash</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
