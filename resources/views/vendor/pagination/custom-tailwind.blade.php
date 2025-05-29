@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center items-center space-x-1 text-white text-sm">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="px-3 py-1 rounded bg-gray-700/50 cursor-not-allowed">&laquo;</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-1 rounded bg-gray-800 hover:bg-gray-600 transition">&laquo;</a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="px-3 py-1 text-gray-400">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="px-3 py-1 bg-blue-600 rounded font-bold">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="px-3 py-1 rounded hover:bg-gray-700 transition">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-1 rounded bg-gray-800 hover:bg-gray-600 transition">&raquo;</a>
        @else
            <span class="px-3 py-1 rounded bg-gray-700/50 cursor-not-allowed">&raquo;</span>
        @endif
    </nav>
@endif
