@extends('layouts.admin')

@section('content')
    <div class="admin-layout d-flex">

        {{-- ✅ サイドバーを読み込み --}}
        @include('admin.sidebar')

        <!-- メインコンテンツ -->
        <main class="flex-grow-1 p-4 bg-light">
            <h2 class="mb-4">Order Management</h2>

            <!-- フィルター -->
            <div class="mb-3">
                <button class="btn btn-primary me-2">Today</button>
                <button class="btn btn-outline-primary me-2">Yesterday</button>
                <button class="btn btn-outline-primary me-2">Week</button>
                <button class="btn btn-outline-primary">Month</button>
            </div>

            <!-- テーブル -->
            <div class="table-responsive bg-white rounded shadow-sm p-3">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Payment By</th>
                            <th>Amount</th>
                            <th>Order ID</th>
                            <th>Order Date</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>…</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>

    </div>
@endsection
