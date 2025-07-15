<h2 class="text-center mb-4 mt-4">Top Sellers</h2>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
    @forelse ($topProducts as $product)
        <div class="col">
            <div class="card border-0 shadow-none p-0">
                <a href="{{ route('products.show', $product->id) }}">
                    <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/no-image.png') }}"
                        alt="{{ $product->name }}" class="img-fluid rounded product-image"
                        style="width: 100%; object-fit: contain;"> {{-- heightを削除し、width: 100%を追加すると、親要素の幅いっぱいに広がる --}}
                </a>

                <div class="card-body text-center">
                    <h6 class="card-title">{{ $product->name }}</h6>
                    <p class="card-text">${{ number_format($product->price, 2) }}</p>

                    {{-- 在庫数の表示 --}}
                    <p>
                        @if ($product->stock > 0)
                            Stock: {{ $product->stock }}
                        @else
                            <span class="text-danger">Out of stock</span>
                        @endif
                    </p>

                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center">
            <p>No top sellers found.</p>
        </div>
    @endforelse
</div>

<div class="container py-5">
    {{-- ✅ カテゴリ切り替えリンクバー --}}
    <div class="d-flex justify-content-center mt-4 mb-5">
        <a href="{{ route('products.index', ['category' => 'dress']) }}"
            class="btn btn-figma rounded-pill mx-2">Dresses</a>
        <a href="{{ route('products.index', ['category' => 'accessory']) }}"
            class="btn btn-figma rounded-pill mx-2">Accessories</a>
        <a href="{{ route('products.index', ['category' => 'bag']) }}" class="btn btn-figma rounded-pill mx-2">Bags</a>
    </div>
</div>
