@extends('layouts.master')
@section('title', 'Transactions List')
@section('content')
    <h1>Transactions</h1>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Transaction Name</th>
            <th>Expense</th>
            <th>Revenue</th>
            <th>Net Total</th>
            <th>Type</th>
        </tr>
        @foreach ($transactions as $transaction)
            <tr>
                <td>{{ $transaction->id }}</td>
                <td>{{ $transaction->Date }}</td>
                <td>{{ $transaction->TransactionName }}</td>
                <td>{{ $transaction->Expense }}</td>
                <td>{{ $transaction->Revenue }}</td>
                <td>{{ $transaction->NetTotal }}</td>
                <td>{{ $transaction->TransactionType }}</td>
            </tr>
        @endforeach
    </table>
@endsection
