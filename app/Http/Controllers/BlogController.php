<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function home(Request $request)
    {
        $search = $request->get('search');
        $query = Post::query();

        if ($search) {
            $query->where(function($antri) use ($search) {
                $antri->where('title', 'LIKE', "%{$search}%")
                      ->orWhere('content', 'LIKE', "%{$search}%");
            });
        }

        $posts = $query->latest()->paginate(5);
        $posts->appends(['search' => $search]);
        $totalposts = Post::count();
        return view('home', compact('posts', 'totalposts', 'search'));
    }

    // single kalo diklik satu2
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('post', compact('post'));
    }

    //halaman tentang
    public function about()
    {
        $info = Post::aboutInfo();

        return view('about', compact('info'));
    }

    public function create()
    {
        return view('create');
    }


    

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // Simpan database
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        // redirek trs suskes
        return redirect('/')->with('success', 'Post berhasil ditambahkan!');
    }

    // UPDATE form
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('edit', compact('post'));
    }

    // UPDATE data
    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // Cari post dan update
        $post = Post::findOrFail($id);
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        // Redirect update berhasil
        return redirect('/')->with('success', 'Post berhasil diupdate!');
    }

    // DELETE - Hapus data
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        // Redirect delete berhasil
        return redirect('/')->with('success', 'Post berhasil dihapus!');
    }
}
