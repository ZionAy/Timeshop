@extends('layouts.admin')

@section('admin_page')
	<!-- Page Content-->
	<div class="container padding-bottom-3x mb-1">
		<h1 class="mt-1">Site shop categories</h1>
		<p>
			<a href="{{ url('admin/categories/create') }}" class="btn btn-primary">+ Add new category</a>
		</p>
		<div class="table-responsive">
			<table class="table table-bordered table-hover">
				<thead>
				<tr>
					<th>#</th>
					<th>Category Name</th>
					<th>Image</th>
					<th>Description</th>
					<th>Operations</th>
				</tr>
				</thead>
				<tbody>
				@foreach($categories as $category)
					<tr>
						<th scope="row">{{ $category->id }}</th>
						<td>{{ $category->name }}</td>
						<td><img class="admin-img-table" src="{{ asset('images/categories/' . $category->image) }}" alt="Image">
						</td>
						<td>{{ substr($category->description,0,50) }}...</td>
						<td>
							<a href="{{ url('admin/categories/' . $category->id . '/edit') }}">Edit</a> |
							<form action="{{ url('admin/categories/' . $category->id) }}" method="POST" class="d-inline">
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