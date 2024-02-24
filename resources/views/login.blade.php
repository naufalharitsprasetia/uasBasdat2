@extends('layouts.main')

@section('content')
    <section class="first-section p-3 m-3">
        <h1>Login</h1>
        @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show fw-normal fs-6" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="/login" method="post" id="login">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Username</label>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                    id="email" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                    id="password" value="{{ old('password') }}">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </section>
@endsection
