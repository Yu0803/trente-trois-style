@extends('layouts.app')

@section('content')
<div class="container py-5">
  <h1 class="fw-bold mb-4">Size Guide</h1>
  <p class="mb-4">Use this guide to determine the best size for your wedding dress. We recommend measuring yourself carefully or consulting with our fitting specialists.</p>

  <!-- 画像 -->
  <div class="mb-4 text-center">
    <img src="{{ asset('images/size_guide.png') }}" alt="Wedding Dress Size Guide" class="img-fluid rounded shadow">
  </div>

  <!-- サイズの説明 -->
  <h3 class="mt-5 mb-3">How to Measure</h3>
  <ul>
    <li><strong>Bust:</strong> Measure around the fullest part of your bust, wearing a bra with no padding.</li>
    <li><strong>Waist:</strong> Measure around the narrowest part of your waist (typically just above your belly button).</li>
    <li><strong>Hips:</strong> Measure around the fullest part of your hips.</li>
    <li><strong>Length:</strong> Measure from your shoulder to the floor (with shoes you plan to wear).</li>
  </ul>

  <h3 class="mt-5 mb-3">Size Chart</h3>
  <div class="table-responsive">
    <table class="table table-bordered table-striped">
      <thead class="table-light">
        <tr>
          <th>Size</th>
          <th>Bust (cm)</th>
          <th>Waist (cm)</th>
          <th>Hips (cm)</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>XS</td>
          <td>80–84</td>
          <td>60–64</td>
          <td>86–90</td>
        </tr>
        <tr>
          <td>S</td>
          <td>85–89</td>
          <td>65–69</td>
          <td>91–95</td>
        </tr>
        <tr>
          <td>M</td>
          <td>90–94</td>
          <td>70–74</td>
          <td>96–100</td>
        </tr>
        <tr>
          <td>L</td>
          <td>95–99</td>
          <td>75–79</td>
          <td>101–105</td>
        </tr>
        <tr>
          <td>XL</td>
          <td>100–104</td>
          <td>80–85</td>
          <td>106–110</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection
