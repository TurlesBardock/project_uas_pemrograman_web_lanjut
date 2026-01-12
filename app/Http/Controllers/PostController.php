<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\NewsCategory;
use Illuminate\Support\Str;

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
            'image' => 'nullable|image|max:2048',
        ]);

        // ===============================
        // HANDLE UPLOAD IMAGE
        // ===============================
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            // SIMPAN KE storage/app/public/posts
            $image->storeAs('posts', $filename, 'public');
        } else {
            $filename = null;
        }

        // ===============================
        // SAVE POST
        // ===============================
        $post = Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category_id' => $request->category_id,
            'content' => $request->content,
            'status' => $request->status,
            'published_at' => $request->status == 'scheduled'
                ? $request->published_at
                : ($request->status == 'published' ? now() : null),
            'image' => $filename,        // 🔥 INI YANG HILANG
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('post.show', $post->slug)
            ->with('success', 'Artikel berhasil dibuat!');
    }


    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = NewsCategory::all();
        return view('edit', compact('post', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:200',
            'slug' => 'required|unique:posts,slug,' . $id,
            'category_id' => 'required|exists:news_categories,id',
            'content' => 'required|min:300',
            'status' => 'required|in:draft,published,scheduled,archived',
            'published_at' => 'nullable|date',
        ]);

        $post = Post::findOrFail($id);

        // default dari form
        $status = $request->status;

        // override dari tombol
        if ($request->action === 'publish') {
            $status = 'published';
        }

        if ($request->action === 'save_draft') {
            $status = 'draft';
        }

        $post->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category_id' => $request->category_id,
            'content' => $request->content,
            'status' => $status,
            'published_at' => $status === 'published' ? now() : null,
        ]);

        return redirect()
            ->route('post.show', $post->slug)
            ->with('success', 'Artikel berhasil diperbarui!');
    }


    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Artikel berhasil dihapus!');
    }
}
