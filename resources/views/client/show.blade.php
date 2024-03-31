@extends('layouts.master')

@section('title', 'Transaction Details')

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
        <h1 class="mt-4 mb-3">Transaction Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Transaction Name:{{ $transaction->TransactionName }}</h5>
                <p class="card-text"><strong>Date:</strong> {{ $transaction->Date }}</p>
                <p class="card-text"><strong>Transaction ID: </strong> {{ $transaction->id }}</p>
                <p class="card-text"><strong>Transaction Type:</strong> {{ $transaction->TransactionType }}</p>
                <p class="card-text"><strong>Expense:</strong> ${{ $transaction->Expense }}</p>
                <p class="card-text"><strong>Revenue:</strong> ${{ $transaction->Revenue }}</p>
                <p class="card-text"><strong>Net Total:</strong> ${{ $transaction->NetTotal }}</p>
            </div>
        </div>
        <a href="{{ route('client.index') }}" class="btn btn-primary mt-3">Back to Transactions</a>
    </div>
@endsection
