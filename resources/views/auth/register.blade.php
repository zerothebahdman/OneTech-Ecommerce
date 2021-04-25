@extends('layouts.user.login-register')
@section('title', 'OneTech Ecommerce | Register For Users')

@section('backend')
    <div class="main d-flex justify-content-center w-100">
        <main class="content d-flex p-0">
            <div class="container d-flex flex-column">
                <div class="row h-100">
                    <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                        <div class="d-table-cell align-middle">

                            <div class="text-center">
                                <h3>Get started by creating an account today.</h3>
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
                                                <label for="phone_number">Phone Number</label>
                                                <input id="phone_number"
                                                    class="form-control form-control-lg @error('phone_number') is-invalid @enderror"
                                                    required type="number" name="phone_number"
                                                    value="{{ old('phone_number') }}"
                                                    placeholder="Enter your Phone Number" />

                                                @error('phone_number')
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
                                        <div class="form-row">
                                            <div class="form-group col-md-6 mt-3 btn-group-lg">
                                                <button type="submit" class="btn btn-info btn-block"><i
                                                        class="align-left mr-1 mb-1" data-feather="facebook"></i>
                                                    Facebook</button>
                                            </div>
                                            <div class="form-group col-md-6 mt-3 btn-group-lg">
                                                <button type="submit" class="btn btn-danger btn-block"><i
                                                        class="fab fa-google align-left mr-1 mb-1"></i>
                                                    Google</button>
                                            </div>
                                        </div>
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
