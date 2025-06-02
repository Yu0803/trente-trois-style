<div class="container py-5">
    <h2 class="text-center fw-bold mb-4">Discover NEW Arrivals</h2>
    <div class="row row-cols-2 row-cols-md-4 g-4">

        {{-- {{一時的にコード追記}} --}}
        <p>商品数: {{ $newArrivals->count() }}</p>

        @foreach ($newArrivals as $product)
            <p>{{ $product->name }} - ${{ $product->price }} - {{ $product->image }}</p>
        @endforeach
        {{-- {{一時的にコード追記ここまで}} --}}



        @foreach ($newArrivals as $product)
            <div class="col">
                <div class="card h-100 text-center">
                    <img src="{{ asset('images/products/' . $product->image) }}" class="card-img-top"
                        alt="{{ $product->name }}">
                    <div class="card-body">
                        <h6 class="card-title">{{ $product->name }}</h6>
                        <p class="text-muted">${{ number_format($product->price, 2) }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</section>