@extends('layouts.app')

@section('content')
<div class="container text-center py-5">
    <h1 class="fw-bold mb-4" style="font-family: 'Alice', serif; font-size: 2.5rem;">
        Welcome, {{ Auth::user()->first_name }}!
    </h1>

    <p class="text-muted mb-4" style="font-size: 1.2rem;">
        Thank you for joining Trente-trois style 🌿<br>
        We’re happy to have you here.
    </p>

    <a href="{{ route('products.index') }}" class="btn-figma mt-3 rounded-pill" style="font-size: 1rem;">
        🛍 Browse Our Collection
    </a>
</div>
@endsection
