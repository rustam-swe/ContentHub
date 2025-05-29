<?php

namespace App\Http\Controllers\Web;

use App\Models\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Services\ContentController;
use App\Models\Category;

class HomeController extends Controller
{
public function index(Request $request)
{
    $filter = $request->query('category');

    $contentsQuery = Content::with(['category', 'authors']);

    if ($filter && strtolower($filter) !== 'all') {
        $contentsQuery->whereHas('category', function ($query) use ($filter) {
            $query->where('name', 'LIKE', '%' . $filter . '%');
        });
    }

    $contents = $contentsQuery->latest()->paginate(20)->withQueryString();

    return view('pages.home.index', compact('contents', 'filter'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
