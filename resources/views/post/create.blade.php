@extends('layouts.app')

@section('title', 'Post Index Page')

@section('scripts')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
@endsection

@section('content')
    <h5 class="mb-4">Tambah Post</h5>
    <form action="{{ route('post.store') }}" method="post"
        enctype="multipart/form-data>
        @csrf
        <div class="mb-3">
        <label for="name" class="form-label">Judul</label>
        <input type="text" name="title" class="form-control" id="title">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Deskripsi</label>
            <textarea class="form-control" name="description" id="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Upload Photo</label>
            <input type="file" name="photo" class="form-control" id="photo">
        </div>

        <div class="d-flex">
            <button type="submit" class="btn btn-primary me-3">Simpan</button>
            <a href="{{ route('post.index') }}" type="button" class="btn btn-danger">Batal</a>
        </div>
    </form>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#exampleTable').DataTable();
        });
    </script>
@endsection
