<h2 class="text-center mt-5 mb-4">Top Sellers</h2>
<div class="row justify-content-center">
    @forelse ($topSellers as $product)
        <div class="col-md-3 mb-4 text-center">
            <img src="{{ $product->image_path ? asset('storage/' . $product->image_path) : asset('images/no-image.png') }}"
                 alt="{{ $product->name }}" class="img-fluid rounded">
            <h5 class="mt-2">{{ $product->name }}</h5>
            <p>${{ number_format($product->price) }}</p>
        </div>
    @empty
        <p class="text-center">No top sellers found.</p>
    @endforelse
</div>
