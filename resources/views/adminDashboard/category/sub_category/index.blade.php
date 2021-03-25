@extends('adminDashboard.layouts.admin_layouts')
@section('title', 'OneTech Ecommerce | Admin Dashboard | Product Sub Category')
@section('dashboard')
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3">Product Sub Category</h1>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <!-- BEGIN  modal -->
                            <h4>
                                Sub Category List
                                <button type="button" style="float: right" class="btn btn-primary" data-toggle="modal"
                                    data-target="#sizedModalMd">
                                    <i class="align-left mr-1 mb-1" data-feather="plus"></i>Add Sub Category
                                </button>
                            </h4>
                            <div class="modal fade" id="sizedModalMd" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add Sub Category</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('admin.subCategory.store') }}" method="POST">
                                            <div class="modal-body m-3">
                                                @csrf

                                                <div class="form-group">
                                                    <label for="inputCategory">Category</label>
                                                    <select id="inputCategory" required name="category_id"
                                                        class="form-control">
                                                        <option selected="">Choose Category...</option>
                                                        @forelse ($getAllCategories as $getAllCategory)
                                                            <option value="{{ $getAllCategory->id }}">
                                                                {{ $getAllCategory->category_name }}</option>
                                                        @empty
                                                            <option>...</option>
                                                        @endforelse
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label">Category Name</label>
                                                    <input type="text" required name="sub_category_name" autofocus
                                                        class="form-control form-control-lg @error('category_name')is-invalid @enderror"
                                                        value="{{ old('category_name') }}" required
                                                        placeholder="Enter category name">

                                                    @error('category_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Add SubCategory</button>
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
                                        <th>Category Name</th>
                                        <th>Sub Category Name</th>
                                        <th>Day Created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subCategories as $key => $subCategory)
                                        <tr>
                                            {{-- <th>{{ $categories->firstItem() + $loop->index }}</th> --}}
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                <h4>
                                                    <span
                                                        class="badge badge-primary">{{ $subCategory->category->category_name }}</span>
                                                </h4>
                                            </td>
                                            <td>{{ $subCategory->sub_category_name }}</td>
                                            <td>{{ $subCategory->created_at->diffForHumans() }}</td>
                                            <td>
                                                <a href="{{ route('admin.subCategory.edit', $subCategory->slug) }}"
                                                    class="btn btn-outline-primary">
                                                    <i class="align-left mr-1 mb-1" data-feather="edit-2"></i> Edit
                                                </a>

                                                <a href="{{ route('admin.subCategory.delete', $subCategory->slug) }}"
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
