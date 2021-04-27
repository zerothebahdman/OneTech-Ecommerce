@extends('adminDashboard.layouts.admin_layouts')
@section('title', 'OneTech Ecommerce | Product Details page')
@section('dashboard')
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3">{{ $product->product_name }} Details Page</h1>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="category_id">Category</label>
                                    <h4>{{ $product->category->category_name }}</h4>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputCategory">Sub Categories</label>
                                    <h4>{{ $product->subCategory->sub_category_name }}</h4>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputBrands">Brands</label>
                                    <h4>{{ $product->brand->brand_name }}</h4>
                                </div>
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="form-label">Product Name</label>
                                    <h4>{{ $product->product_name }}</h4>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="quantity">Product Quantity</label>
                                    <h4>{{ $product->product_quantity }}</h4>
                                </div>
                                <div class="col-md-4">
                                    <label for="size">Product Color </label>
                                    <h4>{{ $product->product_color }}</h4>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="selling">Selling Price</label>
                                    <h4>{{ $product->selling_price }}</h4>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="discount">Discount Price</label>
                                    @if (!is_null($product->discount_price))
                                        <h4>{{ $product->discount_price }}</h4>
                                    @else
                                        <h6>Nothing here</h6>
                                    @endif
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="color">Product Size</label>
                                    @if (!is_null($product->product_size))
                                        <h6>{{ $product->product_size }}</h6>
                                    @else
                                        <h6>Nothing here</h6>
                                    @endif
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Video Link</label>
                                    @if (!is_null($product->video_link))
                                        <h4><a href="{{ $product->video_link }}">Product Video</a></h4>
                                    @else
                                        <h6>Nothing here</h6>
                                    @endif
                                </div>
                            </div>

                            <hr>

                            <div class="form-group">
                                <!-- Create the editor container -->
                                <label for="product_description">Product Description</label>
                                {!! $product->product_details !!}
                            </div>
                            <hr>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="first_image">Image One (Main Thumbnail) <span
                                            class="text-danger">*</span></label> <br>
                                    <img src="{{ asset($product->first_image) }}"
                                        alt="{{ $product->product_name }} First Image" class="rounded mt-3" width="100"
                                        height="100" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="second_image">Image Two <span class="text-danger">*</span></label> <br>
                                    <img src="{{ asset($product->second_image) }}"
                                        alt="{{ $product->product_name }} Second Image" class="rounded mt-3" width="100"
                                        height="100" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="third_image">Image Three <span class="text-danger">*</span></label> <br>
                                    <img src="{{ asset($product->third_image) }}" class="rounded mt-3" width="100"
                                        height="100">
                                </div>
                            </div>

                            <hr>

                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label>Mid Slider: </label> <br>
                                    @if ($product->mid_slider === 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-warning">inactive</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Hot Deals </label> <br>
                                    @if ($product->hot_deals === 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-warning">inactive</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Best Rated: </label> <br>
                                    @if ($product->best_rated === 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-warning">inactive</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Hot New: </label> <br>
                                    @if ($product->hot_new === 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-warning">inactive</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Trending: </label> <br>
                                    @if ($product->trending === 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-warning">inactive</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Main Slider: </label> <br>
                                    @if ($product->main_slider === 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-warning">inactive</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Buy One Get One
                                        Free: </label> <br>
                                    @if ($product->buy_one_get_one === 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-warning">inactive</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
