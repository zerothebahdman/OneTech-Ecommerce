@extends('admin.admin_layouts')

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
                                        <h4 class="illustration-text">Welcome, {{ Auth::guard('admin')->user()->name }}
                                        </h4>
                                        <p class="mb-0">OneTech Dashboard</p>
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
                                    <h3 class="mb-2">43</h3>
                                    <p class="mb-2">Pending Orders</p>
                                    <div class="mb-0">
                                        <span class="badge badge-soft-danger mr-2"> <i
                                                class="mdi mdi-arrow-bottom-right"></i> -4.25% </span>
                                        <span class="text-muted">Since last week</span>
                                    </div>
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
                <div class="col-12 col-lg-8 d-flex">
                    <div class="card flex-fill w-100">
                        <div class="card-header">

                            <h5 class="card-title mb-0">Sales / Revenue</h5>
                        </div>
                        <div class="card-body d-flex w-100">

                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 d-flex">
                    <div class="card flex-fill w-100">
                        <div class="card-header">
                            <span class="badge badge-info float-right">Today</span>
                            <h5 class="card-title mb-0">Daily feed</h5>
                        </div>
                        <div class="card-body">
                            <div class="media">
                                <img src="img/avatars/avatar-5.jpg" width="36" height="36" class="rounded-circle mr-2"
                                    alt="Ashley Briggs">
                                <div class="media-body">
                                    <small class="float-right text-navy">5m ago</small>
                                    <strong>Ashley Briggs</strong> started following <strong>Stacie
                                        Hall</strong><br />
                                    <small class="text-muted">Today 7:51 pm</small><br />

                                </div>
                            </div>

                            <hr />
                            <div class="media">
                                <img src="img/avatars/avatar.jpg" width="36" height="36" class="rounded-circle mr-2"
                                    alt="Chris Wood">
                                <div class="media-body">
                                    <small class="float-right text-navy">30m ago</small>
                                    <strong>Chris Wood</strong> posted something on <strong>Stacie Hall</strong>'s
                                    timeline<br />
                                    <small class="text-muted">Today 7:21 pm</small>

                                    <div class="border text-sm text-muted p-2 mt-1">
                                        Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam
                                        semper libero, sit amet adipiscing...
                                    </div>
                                </div>
                            </div>

                            <hr />
                            <div class="media">
                                <img src="img/avatars/avatar-4.jpg" width="36" height="36" class="rounded-circle mr-2"
                                    alt="Stacie Hall">
                                <div class="media-body">
                                    <small class="float-right text-navy">1h ago</small>
                                    <strong>Stacie Hall</strong> posted a new blog<br />

                                    <small class="text-muted">Today 6:35 pm</small>
                                </div>
                            </div>

                            <hr />
                            <a href="#" class="btn btn-primary btn-block">Load more</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
