$(function(){
	$('.money').each(function(){
		var num = $(this).text();
		var regexnum = /(-?\d+)(\d{3})/;
		while(regexnum.test(num)){
			num = num.replace(regexnum, '$1,$2');
		}
		if($(this).text().startsWith('$')){
			$(this).text(num);
		}else{
			$(this).text('$' + num);
		}
	});

	$('#delete-user').on('click', function(){
		var num = $('input[type=checkbox]:checked');
		$('input[type=checkbox]:checked').each(function(){
			$.ajax({
				url: '/api/user/delete.php',
				method: 'POST',
				dataType: 'json',
				data: {
					id: $(this).data('id')
				},
				success: function(){
					if(!--num){
						location.reload();
					}
				}
			});
		});
	});

	$('#delete-product').on('click', function(){
		var num = $('input[type=checkbox]:checked');
		$('input[type=checkbox]:checked').each(function(){
			$.ajax({
				url: '/api/goods/delete.php',
				method: 'POST',
				dataType: 'json',
				data: {
					id: $(this).data('id')
				},
				success: function(){
					if(!--num){
						location.reload();
					}
				}
			});
		});
	});

	$('#delete-event').on('click', function(){
		var num = $('input[type=checkbox]:checked');
		$('input[type=checkbox]:checked').each(function(){
			$.ajax({
				url: '/api/event/delete.php',
				method: 'POST',
				dataType: 'json',
				data: {
					id: $(this).data('id')
				},
				success: function(){
					if(!--num){
						location.reload();
					}
				}
			});
		});
	});

	$('#delete-event').on('click', function(){
		var num = $('input[type=checkbox]:checked');
		$('input[type=checkbox]:checked').each(function(){
			$.ajax({
				url: '/api/invoice/delete.php',
				method: 'POST',
				dataType: 'json',
				data: {
					id: $(this).data('id')
				},
				success: function(){
					if(!--num){
						location.reload();
					}
				}
			});
		});
	});

	$('#form-add-product').on('submit', function(e){
		e.preventDefault();
		var formData = new FormData($(this)[0]);
		$.ajax({
			url: '/api/goods/add.php',
			method: 'POST',
			dataType: 'json',
			async: false,
			data: formData,
			cache: false,
			contentType: false,
			processData: false
		});
		location.href = '/admin/products.php';
	});

	$('#form-add-event').on('submit', function(e){
		e.preventDefault();
		var formData = new FormData($(this)[0]);
		$.ajax({
			url: '/api/event/add.php',
			method: 'POST',
			dataType: 'json',
			async: false,
			data: formData,
			cache: false,
			contentType: false,
			processData: false
		});
		location.href = '/admin/events.php';
	});
});