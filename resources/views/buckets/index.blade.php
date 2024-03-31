@extends('layouts.master')

@section('title', 'Buckets List')

@if (session('role'))
    @php
        $role = session('role');
    @endphp
    @if ($role == 'user')
        <!-- Redirect to user dashboard -->
        <script>
            window.location = "{{ route('client.index') }}";
        </script>
    @endif
@else
    <script>
        window.location = "{{ route('login') }}";
    </script>
@endif

@section('content')
    <div class="container">
        <h1>Buckets List</h1>
        <a href="{{ route('buckets.create') }}" class="btn btn-primary mb-3">Create New Bucket</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Transaction Type</th>
                    <th>Company</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($buckets as $bucket)
                    <tr>
                        <td>{{ $bucket->id }}</td>
                        <td>{{ $bucket->TransactionType }}</td>
                        <td>{{ $bucket->Company }}</td>
                        <td>
                            <a href="{{ route('buckets.show', $bucket->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('buckets.edit', $bucket->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('buckets.destroy', $bucket->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this bucket?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
