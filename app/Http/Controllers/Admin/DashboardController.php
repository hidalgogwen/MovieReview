<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Review;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
	{
        $movie = Movie::count();
        $review = Review::count();
		return view('admin.dashboard', compact('movie','review'));
	}
}
