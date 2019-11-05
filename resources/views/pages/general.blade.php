@extends('layouts.main')

@section('main_page')
	<!-- Page Title -->
	<div class="page-title">
		<div class="container">
			<div class="column">
				<h1>{{ $page->title }}</h1>
			</div>
			<div class="column">
				<ul class="breadcrumbs">
					<li><a href="{{ url('') }}">Home</a></li>
					<li class="separator">&nbsp;</li>
					<li>{{ $page->name }}</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- Page Contents -->
	<div class="container padding-bottom-3x mb-2">
		<div class="row justify-content-center">
			@foreach ($page->contents as $content)
				<div class="col-lg-12">
					<h2>{{ $content->title }}</h2>
					<div>{!! $content->article !!}</div>
				</div>
			@endforeach
		</div>
	</div>
@endsection