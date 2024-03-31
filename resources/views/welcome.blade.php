@extends('layouts.master')
@section('content')

    @if (session('role'))
        @php
            $role = session('role');
        @endphp
        @if ($role == 'admin')
            <!-- Redirect to admin dashboard -->
            <script>
                window.location = "{{ route('auth.dashboard') }}";
            </script>
        @elseif($role == 'user')
            <!-- Redirect to user dashboard -->
            <script>
                window.location = "{{ route('client.index') }}";
            </script>
        @endif
    @endif


    <div class="container p-5">
        <div class="card text-center">
            <div class="card-header ">
                <ul class="nav nav-pills card-header-pills justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="/login">LOGIN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">NEW ACCOUNT</a>
                    </li>
                </ul>
            </div>
            <div class="card-body text-start">
                <!-- login form  -->
                @include('/auth/login')
            </div>
        </div>
    </div>
@endsection
