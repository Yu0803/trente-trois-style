@extends('layouts.app')

@section('content')
<div class="container py-5">
  <h1 class="fw-bold mb-4">Gift Cards</h1>
  <p>Give the gift of choice with our customizable gift cards, perfect for any occasion.</p>

  <div class="row mt-4">
    <div class="col-md-4 mb-4">
      <img src="{{ asset('images/giftcards/teddy-card.png') }}" alt="Teddy Gift Card" class="img-fluid rounded shadow-sm">
    </div>
    <div class="col-md-4 mb-4">
      <img src="{{ asset('images/giftcards/tuxedo-card.png') }}" alt="Tuxedo Gift Card" class="img-fluid rounded shadow-sm">
    </div>
    <div class="col-md-4 mb-4">
      <img src="{{ asset('images/giftcards/dress-card.png') }}" alt="Dress Gift Card" class="img-fluid rounded shadow-sm">
    </div>
  </div>
</div>
@endsection

