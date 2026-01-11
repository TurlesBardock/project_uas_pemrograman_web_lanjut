@extends('layouts.layout2')

@section('title', $category->title)

@section('content')
<h1>{{ $category->title }}</h1>

@foreach($posts as $post)
    <div>
        <h2>{{ $post->title }}</h2>

        @if($post->image)
            <img src="/storage/posts/{{ $post->image }}" width="300">
        @endif

        <p>{{ $post->content }}</p>

        <a href="/post/{{ $post->id }}">Read More</a>
        <hr>
    </div>
@endforeach

{{ $posts->links() }}
@endsection
