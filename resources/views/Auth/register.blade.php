@extends('layout')

@section('title') Register @endsection

@section('content')
    <div class="container mt-5">
        <div class="form-container">
            <h2 class="text-center">Register Account</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter your name">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" placeholder="Enter password">
                </div>
                <div class="form-group">
                    <label for="password">Repeat Password</label>
                    <input type="password" class="form-control" id="password" name="password_confirmation" value="{{ old('password') }}" placeholder="Repeat your password">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-100">Register</button>
                    <p class="mt-3">Already have an account? <a href="{{route('login.create')}}">Login here</a></p>
                </div>
                <x-show-error></x-show-error>
            </form>
        </div>
    </div>
@endsection
