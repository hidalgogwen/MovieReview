@extends('layouts.master')

@section('title','Movies')

@section('content')

<div class="container-fluid px-4">
	<div class="card mt-4">
		<div class="card-header">
			<h4>View Reviews</h4>
		</div>
		<div class="card-body">
			@if (session('message'))
			<div class="alert alert-success">{{ session('message') }}</div>
			@endif

			<table id="myDataTable" class="table table-bordered">
				<thead> 
					<tr>
						<th>ID</th>
						<th>Movie</th>
						<th>User</th>
						<th>Rate</th>
						<th>Comment</th>
						<th>Date</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($review as $review)
					<tr>
						<td>{{ $review->id }} </td>
						<td>{{ $review->movie->title }} </td>
						<td>{{ $review->user->name }} </td>
						<td>{{ $review->rate }} </td>
						<td>{{ $review->comment_body }} </td>
						<td>{{ $review->created_at }} </td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>	
	</div>
</div>

@endsection