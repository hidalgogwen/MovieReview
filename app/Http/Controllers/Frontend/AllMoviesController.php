<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Review;
use Illuminate\Http\Request;

class AllMoviesController extends Controller
{
	public function index()
    {
    	$movie = Movie::all();
        return view('frontend.movies.index',compact('movie'));
    }

    public function view($movie_id)
    {
        $movie = Movie::find($movie_id);
        $avgRate = Review::where(
            [
                ['movie_id', '=', $movie_id]
            ])->pluck('rate')->avg();
        
        return view('frontend.movies.view', compact('movie','avgRate'));
    }

    public function search(Request $request)
    {
        $output = "";

        $movie = Movie::where('title','Like','%'.$request->search.'%')->get();

        foreach($movie as $movie){
            $output.=
            '<div class="col-3" style="padding-bottom: 10px; padding-top: 10px;">
                    <div class="card" style="width: 18rem;text-align: center; ">
                        <img class="card-img-top" height="420px" width="100px" src="'.asset('uploads/movie/'.$movie->image_path).'" alt="">
                        <div class="card-body">
                            <p class="card-title" style="font-size: 16px; font-weight: bold;">'.$movie->title.'</p>
                            <p class="card-text">'.$movie->director.'<br>'.$movie->release_date.'<br>'.$movie->genre.'</p>
                            <a href="'.url('view-movie/'.$movie->id).'" class="btn btn-" style="background-color:#192841; color: #fff;">View Details</a>
                        </div>
                    </div>
                </div>';
        }

        return response($output);
    }
    public function fetch(Request $request)
    {
        $output = "";

        $movie = Movie::where('genre','Like','%'.$request->fetch.'%')->get();

        foreach($movie as $movie){
            $output.=
            '<div class="col-3" style="padding-bottom: 10px; padding-top: 10px;">
                    <div class="card" style="width: 18rem;text-align: center; ">
                        <img class="card-img-top" height="420px" width="100px" src="'.asset('uploads/movie/'.$movie->image_path).'" alt="">
                        <div class="card-body">
                            <p class="card-title" style="font-size: 16px; font-weight: bold;">'.$movie->title.'</p>
                            <p class="card-text">'.$movie->director.'<br>'.$movie->release_date.'<br>'.$movie->genre.'</p>
                            <a href="'.url('view-movie/'.$movie->id).'" class="btn btn-" style="background-color:#192841; color: #fff;">View Details</a>
                        </div>
                    </div>
                </div>';
        }

        return response($output);
    }
}
