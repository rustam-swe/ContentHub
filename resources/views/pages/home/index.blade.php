@extends('home')

@section('content')
    <div>
        @if ($contents->isEmpty())
            <p class="text-white">Hech qanday content topilmadi.</p>
        @else
            <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($contents as $content)
                    <div>
                        <a href="/contents/{{ $content->id }}"
                           class="block bg-[#181818] rounded-lg overflow-hidden shadow-sm hover:shadow-md hover:rounded-none transition-shadow duration-300">
                            <div class="w-full aspect-video relative">

                                <img
                                    src="{{url("/storage/$content->url")}}"
                                    alt="Image" class="w-full h-full object-cover"/>
                            </div>
                            <div class="p-4 text-white flex flex-col">
                                <h3 class="text-base font-semibold truncate mb-1">
                                    {!! $content->title !!}
                                </h3>
                                <p class="text-xs text-gray-400 truncate mb-1">
                                    @foreach ($content->authors as $author)
                                        <a href="#" class="hover:text-white underline">
                                            {{ $author->name }}
                                        </a>{{ !$loop->last ? ', ' : '' }}
                                    @endforeach
                                </p>
                                <p class="text-xs text-gray-400">
                                    {{ $content->category->name }} &middot; {{ $content->created_at->diffForHumans() }}
                                </p>
                            </div>
                        </a></div>
                @endforeach
                <div class="mt-4 col-span-full">
                    {{ $contents->onEachSide(1)->links('vendor.pagination.custom-tailwind') }}
                </div>

            </div>
        @endif
    </div>
@endsection
