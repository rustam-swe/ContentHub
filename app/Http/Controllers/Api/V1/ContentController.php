<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = Content::all();
        return response()->json($contents);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'url' => 'required|url',
            'category_id' => 'required|integer|exists:categories,id',
            'author_ids' => 'sometimes|array',
            'genre_ids' => 'sometimes|array',
        ]);
        $content = Content::create($validated);
        if ($request->has('author_ids')) {
            $content->authors()->attach($request->input('author_ids'));
        }
        if ($request->has('genre_ids')) {
            $content->genres()->attach($request->input('genre_ids'));
        }
        return response()->json([$content], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $content = Content::findOrFail($id);
        return response()->json($content);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $content = Content::findOrFail($id);
        return response()->json($content);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $content = Content::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'url' => 'sometimes|required|url',
            'category_id' => 'sometimes|required|integer|exists:categories,id',
            'author_ids' => 'sometimes|array',
            'author_ids.*' => 'integer|exists:authors,id',
            'genre_ids' => 'sometimes|array',
            'genre_ids.*' => 'integer|exists:genres,id',
        ]);

        $content->update($validated);

        if ($request->has('author_ids')) {
            $content->authors()->sync($validated['author_ids']);
        }

        if ($request->has('genre_ids')) {
            $content->genres()->sync($validated['genre_ids']);
        }

        return response()->json($content);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $content = Content::findOrFail($id);
        $content->delete();
        return response()->json(['message' => 'Content deleted successfully']);
    }

    public function showAuthors(string $id)
    {
        $content = Content::findOrFail($id);
        return response()->json($content->authors);
    }

    public function showGenres(string $id)
    {
        $content = Content::findOrFail($id);
        return response()->json($content->genres);
    }
}
