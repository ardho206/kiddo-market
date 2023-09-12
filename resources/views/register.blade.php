@extends('layouts.main')

@section('container')
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6">
            <div class="card px-4">
                <div class="card-body">
                    <form action="/regist" method="POST">
                        @csrf
                        <div class="text-center">
                            <img src="img/k-removebg-preview.png" alt="img/k.jpg" class="mb-2" width="45" height="45">
                            <h2 class="card-title">REGISTER</h2>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="name" value="{{ old('name') }}" required>
                            <label for="name">Name</label>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="username" value="{{ old('username') }}" required>
                            <label for="username">Username</label>
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="email" value="{{ old('email') }}" required>
                            <label for="email">Email</label>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating password-wrapper mb-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" oninput="checkPassword()" placeholder="Password" required>
                            <label for="password">Password</label>
                            <i class="toggle-password bi bi-eye" onclick="togglePassword()"></i>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-outline-secondary w-100">REGIST</button>
                        <small class="text-body-secondary d-block text-center">Already Have Account?<a href="/login" class="ms-1 text-decoration-none">Login</a></small>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
