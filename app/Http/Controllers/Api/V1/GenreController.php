<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController
{
    public function index()
    {
        $genres = Genre::all();
        return response()->json(['genres' => $genres]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $genre = Genre::create($validated);
        return response()->json(['genre' => $genre], 201);
    }

    public function show(string $id)
    {
        $genre = Genre::findOrFail($id);
        return response()->json(['genre' => $genre]);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
        ]);

        $genre = Genre::findOrFail($id);
        $genre->update($validated);

        return response()->json(['genre' => $genre]);
    }

    public function destroy(string $id)
    {
        $genre = Genre::findOrFail($id);
        $genre->delete();

        return response()->json(['message' => 'Genre deleted successfully.']);
    }

    public function showContents(string $id)
    {
        $genre = Genre::findOrFail($id);
        $contents = $genre->contents;
        return response()->json(['contents' => $contents]);
    }
}
