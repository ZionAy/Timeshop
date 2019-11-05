@extends('layouts.admin')

@section('admin_page')
	<!-- Page Content-->
	<div class="container padding-bottom-3x mb-1">
		<h1 class="mt-1">Site orders</h1>
		<p>
			This is a list of clients orders.
		</p>
		<div class="table-responsive">
			<table class="table table-bordered table-hover">
				<thead>
				<tr>
					<th>#</th>
					<th>Client</th>
					<th>Order summary</th>
					<th>Order total</th>
					<th>Order time</th>
				</tr>
				</thead>
				<tbody>
				@foreach($orders as $order)
					<tr>
						<th scope="row">{{ $order->id }}</th>
						<td>{{ $order->client->email }}</td>
						<td>
							<ul>
								@foreach(unserialize($order->cart) as $item)
									<li>{{ $item['name'] }} x {{ $item['quantity'] }} ({{ $item['quantity'] *
										$item['price'] }}$)
									</li>
								@endforeach
							</ul>
						</td>
						<td>{{ $order->total }}$</td>
						<td>{{ date('d/m/Y', strtotime($order->created_at)) }}</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection