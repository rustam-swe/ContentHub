@section('content')
<div class="container">
    <h1>Foydalanuvchilar ro'yxati</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Ism</th>
                <th>Url</th>
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
                <td>
                <td>
                    <a href="/authors/{{ $author->id }}/edit" class="btn btn-primary">Tahrirlash</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>