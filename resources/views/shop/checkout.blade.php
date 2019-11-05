@extends('layouts.main')

@section('main_page')
	<!-- Page Title-->
	<div class="page-title">
		<div class="container">
			<div class="column">
				<h1>Shop Checkout</h1>
			</div>
			<div class="column">
				<ul class="breadcrumbs">
					<li><a href="{{ url('') }}">Home</a></li>
					<li class="separator">&nbsp;</li>
					<li><a href="{{ url('shop') }}">Shop</a></li>
					<li class="separator">&nbsp;</li>
					<li>Checkout</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- Page Content-->
	<div class="container padding-bottom-3x mb-2">
		<div class="row">
			<!-- Checkout Adress-->
			<div class="col-12">
				<h4>Review Your Order</h4>
				<hr class="padding-bottom-1x">
				<div class="table-responsive shopping-cart">
					<table class="table">
						<thead>
						<tr>
							<th>Product Name</th>
							<th class="text-center">Subtotal</th>
							<th></th>
						</tr>
						</thead>
						<tbody>
						@foreach($cart as $cartItem)
							<tr>
								<td>
									<div class="product-item">
										<a class="product-thumb" href="{{ url('shop/' . $cartItem->attributes['url']) }}">
											<img src="{{ asset('images/products/' . $cartItem->attributes['image']) }}" alt="Product">
										</a>
										<div class="product-info">
											<h4 class="product-title">
												<a href="{{ url('shop/' . $cartItem->attributes['url']) }}">{{ $cartItem->name }}
													<small>x {{ $cartItem->quantity }}</small>
												</a>
											</h4>
											<span><em>Price:</em> {{ $cartItem->price }}$</span>
										</div>
									</div>
								</td>
								<td class="text-center text-lg text-medium">{{ $cartItem->price * $cartItem->quantity }}$</td>
								<td class="text-center">
									<a class="btn btn-outline-primary btn-sm" href="{{ url('shop/cart') }}">Edit</a>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
				<div class="shopping-cart-footer">
					<div class="column"></div>
					<div class="column text-lg pr-3">Total: <span class="text-medium">{{ Cart::getTotal() }}$</span></div>
				</div>
				<div class="checkout-footer margin-top-1x">
					<div class="column hidden-xs-down">
						<a class="btn btn-outline-secondary" href="{{ url('shop') }}">
							<i class="icon-arrow-left"></i>&nbsp;Back to Shopping
						</a>
					</div>
					<div class="column">
						<a class="btn btn-primary" href="{{ url('shop/order') }}">Complete Order</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection