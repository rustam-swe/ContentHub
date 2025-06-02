<?php

namespace App\Http\Controllers\Web;

use App\Models\Content;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request): View|Application|Factory
    {
        $filter        = $request->query('category');
        $contentsQuery = Content::with(['category', 'authors']);

        if ($filter && strtolower($filter) !== 'all') {
            $contentsQuery->whereHas('category', function ($query) use ($filter) {
                $query->where('name', 'LIKE', '%'.$filter.'%');
            });
        }

        $contents = $contentsQuery->latest()->paginate(20)->withQueryString();

        return view('pages.home.index', compact('contents', 'filter'));
    }
}
