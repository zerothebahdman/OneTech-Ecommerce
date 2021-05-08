@extends('layouts.user.dashboard')
@section('title', 'OneTech Ecommerce | User Dashbaord')
@section('dashboard')



    <main class="content">
        <div class="container-fluid p-0">

            <div class="row mb-2 mb-xl-3">
                <div class="col-auto d-none d-sm-block">
                    <h3>Dashboard</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 col-xxl d-flex">
                    <div class="card illustration flex-fill">
                        <div class="card-body p-0 d-flex flex-fill">
                            <div class="row no-gutters w-100">
                                <div class="col-6">
                                    <div class="illustration-text p-3 m-1">
                                        <h4 class="illustration-text">Welcome, {{ Auth::user()->name }}</h4>
                                        <p class="mb-0">Here you will find all your relevant information
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6 align-self-end text-right">
                                    <img src="{{ asset('backend/img/illustrations/customer-support.png') }}"
                                        alt="Customer Support" class="img-fluid illustration-img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xxl d-flex">
                    <div class="card flex-fill">
                        <div class="card-body py-4">
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="mb-2">$ 24.300</h3>
                                    <p class="mb-2">Total Earnings</p>
                                    <div class="mb-0">
                                        <span class="badge badge-soft-success mr-2"> <i
                                                class="mdi mdi-arrow-bottom-right"></i> +5.35% </span>
                                        <span class="text-muted">Since last week</span>
                                    </div>
                                </div>
                                <div class="d-inline-block ml-3">
                                    <div class="stat">
                                        <i class="align-middle text-success" data-feather="dollar-sign"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xxl d-flex">
                    <div class="card flex-fill">
                        <div class="card-body py-4">
                            <div class="media">
                                <div class="media-body">
                                    @php
                                        $wishlist =App\Models\Users\Wishlist::where('user_id', auth()->user()->id)
                                            ->get();
                                    @endphp
                                    <h3 class="mb-2">{{ count($wishlist) }}</h3>
                                    <p class="mb-2">Products Wishlist</p>
                                </div>
                                <div class="d-inline-block ml-3">
                                    <div class="stat">
                                        <i class="align-middle text-danger" data-feather="shopping-bag"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xxl d-flex">
                    <div class="card flex-fill">
                        <div class="card-body py-4">
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="mb-2">$ 18.700</h3>
                                    <p class="mb-2">Total Revenue</p>
                                    <div class="mb-0">
                                        <span class="badge badge-soft-success mr-2"> <i
                                                class="mdi mdi-arrow-bottom-right"></i> +8.65% </span>
                                        <span class="text-muted">Since last week</span>
                                    </div>
                                </div>
                                <div class="d-inline-block ml-3">
                                    <div class="stat">
                                        <i class="align-middle text-info" data-feather="dollar-sign"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-7">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-actions float-right">
                                <div class="dropdown show">
                                    <a href="#" data-toggle="dropdown" data-display="static">
                                        <i class="align-middle" data-feather="more-horizontal"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <h5 class="card-title mb-0">Clients</h5>
                        </div>
                        <div class="card-body">
                            <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Company</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="{{ asset('backend/img/avatars/avatar-5.jpg') }}" width="32"
                                                height="32" class="rounded-circle my-n1" alt="Avatar"></td>
                                        <td>Unity Butler</td>
                                        <td>Price Savers</td>
                                        <td>unity@butler.com</td>
                                        <td><span class="badge badge-warning">Inactive</span></td>
                                    </tr>
                                    <tr>
                                        <td><img src="{{ asset('backend/img/avatars/avatar-5.jpg') }}" width="32"
                                                height="32" class="rounded-circle my-n1" alt="Avatar"></td>
                                        <td>Howard Hatfield</td>
                                        <td>Price Savers</td>
                                        <td>howard@hatfield.com</td>
                                        <td><span class="badge badge-warning">Inactive</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

{{--                <div class="col-xl-4">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-header">--}}
{{--                            <div class="card-actions float-right">--}}
{{--                                <div class="dropdown show">--}}
{{--                                    <a href="#" data-toggle="dropdown" data-display="static">--}}
{{--                                        <i class="align-middle" data-feather="more-horizontal"></i>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <h5 class="card-title mb-0">{{ Auth::user()->name }}</h5>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="row no-gutters">--}}
{{--                                <div class="col-sm-3 col-xl-12 col-xxl-3 text-center">--}}
{{--                                    @if (is_null(Auth::user()->profile_photo))--}}
{{--                                        <img src="{{ asset('backend/img/avatars/avatar-7.png') }}" width="64" height="64"--}}
{{--                                            class="rounded-circle mt-2" alt="{{ auth()->user()->name }} Profile Photo">--}}
{{--                                    @else--}}
{{--                                        <img src="{{ asset(Auth::user()->profile_photo) }}" width="64" height="64"--}}
{{--                                            class="rounded-circle mt-2" alt="{{ auth()->user()->name }} Profile Photo">--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <table class="table table-sm my-2">--}}
{{--                                <tbody>--}}
{{--                                    <tr>--}}
{{--                                        <th>Name</th>--}}
{{--                                        <td>{{ Auth::user()->name }}</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <th>Email</th>--}}
{{--                                        <td>{{ Auth::user()->email }}</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <th>Phone</th>--}}
{{--                                        <td>{{ Auth::user()->phone_number }}</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <th>Status</th>--}}
{{--                                        <td><span class="badge badge-success">Active</span></td>--}}
{{--                                    </tr>--}}
{{--                                </tbody>--}}
{{--                            </table>--}}

{{--                            <span>--}}
{{--                                <!-- Button trigger modal -->--}}
{{--                                <button type="button" class="btn btn-primary" data-toggle="modal"--}}
{{--                                    data-target="#exampleModal">--}}
{{--                                    Edit Profile--}}
{{--                                </button>--}}

{{--                                <a href="{{ route('user.logout') }}" style="float: right" class="btn btn-danger ">--}}
{{--                                    <i class="align-left mr-1 mb-1" data-feather="log-out"></i>--}}
{{--                                    Logout--}}
{{--                                </a>--}}
{{--                            </span>--}}

{{--                            <!-- Modal -->--}}
{{--                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"--}}
{{--                                aria-hidden="true">--}}
{{--                                <div class="modal-dialog modal-dialog-centered">--}}
{{--                                    <div class="modal-content">--}}
{{--                                        <div class="modal-header">--}}
{{--                                            <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>--}}
{{--                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                                <span aria-hidden="true">&times;</span>--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-body">--}}
{{--                                            <form action="{{ route('user.profile.update') }}" method="POST"--}}
{{--                                                enctype="multipart/form-data">--}}
{{--                                                @csrf--}}
{{--                                                @method('PUT')--}}
{{--                                                <input type="hidden" name="current_profile_image"--}}
{{--                                                    value="{{ Auth::user()->profile_photo }}">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <input required type="email" name="email"--}}
{{--                                                        class="form-control-plaintext form-control-lg"--}}
{{--                                                        value="{{ Auth::user()->email }}" readonly>--}}
{{--                                                </div>--}}
{{--                                                <div class="form-row">--}}
{{--                                                    <div class="form-group col-md-6">--}}
{{--                                                        <input required type="text" name="name"--}}
{{--                                                            class="form-control form-control-lg"--}}
{{--                                                            value="{{ Auth::user()->name }}">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="form-group col-md-6">--}}
{{--                                                        <input required type="number" name="phone_number"--}}
{{--                                                            class="form-control form-control-lg"--}}
{{--                                                            value="{{ Auth::user()->phone_number }}">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <input type="file" name="profile_photo"--}}
{{--                                                        class="form-control form-control-lg"--}}
{{--                                                        value="{{ Auth::user()->profile_photo }}"--}}
{{--                                                        onchange="readURL1(this);">--}}
{{--                                                    <img src="{{ asset(Auth::user()->profile_photo) }}"--}}
{{--                                                        alt="{{ Auth::user()->name }} Profile Photo"--}}
{{--                                                        class="rounded mt-3">--}}
{{--                                                    <img src="#" id="one" class="mt-3 rounded" alt="">--}}
{{--                                                </div>--}}
{{--                                                <div class="modal-footer">--}}
{{--                                                    <button type="button" class="btn btn-secondary"--}}
{{--                                                        data-dismiss="modal">Close</button>--}}
{{--                                                    <button type="submit" class="btn btn-primary">Save changes</button>--}}
{{--                                                </div>--}}
{{--                                            </form>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="card">--}}
{{--                        <div class="card-header">--}}
{{--                            <h4>Update Password Credentials</h4>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <form action="{{ route('user.password.update') }}" method="POST">--}}
{{--                                @csrf--}}
{{--                                @method('PUT')--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="">Current Password</label>--}}
{{--                                    <input type="password" name="current_password"--}}
{{--                                        class="form-control form-control-lg @error('current_password') is-invalid @enderror"--}}
{{--                                        placeholder="Enter Current Password">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="">New Password</label>--}}
{{--                                    <input type="password" name="password"--}}
{{--                                        class="form-control form-control-lg @error('password') is-invalid @enderror"--}}
{{--                                        placeholder="Enter New Password">--}}
{{--                                    @error('password')--}}
{{--                                        <span class="text-danger">{{ $message }}</span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="">Confirm Password</label>--}}
{{--                                    <input type="password" name="password_confirmation"--}}
{{--                                        class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror"--}}
{{--                                        placeholder="Confirm Password">--}}
{{--                                    @error('password_confirmation')--}}
{{--                                        <span class="text-danger">{{ $message }}</span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}

{{--                                <button type="submit" class="btn btn-primary">Update Password</button>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="col-12 col-lg-5">
                    <div class="tab tab-vertical tab-success">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#colored-vertical-icon-tab-1" data-toggle="tab" role="tab">
                                    <i class="align-middle" data-feather="user"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#colored-vertical-icon-tab-2" data-toggle="tab" role="tab">
                                    <i class="align-middle" data-feather="settings"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#colored-vertical-icon-tab-3" data-toggle="tab" role="tab">
                                    <i class="align-middle" data-feather="unlock"></i>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="colored-vertical-icon-tab-1" role="tabpanel">
                                <h4 class="tab-title">
                                    @if (is_null(auth()->user()->profile_photo))
                                        <img src="{{ asset('backend/img/avatars/avatar-7.png') }}" width="40"
                                             height="40"
                                             class="rounded-circle mt-2" alt="{{ auth()->user()->name }} Profile Photo">
                                    @else
                                        <img src="{{ asset(auth()->user()->profile_photo) }}" width="40" height="40"
                                             class="rounded-circle mt-2" alt="{{ auth()->user()->name }} Profile Photo">
                                    @endif
                                    User Profile
                                </h4>
                                <table class="table table-sm my-2 text-light mt-4">
                                    <tbody>
                                    <tr>
                                        <th>Name</th>
                                        <td>{{ auth()->user()->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ auth()->user()->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td>{{ auth()->user()->phone_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td><span class="badge badge-success">Active</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="colored-vertical-icon-tab-2" role="tabpanel">
                                <h4 class="tab-title mb-3">Update Profile</h4>
                                <form action="{{ route('user.profile.update') }}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="current_profile_image"
                                           value="{{ auth()->user()->profile_photo }}">
                                    <div class="form-group">
                                        <input required type="email" name="email"
                                               class="form-control form-control-lg"
                                               value="{{ auth()->user()->email }}" readonly>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input required type="text" name="name"
                                                   class="form-control form-control-lg"
                                                   value="{{ auth()->user()->name }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input required type="number" name="phone_number"
                                                   class="form-control form-control-lg"
                                                   value="{{ auth()->user()->phone_number }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="file" name="profile_photo"
                                               class="form-control form-control-lg"
                                               value="{{ auth()->user()->profile_photo }}"
                                               onchange="readURL1(this);">
                                        <img src="{{ asset(auth()->user()->profile_photo) }}"
                                             alt="{{ auth()->user()->name }} Profile Photo"
                                             class="rounded mt-3">
                                        <img src="#" id="one" class="mt-3 rounded" alt="">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Save changes</button>
                                </form>
                            </div>
                            <div class="tab-pane" id="colored-vertical-icon-tab-3" role="tabpanel">
                                <h4 class="tab-title mb-4">Password Settings</h4>
                                <form action="{{ route('user.password.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="c-password">Current Password</label>
                                        <input id="c-password" type="password" name="current_password"
                                               class="form-control form-control-lg @error('current_password') is-invalid @enderror"
                                               placeholder="Enter Current Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="n-password">New Password</label>
                                        <input id="n-password" type="password" name="password"
                                               class="form-control form-control-lg @error('password') is-invalid @enderror"
                                               placeholder="Enter New Password">
                                        @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Confirm Password</label>
                                        <input type="password" name="password_confirmation"
                                               class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror"
                                               placeholder="Confirm Password">
                                        @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block">Update Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

@section('script')
    <script>
        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#one')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>
@endsection
@endsection
