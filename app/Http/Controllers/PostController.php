<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function admin()
    {
        $posts = Post::latest()->paginate(10);
        return view('admin.dashboard', compact('posts'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:200',
            'slug' => 'required|unique:posts,slug',
            'category' => 'required',
            'content' => 'required|min:300',
            'status' => 'required|in:draft,published,scheduled',
            'published_at' => 'nullable|date',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'category' => $request->category,
            'content' => $request->content,
            'status' => $request->status,
            'published_at' => $request->status == 'scheduled' && $request->published_at ? $request->published_at : null,
            'user_id' => Auth::id() ?? 1,
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
            'category' => 'required',
            'content' => 'required|min:300',
            'status' => 'required|in:draft,published,scheduled,archived',
            'published_at' => 'nullable|date',
        ]);

        $post = Post::findOrFail($id);
        $post->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'category' => $request->category,
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
