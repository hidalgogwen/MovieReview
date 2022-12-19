@extends('layouts.master')

@section('title','Movies')

@section('content')

<div class="container-fluid px-4">

	<div class="card mt-4">
		<div class="card-header">
			<h4 class="">Edit Movie</h4>
		</div>
		<div class="card-body">

			@if ($errors->any())
			<div class="alert alert-danger">
				@foreach ($errors->all() as $error)
				<div>{{$error}}</div>
				@endforeach
			@endif

			<form action="{{ url('admin/update-movie/'.$movie->id) }}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PUT')

				<div class="mb-3">
					<label for="">Title</label>
					<input type="text" name="title" value="{{ $movie->title }}" class="form-control">
				</div>
				<div class="mb-3">
					<label for="">Genre</label>
					<input type="text" name="genre" value="{{ $movie->genre }}" class="form-control">
				</div>
				<div class="mb-3">
					<label for="">Director</label>
					<input type="text" name="director" value="{{ $movie->director }}" class="form-control">
				</div>
				<div class="mb-3">
					<label for="">Producer</label>
					<input type="text" name="producer" value="{{ $movie->producer }}" class="form-control">
				</div>
				<div class="mb-3">
					<label for="">Writer</label>
					<input type="text" name="writer" value="{{ $movie->writer }}" class="form-control">
				</div>
				<div class="mb-3">
					<label for="">Casts</label>
					<input type="text" name="casts" value="{{ $movie->casts }}" class="form-control">
				</div>
				<div class="mb-3">
					<label for="">Summary</label>
					<textarea name="summary" rows="5" class="form-control">{{ $movie->summary }}</textarea>
				</div>
				<div class="mb-3">
					<label for="">Release Date</label>
					<input type="text" name="release_date" value="{{ $movie->release_date }}" class="form-control">
				</div>
				<div class="mb-3">
					<label for="">Image</label>
					<input type="file" name="image_path" class="form-control" />
				</div>
				<div class="mb-3">
					<button type="submit" class="btn btn-primary">Update Movie</button>
				</div>
			</form>
		</div>
		
	</div>
</div>

@endsection
