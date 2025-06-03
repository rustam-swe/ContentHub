<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Web\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
public function index(Request $request)
    {
    $categories = Category::with(['contents.authors'])->orderBy('id')->get();

    return view('pages.home.index', compact('categories'));
    }
}
