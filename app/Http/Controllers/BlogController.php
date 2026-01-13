<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\NewsCategory;


class BlogController extends Controller
{

    public function create()
    {
        $categories = \App\Models\NewsCategory::all();
        return view('create', compact('categories'));
    }

    public function index()
    {
        $categories = \App\Models\NewsCategory::limit(12)->get();

        $postsByCategory = \App\Models\Post::whereHas('categories', function ($q) use ($categories) {
            $q->whereIn('news_categories.id', $categories->pluck('id'));
        })
            ->where('status', 'published')
            ->latest()
            ->get()
            ->groupBy(function ($post) {
                return $post->categories->first()?->id;
            });

        return view('home', compact('categories', 'postsByCategory'));
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


    public function show(Post $post)
    {
        return view('show', compact('post'));
    }

    public function about()
    {
        $team = [
            [
                'name' => 'Putu Gunadhi Pasha',
                'role' => 'Editor in Chief',
                'photo' => 'about/Pasha.jpeg',
            ],
            [
                'name' => 'M. Alvin Al Barri',
                'role' => 'Journalist',
                'photo' => 'about/Alvin.jpeg',
            ],
            [
                'name' => 'Alif Fattah Haq',
                'role' => 'Tech Editor',
                'photo' => 'about/Alif.jpeg',
            ],
            [
                'name' => 'Rian Alfian',
                'role' => 'Reporter',
                'photo' => 'about/Rian.jpeg',
            ],
            [
                'name' => 'Syafii Maulana',
                'role' => 'Data Analyst',
                'photo' => 'about/Syafii.jpeg',
            ],
        ];

        return view('about', compact('team'));
    }
}
