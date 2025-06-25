<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class AdminReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with('user')->latest()->get();
        return view('admin.reviews.index', compact('reviews'));
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('admin.reviews.index')->with('success', 'Review deleted successfully.');
    }
}
