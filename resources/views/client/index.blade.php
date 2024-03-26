@extends('layouts.master')
@section('title', 'Transactions List')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Transaction List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success btn-sm" href="{{ route('client.create') }}">
                    Create New Transaction
                </a>
                @include('components.file-handler')
            </div>
        </div>
    </div>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Transaction Name</th>
            <th>Expense</th>
            <th>Revenue</th>
            <th>Net Total</th>
            <th>Type</th>
            <th></th>
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
                <td>
                    <a class="btn btn-info btn-sm" href="{{ route('client.show', $transaction->id) }}">Show</a>
                    <a class="btn btn-primary btn-sm" href="{{ route('client.edit', $transaction->id) }}">Edit</a>
                    <a class="btn btn-danger btn-sm" href="{{ route('client.destroy', $transaction->id) }}">Del</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $transactions->links() }}

    @include('components.report')
@endsection
