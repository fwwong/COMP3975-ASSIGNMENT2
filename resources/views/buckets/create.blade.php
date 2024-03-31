@extends('layouts.master')

@section('title', 'Create Bucket')

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
        <h1>Create Bucket</h1>
        <form action="{{ route('buckets.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="TransactionType">Transaction Type</label>
                <input type="text" class="form-control" id="TransactionType" name="TransactionType" required>
            </div>

            <div class="form-group">
                <label for="Company">Company</label>
                <input type="text" class="form-control" id="Company" name="Company" required>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{ route('buckets.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
