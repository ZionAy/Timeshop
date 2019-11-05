@extends('layouts.main')

@section('main_page')
	<!-- Page Title-->
	<div class="page-title">
		<div class="container">
			<div class="column">
				<h1>Shop Cart</h1>
			</div>
			<div class="column">
				<ul class="breadcrumbs">
					<li><a href="{{ url('') }}">Home</a></li>
					<li class="separator">&nbsp;</li>
					<li><a href="{{ url('shop') }}">Shop</a></li>
					<li class="separator">&nbsp;</li>
					<li>Cart</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- Page Content-->
	<div class="container padding-bottom-3x mb-1">
		@if (Cart::isEmpty())
			<div class="shopping-cart-footer">
				<div class="column">
					<h1>Your cart is empty.</h1>
				</div>
				<div class="column">
					<a class="btn btn-primary" href="{{ url('shop') }}">
						<i class="icon-arrow-left"></i>&nbsp;Back to Shopping
					</a>
				</div>
			</div>
		@else
		<!-- Shopping Cart-->
			<div class="table-responsive shopping-cart">
				
				<table class="table table-hover">
					<thead>
					<tr>
						<th>Product Name</th>
						<th class="text-center">Quantity</th>
						<th class="text-center">Subtotal</th>
						<th class="text-center"><a class="btn btn-sm btn-outline-danger" href="{{ url('shop/clear-cart') }}">Clear
								Cart</a></th>
					</tr>
					</thead>
					<tbody>
					@foreach ($cart as $cartItem)
						<tr>
							<td>
								<div class="product-item">
									<a class="product-thumb" href="{{ url('shop/' . $cartItem->attributes['url']) }}">
										<img src="{{ asset('images/products/' . $cartItem->attributes['image']) }}" alt="Product">
									</a>
									<div class="product-info">
										<h4 class="product-title">
											<a href="{{ url('shop/' . $cartItem->attributes['url']) }}">{{ $cartItem->name }}</a>
										</h4>
										<span><em>Price:</em> {{ $cartItem['price'] }}$</span>
									</div>
								</div>
							</td>
							<td class="text-center">
								<div class="quantity">
									<input data-op="minus" data-id="{{ $cartItem->id }}" type="button" value="-"
									       class="btn btn-outline-success btn-sm update-cart">
									<input type="text" size="1" value="{{ $cartItem->quantity }}"
									       class="form-control form-control-sm text-center"
									       readonly="readonly">
									<input data-op="plus" data-id="{{ $cartItem->id }}" type="button" value="+"
									       class="btn btn-outline-success btn-sm update-cart">
								</div>
							
							</td>
							<td class="text-center text-lg text-medium">{{ $cartItem->quantity * $cartItem->price }}$</td>
							<td class="text-center"><input data-id="{{ $cartItem->id }}" type="button"
							                               class="btn btn-link-danger remove-from-cart-btn" value="X"></td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
			<div class="shopping-cart-footer">
				<div class="column"></div>
				<div class="column text-lg text-bold pr-3">Total: <span class="text-medium">{{ Cart::getTotal() }}$</span></div>
			</div>
			<div class="shopping-cart-footer">
				<div class="column">
					<a class="btn btn-outline-secondary" href="{{ url('shop') }}">
						<i class="icon-arrow-left"></i>&nbsp;Back to Shopping
					</a>
				</div>
				<div class="column">
					<a class="btn btn-success" href="{{ url('shop/checkout') }}">Checkout</a>
				</div>
			</div>
		@endif
	</div>
@endsection