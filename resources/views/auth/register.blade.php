@extends('layouts.backend.login-register')

@section('backend')
    <div class="main d-flex justify-content-center w-100">
        <main class="content d-flex p-0">
            <div class="container d-flex flex-column">
                <div class="row h-100">
                    <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                        <div class="d-table-cell align-middle">

                            <div class="text-center mt-4">
                                <h1 class="h2">Get started</h1>
                                <p class="lead">
                                    Start creating the best possible user experience for you customers.
                                </p>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="m-sm-4">
                                        <form action="{{ route('register') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input id="name"
                                                    class="form-control form-control-lg @error('name') is-invalid @enderror"
                                                    required type="text" name="name" value="{{ old('name') }}"
                                                    placeholder="Enter your name" autofocus />

                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Email</label>
                                                <input
                                                    class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                    type="email" name="email" value="{{ old('email') }}" required
                                                    placeholder="Enter your email" />
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input
                                                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                                                    type="password" name="password" placeholder="Enter password" required
                                                    autocomplete="new-password" />
                                                @error('password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input class="form-control form-control-lg" type="password"
                                                    name="password_confirmation" placeholder="Confirm password" required />
                                            </div>
                                            <div class="mt-4" style="text-align: left">
                                                <button type="submit" class="btn btn-block btn-lg btn-primary">Sign
                                                    up</button>
                                            </div>
                                            <div class="mt-3">
                                                Already have an account? <a href="{{ route('login') }}">Login</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
