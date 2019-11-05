<!-- Shop Categories Modal-->
<div class="modal fade" id="modalShop" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Shop Categories</h4>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
							aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<section class="widget widget-categories">
					<h3 class="widget-title">Shop Categories</h3>
					@if ($headerData['shopCat']->count() > 0)
						<ul>
							@foreach($headerData['shopCat'] as $category)
								<li>
									<a href="{{ url('shop/' . $category->url) }}">
										{{ $category->name }}
									</a>
									<span>({{ $category->products_count }})</span>
								</li>
							@endforeach
						</ul>
					@else
						<p>Our shop is closed right now.</p>
					@endif
				</section>
				@if ($headerData['lastProd']->count() > 0)
					<section class="widget widget-categories">
						<h3 class="widget-title">Last arrivals</h3>
						<ul>
							@foreach($headerData['lastProd'] as $product)
								<li>
									<a href="{{ url('shop/' . $product->fullUrl()) }}">
										{{ $product->name }}
									</a>
								</li>
							@endforeach
						</ul>
					</section>
				@endif
				@if ($headerData['sales']->count() > 0)
					<section class="widget widget-categories">
						<h3 class="widget-title">Now on sale</h3>
						@foreach($headerData['sales'] as $sale)
							<section class="promo-box margin-bottom-1x"
							         style="background-image: url({{ asset('images/products/' . $sale->image) }});">
								<span class="overlay-dark" style="opacity: .4;"></span>
								<div class="promo-box-content text-center padding-top-2x padding-bottom-2x">
									<h3 class="text-bold text-light text-shadow">{{ $sale->name }}</h3>
									<h4 class="text-light text-thin text-shadow">Now for just ${{ $sale->price }}</h4>
									<a class="btn btn-sm btn-primary" href="{{ url('shop/' . $sale->fullUrl()) }}">Shop Now</a>
								</div>
							</section>
						@endforeach
					</section>
				@endif
			</div>
		</div>
	</div>
</div>