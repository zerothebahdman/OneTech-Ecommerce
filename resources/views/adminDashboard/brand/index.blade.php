@extends('adminDashboard.layouts.admin_layouts')
@section('title', 'OneTech Ecommerce | Admin Dashboard | Brands')
@section('dashboard')
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3">Product Brands</h1>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <!-- BEGIN  modal -->
                            <h4>
                                Brand List
                                <button type="button" style="float: right" class="btn btn-primary" data-toggle="modal"
                                    data-target="#sizedModalMd">
                                    <i class="align-left mr-1 mb-1" data-feather="plus"></i>Add Brand
                                </button>
                            </h4>
                            <div class="modal fade" id="sizedModalMd" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add Brand</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('admin.brand.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            <div class="modal-body m-3">
                                                @csrf
                                                <div class="form-group">
                                                    <label class="form-label">Brand Name</label>
                                                    <input type="text" name="brand_name" autofocus
                                                        class="form-control form-control-lg @error('brand_name')is-invalid @enderror"
                                                        value="{{ old('brand_name') }}" required
                                                        placeholder="Enter Brand name">

                                                    @error('brand_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="brand_image">Brand Image</label>
                                                    <input type="file" name="brand_image"
                                                        class="form-control form-control-lg @error('brand_image')is-invalid @enderror">

                                                    @error('brand_image')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Add Brand</button>
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
                                        <th>Brand Name</th>
                                        <th>Brand Image</th>
                                        <th>Day Created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($brands as $key => $brand)
                                        <tr>
                                            {{-- <th>{{ $categories->firstItem() + $loop->index }}</th> --}}
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $brand->brand_name }}</td>
                                            <td> <img src="{{ asset($brand->brand_image) }}"
                                                    style="height: 40px; width:70px;" alt="{{ $brand->brand_name }} Logo">
                                            </td>
                                            <td>{{ $brand->created_at->diffForHumans() }}</td>
                                            <td>
                                                <a href="{{ route('admin.brand.edit', $brand->slug) }}"
                                                    class="btn btn-outline-primary">
                                                    <i class="align-left mr-1 mb-1" data-feather="edit-2"></i> Edit
                                                </a>

                                                <a href="{{ route('admin.brand.delete', $brand->slug) }}"
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
