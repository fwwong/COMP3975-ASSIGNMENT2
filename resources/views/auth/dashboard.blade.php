@extends('layouts.master')
@section('content')
<div class="container p-5">
    <div class="card text-center">
        <div class="card-header ">
            <ul class="nav nav-pills card-header-pills justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" href="/dashboard">DASHBOARD</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/transactions">TRANSACTIONS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/buckets">BUCKETS</a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="nav-link">
                        @csrf
                        <button type="submit" class="btn btn-danger">LOGOUT</button>
                    </form>
                </li>
            </ul>
        </div>
        <div class="card-body text-start">
            @auth
                <h5 class="card-title">Welcome, {{ Auth::user()->name }}</h5>
                <p class="card-text">You are logged in!</p>
            @else
                <p class="card-text">Please log in to access this page.</p>
            @endauth
        </div>
    </div>
</div>
@endsection
