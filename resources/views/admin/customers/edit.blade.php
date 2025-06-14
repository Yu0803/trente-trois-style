@extends('layouts.admin')

@section('content')
    <div class="admin-layout d-flex">
        {{-- ✅ サイドバーを読み込み --}}
        @include('admin.sidebar')

        <!-- メインコンテンツ -->
        <main class="flex-grow-1 p-4 bg-light">
    <h2>Edit Customer</h2>

    <form method="POST" action="{{ route('admin.customers.update', $customer->id) }}">
        @csrf
        @method('PUT')

        @foreach (['first_name', 'last_name', 'phone_number', 'birth_of_date', 'address1', 'address2', 'postal_code', 'country'] as $field)
            <div class="mb-3">
                <label class="form-label">{{ ucfirst(str_replace('_', ' ', $field)) }}</label>
                <input type="text" class="form-control" name="{{ $field }}" value="{{ old($field, $customer->$field) }}">
            </div>
        @endforeach

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="active" {{ $customer->status === 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $customer->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary">Back</a>
    </form>
</main>
@endsection
