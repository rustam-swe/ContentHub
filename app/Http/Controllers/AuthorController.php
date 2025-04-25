<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('author.index', ['authors' => $authors]);
    }

    public function create()
    {
        return view('author.create');
    }

    public function store(Request $request)
    {
        $author = new Author();
        $author->name = $request->input('name');
        $author->url = $request->input('url');
        $author->save();
        return redirect('/authors');
    }

    public function show(Author $author)
    {
        return view('author.show', ['author' => $author]);
    }

    public function edit(Author $author)
    {
        return view('author.edit', ['author' => $author]);
    }

    public function update(Request $request, Author $author)
    {
        $author->update($request->all());
        return redirect('/authors');
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return redirect('/authors');
    }
}
