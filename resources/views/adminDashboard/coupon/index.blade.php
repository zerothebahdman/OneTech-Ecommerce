@extends('adminDashboard.layouts.admin_layouts')
@section('title', 'OneTech Ecommerce | Coupon')
@section('dashboard')
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3">Coupons</h1>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <!-- BEGIN  modal -->
                            <h4>
                                Coupon List
                                <button type="button" style="float: right" class="btn btn-primary" data-toggle="modal"
                                    data-target="#sizedModalMd">
                                    <i class="align-left mr-1 mb-1" data-feather="plus"></i>Add Coupon
                                </button>
                            </h4>
                            <div class="modal fade" id="sizedModalMd" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add Coupon</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('admin.coupon.store') }}" method="POST">
                                            <div class="modal-body m-3">
                                                @csrf
                                                <div class="form-group">
                                                    <label class="form-label">Coupon Code</label>
                                                    <input type="text" name="coupon" autofocus
                                                        class="form-control form-control-lg @error('coupon')is-invalid @enderror"
                                                        value="{{ old('coupon') }}" required
                                                        placeholder="Enter coupon code">

                                                    @error('coupon')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label">Coupon Discount (%)</label>
                                                    <input type="number" name="discount" autofocus
                                                        class="form-control form-control-lg @error('discount')is-invalid @enderror"
                                                        value="{{ old('discount') }}" required
                                                        placeholder="Enter coupon discount">

                                                    @error('discount')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Add Coupon</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- END  modal -->
                        </div>
                        <div class="card-body">
                            <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Coupon Code</th>
                                        <th>Coupon Discount (%)</th>
                                        <th>Created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coupons as $key => $coupon)
                                        <tr>
                                            {{-- <th>{{ $categories->firstItem() + $loop->index }}</th> --}}
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $coupon->coupon }}</td>
                                            <td>{{ $coupon->discount }} %</td>
                                            <td>{{ $coupon->created_at->diffForHumans() }}</td>
                                            <td>
                                                <a href="{{ route('admin.coupon.edit', $coupon->slug) }}"
                                                    class="btn btn-outline-primary">
                                                    <i class="align-left mr-1 mb-1" data-feather="edit-2"></i> Edit
                                                </a>

                                                <a href="{{ route('admin.coupon.delete', $coupon->slug) }}"
                                                    class="btn btn-outline-danger" id="delete">
                                                    <i class="align-left mr-1 mb-1" data-feather="trash-2"></i> Delete
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
