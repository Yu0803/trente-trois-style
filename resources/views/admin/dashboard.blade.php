@extends('layouts.admin')

@section('content')
    <div class="admin-layout d-flex">

        {{-- ✅ サイドバーを読み込み --}}
        @include('admin.sidebar')

        <!-- メインコンテンツ -->
        <main class="flex-grow-1 p-4 bg-light">
            <h2 class="mb-4">Dashboard</h2>

            <!-- フィルター -->
            <div class="btn-group mb-4">
                <a href="{{ route('admin.dashboard', ['filter' => 'today']) }}"
                    class="btn {{ $filter === 'today' ? 'btn-primary' : 'btn-outline-primary' }}">
                    Today
                </a>
                <a href="{{ route('admin.dashboard', ['filter' => 'yesterday']) }}"
                    class="btn {{ $filter === 'yesterday' ? 'btn-primary' : 'btn-outline-primary' }}">
                    Yesterday
                </a>
                <a href="{{ route('admin.dashboard', ['filter' => 'week']) }}"
                    class="btn {{ $filter === 'week' ? 'btn-primary' : 'btn-outline-primary' }}">
                    Week
                </a>
                <a href="{{ route('admin.dashboard', ['filter' => 'month']) }}"
                    class="btn {{ $filter === 'month' ? 'btn-primary' : 'btn-outline-primary' }}">
                    Month
                </a>
            </div>

            <!-- テーブル -->
            <div class="table-responsive bg-white rounded shadow-sm p-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Payment By</th>
                            <th>Amount</th>
                            <th>Order ID</th>
                            <th>Order Date</th>
                            {{-- <th>Options</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                            <tr>
                                <td>{{ $order->description ?? '-' }}</td>
                                <td>
                                    {{ optional($order->user)->first_name ?? 'No user' }}
                                    {{ optional($order->user)->last_name ?? '' }}
                                </td>
                                <td>${{ number_format($order->amount) }}</td>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                {{-- <td>
                                    <a href="{{ route('admin.orders.show', $order->id) }}"
                                        class="btn btn-sm btn-outline-primary">View</a>
                                </td> --}}
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">No orders found for this period.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>
@endsection
