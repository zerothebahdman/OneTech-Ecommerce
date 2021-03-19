@extends('adminDashboard.login_layouts')

@section('backend')

    <div class="main d-flex justify-content-center w-100">
        <main class="content d-flex p-0">
            <div class="container d-flex flex-column">
                <div class="row h-100">
                    <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                        <div class="d-table-cell align-middle">

                            <div class="text-center mt-4">
                                <h1 class="h2">Welcome back Admin User</h1>
                                <p class="lead">
                                    Sign in to your account to continue
                                </p>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="m-sm-4">
                                        <div class="text-center">
                                            <img src="{{ asset('backend/img/avatars/avatar-7.png') }}" alt="Chris Wood"
                                                class="img-fluid rounded-circle" width="132" height="132" />
                                        </div>
                                        @error('email')
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <div class="alert-icon">
                                                    <i class="far fa-fw fa-bell"></i>
                                                </div>
                                                <div class="alert-message">
                                                    <strong>Sorry But !!</strong> {{ $message }}
                                                </div>
                                            </div>
                                        @enderror

                                        <form method="POST" action="{{ route('adminDashboard.login.store') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input
                                                    class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                    type="email" name="email" value="{{ old('email') }}"
                                                    placeholder="Enter your email" autofocus required />
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input
                                                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                                                    type="password" name="password" required
                                                    auto-complete="current-password" placeholder="Enter your password" />
                                                <span class="mt-3">
                                                    <a href="pages-reset-password.html">Forgot password?</a>
                                                </span>
                                            </div>
                                            <div>
                                                <div class="custom-control custom-checkbox align-items-center">
                                                    <input id="remeber_me" type="checkbox" class="custom-control-input"
                                                        value="remember" name="remember">
                                                    <label class="custom-control-label text-small" for="remeber_me">Remember
                                                        me next time</label>
                                                </div>
                                                <div class="mt-3">
                                                    Don't have an account yet?
                                                    <a href="{{ route('register') }}">
                                                        Register</a>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <button type="submit" class="btn btn-block btn-lg btn-primary">Sign
                                                    in</button>
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
