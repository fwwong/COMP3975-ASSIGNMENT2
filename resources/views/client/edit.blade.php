@extends('layouts.master')

@section('title', 'Edit Transaction')

@if (session('role'))
    @php
        $role = session('role');
    @endphp
    @if ($role == 'admin')
        <!-- Redirect to admin dashboard -->
        <script>
            window.location = "{{ route('auth.dashboard') }}";
        </script>
    @endif
@else
    <script>
        window.location = "{{ route('login') }}";
    </script>
@endif

@section('content')
    <div class="container">
        <h1 class="mt-4 mb-3">Edit Transaction</h1>
        <form action="{{ route('client.update', ['id' => $transaction->id]) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="ID">Transaction ID</label>
                <input type="text" class="form-control" id="ID" value="{{ $transaction->id }}" readonly>
            </div>

            <div class="form-group">
                <label for="Date">Date</label>
                <input type="text" class="form-control" id="Date" value="{{ $transaction->Date }}" readonly>
            </div>

            <div class="form-group">
                <label for="TName">Transaction Name</label>
                <input type="text" class="form-control" id="TName" name="TName"
                    value="{{ $transaction->TransactionName }}" required>
            </div>

            <div class="form-group">
                <label for="Revenue">Revenue</label>
                <input type="number" step="0.01" class="form-control" id="Revenue" name="Revenue"
                    value="{{ $transaction->Revenue }}" required>
            </div>

            <div class="form-group">
                <label for="Expense">Expense</label>
                <input type="number" step="0.01" class="form-control" id="Expense" name="Expense"
                    value="{{ $transaction->Expense }}" required>
            </div>

            <div class="form-group">
                <label for="TransactionType">Transaction Type</label>
                <input type="text" class="form-control" id="TransactionType" value="{{ $transaction->TransactionType }}"
                    readonly>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('client.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
