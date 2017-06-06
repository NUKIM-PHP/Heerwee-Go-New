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
});