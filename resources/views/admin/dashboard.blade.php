@extends('layouts.admin')

@section('admin_page')
	<div class="row">
		<div class="col-12">
			<div class="card bg-secondary mb-3">
				<h3 class="card-header">Dashboard summary</h3>
				<div class="row card-body">
					<div class="col-12 col-md-4 col-lg-3">
						<div class="card bg-light text-dark mb-2">
							<h4 class="card-header">Totals</h4>
							<div class="card-body">
								<p><span class="text-bold">Categories:</span>10.</p>
								<p><span class="text-bold">Products:</span>10.</p>
								<p><span class="text-bold">Clients:</span>10.</p>
								<p><span class="text-bold">Orders:</span>10.</p>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-4 col-lg-3">
						<div class="card bg-light text-dark mb-2">
							<h4 class="card-header">New weekly</h4>
							<div class="card-body">
								<p><span class="text-bold">Products:</span>3.</p>
								<p><span class="text-bold">Clients:</span>7.</p>
								<p><span class="text-bold">Orders:</span>6.</p>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-4 col-lg-3">
						<div class="card bg-light text-dark mb-2">
							<h4 class="card-header">New monthly</h4>
							<div class="card-body">
								<p><span class="text-bold">Products:</span>3.</p>
								<p><span class="text-bold">Clients:</span>7.</p>
								<p><span class="text-bold">Orders:</span>6.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection