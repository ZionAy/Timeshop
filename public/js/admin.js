$(function () {
	$('.admin-delete').on('click', function (e) {
		e.preventDefault();
		if (confirm('Are you sure you want to delete this item?')) {
			$(this).closest('form').submit();
		}
	});
	
	$('#article').summernote({
		dialogsInBody: true,
		placeholder: 'Put your article here',
		tabsize: 2,
		height: 200
	});
	
});