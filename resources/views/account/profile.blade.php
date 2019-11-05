@extends('layouts.main')

@section('main_page')
	<!-- Page Title-->
	<div class="page-title">
		<div class="container">
			<div class="column">
				<h1>My Profile</h1>
			</div>
			<div class="column">
				<ul class="breadcrumbs">
					<li><a href="{{ url('') }}">Home</a>
					</li>
					<li class="separator">&nbsp;</li>
					<li><a href="{{ url('account/profile') }}">Account</a>
					</li>
					<li class="separator">&nbsp;</li>
					<li>My Profile</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- Page Content-->
	<div class="container padding-bottom-3x mb-2">
		<div class="row">
			<div class="col-lg-4">
				<aside class="user-info-wrapper">
					<div class="user-cover" style="background-image: url({{ asset('images/system/user-cover-img.jpg') }});">
						<div class="info-label">
							<h4>{{ $client->name }}</h4>
							<span>Email: {{ $client->email }}</span><br>
							<span>Member since: {{ date('d/m/Y', strtotime($client->created_at)) }}</span>
						</div>
					</div>
					<div class="user-info">
						<div class="user-avatar">
							<img src="{{ asset('images/profiles/' . $client->avatar) }}" alt="Avatar">
						</div>
						<div class="user-data">
							<button class="btn btn-outline-primary" type="button" data-toggle="modal" data-target="#modalAvatar">
								Change avatar
							</button>
							@if ($errors->any())
								<div class="alert alert-danger alert-dismissible fade show margin-bottom-1x col-sm-12">
									<span class="alert-close" data-dismiss="alert"></span>
									<strong>Error(s):</strong><br>
									@foreach($errors->all() as $error)
										{{ $error }} <br>
									@endforeach
								</div>
							@endif
						</div>
					</div>
				</aside>
			</div>
			<div class="col-lg-8">
				<div class="padding-top-2x mt-2 hidden-lg-up"></div>
				<h3>My orders:</h3>
				@if ($client->orders->count() > 0)
					<div class="table-responsive">
						<table class="table table-bordered table-hover">
							<thead>
							<tr>
								<th>Order summary</th>
								<th>Order total</th>
								<th>Order time</th>
							</tr>
							</thead>
							<tbody>
							@foreach($client->orders as $order)
								<tr>
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
				@else
					<p>There are no orders in this account.</p>
				@endif
			</div>
		</div>
	</div>
@endsection

