@extends('home')

@section('content')
<div class="container">
</div>
<div class="row mt-4">
    <div class="col-md-12 mb-4">
        <a href="/categories/1" class="text-primary fs-2">Videolar</a>
    </div>
    <div id="contentCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ($contents as $index => $content)
        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
            <div class="card h-100 shadow-sm kitob-card mx-auto" style="max-width: 600px;">
                <iframe class="w-100" height="315" src="{{ $content->url }}" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin"
                        allowfullscreen></iframe>
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

    <!-- Carousel controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#contentCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#contentCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

    <div class="row">
        @foreach ($contents->where('category.name', 'Video')->take(3) as $content)
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
    <div class="col-md-12 mb-4">
        <a href="/categories/3" class="text-primary fs-2">Podcastlar</a>
    </div>
    <div class="row">
        @foreach ($contents->where('category.name', 'Podcast')->take(3) as $content)
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
    <div class="col-md-12 mb-4">
        <a href="/categories/2" class="text-primary fs-2">Kitoblar</a>
    </div>
    <div class="row">
        @foreach ($contents->where('category.name', 'Book')->take(3) as $content)
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
</div>
@endsection
