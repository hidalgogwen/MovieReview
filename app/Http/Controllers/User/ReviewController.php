<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Movie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function store(Request $request, $movie_id)
    {
    	$request->validate(['comment_body' => 'required', 'rate' => 'required']);
        $movie = Movie::find($movie_id);

    	Review::create([
    		'movie_id' => $movie_id,
    		'user_id' => Auth::user()->id,
    		'rate' => $request->rate,
    		'comment_body' => $request->comment_body
    	]);

    	return back();
    }
}