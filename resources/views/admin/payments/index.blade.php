@extends('layouts.admin')

@section('content')
    <div class="admin-layout d-flex">

        {{-- ✅ サイドバーを読み込み --}}
        @include('admin.sidebar')

        <!-- メインコンテンツ -->
        <main class="flex-grow-1 p-4 bg-light">
  <h2 class="mb-4">Payment Management</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Payment ID</th>
        <th>User</th>
        <th>Amount</th>
        <th>Status</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($payments as $payment)
        <tr>
          <td>{{ $payment->id }}</td>
          <td>{{ $payment->user->name }}</td>
          <td>$ {{ number_format($payment->amount) }}</td>
          <td>{{ $payment->status }}</td>
          <td>{{ $payment->created_at->format('Y-m-d') }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
