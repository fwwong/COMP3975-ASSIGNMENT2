@extends('layouts.master')

@section('title', 'Edit Bucket')

@section('content')
    <div class="container">
        <h1>Edit Bucket</h1>
        <form action="{{ route('buckets.update', ['id' => $bucket->id]) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="TransactionType">Transaction Type</label>
                <input type="text" class="form-control" id="TransactionType" name="TransactionType"
                    value="{{ $bucket->TransactionType }}" required>
            </div>

            <div class="form-group">
                <label for="Company">Company</label>
                <input type="text" class="form-control" id="Company" name="Company" value="{{ $bucket->Company }}"
                    required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('buckets.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
