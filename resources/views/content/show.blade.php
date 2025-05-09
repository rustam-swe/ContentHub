@extends('home')
@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-body">
            <iframe width="100%" height="600" src="{{ $content->url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            <h1 class="card-title text-primary"><a href="{{ $content->url }}" target="_blank">{{ $content->title }}</a></h1>
            <p class="text-muted mb-2">
                <strong>Category:</strong><a href="/categories/{{ $content->category_id }}">{{ $content->category->name }}</a>  |
                <strong>Yaratilgan sana:</strong> {{ $content->created_at->format('Y-m-d H:i') }}
            </p>

            <p class="card-text">
                {{ $content->description }}
            </p>
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
