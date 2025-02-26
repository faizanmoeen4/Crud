@extends('layouts.app')

@section('content')
<div class="container">
  

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table id="postsTable" class="table table-bordered">
        <thead>
            <tr>
                <th>name</th>
                <th>Email</th>
                <th>Status</th>
                
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->status }}</td>
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
