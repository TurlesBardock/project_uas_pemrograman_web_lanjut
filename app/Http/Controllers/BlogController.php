<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function home(Request $request)
    {
        $search = $request->get('search');
        $query = Post::where('status', 'published');

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('content', 'LIKE', "%{$search}%");
            });
        }

        $posts = $query->latest()->paginate(6);
        $posts->appends(['search' => $search]);
        $totalposts = Post::where('status', 'published')->count();

        return view('home', compact('posts', 'totalposts', 'search'));
    }

    public function category($category)
    {
        $categoryName = ucwords(str_replace('-', ' ', $category));

        $posts = Post::where('category', $category)
                    ->where('status', 'published')
                    ->latest()
                    ->paginate(9);

        $totalPosts = Post::where('category', $category)
                         ->where('status', 'published')
                         ->count();

        return view('category', compact('posts', 'categoryName', 'totalPosts'));
    }

    public function show($identifier)
    {
        $post = Post::where('id', $identifier)
                   ->orWhere('slug', $identifier)
                   ->firstOrFail();

        return view('show', compact('post'));
    }

    public function about()
    {
        return view('about');
    }
}
