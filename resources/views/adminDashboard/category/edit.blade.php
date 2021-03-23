@extends('adminDashboard.layouts.admin_layouts')
@section('title', 'OneTech Ecommerce | Edit Product Category')
@section('dashboard')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Category</h3>
                        </div>
                        <div class="card-body">
                            @error('category_name')
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
                            <form action="{{ route('admin.category.update', $categories->slug) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label class="form-label">Category Name</label>
                                    <input type="text" name="category_name" value="{{ $categories->category_name }}"
                                        class="form-control @error('category_name')is-invalid @enderror"
                                        placeholder="Category Name">
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
