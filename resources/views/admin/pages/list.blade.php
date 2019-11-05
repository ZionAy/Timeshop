@extends('layouts.admin')

@section('admin_page')
	<!-- Page Content-->
	<div class="container padding-bottom-3x mb-1">
		<h1 class="mt-1">Site pages</h1>
		<p>
			<a href="{{ url('admin/pages/create') }}" class="btn btn-primary">+ Add new Page</a>
		</p>
		<div class="table-responsive">
			<table class="table table-bordered table-hover">
				<thead>
				<tr>
					<th>#</th>
					<th>Page Name</th>
					<th>Operations</th>
				</tr>
				</thead>
				<tbody>
				@foreach($pages as $page)
					<tr>
						<th scope="row">{{ $page->id }}</th>
						<td>{{ $page->name }}</td>
						<td>
							<a href="{{ url('admin/pages/' . $page->id . '/edit') }}">Edit</a> |
							<form action="{{ url('admin/pages/' . $page->id) }}" method="POST" class="d-inline">
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