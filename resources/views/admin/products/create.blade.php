@extends('layouts.admin')

@section('admin_page')
	<!-- Page Content-->
	<div class="container padding-bottom-3x mb-1">
		<h1 class="mt-1">Create new product</h1>
		<form action="{{ url('admin/products') }}" method="post" enctype="multipart/form-data" novalidate="novalidate">
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
				<label for="category_id"><span class="text-danger">* </span>In category</label>
				<select class="form-control" name="category_id" id="category_id">
					<option value="">Please choose a category...</option>
					@foreach ($categories as $category)
						<option @if(old('category_id') == $category->id)selected="selected"
						        @endif value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="name"><span class="text-danger">* </span>Product Name</label>
				<input value="{{ old('name') }}" type="text" name="name" id="name" class="form-control original-text"
				       placeholder="Name">
			</div>
			<div class="form-group">
				<label for="description"><span class="text-danger">* </span>Product Description</label>
				<input value="{{ old('description') }}" type="text" name="description" id="description" class="form-control"
				       placeholder="Description">
			</div>
			<div class="form-group">
				<label for="price"><span class="text-danger">* </span>Product Price</label>
				<input class="form-control" value="{{ old('price') }}" type="number" name="price" id="price"
				       class="form-control">
			</div>
			<div class="form-group">
				<label for="url"><span class="text-danger">* </span>Product URL</label>
				<input value="{{ old('url') }}" type="text" name="url" id="url" class="form-control target-text"
				       placeholder="Url">
			</div>
			<div class="form-group">
				<label for="image">Product Image</label>
				<div class="custom-file">
					<input class="custom-file-input" type="file" name="image" id="image">
					<label class="custom-file-label">Choose file...</label>
				</div>
			</div>
			<input type="submit" name="submit" value="Save product" class="btn btn-primary">
			<a href="{{ url('admin/products') }}" class="btn btn-secondary">Cancel</a>
		</form>
	</div>
@endsection