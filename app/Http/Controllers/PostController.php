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
        $posts = Post::with('categories')->latest()->paginate(10);
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
            'categories' => 'required|array',
            'categories.*' => 'exists:news_categories,id',
            'content' => 'required|min:100',
            'status' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $slug = Str::slug($request->title);
        if (Post::where('slug', $slug)->exists()) {
            $slug .= '-' . time();
        }

        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->storeAs('posts', $filename, 'public');
        } else {
            $filename = null;
        }

        $post = Post::create([
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->content,
            'status' => $request->status,
            'published_at' => $request->status == 'published' ? now() : null,
            'image' => $filename,
            'user_id' => Auth::id(),
        ]);

        // 🔥 INI WAJIB
        $post->categories()->sync($request->categories);

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
            'categories' => 'required|array',
            'categories.*' => 'exists:news_categories,id',
            'image' => 'nullable|image|max:2048', // 🔥
        ]);

        $slug = Str::slug($request->title);
        if (Post::where('slug', $slug)->where('id', '!=', $post->id)->exists()) {
            $slug .= '-' . time();
        }

        // Jika user upload gambar baru
        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->storeAs('posts', $filename, 'public');
        } else {
            $filename = $post->image; // pakai gambar lama
        }

        $status = $request->action == 'publish' ? 'published' : 'draft';

        $post->update([
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->content,
            'status' => $status,
            'published_at' => $status == 'published' ? now() : null,
            'image' => $filename,
        ]);

        $post->categories()->sync($request->categories);
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
