@extends('layouts.app')

@section('content')
<div class="container">
    <h2>All Posts</h2>
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Create New Post</a>
    <br><br>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table id="postsTable" class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>File</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->content }}</td>
                <td>
                    @if($post->file_path)
                        <a href="{{ asset('storage/' . $post->file_path) }}" target="_blank">View File</a>
                    @else
                        No File
                    @endif
                </td>
                <td>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@section('scripts')
    <script>
        $(document).ready( function () {
            $('#postsTable').DataTable();
        });
    </script>
@endsection

@endsection
