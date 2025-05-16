@extends('home')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Rolelar ro'yxati</h1>
        @role('admin')
        <a href="/roles/create" class="btn btn-primary">Yangi role qo'shish</a>
        @endrole
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
            <tr>
                <td>{{$role->id}}</td>
                <td><a href="/roles/{{$role->id}}">{{$role->name}}</a></td>
                <td>
                    <a href="/roles/{{$role->id}}/edit" class="btn btn-warning">Edit</a>
                    <form action="/roles/{{$role->id}}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this item?');">
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
