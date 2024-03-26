@extends('layouts.master')

@section('title', 'Bucket Details')

@section('content')
    <div class="container">
        <h1>Bucket Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Bucket ID: {{ $bucket->id }}</h5>
                <p class="card-text"><strong>Transaction Type:</strong> {{ $bucket->TransactionType }}</p>
                <p class="card-text"><strong>Company:</strong> {{ $bucket->Company }}</p>
                <a href="{{ route('buckets.edit', $bucket->id) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('buckets.index') }}" class="btn btn-secondary">Back to Buckets List</a>
            </div>
        </div>
    </div>
@endsection
