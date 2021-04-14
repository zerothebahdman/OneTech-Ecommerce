@extends('adminDashboard.layouts.admin_layouts')
@section('title', 'OneTech Ecommerce | All Products')


@section('dashboard')
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3">Product</h1>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <!-- BEGIN  modal -->
                            <h4>
                                Product List
                                <button type="button" style="float: right" class="btn btn-primary" data-toggle="modal"
                                    data-target="#sizedModalMd">
                                    <i class="align-left mr-1 mb-1" data-feather="plus"></i>Add Product
                                </button>
                            </h4>
                            <div class="modal fade" id="sizedModalMd" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add Product</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('admin.products.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body m-3">
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label for="category_id">Category <span
                                                                style="color: red;">*</span></label>
                                                        <select id="category_id" required name="category_id"
                                                            class="form-control form-control-lg @error('category_id')is-invalid @enderror">
                                                            <option selected="">Choose Category...</option>
                                                            @forelse ($categories as $category)
                                                                <option value="{{ $category->id }}">
                                                                    {{ $category->category_name }}</option>
                                                            @empty
                                                                <option>...</option>
                                                            @endforelse
                                                        </select>
                                                        @error('category_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputCategory">Sub Categories <span
                                                                class="text-danger">*</span></label>
                                                        <select id="inputCategory" required name="sub_category_id"
                                                            class="form-control form-control-lg @error('sub_category_id')is-invalid @enderror">

                                                        </select>
                                                        @error('sub_category_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputBrands">Brands</label>
                                                        <select id="inputBrands" required name="brand_id"
                                                            class="form-control form-control-lg">
                                                            <option selected="">Choose Brand...</option>
                                                            @forelse ($brands as $brand)
                                                                <option value="{{ $brand->id }}">
                                                                    {{ $brand->brand_name }}</option>
                                                            @empty
                                                                <option>...</option>
                                                            @endforelse
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label class="form-label">Product Name <span
                                                                style="color: red;">*</span></label>
                                                        <input type="text" name="product_name" autofocus
                                                            class="form-control form-control-lg @error('product_name')is-invalid @enderror"
                                                            value="{{ old('product_name') }}" required
                                                            placeholder="Enter Product name">

                                                        @error('product_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="quantity">Product Quantity <span
                                                                style="color: red;">*</span></label>
                                                        <input type="number" value="{{ old('product_quantity') }}" name="product_quantity"
                                                            class="form-control form-control-lg" id="quantity"
                                                            placeholder="Product Quantity">
                                                    </div>
                                                    <div class="col-md-5">
                                                        <label for="size">Product Color </label>
                                                        <input type="text" value="{{ old('product_color') }}" data-role="tagsinput" name="product_color"
                                                            class="form-control form-control-lg">
                                                        @error('product_color')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label for="selling">Selling Price <span
                                                                style="color: red;">*</span></label>
                                                        <input type="number" value="{{ old('selling_price') }}" required name="selling_price"
                                                            class="form-control form-control-lg @error('selling_price')is-invalid @enderror"
                                                            placeholder="Selling Price">
                                                        @error('selling_price')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="discount">Discount Price</label>
                                                        <input type="number" value="{{ old('discount_price') }}" name="discount_price"
                                                            class="form-control form-control-lg @error('discount_price')is-invalid @enderror"
                                                            placeholder="Discount Price">
                                                        @error('discount_price')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="color">Product Size</label>
                                                        <input type="text" data-role="tagsinput" value="{{ old('product_size') }}" name="product_size"
                                                            class="form-control form-control-lg">
                                                        @error('product_size')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <!-- Create the editor container -->
                                                    <label for="product_description">Product Description <span
                                                            class="text-danger">*</span></label>
                                                    <textarea name="product_details" id="editor" class="@error('product_details')is-invalid @enderror" placeholder="Write down product details">{{ old('product_details') }}</textarea>
                                                    @error('product_details')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <br>

                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label for="">Video Link</label>
                                                        <input type="text" value="{{ old('video_link') }}" name="video_link"
                                                            class="form-control form-control-lg @error('video_link')is-invalid @enderror"
                                                            placeholder="Specify product video link">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="first_image">Image One (Main Thumbnail) <span
                                                                class="text-danger">*</span></label>
                                                        <input type="file" value="{{ old('first_image') }}" name="first_image"
                                                            class="form-control form-control-lg @error('first_image')is-invalid @enderror"
                                                            onchange="readURL1(this);">
                                                        @error('first_image')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <img src="#" id="one" alt="" class="mt-3">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="second_image">Image Two <span class="text-danger">*</span></label>
                                                        <input type="file" name="second_image" value="{{ old('second_image') }}" id="second_image"
                                                            class="form-control form-control-lg @error('second_image')is-invalid @enderror"
                                                            onchange="readURL2(this);">
                                                        @error('second_image')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <img src="#" id="two" class="mt-3" alt="">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="third_image">Image Three <span class="text-danger">*</span></label>
                                                        <input type="file" value="{{ old('third_image') }}" name="third_image" id="third_image"
                                                            class="form-control form-control-lg @error('third_image')is-invalid @enderror"
                                                            onchange="readURL3(this);">
                                                        @error('third_image')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <img src="#" id="three" class="mt-3" alt="">
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch1" name="main_slider" value="1">
                                                            <label class="custom-control-label" for="customSwitch1">Main
                                                                Slider</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch2" name="hot_deals" value="1">
                                                            <label class="custom-control-label" for="customSwitch2">Hot
                                                                Deals</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch3" name="best_rated" value="1">
                                                            <label class="custom-control-label" for="customSwitch3">Best
                                                                Rated</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch4" name="hot_new" value="1">
                                                            <label class="custom-control-label" for="customSwitch4">Hot
                                                                New</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch5" name="trending" value="1">
                                                            <label class="custom-control-label"
                                                                for="customSwitch5">Trending</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch6" value="1" name="mid_slider">
                                                            <label class="custom-control-label" for="customSwitch6">Mid
                                                                Slider</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Add Category</button>
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
                                    <th>Code</th>
                                    <th>Category</th>
                                    <th>SubCategory</th>
                                    <th>Product</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->product_code }}</td>
                                        <td>{{ $product->category->category_name }}</td>
                                        <td>{{ $product->subCategory->sub_category_name }}</td>
                                        <td>{{ $product->product_name }}</td>
                                        <td><img src="{{ asset($product->first_image) }}" style="width: 40px; height: 40px" /></td>
                                        <td>&#8358; {{ $product->selling_price }}</td>
{{--                                        <td>{{ Str::limit($product->product_details, 20)  }}</td>--}}
                                        <td>{{ $product->product_quantity }}</td>
                                        <td>
                                            @if($product->status !== 1)
                                                <span class="badge badge-danger">Unavailable</span>
                                            @else
                                                <span class="badge badge-info">Available</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.products.edit', $product->slug) }}"
                                               class="btn btn-outline-primary">
                                                <i class="align-left mr-1 mb-1" data-feather="edit-2"></i> Edit
                                            </a>

                                            <a href="{{ route('admin.products.delete', $product->slug) }}"
                                               class="btn btn-outline-danger mt-2" id="delete">
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

    @section('script')
        <script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
        {{-- This is used to preview an image selected by the user --}}
        <script type="text/javascript">
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

            function readURL2(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#two')
                            .attr('src', e.target.result)
                            .width(100)
                            .height(80);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

            function readURL3(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#three')
                            .attr('src', e.target.result)
                            .width(100)
                            .height(80);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

        </script>
        <script>
            $(".select2").each(function() {
                $(this)
                    .wrap("<div class=\"position-relative\"></div>")
                    .select2({
                        placeholder: "Size",
                        dropdownParent: $(this).parent()
                    });
            })

        </script>
    @endsection
@endsection
