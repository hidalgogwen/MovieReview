<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class AdReviewController extends Controller
{
    public function index()
    {   
        $review = Review::all();
        return view('admin.movie.review', compact('review'));
    }
}
