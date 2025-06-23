{{-- resources/views/admin/products/index.blade.php --}}
@extends('layouts.admin')

@section('content')
    <div class="admin-layout d-flex">
        @include('admin.sidebar')

        <main class="flex-grow-1 p-4 bg-light">
            <h2 class="mb-3">Product Management</h2>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">Add New Product</a>

            <table class="table">
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
                            <td style="width: 120px;">
                                @if ($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid"
                                        style="width: 100px; height: 130px; object-fit: contain; display: block; margin: 0 auto;">
                                @else
                                    <div
                                        style="width: 100px; height: 130px; background-color: #eee; text-align: center; line-height: 130px;">
                                        No image
                                    </div>
                                @endif
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>${{ number_format($product->price) }}</td>
                            <td>
                                @foreach ($product->categories as $category)
                                    <span class="badge bg-secondary">{{ $category->name }}</span>
                                @endforeach
                            </td>

                            <td class="d-flex gap-2">
                                <a href="{{ route('admin.products.edit', $product->id) }}"
                                    class="btn btn-warning btn-sm">Edit</a>

                                {{-- 🔽 Delete Form --}}
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure to delete this product?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>

            {{-- ✅ ページネーション --}}
            <div class="d-flex justify-content-center mt-4">
                {{ $products->links() }}
            </div>

        </main>
    </div>
@endsection
