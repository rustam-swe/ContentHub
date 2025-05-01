@extends('home')
@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-body">
            <h1 class="card-title text-primary">{{ $content->title }}</h1>
            <p class="text-muted mb-2">
                <strong>Category:</strong> {{ $content->category->name }} |
                <strong>Yaratilgan sana:</strong> {{ $content->created_at->format('Y-m-d H:i') }}
            </p>

            <p class="card-text">
                {{ $content->description }}
            </p>

            <div class="mb-3">
                <a href="{{ $content->url }}" class="btn btn-outline-primary" target="_blank">
                    YouTube Videoni Ko‘rish
                </a>
            </div>

            <hr>

            <h5>Mualliflar:</h5>
            <ul class="list-group mb-3">
                @foreach ($content->authors as $author)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="/authors/{{$author->id}}">{{ $author->name }}</a>
                        <a href="{{ $author->url }}" class="btn btn-sm btn-outline-info" target="_blank">
                            Profilga o'tish
                        </a>
                    </li>
                @endforeach
            </ul>

            <h5>Janrlar:</h5>
            <ul class="list-group">
                @foreach ($content->genres as $genre)
                    <li class="list-group-item"><a href="/genres/{{ $genre->id }}">{{ $genre->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
