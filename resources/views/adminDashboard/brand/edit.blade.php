@extends('adminDashboard.layouts.admin_layouts')
@section('title', 'OneTech Ecommerce | Edit Product Category')
@section('dashboard')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Brand</h3>
                        </div>
                        <div class="card-body">
                            @error('brand_name')
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
                            <form action="{{ route('admin.brand.update', $brands->slug) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="hidden" value="{{ $brands->brand_image }}" name="old_image">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Brand Name</label>
                                            <input type="text" name="brand_name" value="{{ $brands->brand_name }}"
                                                class="form-control @error('brand_name')is-invalid @enderror"
                                                placeholder="Brand Name">
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Brand Image</label>
                                            <input type="file" name="brand_image" value="{{ $brands->brand_image }}"
                                                class="form-control form-control-lg @error('brand_image')is-invalid @enderror">

                                            @error('brand_image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text-center mt-5">
                                            <img src="{{ asset($brands->brand_image) }}" alt="">
                                        </div>
                                    </div>
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
