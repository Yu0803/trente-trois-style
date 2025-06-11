@extends('layouts.admin')

@section('content')
    <div class="admin-layout d-flex">
        @include('admin.sidebar')

        <main class="flex-grow-1 p-4 bg-light">
            <div class="container">
                <h2 class="mb-4">Edit Product</h2>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="card shadow-sm">
                    <div class="card-body">
                        <form action="{{ route('admin.products.update', $product) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Product Name</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ old('name', $product->name) }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Category</label>
                                    <input type="text" name="category" class="form-control"
                                        value="{{ old('category', $product->category) }}">
                                </div>
                            </div>

                            {{-- 画像プレビューと更新 --}}
                            <div class="mb-3">
                                <label class="form-label">Product Image</label><br>
                                <!-- 画像プレビュー -->
                                @if ($product->image_path)
                                    <div class="mb-3">
                                        <label class="form-label">Current Image</label><br>
                                        <img src="{{ asset('storage/' . $product->image_path) }}" alt="product image"
                                            style="max-height: 150px;">

                                        <!-- ✅ ここに削除チェックボックス -->
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox" name="delete_image"
                                                value="1" id="deleteImage">
                                            <label class="form-check-label" for="deleteImage">Delete current image</label>
                                        </div>
                                    </div>
                                @endif
                                <input type="file" name="image" class="form-control" accept="image/*">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea name="description" rows="4" class="form-control">{{ old('description', $product->description) }}</textarea>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Price</label>
                                    <input type="number" name="price" class="form-control"
                                        value="{{ old('price', $product->price) }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Stock</label>
                                    <input type="number" name="stock" class="form-control"
                                        value="{{ old('stock', $product->stock) }}">
                                </div>
                            </div>

                            <div class="text-end">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
