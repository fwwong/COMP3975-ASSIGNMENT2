@extends('layouts.master')
@section('content')

    @if (session('role'))
        @php
            $role = session('role');
        @endphp
        @if($role == 'user')
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
    <div class="container p-5">
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-pills card-header-pills justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="/dashboard">DASHBOARD</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/buckets">BUCKETS</a>
                    </li>
                </ul>
            </div>
            <div class="card-body text-start">
                @auth
                    <h5 class="card-title">Welcome, {{ Auth::user()->name }}</h5>
                    <p class="card-text">You are logged in!</p>
                    @if (Auth::user()->isAdmin())
                        <div class="d-flex justify-content-center">
                            {{-- <a href="{{ route('auth/controls') }}" class="btn btn-success">Secret Authorization</a> --}}
                            @include('auth.controls', ['users' => $users])
                        </div>
                    @endif
                @else
                    <div>
                        <p class="card-text">Please log in to access this page.</p>
                    </div>
                @endauth
            </div>
        </div>
    </div>
@endsection
