<!-- Benefit Section -->

<section class="benefit-section container-wide">
  <div class="benefit-box">
    <div>
      <i class="fa-solid fa-truck-fast"></i>
      <strong>FREE SHIPPING</strong>
      <p>Enjoy free shipping on all orders above $100</p>
    </div>
  </div>
  <div class="benefit-box">
    <div>
      <i class="fas fa-life-ring"></i>
      <strong>SUPPORT 24/7</strong>
      <p>Our support team is there to help you for queries</p>
    </div>
  </div>
  <div class="benefit-box">
    <div>
      <i class="fas fa-rotate-left"></i>
      <strong>30 DAYS RETURN</strong>
      <p>Simply return it within 30 days for an exchange.</p>
    </div>
  </div>
  <div class="benefit-box">
    <div>
      <i class="fa-solid fa-fingerprint"></i>
      <strong>100% PAYMENT SECURE</strong>
      <p>Our payments are secured with 256 bit encryption</p>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="footer">
  <!-- 👇 container-wide はここ1回だけ -->
  <div class="container-wide">
    <div class="footer-container">
      <div class="footer-column">
        <h4>COMPANY INFO</h4>
        <ul>
          <li><a href="{{ route('about') }}">About Us</a></li>
          <li><a href="{{ route('latest-posts') }}">Latest Posts</a></li>
          <li><a href="{{ route('blog') }}">Blog</a></li>

          <li><a href="{{ route('contact') }}">Contact Us</a></li>
          <li><a href="{{ route('products.index') }}">Products</a></li>
          <li><a href="{{ route('about') }}">Store Location</a></li>
        </ul>
      </div>

      <div class="footer-column">
        <h4>HELP LINKS</h4>
        <ul>
          <li><a href="{{ route('returns') }}">Returns</a></li>
          <li><a href="{{ route('order-status') }}">Order Status</a></li>
          <li><a href="{{ route('size-guide') }}">Size Guide</a></li>
          <li><a href="{{ route('delivery') }}">Delivery</a></li>
          <li><a href="{{ route('shipping-info') }}">Shipping Info</a></li>
          <li><a href="{{ route('faq') }}">FAQ</a></li>
        </ul>
      </div>

      <div class="footer-column">
        <h4>USEFUL LINKS</h4>
        <ul>
          <li><a href="{{ route('special-offers') }}">Special Offers</a></li>
          <li><a href="{{ route('gift-cards') }}">Gift Cards</a></li>
          {{-- <li><a href="{{ route('advertising') }}">Advertising</a></li> --}}
          <li><a href="{{ route('terms-of-use') }}">Terms of Use</a></li>
        </ul>
      </div>

      <div class="footer-column newsletter">
        <h4>GET IN THE KNOW</h4>
        <form>
          <input type="email" placeholder="Enter email">
          <button type="submit">→</button>
        </form>
      </div>
    </div>

    <div class="footer-bottom">
      <div class="footer-info">
        <p>© 2020 eCommerce, Made by DeoThemes.</p>
        <a href="#">Privacy Policy</a>
        <a href="#">Terms & Conditions</a>
      </div>
      <div class="footer-icons">
        <img src="{{ asset('images/visa.png') }}" alt="Visa">
        <img src="{{ asset('images/master.png') }}" alt="Mastercard">
        <img src="{{ asset('images/paypal.png') }}" alt="PayPal">
        <img src="{{ asset('images/visaelectron.png') }}" alt="Visa Electron">
      </div>
    </div>
  </div>
</footer>
