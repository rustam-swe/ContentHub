<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController
{
    public function index()
    {


        $authors = Author::all();
        return response()->json($authors);
    }

    public function create()
    {
        // return response()->json(['message' => 'Create author form not applicable for API.'], 405);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|max:255',
        ]);

        $author = Author::create($validated);
        return response()->json($author, 201);
    }

    public function show(string $id)
    {
        $author = Author::findOrFail($id);
        return response()->json($author);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'url' => 'sometimes|required|url|max:255',
        ]);

        $author = Author::findOrFail($id);
        $author->update($validated);

        return response()->json($author);
    }

    public function destroy(string $id)
    {
        $author = Author::findOrFail($id);
        $author->delete();

        return response()->json(['message' => 'Author deleted successfully.'], 200);
    }

    public function showContents(string $id)
    {
        $author = Author::findOrFail($id);
        $contents = $author->contents;
        return response()->json($contents);
    }
}
