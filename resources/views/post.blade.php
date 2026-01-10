@extends('layouts.layout2')

@section('title', $post['title'])

@section('content')
@if (session('success'))
<p>{{ session('success') }} </p>
    <h1>{{ $post->title }} </h1>
@endif
<p>
    dibuat pada: {{ $post->created_at->format('d M Y, H:i') }}
    @if ($post->updated_at != $post->created_at)
    diupdate: {{ $post->updated_at->diffForHumans() }}
    @endif
</p>

<hr>

<p> {{ $post->content }} </p>

<hr>
<p>
<a href="/"> kembali </a>
<a href="/post/{{ $post->id }}/edit"> Edit </a>
<form action = "/post/{{ $post->id }}" method="POST" onsubmit="return confirm('yakin?')">
    @method('DELETE')
    <button type="submit"> HAPUS</button>
</form>
</p>
@endsection