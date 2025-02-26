@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Post</h2>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Title:</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Content:</label>
            <textarea name="content" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label>Upload File:</label>
            <input type="file" name="file" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
