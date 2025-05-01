@extends('home')

@section('content')
<div class="container">
    <div class="mb-4">
        <h2 class="fw-bold">Kategoriya: {{ $category->name }}</h2>
        <p class="text-muted">Yaratilgan: {{ $category->created_at->format('Y-m-d H:i') }}</p>
    </div>

    @if($category->contents->count())
    <div class="row">
        @foreach($category->contents as $content)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">
                        <a href="{{ route('contents.show', $content->id) }}" class="text-decoration-none">
                            {{ $content->title }}
                        </a>
                    </h5>
                    <p class="card-text text-truncate">{{ $content->description }}</p>
                    <a href="{{ $content->url }}" target="_blank" class="btn btn-outline-primary mt-auto">
                        Videoga o'tish
                    </a>
                </div>
                <div class="card-footer text-muted small">
                    Qo‘shilgan sana: {{ $content->created_at->format('Y-m-d H:i') }}
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
