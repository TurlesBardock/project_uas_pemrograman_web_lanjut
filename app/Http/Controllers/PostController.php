<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    // DASHBOARD
    public function admin()
    {
        $posts = Post::with('category')->latest()->paginate(10);
        return view('admin.dashboard', compact('posts'));
    }

    // CREATE FORM
    public function create()
    {
        $categories = NewsCategory::all();
        return view('create', compact('categories'));
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:200',
            'category_id' => 'required',
            'content' => 'required|min:100',
            'status' => 'required',
        ]);

        $slug = Str::slug($request->title);

        if (Post::where('slug', $slug)->exists()) {
            $slug .= '-' . time();
        }

        $post = Post::create([
            'title' => $request->title,
            'slug' => $slug,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'status' => $request->status,
            'published_at' => $request->status == 'published' ? now() : null,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('post.show', $post->slug);
    }

    // EDIT
    public function edit(Post $post)
    {
        $categories = NewsCategory::all();
        return view('edit', compact('post', 'categories'));
    }

    // UPDATE
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:200',
            'content' => 'required|min:100',
            'status' => 'required',
        ]);

        $slug = Str::slug($request->title);

        if (Post::where('slug', $slug)->where('id', '!=', $post->id)->exists()) {
            $slug .= '-' . time();
        }

        $status = $request->action == 'publish' ? 'published' : 'draft';

        $post->update([
            'title' => $request->title,
            'slug' => $slug,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'status' => $status,
            'published_at' => $status == 'published' ? now() : null,
        ]);

        return redirect()->route('post.show', $slug)
            ->with('success', 'Artikel diperbarui');
    }

    // DELETE
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.dashboard');
    }
}
