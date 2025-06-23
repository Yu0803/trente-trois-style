<h2 class="text-center mt-5 mb-4">Top Sellers</h2>
<div class="row justify-content-center">
    @forelse ($topProducts as $product)
        <div class="col-md-3 mb-4 text-center">
            <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/no-image.png') }}"
                alt="{{ $product->name }}" class="img-fluid rounded"
                style="width: 100%; height: 200px; object-fit: contain;">
            <h5 class="mt-2">{{ $product->name }}</h5>
            <p>${{ number_format($product->price) }}</p>
            <p>
                @if ($product->stock > 0)
                    Stock: {{ $product->stock }}
                @else
                    <span class="text-danger">Out of stock</span>
                @endif
            </p>
            <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-primary btn-sm">View Details</a>
        </div>
    @empty
        <p class="text-center">No top sellers found.</p>
    @endforelse
</div>
