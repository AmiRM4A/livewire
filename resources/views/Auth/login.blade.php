@extends('layout')

@section('title') Login @endsection

@section('content')
<div class="container mt-5">
    <div class="form-container">
        <h2 class="text-center">Login Account</h2>
        <form method="POSt" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" placeholder="Enter password">
            </div>
            <div class="form-group form-check text-center">
                <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me">
                <label class="form-check-label" for="remember_me">Remember Me</label>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary w-100">Login</button>
                <p class="mt-3"><a href="">Forgot your password?</a></p> <!-- TODO: Complete forget password feature -->
                <p>Don't have an account? <a href="{{route('register.create')}}">Register here</a></p>
            </div>
            <x-show-error></x-show-error>
        </form>
    </div>
</div>
@endsection

