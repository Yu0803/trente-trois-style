@extends('layouts.admin')

@section('content')
    <div class="admin-layout d-flex">
        @include('admin.sidebar')

        <main class="flex-grow-1 p-4 bg-light">
            <div class="container">
                <h1 class="mb-4">Product Management</h1>
                <h2 class="mb-4">Create New Product</h2>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="card shadow-sm">
                    <div class="card-body">
                        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            {{-- 名前・カテゴリ --}}
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Product Name</label>
                                    <input id="name" name="name" type="text" class="form-control"
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="categories" class="form-label">Categories</label>
                                    <select name="categories[]" id="categories" multiple class="form-select">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ collect(old('categories'))->contains($category->id) ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <small class="text-muted">※Ctrl（または⌘）キーで複数選択できます</small>

                                    @error('categories')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- 画像アップロード --}}
                            <div class="mb-3">
                                <label for="image" class="form-label">Product Image</label>
                                <input type="file" name="image" id="image" class="form-control mb-2"
                                    accept="image/*" onchange="previewImage(event)">
                                <img id="preview" src="#" alt="Image Preview" class="img-thumbnail d-none"
                                    style="max-height: 200px;">
                            </div>

                            {{-- 説明文 --}}
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" name="description" rows="4" class="form-control">{{ old('description') }}</textarea>
                            </div>

                            {{-- 価格・在庫 --}}
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="price" class="form-label">Price</label>
                                    <input id="price" name="price" type="number" step="0.01" class="form-control"
                                        value="{{ old('price') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="stock" class="form-label">Stock</label>
                                    <input id="stock" name="stock" type="number" class="form-control"
                                        value="{{ old('stock') }}">
                                </div>
                            </div>

                            {{-- 送信ボタン --}}
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary px-4">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>

    {{-- JavaScript for image preview --}}
    <script>
        function previewImage(event) {
            const preview = document.getElementById('preview');
            const file = event.target.files[0];
            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.classList.remove('d-none');
            }
        }
    </script>
@endsection
