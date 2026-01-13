@extends('layouts.layout2')

@section('title', $category->title . ' - Bumigora News')

@section('content')
<div class="container py-5">

    <h1 class="mb-4">{{ $category->title }}</h1>

    @if($posts->count() > 0)
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img
                        src="{{ $post->image
                            ? asset('storage/posts/' . $post->image)
                            : 'https://source.unsplash.com/600x400/?news' }}"
                        class="card-img-top">
                        <div class="card-body">
                            <h5>{{ $post->title }}</h5>
                            <p>{{ \Illuminate\Support\Str::limit($post->content, 100) }}</p>

                            <a href="{{ route('post.show', $post->slug) }}" class="btn btn-primary">
                                Read More
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

        {{ $posts->links() }}

    @else
        <p>Belum ada artikel di kategori ini.</p>
    @endif

</div>
@endsection
