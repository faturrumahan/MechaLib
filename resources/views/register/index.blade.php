@extends('layout.main-login')

@section ('content')
<main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
        <div class="card login-card">
            <div class="row no-gutters">
                <div class="col-md-5">
                    <img src="img/other.jpg" alt="login" class="login-card-img">
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <div class="brand-wrapper">
                            <h2 style="font-weight: bold;" ><a href="/">Mechaland</a></h2>
                        </div>
                        <p class="login-card-description">Make your account</p>
                        <form action="/register" method="post">
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
                            <div class="form-group">
                                <label for="name" class="sr-only">Username</label>
                                <input type="text" name="name" id="name" class="form-control @error('name')
                                    is-invalid
                                @enderror" placeholder="Username" required value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="password" class="form-control @error('password')
                                    is-invalid
                                @enderror" placeholder="***********" required>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-block login-btn mb-4">Register</button>
                        </form>
                        <p class="login-card-footer-text">Already have an account? <a href="/login" class="text-reset">Login here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
