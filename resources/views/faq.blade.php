@extends('layouts.app')

@section('content')
<div class="container py-5">
  <h1 class="fw-bold mb-4">FAQ</h1>
  <p>Find answers to the most commonly asked questions about our products, shipping, returns, and more.</p>

  <div class="accordion mt-4" id="faqAccordion">

    <!-- Q1 -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
          What is the estimated delivery time?
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
          Standard shipping usually takes 5–7 business days. Express shipping is available and typically takes 2–3 business days.
        </div>
      </div>
    </div>

    <!-- Q2 -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
          Do you offer international shipping?
        </button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
          Yes, we ship internationally. Delivery times and fees vary depending on the destination country.
        </div>
      </div>
    </div>

    <!-- Q3 -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
          How do I return an item?
        </button>
      </h2>
      <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
          You can return an item within 30 days of purchase. Please contact our support team for a pre-paid return label and instructions.
        </div>
      </div>
    </div>

    <!-- Q4 -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingFour">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour">
          Can I exchange an item for a different size?
        </button>
      </h2>
      <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
          Yes, if the item is still in good condition and within 30 days of purchase. Contact us to arrange the exchange.
        </div>
      </div>
    </div>

    <!-- Q5 -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingFive">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive">
          What payment methods do you accept?
        </button>
      </h2>
      <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
          We accept all major credit cards, PayPal, and selected digital wallets.
        </div>
      </div>
    </div>

  </div>
</div>
@endsection
