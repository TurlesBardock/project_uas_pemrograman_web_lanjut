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
            <th>Aksi</th>
        </tr>
        </thead>

        <tbody>
            @foreach($posts as $post)
          <tr>
            <td>{{ $post->title }}</td>
                <td>
                    @foreach($post->categories as $cat)
                        <span class="badge bg-primary me-1">{{ $cat->title }}</span>
                    @endforeach
                </td>
            <td>{{ $post->status }}</td>
            <td>{{ $post->created_at->format('d M Y') }}</td>
            <td>
                <a href="{{ route('post.show', $post->slug) }}" class="btn btn-sm btn-primary">
                    Edit
                </a>
            </td>
         </tr>

            @endforeach
        </tbody>
    </table>

    {{ $posts->links() }}
</div>
@endsection
