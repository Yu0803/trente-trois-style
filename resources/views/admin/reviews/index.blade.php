@extends('layouts.admin')

@section('content')
    <div class="admin-layout d-flex">
        {{-- ✅ サイドバーを読み込み --}}
        @include('admin.sidebar')

        <!-- メインコンテンツ -->
        <main class="flex-grow-1 p-4 bg-light">
            <h2 class="mb-4">Review Management</h2>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Review ID</th>
                        <th>User</th>
                        <th>Rating</th>
                        <th>Comment</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reviews as $review)
                        <tr>
                            <td>{{ $review->id }}</td>
                            <td>{{ $review->user->first_name }} {{ $review->user->last_name }}</td>
                            <td>{{ $review->rating }}</td>
                            <td>{{ Str::limit($review->comment, 50) }}</td>
                            <td>{{ $review->created_at->format('Y-m-d') }}</td>
                            <td>
                                <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this review?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </main>
    </div>
@endsection
