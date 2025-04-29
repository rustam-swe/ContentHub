@extends('home')
@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-body">
            <h1 class="card-title text-primary">{{ $author->name }}</h1>
            <p>
                <strong>Direct</strong>
                <a href="{{ $author->url }}" target="_blank">{{ $author->url }}</a>
            </p>

            <hr>

            <h4>Muallif yaratgan kontentlar:</h4>
            @if ($author->contents->isEmpty())
                <p>Hozircha hech qanday kontent mavjud emas.</p>
            @else
                <div class="list-group">
                    @foreach ($author->contents as $content)
                        <a href="{{ url('/contents/' . $content->id) }}" class="list-group-item list-group-item-action">
                            <h5 class="mb-1">{{ $content->title }}</h5>
                            <p class="mb-1">{{ Str::limit($content->description, 100) }}</p>
                            <small class="text-muted">Yaratilgan sana: {{ $content->created_at->format('Y-m-d H:i') }}</small>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
