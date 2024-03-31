@extends('layouts.master')

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
    <span style="font-size:xx-large;">Transactions</span>
    @include('components.file-handler')
    @include('client.index')
@endsection
