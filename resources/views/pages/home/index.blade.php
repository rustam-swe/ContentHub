@extends('home')

@section('content')
    <div class="container">

        <div id="contentCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @php $activeSet = false; @endphp
                @foreach ($categories as $category)
                    @foreach ($category['contents'] as $content)
                        <div class="carousel-item {{ !$activeSet ? 'active' : '' }}">
                            @php $activeSet = true; @endphp
                            <div class="card h-100 shadow-sm kitob-card mx-auto" style="max-width: 600px;">
                                <img src="https://picsum.photos/640/360" class="img-fluid rounded-top" alt="Random image">
                                {{-- <iframe class="w-100" height="315" src="{{ $content['url'] }}" title="YouTube video player"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> --}}
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title text-primary fw-semibold text-truncate">
                                        {!! $content['title'] !!}
                                    </h5>
                                    <p class="card-text text-muted small text-truncate">{!! $content['description'] !!}</p>
                                </div>
                                <div class="card-footer bg-light text-muted small">
                                    <a class="btn btn-primary d-block mt-3"
                                        href="/contents/{{ $content['id'] }}">Batafsil</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#contentCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#contentCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


        @foreach ($categories as $category)
            <div class="mb-5">
                <h2 class="text-2xl fw-bold text-primary mb-4 border-bottom pb-2">
                    <a href="/categories/{{ $category->id }}" class="text-decoration-none">
                        {{ $category->name }}
                    </a>
                </h2>

                <div class="row g-4">
                    @foreach ($category->contents as $content)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-5th">
                            <div class="card h-100 shadow-sm border-0 card-hover">
                                <div class="ratio ratio-16x9">
                                    <img src="https://picsum.photos/640/360" class="img-fluid rounded-top"
                                        alt="Random image">

                                    {{-- <iframe class="rounded-top"
                                src="{{ $content->url }}"
                                title="Content video"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin"
                                allowfullscreen>
                            </iframe> --}}
                                </div>

                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title text-primary fw-semibold text-truncate mb-2">
                                        {!! $content->title !!}
                                    </h5>
                                    <p class="card-text text-muted small mb-3">
                                        {!! \Illuminate\Support\Str::limit($content->description, 100) !!}
                                    </p>
                                    <div class="mt-auto">
                                        <p class="mb-1 text-muted small">Muallif:
                                            @foreach ($content->authors as $author)
                                                <a href="/authors/{{ $author->id }}"
                                                    class="text-decoration-none text-dark" target="_blank">
                                                    {{ $author->name }}
                                                </a>{{ !$loop->last ? ',' : '' }}
                                            @endforeach
                                        </p>
                                        <a class="btn btn-outline-primary btn-sm w-100 mt-2"
                                            href="/contents/{{ $content->id }}">
                                            Batafsil
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection
