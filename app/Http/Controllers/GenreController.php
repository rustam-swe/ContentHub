<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{

    public function index()
    {
        $genres = Genre::all();
        return view('genre.index', ['genres' => $genres]);
    }

    public function create()
    {
        return view('genre.create');
    }

    public function store(Request $request)
    {
        $genre = new Genre();
        $genre->name = $request->input('name');
        $genre->save();

        return redirect('/genres');
    }

    public function show(Genre $genre)
    {
        return view('genre.show', ['genre' => $genre]);
    }

    public function edit(Genre $genre)
    {
        return view('genre.edit', ['genre' => $genre]);
    }

    public function update(Request $request, Genre $genre)
    {
        $genre->update($request->all());
        return redirect('/genres');
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect('/genres');
    }
}
