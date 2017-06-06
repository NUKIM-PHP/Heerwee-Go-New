
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
	})

});