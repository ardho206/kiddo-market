@extends('layouts.main')

@section('container')
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6">
            @if (session()->has('failed'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('failed') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card px-4">
                <div class="card-body">
                    <form action="/login" method="POST">
                        @csrf
                        <div class="text-center">
                            <img src="img/k-removebg-preview.png" alt="img/k.jpg" class="mb-2" width="45" height="45">
                            <h2 class="card-title">LOGIN</h2>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="email" value="{{ old('email') }}" autofocus>
                            <label for="email">Email</label>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating password-wrapper mb-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" oninput="checkPassword()" placeholder="Password">
                            <label for="password">Password</label>
                            <i class="toggle-password bi bi-eye" onclick="togglePassword()"></i>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-outline-secondary w-100">LOGIN</button>
                        <small class="text-body-secondary d-block text-center">Don't Have Account?<a href="/regist" class="ms-1 text-decoration-none">Register</a></small>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
