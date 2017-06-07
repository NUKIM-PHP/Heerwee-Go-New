
function initSlider(){
	// var jsImg = ['img/event_1.png', 'img/event_2.png', 'img/event_3.png', 'img/event_4.png'];
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
		$('#login-user').focus();
	});

	$('#link-logout').on('click', function(){
		$.ajax({
			url: '/api/user/logout.php',
			method: 'GET',
			success: function(data){
				location.reload();
			}
		});
	});

	$('.login-box').on('click', function(e){
		e.stopPropagation();
	})

	$('.login-wrapper').on('click', function(){
		$(this).fadeOut();
	});

	$('#button-login').on('click', function(){
		$('#loginFailed').hide();
		$.ajax({
			url: '/api/user/login.php',
			method: 'POST',
			dataType: 'json',
			data: {
				user: $('#login-user').val(),
				pass: $('#login-pass').val()
			},
			success: function(data){
				if(data.result === 0){
					location.reload();
				}else{
					$('#loginFailed').show();
				}
			}
		});
	})

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
	});

	$('#register-form').on('submit', function(e){
		e.preventDefault();
		var d = $('#register-form').serializeArray();
		var dd = {};
		Object.keys(d).forEach((i)=>{
			candidateData[dd[i].name] = d[i].value;
		});
		$.ajax({
			url: '/api/user/add.php',
			method: 'POST',
			dataType: 'ajax',
			data: dd,
			success: function(data){
				if(data.result === 0){
					location.replace('/');
				}
			}
		})
	});

	$('#addtocart').on('click', function(){
		var gid = $(this).data('gid');
		$.ajax({
			url: '/api/cart/insert.php',
			method: 'POST',
			dataType: 'json',
			data: {
				g_id: gid,
				num: $('#product-length').val() || 1
			},
			success: function(data){
				if(data.result === 0){
					location.href = '/cart.php';
				}
			}
		});
	});

	$('#button-back').on('click', function(){
		location.href = '/';
	});
});