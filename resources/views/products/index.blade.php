{{-- resources/views/products/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h1 class="text-center mb-4">Product List</h1>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
            @foreach ($products as $product)
                <div class="col">
                    <div class="card border-0 shadow-none p-0">
                        <a href="{{ route('products.show', $product->id) }}">
                            <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/no-image.png') }}"
                                alt="{{ $product->name }}" class="img-fluid rounded product-image"
                                style="width: 100%; object-fit: contain;"> {{-- heightを削除し、width: 100%を追加すると、親要素の幅いっぱいに広がる --}}
                        </a>
                        {{-- 商品画像 --}}
                        {{-- 画像の高さを350pxに固定し、object-fitで切り抜き --}}


                        <div class="card-body text-center">
                            <p class="card-text">${{ number_format($product->price) }}</p>
                            {{-- 商品名を表示 --}}
                            <p class="mb-4">{{ $product->description }}</p>
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
