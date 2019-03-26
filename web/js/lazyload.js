var bLazy = new Blazy({
	selector: '.b-lazy',
});

$('#slider').bind('slide.bs.carousel', function (e) {
    Blazy();
});

$('#carousel-testimonials').bind('slide.bs.carousel', function (e) {
    Blazy();
});
