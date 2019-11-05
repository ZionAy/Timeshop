$(function () {
	$('.add-to-cart-btn').on('click', function () {
		$.ajax({
			type: 'GET',
			url: BASE_URL + 'shop/add-to-cart',
			dataType: 'html',
			data: {pid: $(this).data('id')},
			success: function (res) {
				location.reload();
			}
		});
	});
	
	$('.update-cart').on('click', function () {
		$.ajax({
			type: 'GET',
			url: BASE_URL + 'shop/update-cart',
			dataType: 'html',
			data: {pid: $(this).data('id'), op: $(this).data('op')},
			success: function (res) {
				location.reload();
			}
		});
	});
	
	$('.remove-from-cart-btn').on('click', function () {
		$.ajax({
			type: 'GET',
			url: BASE_URL + 'shop/remove-from-cart',
			dataType: 'html',
			data: {pid: $(this).data('id')},
			success: function (res) {
				location.reload();
			}
		});
	});
	
	$('#searchAC').autocomplete({
		source: BASE_URL + 'shop/search',
		minLength: 2,
		select: function (key, value) {
			location.assign(BASE_URL + 'shop/' + value.item.url);
		}
	});
	
	// This is my fix for the template not showing filename after choose
	$('.custom-file-input').on('change', function () {
		$('.custom-file-label').text($(this).val().replace(/C:\\fakepath\\/i, ''));
	});
	
});