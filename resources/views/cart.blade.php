<form method="POST" action="{{ route('order.store') }}">
  @csrf
  <input type="hidden" name="items[0][product_id]" value="1">
  <input type="hidden" name="items[0][quantity]" value="2">
  <input type="hidden" name="items[1][product_id]" value="2">
  <input type="hidden" name="items[1][quantity]" value="1">

  <button type="submit">購入する</button>
</form>
