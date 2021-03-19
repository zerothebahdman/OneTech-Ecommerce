@extends('adminDashboard.admin_layouts')

@section('dashboard')
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3">Settings</h1>

            <div class="row">
                <div class="col-md-3 col-xl-2">

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Profile Settings</h5>
                        </div>

                        <div class="list-group list-group-flush" role="tablist">
                            <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account"
                                role="tab">
                                Account
                            </a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#password"
                                role="tab">
                                Password
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-9 col-xl-10">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="account" role="tabpanel">

                            <div class="card">
                                <div class="card-header">
                                    <div class="card-actions float-right">
                                        <div class="dropdown show">
                                            <a href="#" data-toggle="dropdown" data-display="static">
                                                <i class="align-middle" data-feather="more-horizontal"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <h5 class="card-title mb-0">Public info</h5>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('adminDashboard.profile.update') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="hidden" value="{{ $adminProfile['profile_photo'] }}"
                                                        name="old_image">
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputFirstName">First name</label>
                                                    <input type="text" name="name"
                                                        class="form-control @error('name') is-invalid  @enderror"
                                                        id="inputFirstName" placeholder="First name"
                                                        value="{{ $adminProfile->name }}">
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputEmail4">Email</label>
                                                    <input type="email" name="email"
                                                        class="form-control @error('email') is-invalid  @enderror"
                                                        id="inputEmail4" placeholder="Email"
                                                        value="{{ $adminProfile->email }}">
                                                    @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputLastName">Update Profile Photo</label>
                                                    <input type="file" name="image"
                                                        class="form-control @error('image') is-invalid  @enderror"
                                                        id="inputLastName" value="{{ $adminProfile->profile_photo }}">
                                                    <small>For best results, use an image at least 128px by 128px in .jpg,
                                                        png or jpeg
                                                        format</small>
                                                    @error('image')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="text-center">
                                                    @if (!is_null(Auth::guard('adminDashboard')->user()->profile_photo))
                                                        <img src="{{ asset(Auth::guard('adminDashboard')->user()->profile_photo) }}"
                                                            class="rounded-circle img-responsive mt-2" width="128"
                                                            height="128"
                                                            alt="{{ Auth::guard('adminDashboard')->user()->name }} Profile Photo" />
                                                    @else
                                                        <img src="{{ asset('backend/img/avatars/avatar-7.png') }}"
                                                            class="rounded-circle img-responsive mt-2" width="128"
                                                            height="128"
                                                            alt="{{ Auth::guard('adminDashboard')->user()->name }} Profile Photo" />
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </form>

                                    {{-- <h5 class="card-title mt-5">Password</h5>

                                    <form action="{{ route('adminDashboard.password.update') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="inputPasswordCurrent">Current password</label>
                                            <input type="password" name="current_password"
                                                class="form-control @error('current_password') is-invalid @enderror"
                                                id="inputPasswordCurrent" placeholder="Enter current password">
                                            @error('current_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPasswordNew">New password</label>
                                            <input type="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Enter new password" id="inputPasswordNew">
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPasswordNew2">Verify password</label>
                                            <input type="password" name="password_confirmation" class="form-control"
                                                placeholder="Confirm password" id="inputPasswordNew2">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </form> --}}

                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="password" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Password</h5>

                                    <form action="{{ route('adminDashboard.password.update') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="inputPasswordCurrent">Current password</label>
                                            <input type="password" name="current_password"
                                                class="form-control @error('current_password') is-invalid @enderror"
                                                id="inputPasswordCurrent" placeholder="Enter current password">
                                            @error('current_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPasswordNew">New password</label>
                                            <input type="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Enter new password" id="inputPasswordNew">
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPasswordNew2">Verify password</label>
                                            <input type="password" name="password_confirmation" class="form-control"
                                                placeholder="Confirm password" id="inputPasswordNew2">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
