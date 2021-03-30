@extends('adminDashboard.layouts.admin_layouts')
@section('title', 'OneTech Ecommerce | Edit Coupon')
@section('dashboard')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Coupon</h3>
                        </div>
                        <div class="card-body">
                            @error('coupon')
                                <div class="alert alert-warning alert-dismissible" role="alert">
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
                            <form action="{{ route('admin.coupon.update', $coupon->slug) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label class="form-label">Coupon Code</label>
                                    <input type="text" name="coupon" value="{{ $coupon->coupon }}"
                                        class="form-control form-control-lg @error('coupon')is-invalid @enderror"
                                        placeholder="Coupon Code">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Coupon Discount (%)</label>
                                    <input type="number" name="discount"
                                        class="form-control form-control-lg @error('discount')is-invalid @enderror"
                                        value="{{ $coupon->discount }}" required placeholder="Enter coupon discount">

                                    @error('discount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

@endsection
