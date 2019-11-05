@extends('layouts.admin')

@section('admin_page')
	<h1 class="page-header">Edit menu item</h1>
	<form action="{{ url('admin/pages/' . $page->id) }}" method="post" novalidate="novalidate">
		@csrf
		{{ method_field('PUT') }}
		<input type="hidden" name="page_id" value="{{ $page->id }}">
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
			<label for="name"><span class="text-danger">* </span>name</label>
			<input value="{{ $page->name }}" type="text" name="name" id="name" class="form-control original-text"
			       placeholder="name">
			{{--<span class="text-danger">{{ $errors->first('name') }}</span>--}}
		</div>
		<div class="form-group">
			<label for="title"><span class="text-danger">* </span>Title</label>
			<input value="{{ $page->title }}" type="text" name="title" id="title" class="form-control"
			       placeholder="Title">
		</div>
		<div class="form-group">
			<label for="url"><span class="text-danger">* </span>Url</label>
			<input value="{{ $page->url }}" type="text" name="url" id="url" class="form-control target-text"
			       placeholder="Url">
		</div>
		<input type="submit" name="submit" value="Update Page" class="btn btn-primary">
		<a href="{{ url('admin/pages') }}" class="btn btn-secondary">Cancel</a>
	</form>
@endsection