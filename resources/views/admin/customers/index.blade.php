@extends('layouts.admin')

@section('content')
    <div class="admin-layout d-flex">
        {{-- ✅ サイドバーを読み込み --}}
        @include('admin.sidebar')

        <!-- メインコンテンツ -->
        <main class="flex-grow-1 p-4 bg-light">
            <h2 class="mb-3">Customer Management</h2>

            {{-- 検索フォーム --}}
            <form method="GET" action="{{ route('admin.customers.index') }}" class="mb-3 d-flex gap-2">
                <input type="text" name="keyword" class="form-control w-25" placeholder="Search name/email/status" value="{{ request('keyword') }}">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>

            {{-- 成功メッセージ --}}
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- 顧客テーブル --}}
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Birth</th>
                        <th>Address</th>
                        <th>Postal</th>
                        <th>Country</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>{{ $customer->first_name }} {{ $customer->last_name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone_number }}</td>
                            <td>{{ $customer->birth_of_date }}</td>
                            <td>{{ $customer->address1 }} {{ $customer->address2 }}</td>
                            <td>{{ $customer->postal_code }}</td>
                            <td>{{ $customer->country }}</td>
                            <td>{{ ucfirst($customer->status) }}</td>
                            <td>
                                <form method="POST" action="{{ route('admin.customers.destroy', $customer->id) }}" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10">No customers found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $customers->links() }}
        </main>
    </div>
@endsection
