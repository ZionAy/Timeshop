@extends('layouts.admin')

@section('admin_page')
	<!-- Page Content-->
	<div class="container padding-bottom-3x mb-1">
		<h1 class="mt-1">Create new page</h1>
		<form action="{{ url('admin/pages') }}" method="post" novalidate="novalidate">
			@csrf
			@if ($errors->any())
				<div class="alert alert-danger alert-dismissible fade show margin-bottom-1x col-sm-12">
					<span class="alert-close" data-dismiss="alert"></span>
					<strong>Error(s):</strong><br>
					@foreach($errors->all() as $error)
						{{ $error }} <br>
					@endforeach
				</div>
			@endif
			<div class="form-group">
				<label for="name"><span class="text-danger">* </span>Page Name</label>
				<input value="{{ old('name') }}" type="text" name="name" id="name" class="form-control original-text"
				       placeholder="Name">
			</div>
			<div class="form-group">
				<label for="title"><span class="text-danger">* </span>Page Title</label>
				<input value="{{ old('title') }}" type="text" name="title" id="title" class="form-control"
				       placeholder="Title">
			</div>
			<div class="form-group">
				<label for="url"><span class="text-danger">* </span>Page URL</label>
				<input value="{{ old('url') }}" type="text" name="url" id="url" class="form-control target-text"
				       placeholder="Url">
			</div>
			<input type="submit" name="submit" value="Save menu" class="btn btn-primary">
			<a href="{{ url('admin/pages') }}" class="btn btn-secondary">Cancel</a>
		</form>
	</div>
@endsection