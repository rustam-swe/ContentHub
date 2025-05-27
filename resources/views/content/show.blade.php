@extends('home')

@section('content')
    @php
        $liked = auth()->check() && $content->likedUsers->contains(auth()->id());
    @endphp
    <div class="container mt-4">
        @if ($message = session('message'))
            <div id="alert-message" class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card shadow">
            <div class="d-flex card-body">
                <div class="p-4" style="min-width: 70%;">
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
                            <button type="submit" class="btn {{ $liked ? 'btn-outline-danger' : 'btn-outline-secondary' }}">
                                {{ $liked ? '❤️' : '🩶' }} Like ({{ $content->likedUsers->count() }})
                            </button>
                        </form>
                    </div>

                    <p class="card-text">{{ $content->description }}</p>

                    <h4 class="border-bottom pb-1 mb-4">Comments</h4>

                    @foreach ($content->comments as $comment)
                        <div class="mb-2 pb-2">
                            <div class="mb-1 d-flex justify-content-between">

                                <div class="mb-1">
                                    <strong>{{ $comment->user->name }}</strong>
                                    <span>{{ $comment->created_at->diffForHumans() }}</span>
                                </div>
                                @if ($comment->user_id === auth()->id())
                                    <form action="/comments/{{ $comment->id }}" method="POST"
                                        onsubmit="return confirm('Are you sure?')" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                @endif
                            </div>
                            <p class="border rounded px-3 py-2">{{ $comment->body }}</p>
                        </div>
                    @endforeach

                    @auth
                        <form action="/contents/{{ $content->id }}/comments" method="POST">
                            @csrf
                            <div class="mb-3">
                                <textarea name="body" rows="3" class="form-control" placeholder="Write a comment..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Comment</button>
                        </form>
                    @else
                        <p><a href="{{ route('login') }}">Log in</a> to comment.</p>
                    @endauth

                </div>
                <div class="p-4 border rounded" style="min-width: 30%;">

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
