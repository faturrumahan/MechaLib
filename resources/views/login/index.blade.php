@extends('layout.main-login')

@section ('content')
<main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
        <div class="card login-card">
            <div class="row no-gutters">
                <div class="col-md-5">
                    <img src="img/cyberboard.jpg" alt="login" class="login-card-img">
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session()->has('loginerror'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('loginerror') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="brand-wrapper">
                            <h2 style="font-weight: bold;" ><a href="/">Mechaland</a></h2>
                        </div>
                        <p class="login-card-description">Sign into your account</p>
                        <form action="/login" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control @error('email')
                                    is-invalid
                                @enderror" placeholder="Email address" required value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="***********" required>
                            </div>
                            <button type="submit" class="btn btn-block login-btn mb-4">Login</button>
                        </form>
                        <p class="login-card-footer-text">Don't have an account? <a href="/register" class="text-reset">Register here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
