<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    // お問い合わせフォーム表示
    public function index()
    {
        return view('contact');
    }

    // フォーム送信処理
    public function submit(Request $request)
    {
        // 必要ならバリデーション
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // 本来はここでメール送信やDB保存など
        // 今はとりあえず完了メッセージだけ返す
        return back()->with('success', 'Thank you for getting in contact!');
    }
}
