@extends('home')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Kontentlar ro'yxati</h1>
        <a href="/contents/create" class="btn btn-primary">Yangi kontent qo'shish</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contents as $content)
            <tr>
                <td>{{$content->id}}</td>
                <td><a href="/contents/{{$content->id}}">{{$content->title}}</a></td>
                <td>{{$content->description}}</td>
                <td>
                    <a href="/contents/{{$content->id}}/edit" class="btn btn-warning">Edit</a>
                    <form action="/contents/{{$content->id}}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
