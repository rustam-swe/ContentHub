<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Kontentlar ro'yxati</h1>
        <a href="/contents/create" class="btn btn-primary">Yangi kontent qo'shish</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Url</th>
                <th>Categories</th>
                <th>Authors</th>
                <th>Genres</th>
                <th>O'chirish</th>
                <th>Tahrirlash</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contents as $content)
            <tr>
                <td>{{ $content->id }}</td>
                <td><a href="/contents/{{ $content->id }}">{{ $content->title }}</a></td>
                <td>{{ $content->description }}</td>
                <td><a href="{{$content->url}}" target="_blank">link</a></td>
                <td>
                    {{ $content->category->name }}
                </td>
                <td>
                    @foreach ($content->authors as $author)
                        <a href="/authors/{{$author->id}}">{{ $author->name }}</a>
                    @endforeach
                </td>
                <td>
                    @foreach ($content->genres as $genre)
                        <a href="/genres/{{$genre->id}}">{{ $genre->name }}</a>
                    @endforeach
                </td>
                <td>
                    <form action="/contents/{{ $content->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">O'chirish</button>
                    </form>
                </td>
                <td><a href="/contents/{{ $content->id }}/edit" class="btn btn-primary">Tahrirlash</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>
