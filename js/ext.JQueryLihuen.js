$(function(){
	// The next operations remove attributes ment to browsers without javascript support
	$(".extJQueryLihuenTabsList").removeAttr("style");
	$(".extJQueryLihuenTab").removeAttr("style");

	// In Lihuen wiki we want to remove some styles
	$(".extJQueryLihuenTab > div").removeAttr("style");

	// Creation of the widgets
	// $(".extJQueryLihuenTabs").tabs({event:"mouseover"});
	$(".extJQueryLihuenTabs").tabs();
	$(".ui-tabs .ui-tabs-panel").css("padding", "0.5em");
	$(".ui-widget-content a").css("color", $("a").css("color"));

	// ------- JCarousel --------
	var jcarousel = $('.jcarousel');
	jcarousel.jcarousel({wrap: 'both', vertical: false});
	// Paginación
	jcarousel.append('<div class="jcarousel-pagination"></div>');
	$('.jcarousel-pagination')
		.jcarouselPagination({
			item: function(page) {
				return '<a href="#' + page + '">' + page + '</a>';
			},
			perPage: 1
		})
		.on('jcarouselpagination:active', 'a', function() {
			$(this).addClass('active');
		})
		.on('jcarouselpagination:inactive', 'a', function() {
			$(this).removeClass('active');
		});
	// Controles
	jcarousel.append('<a href="#" class="jcarousel-prev">&lt;</a>');
	jcarousel.append('<a href="#" class="jcarousel-next">&gt;</a>');
	$('.jcarousel-prev').jcarouselControl({target: '-=1'});
	$('.jcarousel-next').jcarouselControl({target: '+=1'});
	// Scroll automático
	jcarousel.jcarouselAutoscroll();
	// ------- end JCarousel --------
});
