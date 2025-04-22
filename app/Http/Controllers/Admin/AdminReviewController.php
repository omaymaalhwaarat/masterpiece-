<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin'); // Ensure only admin has access to reviews
    }

    /**
     * Display a listing of reviews.
     */
    public function index()
    {
        $reviews = Review::with('product', 'user')->paginate(10);
        return view('admin.reviews.index', compact('reviews'));
    }

    /**
     * Display the specified review.
     */
    public function show($id)
    {
        $review = Review::with('product', 'user')->findOrFail($id);
        return view('admin.reviews.show', compact('review'));
    }

    /**
     * Remove the specified review from the database.
     */
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        
        return redirect()->route('admin.reviews.index')->with('success', 'Review deleted successfully!');
    }
}