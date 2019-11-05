<!-- Avatar Modal -->
<div class="modal fade" id="modalAvatar" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Change Avatar</h4>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{ url('account/changeAvatar') }}" method="post" enctype="multipart/form-data"
				      novalidate="novalidate">
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
					<div class="form-group row">
						<label class="col-2 col-form-label" for="image">Avatar</label>
						<div class="col-10">
							<div class="custom-file">
								<input class="custom-file-input" type="file" name="image" id="image">
								<label class="custom-file-label" for="image">Choose file...</label>
							</div>
						</div>
					</div>
					<input type="submit" name="submit" value="Update avatar" class="btn btn-primary">
					<button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
				</form>
			</div>
		</div>
	</div>
</div>