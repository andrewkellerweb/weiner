var $ = jQuery.noConflict();
jQuery(document).ready(function($) {

	$( ".koo-tabs" ).tabs({
		fx: { opacity: 'toggle', duration: 200 }
	});
	
	$(".koo-toggle").each( function () {
		if($(this).attr('data-id') == 'closed') {
			$(this).accordion({ header: '.koo-toggle-title', collapsible: true, active: false  });
		} else {
			$(this).accordion({ header: '.koo-toggle-title', collapsible: true});
		}
	});
	
	$(".koo-accordion").accordion( {
		autoHeight: false
	});
	
});