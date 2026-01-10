@extends('layouts.layout2')

@section('title', 'Edit Post')

@section('content')
    <h1>Edit Post</h1>

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div>
            <strong>Error:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form edit post --}}
    <form action="/post/{{ $post->id }}" method="POST">
        @csrf
        @method('PUT')
        
        <p>
            <label for="title">Title:</label><br>
            <input type="text" 
                   id="title" 
                   name="title" 
                   value="{{ old('title', $post->title) }}"
                   size="50">
            @error('title')
                <br><small style="color:red;">{{ $message }}</small>
            @enderror
        </p>

        <p>
            <label for="content">Content:</label><br>
            <textarea id="content" 
                      name="content" 
                      rows="10"
                      cols="50">{{ old('content', $post->content) }}</textarea>
            @error('content')
                <br><small style="color:red;">{{ $message }}</small>
            @enderror
        </p>

        <p>
            <button type="submit">Update</button>
            <a href="/post/{{ $post->id }}">Batal</a>
        </p>
    </form>
@endsection