@extends('layouts.admin')

@section('content')
    <div class="admin-layout d-flex">
        {{-- サイドバーを読み込み --}}
        @include('admin.sidebar')

        <!-- メインコンテンツ -->
        <main class="flex-grow-1 p-4 bg-light">
            <h2 class="mb-3">Order Management</h2>

            {{-- 検索フォーム --}}
            <form method="GET" action="{{ route('admin.orders.index') }}" class="mb-3 d-flex gap-2">
                <input type="text" name="keyword" class="form-control w-25" placeholder="Search by user or status" value="{{ request('keyword') }}">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>

            {{-- 成功メッセージ --}}
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- 注文テーブル --}}
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->name ?? 'N/A' }}</td>
                            <td>{{ ucfirst($order->status) }}</td>
                            <td>{{ $order->created_at->format('Y-m-d') }}</td>
                            <td>
                                <form method="POST" action="{{ route('admin.orders.destroy', $order->id) }}" onsubmit="return confirm('Are you sure you want to delete this order?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No orders found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $orders->links() }}
        </main>
    </div>
@endsection
