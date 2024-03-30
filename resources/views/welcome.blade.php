@extends('layouts.master')
@section('content')
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
