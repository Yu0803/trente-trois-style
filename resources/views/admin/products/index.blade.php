@extends('layouts.admin')

@section('content')
    <div class="admin-layout d-flex">

        {{-- ✅ サイドバーを読み込み --}}
        @include('admin.sidebar')

        <!-- メインコンテンツ -->
        <main class="flex-grow-1 p-4 bg-light">
            <h2 class="mb-4">Product Management</h2>

            <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">Add New Product</a>

            <!-- 商品一覧テーブル -->
            <div class="table-responsive bg-white rounded shadow-sm p-3">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>
                                    @if ($product->image_path)
                                        <img src="{{ asset('storage/' . $product->image) }}" width="60"
                                            alt="Product">
                                    @else
                                        No image
                                    @endif
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>${{ number_format($product->price) }}</td>
                                <td>{{ $product->category }}</td>
                                <td>
                                    {{-- ★ ここに書く！ --}}
                                    <a href="{{ route('admin.products.edit', $product->id) }}"
                                        class="btn btn-sm btn-warning">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>

    </div>
@endsection
