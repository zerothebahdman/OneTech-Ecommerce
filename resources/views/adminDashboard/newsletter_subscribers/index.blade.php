@extends('adminDashboard.layouts.admin_layouts')
@section('title', 'OneTech Ecommerce | Newsletter Subscribers')
@section('dashboard')
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3">Newsletter Subscribers</h1>

            <div class="row">
                <div class="col-md-4 col-xl-5">
                    {{-- <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Today Subscribers</h5>
                        </div>
                        <div class="card-body text-center">
                            @forelse ($subscribers_today as $today)
                                <h5 class="h5">
                                    {{ $today->email }}
                                    {{ $today->created_at }}
                                    <hr class="my-0" />
                                </h5>
                            @empty
                                <h5>No Subscribers Today</h5>
                            @endforelse
                        </div>
                    </div> --}}
                    <div class="card">
                        <div class="card-header">
                            <div class="card-actions float-right">
                                <div class="dropdown show">
                                    <a href="#" data-toggle="dropdown" data-display="static">
                                        <i class="align-middle" data-feather="more-horizontal"></i>
                                    </a>
                                </div>
                            </div>
                            <h5 class="card-title mb-0">Today Subscribers</h5>
                        </div>
                        <div class="card-body h-100">

                            @forelse ($subscribers_today as $today)
                                <div class="media">
                                    <div class="media-body">
                                        <small class="float-right text-navy">{{ $today->created_at->diffForHumans() }}</small>
                                        <strong>{{ $today['email'] }}</strong><br />
                                        <small class="text-muted">{!! \Carbon\Carbon::parse($today['created_at'])->format('l jS, F Y') !!}</small><br />

                                        <hr />

                                    </div>
                                </div>
                            @empty
                                <h5>Nobody Subscribed Today.</h5>
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-xl-7">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-actions float-right">
                                <div class="dropdown show">
                                    <a href="#" data-toggle="dropdown" data-display="static">
                                        <i class="align-middle" data-feather="more-horizontal"></i>
                                    </a>
                                </div>
                            </div>
                            <h5 class="card-title mb-0">All Subscribers</h5>
                        </div>
                        <div class="card-body h-100">

                            @forelse ($subscribers as $subscriber)
                                <div class="media">
                                    <div class="media-body">
                                        <small
                                            class="float-right text-navy">{{ $subscriber->created_at->diffForHumans() }}</small>
                                        <strong>{{ $subscriber->email }}</strong><br />
                                        <small class="text-muted">{!! \Carbon\Carbon::parse($subscriber['created_at'])->format('l jS, F Y') !!}</small><br />

                                        <hr />

                                    </div>
                                </div>
                            @empty
                                <h5>Nobody subscribed yet.</h5>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

@endsection
