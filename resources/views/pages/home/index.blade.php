@extends('home')

@section('content')
    <div>

        {{-- <div id="contentCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
            <div class="carousel-inner">
                @php $activeSet = false; @endphp
                @foreach ($categories as $category)
                    @foreach ($category['contents'] as $content)
                        <div class="carousel-item {{ !$activeSet ? 'active' : '' }}">
                            @php $activeSet = true; @endphp
                            <div class="card h-100 shadow-sm kitob-card mx-auto" style="">
                                <img src="https://bmw.scene7.com/is/image/BMW/g90_driving-dynamics_fb?qlt=80&wid=1024&fmt=webp" class="rounded-top" alt="Random image"> --}}
        {{-- <iframe class="w-100" height="315" src="{{ $content['url'] }}" title="YouTube video player"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> --}}
        {{-- <div class="card-body d-flex flex-column">
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
        </div> --}}


        @foreach ($categories as $category)
            <div class="mb-10">
                <h2 class="text-2xl font-bold text-white mb-4 border-b border-gray-700 pb-2">
                    <a href="/categories/{{ $category->id }}" class="hover:underline">
                        {{ $category->name }}
                    </a>
                </h2>

                <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    @foreach ($category->contents as $content)
                        <a href="/contents/{{ $content->id }}"
                            class="block bg-[#181818] rounded-lg overflow-hidden shadow-sm hover:shadow-md hover:rounded-none transition-shadow duration-300">
                            <div class="w-full aspect-video relative">
                                <img src="https://bmw.scene7.com/is/image/BMW/g90_driving-dynamics_fb?qlt=80&wid=1024&fmt=webp"
                                    alt="Image" class="w-full h-full object-cover" />
                            </div>
                            <div class="p-4 text-white flex flex-col">
                                <h3 class="text-base font-semibold truncate mb-1">
                                    {!! $content->title !!}
                                </h3>
                                <p class="text-xs text-gray-400 truncate mb-1">
                                    @foreach ($content->authors as $author)
                                        <span class="hover:text-white">
                                            {{ $author->name }}
                                        </span>{{ !$loop->last ? ', ' : '' }}
                                    @endforeach
                                </p>
                                <p class="text-xs text-gray-400">
                                    &middot; {{ $content->created_at->diffForHumans() }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endforeach

    </div>
@endsection
