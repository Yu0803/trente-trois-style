@extends('layouts.admin') {{-- 共通レイアウト継承 --}}

@section('content')
    <div class="container d-flex justify-content-center">
        <div style="width: 100%; max-width: 720px;">
            <h2 class="text-center mb-4">Admin-<span style="#024E82;">log in</span></h2>

            <form method="POST" action="{{ route('admin.login.submit') }}" style="max-width: 100%;">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" type="email" name="email" class="form-control" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" type="password" name="password" class="form-control" required>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn px-4 py-2 rounded-pill text-white"
                        style="background-color: #024E82; border: none;">
                        LOG IN
                    </button>
                    <a href="#" class="text-decoration-none">Forget Password?</a>
                </div>
            </form>
        </div>
    @endsection
