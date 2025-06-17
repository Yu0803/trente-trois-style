@extends('layouts.app')

@section('content')
<div class="container text-center py-5">
  <h2 class="fw-bold mb-4">🎉 Payment Successful (Demo)</h2>
  <p class="fs-5">Thank you for your purchase! This is a demo confirmation screen.<br>
  No actual payment was processed.</p>

  
  <a href="{{ route('products.index') }}" class="btn-figma mt-3">← Back to Shop</a>
</div>
@endsection
