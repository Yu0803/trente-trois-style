{{-- resources/views/products/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h1 class="text-center mb-4">Product List</h1>

        <div class="row g-5 row-cols-1 row-cols-md-3 h-100">
            @foreach ($products as $product)
                <div class="col-4">
                    <div class="card">
                        <a href="{{ route('products.show', $product->id) }}">
                            <img src="{{ asset('storage/' . $product->image) }}" class="rounded img-fluid"
                                alt="{{ $product->name }}">
                        </a>
                        {{-- 商品画像 --}}
                        {{-- 画像の高さを350pxに固定し、object-fitで切り抜き --}}


                        <div class="card-body text-center">
                            <p class="card-text">${{ number_format($product->price) }}</p>

                            {{-- ✅ 在庫数の表示 --}}
                            <p>
                                @if ($product->stock > 0)
                                    Stock: {{ $product->stock }}
                                @else
                                    <span class="text-danger">Out of stock</span>
                                @endif
                            </p>

                            {{-- ✅ 複数カテゴリをバッジ表示 --}}
                            <p>
                                @foreach ($product->categories as $category)
                                    <span class="badge bg-secondary">{{ $category->name }}</span>
                                @endforeach
                            </p>

                            <a href="{{ route('products.show', $product->id) }}" class="btn-figma">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- ✅ ページネーションリンク --}}
        <div class="d-flex justify-content-center mt-4">
            {{ $products->links('vendor.pagination.custom') }}
        </div>

        {{-- ✅ カテゴリ切り替えリンクバー --}}
        <div class="d-flex justify-content-center mt-4 mb-5">
            <a href="{{ route('products.index', ['category' => 'dress']) }}"
                class="btn btn-figma rounded-pill mx-2">Dresses</a>
            <a href="{{ route('products.index', ['category' => 'accessory']) }}"
                class="btn btn-figma rounded-pill mx-2">Accessories</a>
            <a href="{{ route('products.index', ['category' => 'bag']) }}" class="btn btn-figma rounded-pill mx-2">Bags</a>
        </div>
    </div>
@endsection
