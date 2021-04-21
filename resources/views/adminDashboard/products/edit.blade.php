@extends('adminDashboard.layouts.admin_layouts')
@section('title', 'OneTech Ecommerce | Edit Products')

@section('dashboard')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit {{ $products->product_name }} </h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.products.update', $products->slug) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="category_id">Category <span style="color: red;">*</span></label>
                                        <select id="category_id" required name="category_id"
                                            class="form-control form-control-lg @error('category_id')is-invalid @enderror">
                                            <option selected="">Choose Category...</option>
                                            @forelse ($categories as $category)
                                                <option value="{{ $category->id }}" <?php if ($category->id ===
                                                    $products->category_id) {
                                                    echo 'selected';
                                                    } ?>>
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
                                        <label for="inputCategory">Sub Categories <span class="text-danger">*</span></label>
                                        <select required name="sub_category_id"
                                            class="form-control form-control-lg @error('sub_category_id')is-invalid @enderror">
                                            @foreach ($subCategories as $subCategory)
                                                <option value="{{ $subCategory->id }}" <?php if
                                                    ($subCategory->id === $products->sub_category_id) {
                                                    echo 'selected';
                                                    } ?>>{{ $subCategory->sub_category_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('sub_category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputBrands">Brands</label>
                                        <select id="inputBrands" required name="brand_id"
                                            class="form-control form-control-lg @error('sub_category_id')is-invalid @enderror">
                                            <option>Choose Brand...</option>
                                            @forelse ($brands as $brand)
                                                <option value="{{ $brand->id }}" <?php if ($brand->id ===
                                                    $products->brand_id) {
                                                    echo 'selected';
                                                    } ?>>
                                                    {{ $brand->brand_name }}</option>
                                            @empty
                                                <option>...</option>
                                            @endforelse
                                        </select>
                                        @error('brand_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label class="form-label">Product Name <span style="color: red;">*</span></label>
                                        <input type="text" name="product_name" autofocus
                                            class="form-control form-control-lg @error('product_name')is-invalid @enderror"
                                            value="{{ $products->product_name }}" required
                                            placeholder="Enter Product name">

                                        @error('product_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="quantity">Product Quantity <span style="color: red;">*</span></label>
                                        <input type="number" value="{{ $products->product_quantity }}"
                                            name="product_quantity" class="form-control form-control-lg" id="quantity"
                                            placeholder="Product Quantity">
                                    </div>
                                    <div class="col-md-5">
                                        <label for="size">Product Color </label>
                                        <input type="text" value="{{ $products->product_color }}" data-role="tagsinput"
                                            name="product_color" class="form-control form-control-lg">
                                        @error('product_color')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="selling">Selling Price <span style="color: red;">*</span></label>
                                        <input type="number" value="{{ $products->selling_price }}" required
                                            name="selling_price"
                                            class="form-control form-control-lg @error('selling_price')is-invalid @enderror"
                                            placeholder="Selling Price">
                                        @error('selling_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="discount">Discount Price</label>
                                        <input type="number" value="{{ $products->discount_price }}"
                                            name="discount_price"
                                            class="form-control form-control-lg @error('discount_price')is-invalid @enderror"
                                            placeholder="Discount Price">
                                        @error('discount_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="color">Product Size</label>
                                        <input type="text" data-role="tagsinput" value="{{ $products->product_size }}"
                                            name="product_size" class="form-control form-control-lg">
                                        @error('product_size')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- Create the editor container -->
                                    <label for="product_description">Product Description <span
                                            class="text-danger">*</span></label>
                                    <textarea name="product_details" id="editor"
                                        class="@error('product_details')is-invalid @enderror"
                                        placeholder="Write down product details">{{ $products->product_details }}</textarea>
                                    @error('product_details')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>

                                <div class="form-group col-md-12">
                                    <label for="">Video Link</label>
                                    <input type="text" value="{{ $products->video_link }}" name="video_link"
                                        class="form-control form-control-lg @error('video_link')is-invalid @enderror"
                                        placeholder="Specify product video link">
                                    @error('video_link')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <hr>

                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch1"
                                                name="main_slider" value="1" <?php if ($products->main_slider
                                            === 1) {
                                            echo 'checked';
                                            } ?> >
                                            <label class="custom-control-label" for="customSwitch1">Main
                                                Slider</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch2"
                                                name="hot_deals" value="1" <?php if ($products->hot_deals ===
                                            1) {
                                            echo 'checked';
                                            } ?>>
                                            <label class="custom-control-label" for="customSwitch2">Hot
                                                Deals</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch3"
                                                name="best_rated" value="1" <?php if ($products->best_rated
                                            === 1) {
                                            echo 'checked';
                                            } ?>>
                                            <label class="custom-control-label" for="customSwitch3">Best
                                                Rated</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch4"
                                                name="hot_new" value="1" <?php if ($products->hot_new === 1)
                                            {
                                            echo 'checked';
                                            } ?>>
                                            <label class="custom-control-label" for="customSwitch4">Hot
                                                New</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch5"
                                                name="trending" value="1" <?php if ($products->trending ===
                                            1) {
                                            echo 'checked';
                                            } ?>>
                                            <label class="custom-control-label" for="customSwitch5">Trending</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch6" value="1"
                                                name="mid_slider" <?php if ($products->mid_slider === 1) {
                                            echo 'checked';
                                            } ?>>
                                            <label class="custom-control-label" for="customSwitch6">Mid
                                                Slider</label>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4>Update Images</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.products.update.image', $products->slug) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="old_first_image" value="{{ $products->first_image }}">
                                <input type="hidden" name="old_second_image" value="{{ $products->second_image }}">
                                <input type="hidden" name="old_third_image" value="{{ $products->third_image }}">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="first_image">Image One (Main Thumbnail) <span
                                                class="text-danger">*</span></label>
                                        <input type="file" value="{{ $products->first_image }}" name="first_image"
                                            class="form-control form-control-lg @error('first_image')is-invalid @enderror"
                                            onchange="readURL1(this);">
                                        @error('first_image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <img src="{{ asset($products->first_image) }}" width="100" height="100"
                                            class="rounded mt-3" alt="{{ $products->product_name }} first image" />
                                        <img src="#" id="one" alt="" class="rounded mt-3 ml-3">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="second_image">Image Two <span class="text-danger">*</span></label>
                                        <input type="file" name="second_image" value="{{ $products->second_image }}"
                                            id="second_image"
                                            class="form-control form-control-lg @error('second_image')is-invalid @enderror"
                                            onchange="readURL2(this);">
                                        @error('second_image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <img src="{{ asset($products->second_image) }}" class="rounded mt-3" width="100"
                                            height="100" alt="{{ $products->product_name }} second image" />
                                        <img src="#" id="two" class="rounded mt-3" alt="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="third_image">Image Three <span class="text-danger">*</span></label>
                                        <input type="file" value="{{ $products->third_image }}" name="third_image"
                                            id="third_image"
                                            class="form-control form-control-lg @error('third_image')is-invalid @enderror"
                                            onchange="readURL3(this);">
                                        @error('third_image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <img src="{{ asset($products->third_image) }}" class="rounded mt-3" width="100"
                                            height="100" alt="{{ $products->product_name }} Third image" />
                                        <img src="#" id="three" class="rounded mt-3" alt="">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary mt-4">Update Image</button>
                            </form>
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
                .create(document.querySelector('#editor'))
                .catch(error => {
                    console.error(error);
                });

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
