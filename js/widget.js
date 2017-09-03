$(document).ready(function(){
	$('.title').find('li').on('click',function(){
		var $widgetToShow = $(this).attr('rel');


		$('.widget.choosen').removeClass('choosen');
		$('this').addClass('choosen');

		if($widgetToShow == 'PDF'){
			$('.view_pdf').show();
			$('.view_video').hide();
			$('.view_flash').hide();
		}

		if($widgetToShow == 'VIDEO'){
			$('.view_video').fadeIn(700);
			$('.view_pdf').hide();
			$('.view_flash').hide();
		}

		if($widgetToShow == 'FLASH'){
			$('.view_flash').fadeIn(700);
			$('.view_video').hide();
			$('.view_pdf').hide();
		}
	});

});