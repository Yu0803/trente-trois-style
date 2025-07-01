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
                        <th>Order Items</th> {{-- ← 追加 --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $payment)
                        <tr>
                            <td>{{ $payment->id }}</td>
                            <td>
                                {{ optional($payment->user)->first_name ?? 'No user' }}
                                {{ optional($payment->user)->last_name ?? '' }}
                            </td>
                            <td>{{ number_format($payment->amount, 2) }}</td>
                            <td>{{ $payment->status }}</td>
                            <td>{{ $payment->paid_at ?? $payment->created_at }}</td>
                            <td>
                                @if ($payment->order && $payment->order->items)
                                    <ul class="mb-0 ps-3">
                                        @foreach ($payment->order->items as $item)
                                            <li>
                                                {{ $item->product->name ?? 'No product data' }}
                                                × {{ $item->quantity }}個（￥{{ number_format($item->price) }}）
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span class="text-muted">No Items</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $payments->links() }}
        </main>
    </div>
@endsection
