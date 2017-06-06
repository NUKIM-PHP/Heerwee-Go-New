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
});