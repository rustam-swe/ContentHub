<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use App\Models\Category;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = Content::with('category')->get();

        return view('content.index', ['contents' => $contents]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('content.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $content = new Content();
        $content->title = $request->input('title');
        $content->description = $request->input('description');
        $content->url = $request->input('url');
        $content->category_id = $request->input('category_id');
        $content->save();
        return redirect('/contents');
    }

    /**
     * Display the specified resource.
     */
    public function show(Content $content)
    {
        return view('content.show', ['content' => $content]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Content $content)
    {
        $categories = Category::all();
        return view('content.edit', ['content' => $content, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Content $content)
    {
        $content->update($request->all());
        return redirect('/contents');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Content $content)
    {
        $content->delete();
        return redirect('/contents');
    }
}
