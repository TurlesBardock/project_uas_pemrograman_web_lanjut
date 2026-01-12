<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\NewsCategory;

class PostController extends Controller
{
    public function admin()
    {
        $posts = Post::with('category')->latest()->paginate(10);
        return view('admin.dashboard', compact('posts'));
    }

    public function create()
    {
        $categories = NewsCategory::all();
        return view('create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:200',
            'slug' => 'required|unique:posts,slug',
            'category_id' => 'required|exists:news_categories,id',
            'content' => 'required|min:300',
            'status' => 'required|in:draft,published,scheduled',
            'published_at' => 'nullable|date',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'category_id' => $request->category_id, // ✅
            'content' => $request->content,
            'status' => $request->status,
            'published_at' => $request->status == 'scheduled' ? $request->published_at : null,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('post.show', $post->id)->with('success', 'Artikel berhasil dibuat!');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:200',
            'slug' => 'required|unique:posts,slug,' . $id,
            'category_id' => 'required|exists:news_categories,id',  
            'content' => 'required|min:300',
            'status' => 'required|in:draft,published,scheduled,archived',
            'published_at' => 'nullable|date',
        ]);

        $post = Post::findOrFail($id);
        $post->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'status' => $request->status,
            'published_at' => $request->status == 'scheduled' && $request->published_at ? $request->published_at : null,
        ]);

        return redirect()->route('post.show', $post->id)->with('success', 'Artikel berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Artikel berhasil dihapus!');
    }
}
