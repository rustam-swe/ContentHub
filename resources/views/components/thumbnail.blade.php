@foreach ($contents as $content)
    <div>
        <a href="/contents/{{ $content->id }}"
           class="_thumbnail {{$orientation}} block bg-[#181818] rounded-lg overflow-hidden shadow-sm hover:shadow-md hover:rounded-none transition-shadow duration-300">
            <div class="w-full aspect-video relative">
                <img
                    src="https://bmw.scene7.com/is/image/BMW/g90_driving-dynamics_fb?qlt=80&wid=1024&fmt=webp"
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
        </a>
    </div>
@endforeach

<style>
    .section-title {
        color: rebeccapurple;
    }
    ._thumbnail {
        width: 360px;
        height: 200px;
        border: 1px solid yellow;
        margin: 10px 0;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    ._thumbnail.portrait {
        width: 200px;
        height: 360px;
    }
</style>
