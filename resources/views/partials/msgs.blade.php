@if (Session::has('sm'))
	<script>
		$(function(){
			iziToast.show({
				class: "iziToast-success",
				icon: "icon-circle-check",
				title: "Success!  ",
				message: '{{ Session::get("sm") }}',
				position: 'bottomCenter',
				timeout: 5000,
				layout: 2,
				progressBar: true,
				progressBarColor: 'black'
			});
		});
	</script>
@endif

@if ($errors->any())
	<script>
		$(function(){
			iziToast.show({
				class: 'iziToast-danger',
				icon: 'icon-ban',
				title: "Error!  ",
				message: "Please fix the error(s) in order to continue.",
				position: 'bottomCenter',
				timeout: 5000,
				layout: 2,
				progressBar: true,
				progressBarColor: 'black'
			});
		});
	</script>
@endif