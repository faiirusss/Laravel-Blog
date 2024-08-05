<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('home', [
            'featuredPosts' => Post::published()
                ->featured()
                ->with('categories')
                ->latest('published_at')
                ->take(10)
                ->get(),
            'latestPosts' => Post::published()
                ->featured()
                ->with('categories')
                ->latest('published_at')
                ->take(10)
                ->get(),
        ]);
    }
}
