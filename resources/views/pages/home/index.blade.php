@extends('home')

@section('content')
<div class="container">
    <h1>Welcome to the Home Page</h1>
    <p>This is the main page of the website. Feel free to explore our content!</p>
</div>
<div class="row mt-4">
    <div class="col-md-12 mb-4">
        <h2 class="text-primary">Videolar</h2>
        <p class="text-muted">Eng so‘nggi videolar</p>
    </div>
    @foreach ($contents->where('category.name', 'Video')->take(4) as $content)
    <div class="col-md-3 mb-4">
        <div class="card h-100 shadow-sm kitob-card">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title text-primary fw-semibold">
                    {{ $content->title }}
                </h5>
                <p class="card-text text-muted small">{{ $content->description }}</p>
                <a href="{{ $content->url }}" target="_blank" class="btn btn-outline-success mt-auto">
                    Batafsil
                </a>
            </div>
            <div class="card-footer bg-light text-muted small">
                Muallif:
                @foreach($content->authors as $author)
                <a href="/authors/{{ $author->id }}" target="_blank">{{ $author->name }}</a>{{ !$loop->last ? ',' : '' }}
                @endforeach
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
