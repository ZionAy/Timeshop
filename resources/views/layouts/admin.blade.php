<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
	<link rel="icon" type="image/png" href="{{ asset('images/system/favicon.png') }}">
	<!-- Vendor and Template Styles -->
	<link rel="stylesheet" media="screen" href="{{ asset('css/vendor.min.css') }}">
	<link id="mainStyles" rel="stylesheet" media="screen" href="{{ asset('css/styles.min.css') }}">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.min.css">
	{{--<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">--}}
	<!-- Modernizr-->
	<script src="{{ asset('js/modernizr.min.js') }}"></script>
	
	<!-- My css -->
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">
	<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
	<!-- Code to use full path urls in js files -->
	<script>var BASE_URL = "{{ url('') }}/"</script>
	
	<title>
		@if (!empty($title))
			{{ $title }}
		@else
			Time Shop | Admin
		@endif
	</title>
</head>
<!-- Body-->
<body>
<!-- Off-Canvas Mobile Menu-->
<div class="offcanvas-container" id="mobile-menu">
	<a class="account-link" href="{{ url('admin/dashboard') }}">
		<div class="user-ava">
			<img src="{{ asset('images/system/logo.png') }}" alt="Timeshop">
		</div>
		<div class="user-info">
			<h6 class="user-name">Admin panel</h6>
		</div>
	</a>
	<nav class="offcanvas-menu">
		<ul class="menu">
			<li><span><a href="{{ url('account/logout') }}"><span>Logout</span></a></span></li>
			<li><span><a href="{{ url('') }}" target="_blank"><span>Back to site</span></a></span></li>
			<li><span><a href="{{ url('admin/dashboard') }}"><span>Dashboard</span></a></span></li>
			<li><span><a href="{{ url('admin/pages') }}"><span>Pages</span></a></span></li>
			<li><span><a href="{{ url('admin/contents') }}"><span>Contents</span></a></span></li>
			<li><span><a href="{{ url('admin/categories') }}"><span>Categories</span></a></span></li>
			<li><span><a href="{{ url('admin/products') }}"><span>Products</span></a></span></li>
			<li><span><a href="{{ url('admin/orders') }}"><span>Orders</span></a></span></li>
		</ul>
	</nav>
</div>
<!-- Navbar-->
<!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
<header class="navbar">
	<!-- Off-canvas menu and logo -->
	<div class="site-branding">
		<div class="inner">
			<a class="offcanvas-toggle menu-toggle" href="#mobile-menu" data-toggle="offcanvas"></a>
			<a class="site-logo" href="{{ url('') }}"><img src="{{ asset('images/system/logo.png') }}"
			                                               alt="Time Shop Logo"></a>
		</div>
	</div>
	<nav class="site-menu">
		<ul>
			<li><a href="{{ url('admin/dashboard') }}"><span>Admin home</span></a></li>
			<li><a href="{{ url('account/logout') }}"><span>Logout</span></a></li>
			<li><a href="{{ url('') }}"><span>Back to site</span></a></li>
		</ul>
	</nav>
</header>

<!-- Off-Canvas Wrapper-->
<div class="offcanvas-wrapper">
	<div class="row">
		<div class="col-md-3 col-lg-2 hidden-md-down side-menu">
			<nav class="offcanvas-menu">
				<ul class="menu">
					<li><span><a href="{{ url('admin/dashboard') }}"><span>Dashboard</span></a></span></li>
					<li><span><a href="{{ url('admin/pages') }}"><span>Pages</span></a></span></li>
					<li><span><a href="{{ url('admin/contents') }}"><span>Contents</span></a></span></li>
					<li><span><a href="{{ url('admin/categories') }}"><span>Categories</span></a></span></li>
					<li><span><a href="{{ url('admin/products') }}"><span>Products</span></a></span></li>
					<li><span><a href="{{ url('admin/orders') }}"><span>Orders</span></a></span></li>
				</ul>
			</nav>
		</div>
		<div class="col-12 col-md-9 col-lg-10 admin-page">
			<!-- Page Content-->
			@yield('admin_page')
		</div>
	</div>
	<!-- Site Footer-->
	<footer class="admin-footer text-center">
		<p class="footer-copyright">All rights reserved. &copy; {{ date('Y') }}</p>
	</footer>
</div>
<!-- Back To Top Button-->
<a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>
<!-- Backdrop-->
<div class="site-backdrop"></div>

<!-- Vendors and Template JS files -->
<script src="{{ asset('js/vendor.min.js') }}"></script>
<script src="{{ asset('js/scripts.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
<script src="http://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>
<!-- My JS file -->
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/admin.js') }}"></script>

@include('partials.msgs')

</body>
</html>