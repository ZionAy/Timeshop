@extends('layouts.admin')

@section('admin_page')
	<!-- Page Content-->
	<div class="container padding-bottom-3x mb-1">
		<h1 class="mt-1">Create new content</h1>
		<form action="{{ url('admin/contents') }}" method="post" novalidate="novalidate">
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
				<label for="page_id"><span class="text-danger">* </span>In page</label>
				<select class="form-control" name="page_id" id="page_id">
					<option value="">Please choose a page...</option>
					@foreach ($pages as $page)
						<option @if(old('page_id') == $page->id)selected="selected"
						        @endif value="{{ $page->id }}">{{ $page->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="title"><span class="text-danger">* </span>Title</label>
				<input value="{{ old('title') }}" type="text" name="title" id="title" class="form-control original-text"
				       placeholder="Title">
			</div>
			<div class="form-group">
				<label for="article"><span class="text-danger">* </span>Article</label>
				<textarea name="article" id="article" class="form-control">{{ old('article') }}</textarea>
			</div>
			<input type="submit" name="submit" value="Save content" class="btn btn-primary">
			<a href="{{ url('admin/contents') }}" class="btn btn-secondary">Cancel</a>
		</form>
	</div>
@endsection