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
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<!-- Modernizr-->
	<script src="{{ asset('js/modernizr.min.js') }}"></script>
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css"
	      integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
	<!-- My css -->
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">
	<!-- Code to use full path urls in js files -->
	<script>var BASE_URL = "{{ url('') }}/"</script>
	
	<title>
		@if (!empty($title))
			{{ $title }}
		@else
			Time Shop
		@endif
	</title>
</head>
<!-- Body-->
<body>
@include('partials.header')
<!-- Off-Canvas Wrapper-->
<div class="offcanvas-wrapper">
	<!-- Page Content-->
	@yield('main_page')
	@include('partials.footer')
</div>
<!-- Back To Top Button-->
<a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>
<!-- Backdrop-->
<div class="site-backdrop"></div>

<!-- On all shop pages include the shop modal (for mobile) -->
@if (Request::is(['shop', 'shop/*']))
	@include('partials.shop_modal')
@endif

<!-- On my account page include the change avatar modal -->
@if (Request::is(['account/profile']))
	@include('partials.avatar_modal')
@endif

<!-- Vendors and Template JS files -->
<script src="{{ asset('js/vendor.min.js') }}"></script>
<script src="{{ asset('js/scripts.min.js') }}"></script>
<script src="http://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
        integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>
<!-- My JS file -->
<script src="{{ asset('js/main.js') }}"></script>

@include('partials.msgs')

</body>
</html>