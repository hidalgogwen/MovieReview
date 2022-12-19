@extends('layouts.master')

@section('title','Movies')

@section('content')

<div class="container-fluid px-4">
	<div class="card mt-4">
		<div class="card-header">
			<h4>View Movies 
				<a href="{{ url('admin/add-movie') }}" class="btn btn-primary btn-sm float-end">Add Movie</a>
			</h4>
		</div>
		<div class="card-body">
			@if (session('message'))
			<div class="alert alert-success">{{ session('message') }}</div>
			@endif

			<table id="myDataTable" class="table table-bordered">
				<thead> 
					<tr>
						<th>ID</th>
						<th>Title</th>
						<th>Genre</th>
						<th>Director</th>
						<th>Producer</th>
						<th>Writer</th>
						<th>Casts</th>
						<th>Summary</th>
						<th>Release Date</th>
						<th>Image</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($movie as $item)


					<tr>
						<td>{{ $item->id }} </td>
						<td>{{ $item->title }} </td>
						<td>{{ $item->genre }} </td>
						<td>{{ $item->director }} </td>
						<td>{{ $item->producer }} </td>
						<td>{{ $item->writer }} </td>
						<td>{{ $item->casts }} </td>
						<td>{{ $item->summary }} </td>
						<td>{{ $item->release_date }} </td>
						<td>
							<img src="{{ asset('uploads/movie/'.$item->image_path) }}" width="130px" height="200px" alt="img">
						</td>
						<td>
							<a href="{{ url('admin/edit-movie/'.$item->id) }}" class="btn btn-success">Edit</a>
						</td>
						<td>
							<a href="{{ url('admin/delete-movie/'.$item->id) }}" class="btn btn-danger">Delete</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>	
	</div>
</div>

@endsection