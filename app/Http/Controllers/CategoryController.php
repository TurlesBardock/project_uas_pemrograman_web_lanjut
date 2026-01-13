<?php

namespace App\Http\Controllers;

use App\Models\NewsCategory;
use App\Models\Post;

class CategoryController extends Controller
{
    public function show($slug)
    {
        // Ambil kategori dari slug
        $category = NewsCategory::where('slug', $slug)->firstOrFail();

        // Ambil semua post yg punya kategori ini
        $posts = Post::whereHas('categories', function ($q) use ($category) {
            $q->where('news_categories.id', $category->id);
        })
            ->where('status', 'published')
            ->latest()
            ->paginate(9);

        return view('category', compact('category', 'posts'));
    }
}
