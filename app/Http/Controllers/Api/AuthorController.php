<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Author;

/**
 * @OA\Tag(
 *     name="Authors",
 *     description="Author management endpoints"
 * )
 */
class AuthorController
{
    /**
     * @OA\Get(
     *     path="/api/authors",
     *     tags={"Authors"},
     *     summary="Get all authors",
     *     @OA\Response(response=200, description="List of authors")
     * )
     */
    public function index()
    {
        $authors = Author::all();
        return response()->json($authors);
    }

    /**
     * @OA\Post(
     *     path="/api/authors",
     *     tags={"Authors"},
     *     summary="Create a new author",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name","url"},
     *             @OA\Property(property="name", type="string", example="John Doe"),
     *             @OA\Property(property="url", type="string", format="url", example="https://example.com")
     *         )
     *     ),
     *     @OA\Response(response=201, description="Author created successfully"),
     *     @OA\Response(response=422, description="Validation error")
     * )
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|max:255',
        ]);

        $author = Author::create($validated);
        return response()->json($author, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/authors/{id}",
     *     tags={"Authors"},
     *     summary="Get a single author by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response=200, description="Author data"),
     *     @OA\Response(response=404, description="Author not found")
     * )
     */
    public function show(string $id)
    {
        $author = Author::findOrFail($id);
        return response()->json($author);
    }

    /**
     * @OA\Put(
     *     path="/api/authors/{id}",
     *     tags={"Authors"},
     *     summary="Update an author",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string", example="Updated Name"),
     *             @OA\Property(property="url", type="string", format="url", example="https://updated-url.com")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Author updated"),
     *     @OA\Response(response=404, description="Author not found")
     * )
     */
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

    /**
     * @OA\Delete(
     *     path="/api/authors/{id}",
     *     tags={"Authors"},
     *     summary="Delete an author",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response=200, description="Author deleted"),
     *     @OA\Response(response=404, description="Author not found")
     * )
     */
    public function destroy(string $id)
    {
        $author = Author::findOrFail($id);
        $author->delete();

        return response()->json(['message' => 'Author deleted successfully.'], 200);
    }

    /**
     * @OA\Get(
     *     path="/api/authors/{id}/contents",
     *     tags={"Authors"},
     *     summary="Get contents by author",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response=200, description="List of contents"),
     *     @OA\Response(response=404, description="Author not found")
     * )
     */
    public function showContents(string $id)
    {
        $author = Author::findOrFail($id);
        $contents = $author->contents;
        return response()->json($contents);
    }
}
