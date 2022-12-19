<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="icon" type="image/x-icon" href="{{ asset('assets/img/icon.png') }}" />
	@section('title','All Movies')

	<title>@yield('title')</title>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	<!-- Styles -->
	<link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
	<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body class="banner-image">

	@include('layouts.inc.user-navbar')

	<div class="form-group" style="padding-top: 30px; padding-right: 190px;">
		<div class="input-group mb-3" style="padding-left: 170px;">
			<select name="fetch" id="fetch" class="form-select" aria-label="Default select example" style="width: 6%;">
				<option value="" disabled="" selected="">Select Genre</option>
				<option value="Action">Action</option>
				<option value="Adventure">Adventure</option>
				<option value="Comedy">Comedy</option>
				<option value="Drama">Drama</option>
				<option value="Fantasy">Fantasy</option>
				<option value="Horror">Horror</option>
				<option value="Mystery">Mystery</option>
				<option value="Romance">Romance</option>
				<option value="Thriller">Thriller</option>
				<option value="Western">Western</option>
			</select> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
			<span class="input-group-text"><i class="fa fa-search"></i></span>
			<input type="text" id="search" class="form-control" placeholder="Search movie by title" aria-label="Search Movie" aria-describedby="basic-addon1" style="width: 54%;">
		</div>
	</div>

	<div class="alldata">
		<div class="container">
			<div class="row">
				@foreach ($movie as $item)
				<div class="col-3" style="padding-bottom: 10px; padding-top: 10px;">
					<div class="card" style="width: 18rem;text-align: center; ">
						<img class="card-img-top" height="420px" width="100px" src="{{ asset('uploads/movie/'.$item->image_path) }}" alt="">
						<div class="card-body">
							<p class="card-title" style="font-size: 16px; font-weight: bold;">{{ $item->title }}</p>
							<p class="card-text">{{ $item->director }}<br>{{ $item->release_date }}<br>{{ $item->genre }}</p>
							<a href="{{ url('user/view-movie/'.$item->id) }}" class="btn" style="background-color:#192841; color: #fff;">View Details</a>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>

	<div class="searchdata">
		<div class="banner-image">
			<div class="container">
				<div class="row" id="Content">
					
				</div>
			</div>
		</div>
	</div>
    
	<div style="background-color: white;">
		@include('layouts.inc.footer')
	</div>

	<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('assets/js/scripts.js') }}"></script>
	<script type="text/javascript">
		$('#search').on('keyup',function(){
			
			$value = $(this).val();

			if($value){
				$('.alldata').hide();
				$('.searchdata').show();
			}else{
				$('.alldata').show();
				$('.searchdata').hide();
			}

			$.ajax({
				type:'get',
				url: '{{ URL::to('search') }}',
				data: {'search':$value},

				success:function(data){
					console.log(data);
					$('#Content').html(data); 
				}
			});
		})
		$("#fetch").on('change',function(){

			$value = $(this).val();

			if($value){
				$('.alldata').hide();
				$('.searchdata').show();
			}else{
				$('.alldata').show();
				$('.searchdata').hide();
			}

			$.ajax({
				type:'get',
				url:'{{ URL::to('fetch') }}',
				data: {'fetch':$value},

				success:function(data){
					console.log(data);
					$("#Content").html(data);
				}
			})
		})
	</script>
</body>
</html>
