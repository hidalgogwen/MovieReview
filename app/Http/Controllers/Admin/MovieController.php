<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\MovieFormRequest;
use Illuminate\Support\Facades\File;

class MovieController extends Controller
{
    public function index()
    {
    	$movie = Movie::all();
        return view('admin.movie.index',compact('movie'));
    }

    public function create()
    {
    	return view('admin.movie.create');
    }

    public function store(MovieFormRequest $request)
    {
    	$data = $request->validated();

    	$movie = new Movie;
    	$movie->title = $data['title'];
    	$movie->genre = $data['genre'];
    	$movie->director = $data['director'];
    	$movie->producer = $data['producer'];
    	$movie->writer = $data['writer'];
    	$movie->casts = $data['casts'];
    	$movie->summary = $data['summary'];
    	$movie->release_date = $data['release_date'];

    	if($request->hasfile('image_path')){
    		$file = $request->file('image_path');
    		$filename = time() . '.' . $file->getClientOriginalExtension();
    		$file->move('uploads/movie/', $filename);
    		$movie->image_path = $filename;
    	}
    	$movie->save();

    	return redirect('admin/movie')->with('message', 'Movie Added Successfully');
    }

    public function edit($movie_id)
    {
        $movie = Movie::find($movie_id);
        return view('admin.movie.edit', compact('movie'));
    }

    public function update(MovieFormRequest $request, $movie_id)
    {
       $data = $request->validated();

        $movie = Movie::find($movie_id);
        $movie->title = $data['title'];
        $movie->genre = $data['genre'];
        $movie->director = $data['director'];
        $movie->producer = $data['producer'];
        $movie->writer = $data['writer'];
        $movie->casts = $data['casts'];
        $movie->summary = $data['summary'];
        $movie->release_date = $data['release_date'];

        if($request->hasfile('image_path')){
            
            $destination = 'uploads/movie/'.$movie->image_path;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $file = $request->file('image_path');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/movie/', $filename);
            $movie->image_path = $filename;
        }
        $movie->update();

        return redirect('admin/movie')->with('message', 'Movie Updated Successfully');
    }

    public function destroy($movie_id)
    {
        $movie = Movie::find($movie_id);
        if($movie)
        {
            $destination = 'uploads/movie/'.$movie->image_path;
            if(File::exists($destination)){
                File::delete($destination);
            }
            
            $movie->delete();
            return redirect('admin/movie')->with('message', 'Movie Deleted Successfully');
        }
        else
        {
            return redirect('admin/movie')->with('message', 'No Movie ID Found');
        }
    }
}