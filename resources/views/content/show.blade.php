@extends('home')

@section('content')
    @php
        $liked = auth()->check() && $content->likedUsers->contains(auth()->id());
    @endphp

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 text-white">
        @if ($message = session('message'))
            <div id="alert-message" class="bg-green-500 text-white px-4 py-2 rounded shadow mb-4">
                {{ $message }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Main content --}}
            <div class="lg:col-span-2 space-y-6">
                <div class="space-y-3">
                    <h1
                        class="text-3xl md:text-4xl font-bold tracking-tight text-white hover:text-blue-400 transition-colors duration-200">
                        <a href="{{ $content->url }}" target="_blank">
                            {{ $content->title }}
                        </a>
                    </h1>
                    <div class="aspect-video rounded overflow-hidden">
                        <iframe class="w-full h-full" src="{{ $content->url }}" title="Content video" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                    <p class="text-sm text-gray-400">
                        <strong>Turkum:</strong>
                        <a href="/categories/{{ $content->category_id }}"
                            class="underline hover:text-blue-300">{{ $content->category->name }}</a>
                        |
                        <strong>Yaratilgan:</strong> {{ $content->created_at->format('Y-m-d H:i') }}
                    </p>

                    <form action="/contents/{{ $content->id }}/like" method="POST">
                        @csrf
                        <button type="submit"
                            class="inline-flex items-center px-3 py-1 rounded border {{ $liked ? 'border-red-500 text-red-500' : 'border-gray-400 text-gray-400' }} hover:bg-gray-700">
                            {{ $liked ? '❤️' : '🩶' }} Like ({{ $content->likedUsers->count() }})
                        </button>
                    </form>

                    <p class="text-gray-300">{{ $content->description }}</p>
                </div>

                {{-- Comments --}}
                <div>
                    <h2 class="text-xl font-semibold border-b border-gray-600 pb-2 mb-4">Comments</h2>
                    <div class="space-y-4">
                        @foreach ($content->comments as $comment)
                            <div class="bg-gray-800 p-4 rounded shadow">
                                <div class="flex justify-between items-center text-sm text-gray-400">
                                    <div>
                                        <strong>{{ $comment->user->name }}</strong>
                                        <span class="ml-2">{{ $comment->created_at->diffForHumans() }}</span>
                                    </div>
                                    @if ($comment->user_id === auth()->id())
                                        <form action="/comments/{{ $comment->id }}" method="POST"
                                            onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-400 hover:underline">Delete</button>
                                        </form>
                                    @endif
                                </div>
                                <p class="mt-2 text-gray-200">{{ $comment->body }}</p>
                            </div>
                        @endforeach
                    </div>

                    @auth
                        <form action="/contents/{{ $content->id }}/comments" method="POST" class="mt-6">
                            @csrf
                            <textarea name="body" rows="3"
                                class="w-full p-3 rounded bg-gray-900 border border-gray-700 text-white focus:outline-none focus:ring"
                                placeholder="Write a comment..."></textarea>
                            <button type="submit"
                                class="mt-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-500">Submit Comment</button>
                        </form>
                    @else
                        <p class="text-sm mt-4"><a href="{{ route('login') }}" class="text-blue-400 underline">Log in</a> to
                            comment.</p>
                    @endauth
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="space-y-6">
                <div>
                    <h3 class="text-lg font-semibold mb-2">Janrlar:</h3>
                    <ul class="space-y-1">
                        @foreach ($content->genres as $genre)
                            <li>
                                <a href="/genres/{{ $genre->id }}"
                                    class="hover:underline text-gray-300">{{ $genre->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-2">Mualliflar:</h3>
                    <ul class="space-y-2">
                        @foreach ($content->authors as $author)
                            <li class="flex items-center justify-between">
                                <a href="/authors/{{ $author->id }}"
                                    class="text-gray-300 hover:underline">{{ $author->name }}</a>
                                <a href="{{ $author->url }}" target="_blank"
                                    class="text-sm text-blue-400 hover:underline">Profilga o'tish</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-2">O'xshash kontentlar</h3>
                    <ul class="space-y-4">
                        @foreach ($releatedContents as $releatedContent)
                            <li class="flex items-center space-x-3">
                                <img src="https://picsum.photos/80" alt="thumbnail" class="w-20 h-20 object-cover rounded">
                                <a href="/contents/{{ $releatedContent->id }}"
                                    class="text-gray-300 hover:underline">{{ $releatedContent->title }}</a>
                            </li>
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
                alert.remove();
            }
        }, 4000);
    </script>
@endpush
