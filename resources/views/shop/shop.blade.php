@extends('layouts.main')

@section('main_page')
	<!-- Page Title-->
	<div class="page-title">
		<div class="container">
			<div class="column">
				<h1>Shop categories</h1>
			</div>
			<div class="column">
				<ul class="breadcrumbs">
					<li><a href="{{ url('') }}">Home</a></li>
					<li class="separator">&nbsp;</li>
					<li>Shop categories</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- Page Content-->
	<div class="container padding-bottom-2x mb-2">
		<div class="row">
			<!-- Sidebar -->
			<div class="col-lg-3">
				@include('shop.sidebar')
			</div>
			<!-- Categories-->
			<div class="col-lg-9">
				<div class="row">
					@if ($categories->count() > 0)
						@foreach($categories as $category)
							<div class="col-sm-6">
								<div class="card mb-30">
									<a class="card-img-tiles" href="{{ url('shop/' . $category->url) }}">
										<div class="inner">
											<div class="main-img">
												<img src="{{ asset('images/categories/' . $category->image) }}"
												     alt="Category">
											</div>
										</div>
									</a>
									<div class="card-body text-center">
										<h4 class="card-title">{{ $category['name'] }}</h4>
										<a class="btn btn-outline-primary btn-sm" href="{{ url('shop/' . $category['url'])
								}}">View Products</a>
									</div>
								</div>
							</div>
						@endforeach
					@else
						<div class="col-sm-12">
							<p>There are no items in our shop right now.</p>
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection