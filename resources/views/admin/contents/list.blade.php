@extends('layouts.admin')

@section('admin_page')
	<!-- Page Content-->
	<div class="container padding-bottom-3x mb-1">
		<h1 class="mt-1">Site contents</h1>
		<p>
			<a href="{{ url('admin/contents/create') }}" class="btn btn-primary">+ Add new content</a>
		</p>
		<div class="table-responsive">
			<table class="table table-bordered table-hover">
				<thead>
				<tr>
					<th>#</th>
					<th>Title</th>
					<th>In Page</th>
					<th>Operations</th>
				</tr>
				</thead>
				<tbody>
				@foreach($contents as $content)
					<tr>
						<th scope="row">{{ $content->id }}</th>
						<td>{{ $content->title }}</td>
						<td>
							@if ($content->page()->exists())
								{{ $content->page->name }}
							@else
								---
							@endif
						</td>
						<td>
							<a href="{{ url('admin/contents/' . $content->id . '/edit') }}">Edit</a> |
							<form action="{{ url('admin/contents/' . $content->id) }}" method="POST" class="d-inline">
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