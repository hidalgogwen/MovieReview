<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="icon" type="image/x-icon" href="{{ asset('assets/img/icon.png') }}" />
	@section('title','Movie')

	<title>@yield('title')</title>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	<!-- Styles -->
	<link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
	<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body>

	@include('layouts.inc.navbar')

	<div class="banner-image w-100 d-flex justify-content-center align-items-center">
		<div class="justify-content-center">
			<div class="container-fluid" style="padding-top: 30px; padding-bottom: 30px">
				<div class="card" style="width: 50rem; padding: 10px;">
					<div><center><b><h1>{{ $movie->title }}</h1></b></center></div>
					<center><div class="img">
						<img src="{{ asset('uploads/movie/'.$movie->image_path) }}" height="450px" width="300px" style="max-width: 100%; border: 1px solid;">
					</div></center>
					<h3 class="mt-2"><center><span class="fa fa-star"></span> Average rate: {{ round($avgRate,2) }}</center></h3>
					<div class="card card-body shadow-sm mt-3">
						<p class="card-text">
							<table class="table table-bordered">
								<tr>
									<th>Genre:</th>
									<td>{{ $movie->genre }}</td>
								</tr>
								<tr>
									<th>Director/s:</th>
									<td>{{ $movie->director }}</td>
								</tr>
								<tr>
									<th>Producer/s:</th>
									<td>{{ $movie->producer }}</td>
								</tr>
								<tr>
									<th>Writer/s:</th>
									<td>{{ $movie->writer }}</td>
								</tr>
								<tr>
									<th>Casts/s:</th>
									<td>{{ $movie->casts }}</td>
								</tr>
								<tr>
									<th width="20%">Release Date:</th>
									<td>{{ $movie->release_date }}</td>
								</tr>
								<tr>
									<th>Summary:</th>
									<td><i>{{ $movie->summary }}</i></td>
								</tr>
							</table>
						</p>
					</div>
					<div class="review-area mt-3">
						<h4 style="padding-left: 20px;">Reviews:</h4>
						@if (count($movie->review))
							@foreach ($movie->review as $review)
								<div class="card card-body shadow-sm mb-3">
									<div class="detail-area">
										<h6 class="user-name mb-1">
											{{ $review->user->name }}
											<small class="ms-3 text-primary">{{ $review->created_at }}</small>
										</h6>
										<p class="user-comment mb-1">
											<b>{{ $review->rate }}</b> || {{ $review->comment_body }}
										</p>
									</div>
								</div>
							@endforeach
						@else
							<p style="padding-left:20px;">No review!</p>
						@endif
						<div>
							<a href="{{ url('/all-movies') }}" class="btn" style="background-color:#192841; color: #fff; float: right;">Go back</a>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	@include('layouts.inc.footer')

	<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('assets/js/scripts.js') }}"></script>
</body>
</html>
