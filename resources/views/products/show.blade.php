{{-- resources/views/products/show.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card text-center">
                    {{-- 画像 --}}
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}"
                        style="width: 100%; object-fit: contain;"> {{-- heightを削除し、width: 100%を追加すると、親要素の幅いっぱいに広がる --}}

                    <div class="card-body">
                        {{-- 商品名・価格・説明 --}}
                        <h2 class="fw-bold">{{ $product->name }}</h2>
                        <p class="fs-4">${{ number_format($product->price) }}</p>
                        {{-- 在庫表示の追加 --}}
                        <p>
                            @if ($product->stock > 0)
                                Stock: {{ $product->stock }}
                            @else
                                <span class="text-danger">Out of stock</span>
                            @endif
                        </p>
                        <p class="mb-4">{{ $product->description }}</p>

                        {{-- カート追加フォーム & 商品一覧に戻る --}}
                        <div class="d-flex justify-content-center gap-3 flex-wrap">
                            <form method="POST" action="{{ route('cart.add') }}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn-figma">cart🛒 </button>
                            </form>

                            <a href="{{ route('products.index', $product->category) }}" class="btn-figma">
                                ← products list
                            </a>
                        </div>
                        {{-- レビュー表示 --}}
                        <h4 class="mt-4">Review(s)</h4>

                        @forelse($product->reviews as $review)
                            <div class="mb-3 p-3 border rounded bg-light">
                                <strong>{{ $review->user->first_name }} {{ $review->user->last_name }}</strong><br>

                                {{-- ★の視覚表示 --}}
                                <div>
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $review->rating)
                                            <span style="color: orange;">★</span>
                                        @else
                                            <span style="color: lightgray;">★</span>
                                        @endif
                                    @endfor
                                </div>

                                <small>{{ $review->created_at->format('Y-m-d') }}</small>
                                <p class="mt-2">{{ $review->comment }}</p>
                            </div>
                        @empty
                            <p>No reviews yet.</p>
                        @endforelse

                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- レビュー投稿フォーム（ログインユーザーのみ表示） --}}
    {{-- 投稿フォーム --}}
    @auth
        <div class="container mt-5">
            <div class="card shadow-sm">
                <div class="card-header text-white" style="background-color: #024E82;">
                    <h5 class="mb-0">📝 Post a Review</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('reviews.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <div class="mb-3">
                            <label for="rating" class="form-label">⭐ Rating (1〜5)</label>
                            <select name="rating" id="rating" class="form-select" required>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="comment" class="form-label">💬 Comment</label>
                            <textarea name="comment" id="comment" class="form-control" rows="4" placeholder="Write your thoughts here..."
                                required></textarea>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-success px-4">Submit Review</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endauth




@endsection
