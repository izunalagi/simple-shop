@extends('layouts.app')

@section('title', 'Post Index Page')

@section('scripts')
    {{--  --}}
@endsection

@section('content')
    <h5 class="mb-4">Edit Product</h5>
    <form action="{{ route('post.update', $post->id) }}" method="post"
        enctype="multipart/form-data>
        @method('PUT')
        @csrf
        <div class="mb-3">
        <label for="name" class="form-label">Judul</label>
        <input type="text" name="title" class="form-control" id="title" value="{{ $post->title }}">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Deskripsi</label>
            <textarea name="description" id="description">{{ $post->description }}</textarea>
        </div>

        <div class="d-flex">
            <button type="submit" class="btn btn-primary me-3">Simpan</button>
            <a href="{{ route('post.index') }}" type="button" class="btn btn-danger">Batal</a>
        </div>
    </form>
@endsection

@section('js')
    {{--  --}}
@endsection
