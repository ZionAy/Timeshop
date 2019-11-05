@extends('layouts.main')

@section('main_page')
	<!-- Page Title-->
	<div class="page-title">
		<div class="container">
			<div class="column">
				<h1>Login / Register Account</h1>
			</div>
			<div class="column">
				<ul class="breadcrumbs">
					<li><a href="{{ url('') }}">Home</a></li>
					<li class="separator">&nbsp;</li>
					<li><a href="#">Account</a></li>
					<li class="separator">&nbsp;</li>
					<li>Login / Register</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- Page Content-->
	<div class="container padding-bottom-3x mb-2">
		<div class="row">
			<div class="col-md-6">
				<div class="padding-top-3x hidden-md-up"></div>
				<h3 class="margin-bottom-1x">Already registered? Login</h3>
				<p>Please provide your login details.</p>
				<form class="row" action="" method="post" novalidate="novalidate">
					@csrf
					@if ($errors->has('log_email') || $errors->has('log_password'))
						<div class="alert alert-danger alert-dismissible fade show margin-bottom-1x col-sm-12">
							<span class="alert-close" data-dismiss="alert"></span>
							<strong>Error(s):</strong><br>
							@foreach($errors->all() as $error)
								{{ $error }} <br>
							@endforeach
						</div>
					@endif
					<div class="col-sm-12">
						<div class="form-group">
							<label for="reg-email">E-mail Address</label>
							<input class="form-control" type="email" name="log_email" id="log-email" value="{{ old('log_email') }}">
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-group">
							<label for="reg-pass">Password</label>
							<input class="form-control" type="password" name="log_password" id="log-password">
						</div>
					</div>
					<div class="col-12 text-center">
						<button class="btn btn-success margin-bottom-none" type="submit">Login</button>
					</div>
				</form>
			</div>
			<div class="col-md-6">
				<div class="padding-top-3x hidden-md-up"></div>
				<h3 class="margin-bottom-1x">No Account? Register</h3>
				<p>Please provide your registration info.</p>
				<form class="row" action="{{ url('account/register') }}" method="post" novalidate="novalidate">
					@csrf
					@if ($errors->any() && !$errors->has('log_email') && !$errors->has('log_password'))
						<div class="alert alert-danger alert-dismissible fade show margin-bottom-1x col-sm-12">
							<span class="alert-close" data-dismiss="alert"></span>
							<strong>Error(s):</strong><br>
							@foreach($errors->all() as $error)
								{{ $error }} <br>
							@endforeach
						</div>
					@endif
					<div class="col-sm-12">
						<div class="form-group">
							<label for="reg-fn">Full name</label>
							<input class="form-control" type="text" name="name" id="reg-fn" value="{{ old('name') }}">
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-group">
							<label for="reg-email">E-mail Address</label>
							<input class="form-control" type="email" name="email" id="reg-email" value="{{ old('email') }}">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="reg-pass">Password</label>
							<input class="form-control" type="password" name="password" id="reg-pass">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="reg-pass-confirm">Confirm Password</label>
							<input class="form-control" type="password" name="password_confirmation" id="reg-pass-confirm">
						</div>
					</div>
					<div class="col-12 text-center">
						<button class="btn btn-primary margin-bottom-none" type="submit">Register</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection

