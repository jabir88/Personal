( function( $ ) {
	"use strict";
	var WidgetBlogShowcaseTricker = function ($scope, $) {
		
		var wid_sec=$scope.parents('section.elementor-element');
		if(wid_sec.find('.bss-magazine.mag_one_2_2,.bss-magazine.mag_one_1_2_v,.bss-magazine.mag_one_1_2_h').length>0){
			jQuery(".bss-wrapper:not(:first-child)").on("hover",function() {
				jQuery(this).find(".entry-content").slideDown(300)			
			});
			jQuery(document).on('mouseleave',".bss-wrapper:not(:first-child)",function() {
				jQuery(this).find(".entry-content").slideUp(300)
			})
		}
		if(wid_sec.find('.bss-magazine.mag_rows_2,.bss-magazine.mag_four_x_rows_1,.bss-magazine.mag_two_3_v,.bss-magazine.mag_two_1_2,.bss-magazine.mag_two_4').length>0){
			jQuery(".bss-magazine.mag_rows_2 .bss-wrapper,.bss-magazine.mag_four_x_rows_1 .bss-wrapper,.bss-magazine.mag_two_3_v .bss-wrapper,.bss-magazine.mag_two_1_2 .bss-wrapper,.bss-magazine.mag_two_4 .bss-wrapper").on("hover",function() {
				jQuery(this).find(".entry-content").slideDown(300)			
			});
			jQuery(document).on('mouseleave',".bss-magazine.mag_rows_2 .bss-wrapper,.bss-magazine.mag_four_x_rows_1 .bss-wrapper,.bss-magazine.mag_two_3_v .bss-wrapper,.bss-magazine.mag_two_1_2 .bss-wrapper,.bss-magazine.mag_two_4 .bss-wrapper",function() {
				jQuery(this).find(".entry-content").slideUp(300)
			})
		}
		
		var container = $scope.find('.theplus-nt-slideshow-items');
		if(container.length > 0){
			container.slick({
				//autoplay: true,
				autoplaySpeed: 2000,
				slidesToShow: 1,
				slidesToScroll: 1,
				prevArrow:'<a href="#" class="slick-prev" >&#8249;</a>',
				nextArrow:'<a href="#" class="slick-next">&#8250;</a>',
				arrows:true,
				//vertical: true,
				//verticalSwiping: true,
			});	
		}
	};
	$(window).on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction('frontend/element_ready/tp-dynamic-smart-showcase.default', WidgetBlogShowcaseTricker);
	});
})(jQuery);