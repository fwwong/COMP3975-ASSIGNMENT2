@extends('layouts.master')

@section('title', 'Create Bucket')

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
