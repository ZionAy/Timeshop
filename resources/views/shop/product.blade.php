@extends('layouts.main')

@section('main_page')
	<!-- Page Title-->
	<div class="page-title">
		<div class="container">
			<div class="column">
				<h1>{{ $product->name }}</h1>
			</div>
			<div class="column">
				<ul class="breadcrumbs">
					<li><a href="{{ url('') }}">Home</a></li>
					<li class="separator">&nbsp;</li>
					<li><a href="{{ url('shop') }}">Shop</a></li>
					<li class="separator">&nbsp;</li>
					<li><a href="{{ url('shop/' . $product->category->url) }}">{{ $product->category->name }}</a></li>
					<li class="separator">&nbsp;</li>
					<li>{{ $product->name }}</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- Page Content-->
	<div class="container padding-bottom-3x mb-1">
		<div class="row">
			<!-- Sidebar -->
			<div class="col-lg-3">
				@include('shop.sidebar')
			</div>
			<!-- Products-->
			<div class="col-lg-9">
				<div class="row">
					<!-- Poduct Gallery-->
					<div class="col-md-6">
						<div class="product-gallery">
							<div class="product-carousel owl-carousel">
								<div data-hash="one">
									<img src="{{ asset('images/products/' . $product->image) }}" alt="Product">
								</div>
							</div>
							<ul class="product-thumbnails">
								<li class="active">
									<a href="#one"><img src="{{ asset('images/products/' . $product->image) }}" alt="Product"></a>
								</li>
							</ul>
						</div>
					</div>
					<!-- Product Info-->
					<div class="col-md-6">
						<div class="padding-top-2x mt-2 hidden-md-up"></div>
						<h2 class="padding-top-1x text-normal text-center">{{ $product->name }}</h2>
						<span class="h2 d-block text-center">
							&nbsp; ${{ $product->price }}
						</span>
						<p>{{ $product->description }}</p>
						<hr class="mb-3">
						<div class="d-flex flex-wrap justify-content-center">
							<div class="sp-buttons mt-2 mb-2">
								@if (!Cart::get($product->id))
									<input data-id="{{ $product->id }}" type="button" class="btn btn-primary mb-1 add-to-cart-btn"
									       value="Add to cart" data-toggle="tooltip" data-placement="top" title=""
									       data-original-title="Add to cart">
								@else
									<input disabled="disabled" type="button" class="btn btn-primary mb-1" value="In cart"
									       data-toggle="tooltip" data-placement="top" title="" data-original-title="Already in cart">
								@endif
								@if (!Cart::isEmpty())
									<a href="{{ url('shop/checkout') }}" class="btn btn-success" data-toggle="tooltip"
									   data-placement="top" title="" data-original-title="Checkout">Checkout</a>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection