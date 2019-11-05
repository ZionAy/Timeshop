@extends('layouts.main')

@section('main_page')
	<!-- Main Slider-->
	<section>
		<div class="owl-carousel large-controls dots-inside"
		     data-owl-carousel="{ &quot;nav&quot;: true, &quot;dots&quot;: true, &quot;loop&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 7000 }">
			<div class="item">
				<img src="{{ asset('images/system/bnr-1.jpg') }}">
			</div>
			<div class="item">
				<img src="{{ asset('images/system/bnr-2.jpg') }}">
			</div>
			<div class="item">
				<img src="{{ asset('images/system/bnr-3.jpg') }}">
			</div>
		</div>
	</section>
	<!-- Top Categories-->
	@if ($homeData['topCat']->count() > 0)
		<section class="container padding-top-3x">
			<h3 class="text-center mb-30">Top Categories</h3>
			<div class="row">
				@foreach ($homeData['topCat'] as $category)
					<div class="col-md-4 col-sm-6">
						<div class="card mb-30">
							<a class="card-img-tiles" href="{{ url('shop/' . $category->url) }}">
								<div class="inner">
									<div class="main-img"><img src="{{ asset('images/categories/' . $category->image) }}" alt="Category">
									</div>
								</div>
							</a>
							<div class="card-body text-center">
								<h4 class="card-title">{{ $category->name }}</h4>
								<a class="btn btn-outline-primary btn-sm" href="{{ url('shop/' . $category->url) }}">View Products</a>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<div class="text-center"><a class="btn btn-outline-secondary margin-top-none" href="{{ url('shop') }}">All
					Categories</a></div>
		</section>
	@endif
	<!-- Popular Brands-->
	<section class="bg-faded padding-top-3x padding-bottom-3x">
		<div class="container">
			<h3 class="text-center mb-30 pb-2">Popular Brands</h3>
			<div class="owl-carousel"
			     data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: false, &quot;loop&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 4000, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:2}, &quot;470&quot;:{&quot;items&quot;:3},&quot;630&quot;:{&quot;items&quot;:4},&quot;991&quot;:{&quot;items&quot;:5},&quot;1200&quot;:{&quot;items&quot;:6}} }">
				<img class="d-block w-110 opacity-75 m-auto" src="{{ asset('images/brands/01.png') }}" alt="Adidas">
				<img class="d-block w-110 opacity-75 m-auto" src="{{ asset('images/brands/02.png') }}" alt="Brooks">
				<img class="d-block w-110 opacity-75 m-auto" src="{{ asset('images/brands/03.png') }}" alt="Valentino">
				<img class="d-block w-110 opacity-75 m-auto" src="{{ asset('images/brands/04.png') }}" alt="Nike">
				<img class="d-block w-110 opacity-75 m-auto" src="{{ asset('images/brands/05.png') }}" alt="Puma">
				<img class="d-block w-110 opacity-75 m-auto" src="{{ asset('images/brands/06.png') }}" alt="New Balance">
				<img class="d-block w-110 opacity-75 m-auto" src="{{ asset('images/brands/07.png') }}" alt="Dior">
			</div>
		</div>
	</section>
@endsection