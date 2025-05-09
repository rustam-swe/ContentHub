@extends('home')

@section('content')
<div class="container">
    <div class="mb-4">
        <h2 class="fw-bold">Kategoriya: {{ $category->name }}</h2>
    </div>

    @if($category->contents->count())
    <div class="row">
        @foreach($category->contents as $content)
        <div class="col-4 mb-4">
            <div class="card h-100 shadow-sm kitob-card">
                <iframe width="406" height="315" src="{{ $content->url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title text-primary fw-semibold text-truncate">
                        {!! $content->title !!}
                    </h5>
                    <p class="card-text text-muted small text-truncate">{!! $content->description !!}</p>
                </div>
                <div class="card-footer bg-light text-muted small">
                    Muallif:
                    @foreach($content->authors as $author)
                    <a href="/authors/{{ $author->id }}" target="_blank">{{ $author->name }}</a>{{ !$loop->last ? ',' : '' }}
                    @endforeach
                    <a class="btn btn-primary d-block mt-3" href="/contents/{{ $content->id }}">Batafsil</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="alert alert-warning">
        Bu kategoriya uchun hozircha kontent mavjud emas.
    </div>
    @endif
</div>
@endsection
