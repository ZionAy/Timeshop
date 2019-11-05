@extends('layouts.main')

@section('main_page')
	<!-- Page Title-->
	<div class="page-title">
		<div class="container">
			<div class="column">
				<h1>{{ $category->name }}</h1>
			</div>
			<div class="column">
				<ul class="breadcrumbs">
					<li><a href="{{ url('') }}">Home</a></li>
					<li class="separator">&nbsp;</li>
					<li><a href="{{ url('shop') }}">Shop</a></li>
					<li class="separator">&nbsp;</li>
					<li>{{ $category->name }}</li>
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
				<!-- Shop Toolbar-->
				<div class="shop-toolbar padding-bottom-1x mb-2">
					<div class="column">
						<span>Sort by price:&nbsp;</span>
						<a class="btn btn-outline-info btn-sm" href="{{ url('shop/' . $category->url) }}">
							Low to High
						</a>
						<a class="btn btn-outline-info btn-sm" href="{{ url('shop/' . $category->url . '?sort=desc') }}">
							High to Low
						</a>
					</div>
				</div>
				<!-- Products Grid-->
				<div class="isotope-grid cols-3 mb-2">
					<div class="gutter-sizer"></div>
					<div class="grid-sizer"></div>
				@foreach($category->products as $product)
					<!-- Product-->
						<div class="grid-item">
							<div class="product-card">
								<h3 class="product-title">
									<a href="{{ url('shop/' . $product->fullUrl()) }}">{{ $product->name }}</a>
								</h3>
								<a class="product-thumb" href="{{ url('shop/' . $product->fullUrl()) }}">
									<img src="{{ asset('images/products/' . $product->image) }}" alt="Product">
								</a>
								<h4 class="product-price">
									{{ $product->price }}$
								</h4>
								<div class="product-buttons">
									@if (!Cart::get($product->id))
										<input data-id="{{ $product->id }}" type="button"
										       class="btn btn-primary btn-sm mb-1 add-to-cart-btn" value="Add to cart" data-toggle="tooltip"
										       data-placement="top" title="" data-original-title="Add to cart">
									@else
										<input disabled="disabled" type="button" class="btn btn-primary btn-sm mb-1" value="In cart"
										       data-toggle="tooltip" data-placement="top" title="" data-original-title="Already in cart">
									@endif
									@if (!Cart::isEmpty())
										<a href="{{ url('shop/checkout') }}" class="btn btn-success btn-sm" data-toggle="tooltip"
										   data-placement="top" title="" data-original-title="Checkout"><i class="icon-bag"></i></a>
									@endif
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection