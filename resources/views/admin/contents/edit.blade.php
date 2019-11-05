@extends('layouts.admin')

@section('admin_page')
	<h1 class="page-header">Edit menu item</h1>
	<form action="{{ url('admin/contents/' . $content->id) }}" method="post" novalidate="novalidate">
		@csrf
		{{ method_field('PUT') }}
		<input type="hidden" name="content_id" value="{{ $content->id }}">
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
					<option @if($content->page_id == $page->id)selected="selected"
					        @endif value="{{ $page->id }}">{{ $page->name }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="title"><span class="text-danger">* </span>Title</label>
			<input value="{{ $content->title }}" type="text" name="title" id="title" class="form-control original-text"
			       placeholder="Name">
		</div>
		<div class="form-group">
			<label for="article"><span class="text-danger">* </span>Article</label>
			<textarea name="article" id="article" class="form-control">{{ $content->article }}</textarea>
		</div>
		<input type="submit" name="submit" value="Update content" class="btn btn-primary">
		<a href="{{ url('admin/contents') }}" class="btn btn-secondary">Cancel</a>
	</form>
@endsection