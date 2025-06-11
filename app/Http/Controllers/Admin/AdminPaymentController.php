<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class AdminPaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with(['user', 'order'])->latest()->paginate(10);
        return view('admin.payments.index', compact('payments'));
    }

    public function show(Payment $payment)
    {
        return view('admin.payments.show', compact('payment'));
    }

    public function edit(Payment $payment)
    {
        return view('admin.payments.edit', compact('payment'));
    }

    public function update(Request $request, Payment $payment)
    {
        $validatedData = $request->validate([
            'status' => 'required|string|in:pending,completed,failed,refunded',
            'paid_at' => 'nullable|date',
            // 他の更新可能なフィールド...
        ]);

        $payment->update($validatedData);

        return redirect()->route('admin.payments.index')->with('success', '支払い情報が更新されました。');
    }

    // 必要に応じて create, store, destroy メソッドも実装
}