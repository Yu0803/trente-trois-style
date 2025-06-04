{{-- resources/views/cart.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4"> Your Shopping Cart 🛒</h2>

    @php $cart = session('cart', []); @endphp

    @if (count($cart) === 0)
        <p>Your cart is empty.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $item)
                    <tr>
                        <td>{{ $item['product_id'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <form method="POST" action="{{ route('order.store') }}">
            @csrf
            @foreach ($cart as $index => $item)
                <input type="hidden" name="items[{{ $index }}][product_id]" value="{{ $item['product_id'] }}">
                <input type="hidden" name="items[{{ $index }}][quantity]" value="{{ $item['quantity'] }}">
            @endforeach
            <button type="submit" class="btn-figma">Proceed to Checkout</button>
        </form>
    @endif
</div>
@endsection
