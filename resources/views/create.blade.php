@extends('layouts.layout2')

@section('title', 'Tambah Post Baru')

@section('content')
    <h1>Tambah Post Baru</h1>

    {{-- validasi eror --}}
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

    {{-- rombok post kanak --}}
    <form action="/post" method="POST">
        @csrf
        
        <p>
            <label for="title">Title:</label><br>
            <input type="text" 
                   id="title" 
                   name="title" 
                   value="{{ old('title') }}"
                   placeholder="Masukkan judul post"
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
                      cols="50"
                      placeholder="Masukkan isi post">{{ old('content') }}</textarea>
            @error('content')
                <br><small style="color:red;">{{ $message }}</small>
            @enderror
        </p>

        <p>
            <button type="submit">Simpan</button>
            <a href="/">Batal</a>
        </p>
    </form>
@endsection