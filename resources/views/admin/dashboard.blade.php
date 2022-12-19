@extends('layouts.master')

@section('title','Movie Dashboard')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white">
                <div class="card-body"><h1>{{ $movie }}</h1></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="text-white stretched-link" href="{{ url('admin/movie') }}">Total Movies</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white">
                <div class="card-body"><h1>{{ $review }}</h1></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="text-white stretched-link" href="{{ url('admin/review') }}">Total Reviews</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection