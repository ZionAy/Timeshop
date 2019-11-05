<!-- Off-Canvas Category Menu-->
<div class="offcanvas-container" id="shop-categories">
	@if ($headerData['shopCat']->count() == 0)
		<div class="offcanvas-header">
			<h3 class="offcanvas-title">Our shop is closed right now.<br>Please try again later.</h3>
		</div>
	@else
		<div class="offcanvas-header">
			<h3 class="offcanvas-title">Shop Categories</h3>
		</div>
		<nav class="offcanvas-menu">
			<ul class="menu">
				@foreach($headerData['shopCat'] as $category)
					<li>
						<span>
							<a href="{{ url('shop/' . $category->url) }}">{{ $category->name }}</a>
						</span>
					</li>
				@endforeach
				@if ($headerData['lastProd']->count() > 0)
					<li class="has-children"><span><a href="#">Last Arrivals</a><span class="sub-menu-toggle"></span></span>
						<ul class="offcanvas-submenu">
							@foreach ($headerData['lastProd'] as $product)
								<li><a href="{{ url('shop/' . $product->fullUrl()) }}">{{ $product->name }}</a></li>
							@endforeach
						</ul>
					</li>
				@endif
			
			</ul>
		</nav>
	@endif
</div>
<!-- Off-Canvas Mobile Menu-->
<div class="offcanvas-container" id="mobile-menu">
	@if ($headerData['client'])
		<a class="account-link" href="{{ url('account/profile') }}">
			<div class="user-ava">
				<img src="{{ asset('images/profiles/' . $headerData['client']->avatar) }}" alt="Client Avatar">
			</div>
			<div class="user-info">
				<h6 class="user-name">Welcome back, {{ $headerData['client']->name }}</h6>
			</div>
		</a>
	@else
		<a class="account-link" href="{{ url('account/login') }}">
			<div class="user-ava">
				<img src="{{ asset('images/profiles/guestAvatar.jpg') }}" alt="Client Avatar">
			</div>
			<div class="user-info">
				<h6 class="user-name">Welcome, Guest</h6>
			</div>
		</a>
	@endif
	<nav class="offcanvas-menu">
		<ul class="menu">
			<li class="active">
				<span><a href="{{ url('') }}"><span>Home</span></a></span>
			</li>
			<li class="has-children"><span><a href="{{ url('shop') }}"><span>Shop</span></a><span
							class="sub-menu-toggle"></span></span>
				<ul class="offcanvas-submenu">
					@if ($headerData['shopCat']->count() > 0)
						<li><a href="{{ url('shop') }}">All Categories</a></li>
						@foreach($headerData['shopCat'] as $category)
							<li>
								<a href="{{ url('shop/' . $category->url) }}">
									{{ $category->name }}
								</a>
							</li>
						@endforeach
						@if ($headerData['lastProd']->count() > 0)
							<li class="has-children"><span><a href="#"><span>Last Arrivals</span></a><span
											class="sub-menu-toggle"></span></span>
								<ul class="offcanvas-submenu">
									@foreach ($headerData['lastProd'] as $product)
										<li><a href="{{ url('shop/' . $product->fullUrl()) }}">{{ $product->name }}</a></li>
									@endforeach
								</ul>
							</li>
						@endif
					@endif
				</ul>
			</li>
			@if ($headerData['topMenu']->count() > 0)
				@foreach($headerData['topMenu'] as $menuItem)
					<li><a href="{{ url($menuItem->url) }}"><span>{{ $menuItem->name }}</span></a></li>
				@endforeach
			@endif
			@if (!$headerData['client'])
				<li><a href="{{ url('account/login') }}"><span>Login/Register</span></a></li>
			@else
				<li class="has-children"><span><a href="{{ url('account/profile') }}"><span>Account</span></a><span
								class="sub-menu-toggle"></span></span>
					<ul class="offcanvas-submenu">
						<li><a href="{{ url('account/profile') }}">My profile</a></li>
						<li><a href="{{ url('account/logout') }}">Logout</a></li>
					</ul>
				</li>
				@if ($headerData['client']->role->name == 'Admin')
					<li><a href="{{ url('admin/dashboard') }}"><span>Admin Panel</span></a></li>
				@endif
			@endif
		</ul>
	</nav>
</div>
<!-- Topbar-->
<div class="topbar">
	<div class="topbar-column">
		<a class="hidden-md-down" href="mailto:support@timeshop.co.il">
			<i class="icon-mail"></i>&nbsp; support@timeshop.co.il
		</a>
		<a class="hidden-md-down" href="tel:037654321">
			<i class="icon-bell"></i>&nbsp; 03-7654321
		</a>
	</div>
	<div class="topbar-column">
		<span class="social-button sb-dark">Time Shop on social</span>
		<a class="social-button sb-facebook shape-none sb-dark" href="https://www.facebook.com" target="_blank">
			<i class="socicon-facebook"></i>
		</a>
		<a class="social-button sb-twitter shape-none sb-dark" href="https://www.twitter.com" target="_blank">
			<i class="socicon-twitter"></i>
		</a>
		<a class="social-button sb-instagram shape-none sb-dark" href="https://www.instagram.com" target="_blank">
			<i class="socicon-instagram"></i>
		</a>
	</div>
</div>
<!-- Navbar-->
<!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
<header class="navbar navbar-sticky">
	<!-- Search-->
	<form class="site-search" method="get">
		<input id="searchAC" type="text" name="site_search" placeholder="Type to search..." autocomplete="off">
		<div class="search-tools">
			<span class="clear-search">Clear</span>
			<span class="close-search"><i class="icon-cross"></i></span>
		</div>
	</form>
	<!-- Off-canvas menu and logo -->
	<div class="site-branding">
		<div class="inner">
			<a class="offcanvas-toggle cats-toggle" href="#shop-categories" data-toggle="offcanvas"></a>
			<a class="offcanvas-toggle menu-toggle" href="#mobile-menu" data-toggle="offcanvas"></a>
			<a class="site-logo" href="{{ url('') }}">
				<img src="{{ asset('images/system/logo.png') }}" alt="Time Shop Logo">
			</a>
		</div>
	</div>
	<!-- Main Navigation-->
	<nav class="site-menu">
		<ul>
			<li>
				<a href="{{ url('') }}"><span>Home</span></a>
			</li>
			<li>
				<a href="{{ url('shop') }}"><span>Shop</span></a>
				<ul class="sub-menu">
					@if ($headerData['shopCat']->count() > 0)
						<li><a href="{{ url('shop') }}">All Categories</a></li>
						<li class="sub-menu-separator"></li>
						@foreach($headerData['shopCat'] as $category)
							<li>
								<a href="{{ url('shop/' . $category->url) }}">
									{{ $category->name }} ({{ $category->products_count }})
								</a>
							</li>
						@endforeach
						@if ($headerData['lastProd']->count() > 0)
							<li class="sub-menu-separator"></li>
							<li class="has-children"><a href="#"><span>Last arrivals</span></a>
								<ul class="sub-menu">
									@foreach ($headerData['lastProd'] as $product)
										<li><a href="{{ url('shop/' . $product->fullUrl()) }}">{{ $product->name }}</a></li>
									@endforeach
								</ul>
							</li>
						@endif
					@endif
				</ul>
			</li>
			@if ($headerData['topMenu']->count() > 0)
				@foreach($headerData['topMenu'] as $menuItem)
					<li><a href="{{ url($menuItem->url) }}"><span>{{ $menuItem->name }}</span></a></li>
				@endforeach
			@endif
			@if (!$headerData['client'])
				<li><a href="{{ url('account/login') }}"><span>Login/Register</span></a></li>
			@else
				<li><a href="{{ url('account/logout') }}"><span>Logout</span></a></li>
				@if ($headerData['client']->role->name == 'Admin')
					<li><a href="{{ url('admin/dashboard') }}"><span>Admin Panel</span></a></li>
				@endif
			@endif
		</ul>
	</nav>
	<!-- Toolbar-->
	<div class="toolbar">
		<div class="inner">
			<div class="tools">
				<div class="search"><i class="icon-search"></i></div>
				@if (!$headerData['client'])
					<div class="account"><a href="{{ url('account/login') }}"></a><i class="icon-head"></i>
						<ul class="toolbar-dropdown">
							<li class="sub-menu-user">
								<div class="user-ava"><img src="{{ asset('images/profiles/guestAvatar.jpg') }}" alt="Avatar">
								</div>
								<div class="user-info">
									<h6 class="user-name">Welcome, Guest</h6>
								</div>
							</li>
							<li><a href="{{ url('account/login') }}">Login/Register</a></li>
						</ul>
					</div>
				@else
					<div class="account"><a href="{{ url('account/profile') }}"></a><i class="icon-head"></i>
						<ul class="toolbar-dropdown">
							<li class="sub-menu-user">
								<div class="user-ava"><img src="{{ asset('images/profiles/' . $headerData['client']->avatar) }}"
								                           alt="Avatar">
								</div>
								<div class="user-info">
									<h6 class="user-name">Welcome, {{ $headerData['client']->name }}</h6>
								</div>
							</li>
							<li><a href="{{ url('account/profile') }}">My Profile</a></li>
							<li class="sub-menu-separator"></li>
							<li><a href="{{ url('account/logout') }}"> <i class="icon-unlock"></i>Logout</a></li>
						</ul>
					</div>
				@endif
				<div class="cart">
					<a href="{{ url('shop/cart') }}"></a>
					<i class="icon-bag"></i>
					<span class="count">{{ Cart::getTotalQuantity() }}</span>
					<span class="subtotal">{{ Cart::getSubTotal() }}$</span>
					<div class="toolbar-dropdown">
						@if (Cart::isEmpty())
							<div class="dropdown-product-item">Your cart is empty!</div>
						@else
							@foreach (Cart::getContent() as $cartItem)
								<div class="dropdown-product-item">
							<span class="dropdown-product-remove">
								<input data-id="{{ $cartItem->id }}" type="button" class="btn btn-link-danger remove-from-cart-btn"
								       value="X">
							</span>
									<a class="dropdown-product-thumb" href="{{ url('shop/' . $cartItem->attributes['url']) }}">
										<img src="{{ asset('images/products/' . $cartItem->attributes['image']) }}" alt="Product">
									</a>
									<div class="dropdown-product-info">
										<a class="dropdown-product-title"
										   href="{{ url('shop/' . $cartItem->attributes['url']) }}">{{ $cartItem->name }}</a>
										<span class="dropdown-product-details">{{ $cartItem->quantity }} x {{ $cartItem->price }}$</span>
									</div>
								</div>
							@endforeach
							<div class="toolbar-dropdown-group">
								<div class="column"><span class="text-lg">Total:</span></div>
								<div class="column text-right"><span class="text-lg text-medium">{{ Cart::getTotal() }}$&nbsp;</span>
								</div>
							</div>
							<div class="toolbar-dropdown-group">
								<div class="column"><a class="btn btn-sm btn-block btn-secondary" href="{{ url('shop/cart') }}">View
										Cart</a></div>
								<div class="column"><a class="btn btn-sm btn-block btn-success" href="{{ url('shop/checkout') }}">Checkout</a>
								</div>
							</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</header>