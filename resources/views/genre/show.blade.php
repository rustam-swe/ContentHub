@extends('home')

@section('content')
<div class="container">
    <div class="mb-4">
        <h2 class="fw-bold">Janr: {{ $genre->name }}</h2>
        <p class="text-muted">Yaratilgan: {{ $genre->created_at->format('Y-m-d H:i') }}</p>
    </div>

    @if($genre->contents->count())
    <div class="row">
        @foreach($genre->contents as $content)
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
                        YouTube havolasi
                    </a>
                </div>
                <div class="card-footer text-muted small">
                    Qo‘shilgan: {{ $content->created_at->format('Y-m-d H:i') }}
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="alert alert-warning">
        Ushbu janrga hali kontent biriktirilmagan.
    </div>
    @endif
</div>
@endsection
