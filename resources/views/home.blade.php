@extends('layouts.layout2')

@section('title', 'Blog Home')

@section('content')
    {{-- Success Message --}}
    @if (session('success'))
        <p><strong>{{ session('success') }}</strong></p>
    @endif

    <h1>My Blog</h1>

    <a href="/post/create">+ Tambah Post Baru</a>

    <hr>

    {{-- search --}}
    <form action="/" method="GET">
        <input type="text" value="{{ request('search') }}" name="search" placeholder="cari post...">
        <button type="submit">Search</button>
        @if ($search ?? false)
            <a href="/">clear</a>
        @endif
    </form>

    @foreach($posts as $post)
        <div>
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
            <p>
                <small>Created: {{ $post->created_at->diffForHumans() }}</small>
            </p>
            <p>
                <a href="/post/{{ $post->id }}">Read More</a> |
                <a href="/post/{{ $post->id }}/edit">Edit</a> |
                <form action="/post/{{ $post->id }}" method="POST" style="display:inline"
                      onsubmit="return confirm('Yakin mau hapus post ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </p>
            <hr>
        </div>
    @endforeach
    {{ $posts->links() }}
    <p>menampilkkan {{ $posts->firstItem() }} hingga
        {{ $posts->lastItem() }} dari total {{ $totalposts }} post</p>
@endsection