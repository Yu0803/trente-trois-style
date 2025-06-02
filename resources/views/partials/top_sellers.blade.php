<div class="container py-5 bg-light">
    <h2 class="text-center fw-bold mb-4">Top Sellers</h2>
    <div class="row row-cols-2 row-cols-md-5 g-4">
        @foreach ($topSellers as $product)
            <div class="col">
                <div class="card h-100 text-center">
                    <img src="{{ asset('images/products/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h6 class="card-title">{{ $product->name }}</h6>
                        <p class="text-muted">${{ number_format($product->price, 2) }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
