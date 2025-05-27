@extends('home')

@section('content')
    <div class="container mt-4">
        @if ($message = session('message'))
            <div id="alert-message" class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card shadow">
            <div class="d-flex card-body">
                <div class="p-4 w-60">
                    <h1 class="mb-3 text-primary">
                        <a href="{{ $content->url }}" target="_blank">{{ $content->title }}</a>
                    </h1>
                    <iframe width="100%" height="500" src="{{ $content->url }}" title="Content video" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>


                    {{-- Kategoriya va sanasi --}}
                    <p class="text-muted">
                        <strong>Turkum:</strong>
                        <a href="/categories/{{ $content->category_id }}">{{ $content->category->name }}</a> |
                        <strong>Yaratilgan:</strong>
                        {{ $content->created_at->format('Y-m-d H:i') }}
                    </p>

                    <div class="mb-3">
                        <form action="/contents/{{ $content->id }}/like" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">
                                ❤️ Like ({{ $content->likedUsers()->count() }})
                            </button>
                        </form>

                    </div>

                    <p class="card-text">{{ $content->description }}</p>
                </div>
                <div class="p-4 w-30 border rounded">

                    <h5>Janrlar:</h5>
                    <ul class="list-group">
                        @foreach ($content->genres as $genre)
                            <li class="list-group-item">
                                <a href="/genres/{{ $genre->id }}">{{ $genre->name }}</a>
                            </li>
                        @endforeach
                    </ul>

                    <h5 class="mt-3">Mualliflar:</h5>
                    <ul class="list-group mb-3">
                        @foreach ($content->authors as $author)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="/authors/{{ $author->id }}">{{ $author->name }}</a>
                                <a href="{{ $author->url }}" class="btn btn-sm btn-outline-info text-nowrap"
                                    style="white-space: nowrap;" target="_blank">
                                    Profilga o'tish
                                </a>

                            </li>
                        @endforeach
                    </ul>

                    <h5 class="mt-3">O'xshash contentlar</h5>
                    <ul class="list-group">
                        @foreach ($releatedContents as $releatedContent)
                            <li
                                class="list-group-item d-flex align-items-center p-0 overflow-hidden rounded border mb-2 pe-2">
                                <img src="https://picsum.photos/640/360" class="me-3" width="80" height="80"
                                    alt="Random image">
                                <a class="d-block"
                                    href="/contents/{{ $releatedContent->id }}">{{ $releatedContent->title }}</a>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        setTimeout(function() {
            var alert = document.getElementById('alert-message');
            if (alert) {
                var bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
                bsAlert.close();
            }
        }, 4000); // 4 sekunddan keyin yopiladi
    </script>
@endpush
