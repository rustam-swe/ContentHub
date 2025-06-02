@foreach ($categories as $category)
    @if ($category->name === $type && $category->contents->isNotEmpty())
        <div class="mt-4">
            <h2 class="text-xl font-bold text-white mb-4">{{ ucfirst($title) }}</h2>
            <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 {{ $category->name === 'book' ? 'lg:grid-cols-5' : 'lg:grid-cols-4' }}">
                @foreach ($category->contents as $content)
                    @php
                        $isBook = $category->name === 'book';
                    @endphp
                    <a href="/contents/{{ $content->id }}"
                        class="block {{ $isBook ? 'bg-blue-900 border border-blue-400' : 'bg-[#181818]' }} rounded-lg overflow-hidden shadow-sm hover:shadow-md hover:rounded-none transition-shadow duration-300">
                        <div class="w-full {{ $isBook ? 'aspect-[3/4]' : 'aspect-video' }} relative">
                            <img src="https://www.carscoops.com/wp-content/uploads/2020/05/Facelift-BMW-5-Series-1024x555.jpg"
                                alt="Image" class="w-full h-full object-cover" />
                        </div>
                        <div class="p-4 text-white flex flex-col">
                            <h3 class="text-base font-semibold truncate mb-1">
                                {!! $content->title !!}
                            </h3>
                            <p class="text-xs text-gray-400 truncate mb-1">
                                @foreach ($content->authors as $author)
                                    <span class="hover:text-white underline">
                                        {{ $author->name }}
                                    </span>{{ !$loop->last ? ', ' : '' }}
                                @endforeach
                            </p>
                            <p class="text-xs {{ $isBook ? 'text-blue-300' : 'text-gray-400' }}">
                                {{ $category->name }} &middot; {{ $content->created_at->diffForHumans() }}
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif
@endforeach
