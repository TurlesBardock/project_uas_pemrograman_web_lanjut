<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\NewsCategory;


class BlogController extends Controller
{

    public function create()
    {
        $categories = NewsCategory::all();
        return view('create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'image' => 'nullable|image'
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('posts', $imageName, 'public');
        }

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imageName,
            'category_id' => $request->category_id
        ]);

        return redirect('/');
    }

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

    public function category($slug)
    {
        $category = NewsCategory::where('slug', $slug)->firstOrFail();

        $posts = Post::where('category_id', $category->id)
            ->where('status', 'published')
            ->latest()
            ->paginate(9);

        return view('category', compact('category', 'posts'));
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
