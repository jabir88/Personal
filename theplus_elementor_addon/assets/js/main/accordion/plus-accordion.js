( function( $ ) {
	"use strict";
	var WidgetAccordionHandler = function($scope, $) {

		var $plusadv_accordion = $scope.find('.theplus-accordion-wrapper');
		var $this =  $plusadv_accordion,
			$accordionID                = $this.attr('id'),
			$currentAccordion           = $('#'+$accordionID),
			$accordionType              = $this.data('accordion-type'),
			$accordionSpeed             = $this.data('toogle-speed'),
			$accrodionList              = $this.find('.theplus-accordion-item'),
			$PlusAccordionListHeader    = $accrodionList.find('.plus-accordion-header');
			
		
			$accrodionList.each(function(i) {
				if( $(this).find($PlusAccordionListHeader).hasClass('active-default') ) {
					$(this).find($PlusAccordionListHeader).addClass('active');
					$(this).find('.plus-accordion-content').addClass('active').css('display', 'block').slideDown($accordionSpeed);
					var accordionConnection=$(this).closest(".theplus-accordion-wrapper").data('connection');
					
					if(accordionConnection!='' && accordionConnection!=undefined){
							var tab_index=$(this).find('.plus-accordion-content.active').data("tab");							
							setTimeout(function(){
								accordion_tabs_connection(tab_index,accordionConnection);
							}, 150);
					}
					
				}
			});
		
		if( 'accordion' == $accordionType ) {
			$PlusAccordionListHeader.on('click', function() {
				//Check if 'active' class is already exists
				if( $(this).hasClass('active') ) {
					$(this).removeClass('active');
					$(this).next('.plus-accordion-content').removeClass('active').slideUp($accordionSpeed);
				}else {
					$PlusAccordionListHeader.removeClass('active');
					$PlusAccordionListHeader.next('.plus-accordion-content').removeClass('active').slideUp($accordionSpeed);
			
					$(this).toggleClass('active');
					$(this).next('.plus-accordion-content').slideToggle($accordionSpeed, function() {
						$(this).toggleClass('active');
					});
					var accordionConnection=$(this).closest(".theplus-accordion-wrapper").data('connection');
					if(accordionConnection!='' && accordionConnection!=undefined){
							var tab_index=$(this).data("tab");
							accordion_tabs_connection(tab_index,accordionConnection);
					}
					
				}
			});			
		}
		if( 'hover' == $accordionType ) {
			$PlusAccordionListHeader.on('mouseover', function() {
				if( $(this).hasClass('active') ) {
				//	$(this).removeClass('active');
				//	$(this).next('.plus-accordion-content').removeClass('active').slideUp($accordionSpeed);
				}else {
					$PlusAccordionListHeader.removeClass('active');
					$PlusAccordionListHeader.next('.plus-accordion-content').removeClass('active').slideUp($accordionSpeed);
			
					$(this).toggleClass('active');
					$(this).next('.plus-accordion-content').slideToggle($accordionSpeed, function() {
						$(this).toggleClass('active');
					});
					var accordionConnection=$(this).closest(".theplus-accordion-wrapper").data('connection');
					if(accordionConnection!='' && accordionConnection!=undefined){
							var tab_index=$(this).data("tab");
							accordion_tabs_connection(tab_index,accordionConnection);
					}
				}
			});			
		}
		if( 'toggle' == $accordionType ) {
			$PlusAccordionListHeader.on('click', function() {
				if( $(this).hasClass('active') ) {
					$(this).removeClass('active');
					$(this).next('.plus-accordion-content').removeClass('active').slideUp($accordionSpeed);
				}else {
					$(this).toggleClass('active');
					$(this).next('.plus-accordion-content').slideToggle($accordionSpeed, function() {
						$(this).toggleClass('active');
					});
				}
			});
		}
	};
	$(window).on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction('frontend/element_ready/tp-accordion.default', WidgetAccordionHandler);
	});
})(jQuery);