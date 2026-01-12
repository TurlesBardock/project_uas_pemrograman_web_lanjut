@extends('layouts.layout2')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Admin Dashboard</h1>

    <a href="{{ route('post.create') }}" class="btn btn-primary mb-4">
        + Tambah Artikel
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ optional($post->category)->title ?? '-' }}</td>
                <td>{{ $post->status }}</td>
                <td>{{ $post->created_at->format('d M Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $posts->links() }}
</div>
@endsection
