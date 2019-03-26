$(document).ready( function() {
    $('#myCarousel').carousel({
		interval:   4000
	});
	
	var clickEvent = false;
	$('#myCarousel').on('click', '.courseslide a', function() {
			clickEvent = true;
			$('.courseslide li').removeClass('active');
			$(this).parent().addClass('active');		
	}).on('slid.bs.carousel', function(e) {
		if(!clickEvent) {
			var count = $('.courseslide').children().length -1;
			var current = $('.courseslide li.active');
			current.removeClass('active').next().addClass('active');
			var id = parseInt(current.data('slide-to'));
			if(count == id) {
				$('.courseslide li').first().addClass('active');	
			}
		}
		clickEvent = false;
	});
});