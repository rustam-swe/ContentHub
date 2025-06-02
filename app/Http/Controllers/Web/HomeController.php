<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
public function index(Request $request)
    {
        $filter = $request->query('category');

        $categoriesQuery = Category::query();
        if ($filter && strtolower($filter) !== 'all') {
            $categoriesQuery->where('name', 'LIKE', '%' . $filter);
            return view('pages.home.index', [
                'categories' => $categoriesQuery->get(),
                'filter' => $filter,
            ]);
        }

        $categories = $categoriesQuery->get();

        $categories = $categories->map(function ($category) {
            $limit = (strtolower($category->name) === 'book') ? 5 : 4;
            $randomContents = $category->contents()->inRandomOrder()->take($limit)->get();
            $category->setRelation('contents', $randomContents);
            return $category;
        });

        return view('pages.home.index', compact('categories', 'filter'));
    }
}
