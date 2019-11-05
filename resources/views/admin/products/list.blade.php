@extends('layouts.admin')

@section('admin_page')
	<!-- Page Content-->
	<div class="container padding-bottom-3x mb-1">
		<h1 class="mt-1">Site products</h1>
		<p>
			<a href="{{ url('admin/products/create') }}" class="btn btn-primary">+ Add new product</a>
		</p>
		<div class="table-responsive">
			<table class="table table-bordered table-hover">
				<thead>
				<tr>
					<th>#</th>
					<th>Product Name</th>
					<th>Image</th>
					<th>In Category</th>
					<th>Price</th>
					<th>Operations</th>
				</tr>
				</thead>
				<tbody>
				@foreach($products as $product)
					<tr>
						<th scope="row">{{ $product->id }}</th>
						<td>{{ $product->name }}</td>
						<td><img class="admin-img-table" src="{{ asset('images/products/' . $product->image) }}" alt="Image"></td>
						<td>
							@if ($product->category()->exists())
								{{ $product->category->name }}
							@else
								---
							@endif
						</td>
						<td>{{ $product->price }}$</td>
						<td>
							<a href="{{ url('admin/products/' . $product->id . '/edit') }}">Edit</a> |
							<form action="{{ url('admin/products/' . $product->id) }}" method="POST" class="d-inline">
								@csrf
								{{ method_field('DELETE') }}
								<a href="adminDelete" class="admin-delete">Delete</a>
							</form>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection