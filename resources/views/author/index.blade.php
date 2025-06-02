@extends('home')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-white">Authorlar ro'yxati</h1>
        @role('admin')
        <a href="/authors/create" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            Yangi foydalanuvchi qo'shish
        </a>
        @endrole
    </div>

    <!-- Grid layout: 5 authors per row -->
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
        @foreach($authors as $author)
            <div class="bg-gray-900 rounded-xl shadow-lg hover:shadow-2xl transition p-4 flex flex-col items-center text-center">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjDGMp734S91sDuUFqL51_xRTXS15iiRoHew&s"
                     alt="Author avatar"
                     class="w-36 h-36 rounded-full object-cover border-2 border-gray-700 mb-4">

                <h2 class="text-lg font-semibold text-white mb-1">
                    <a href="/authors/{{ $author->id }}" class="hover:text-blue-400 transition">
                        {{ $author->name }}
                    </a>
                </h2>

                <a href="{{ $author->url }}" target="_blank"
                   class="text-sm text-blue-400 hover:underline mb-4">
                    Profilga o'tish
                </a>
                @role('admin')
                <div class="flex gap-2 mt-auto">
                    <a href="/authors/{{ $author->id }}/edit"
                       class="px-3 py-1 bg-yellow-500 text-sm text-white rounded hover:bg-yellow-600 transition">
                        Edit
                    </a>
                    <form action="/authors/{{ $author->id }}" method="POST"
                          onsubmit="return confirm('Haqiqatan ham o‘chirmoqchimisiz?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="px-3 py-1 bg-red-600 text-sm text-white rounded hover:bg-red-700 transition">
                            O'chirish
                        </button>
                    </form>
                </div>
                @endrole
            </div>
        @endforeach
    </div>
</div>
@endsection
