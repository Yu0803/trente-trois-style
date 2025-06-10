@extends('layouts.app')

@section('content')
<div class="container text-center py-5">
  <h2>🎉 Payment Successful!</h2>
  <p>Thank you for your purchase.</p>
  <a href="{{ route('products.index') }}" class="btn-figma mt-3">← Back to Home</a>
</div>
@endsection
