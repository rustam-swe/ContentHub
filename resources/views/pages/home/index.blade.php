@extends('home')

@section('content')

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
        <x-content :categories="$categories" type="book" title="Book" />
        <x-content :categories="$categories" type="id" title="Id" />
        <x-content :categories="$categories" type="dolor" title="Dolor" />
        <x-content :categories="$categories" type="placeat" title="Placeat" />
        <x-content :categories="$categories" type="dolores" title="Dolores" />
        <x-content :categories="$categories" type="eius" title="Eius" />
        <x-content :categories="$categories" type="recusandae" title="Recusandae" />
        <x-content :categories="$categories" type="aliquam" title="Aliquam" />
        <x-content :categories="$categories" type="deleniti" title="Deleniti" />
        <x-content :categories="$categories" type="error" title="Error" />
        {{-- <div class="mt-4 col-span-full">
            {{ $contents->onEachSide(1)->links('vendor.pagination.custom-tailwind') }}
        </div> --}}
@endsection
