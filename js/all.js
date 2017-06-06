
function initSlider(jsImg){
	var jsImg = ['img/event_1.png', 'img/event_2.png', 'img/event_3.png', 'img/event_4.png'];
	var jsImg_len = jsImg.length;
	var i=0;
	$('#events').attr('src', jsImg[i]);
	i++;
	if(i>=jsImg_len)  i=0;
	setInterval(function(){
		$('#events').attr('src', jsImg[i]);
		i++;
		if(i>=jsImg_len)  i=0;
	}, 3000);
}
$(function(){
	initSlider();

	$('#link-login').on('click', function(){
		$('.login-wrapper').slideDown();
		$('.login-box').hide(0).slideDown();
	});

	$('.login-wrapper').on('click', function(){
		$(this).fadeOut();
	});

	$('#register-form input[name="confirm_pass"]').on('change', function(){
		if($(this).val() !== $('#register-form input[name="pass"]').val()){
			$('#wrong-confirm-pass').show();
		}else{
			$('#wrong-confirm-pass').hide();
		}
	});

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

	$('.product').on('click', function(){
		if($(this).data('gid')){
			location.href = '/product.php?id=' + $(this).data('gid');
		}
	})
});