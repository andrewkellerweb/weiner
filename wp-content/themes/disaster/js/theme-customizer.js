( function( $ ) {

	function hexToRgb(hex, opacity) {
	    // Expand shorthand form (e.g. "03F") to full form (e.g. "0033FF")
	    var shorthandRegex = /^#?([a-f\d])([a-f\d])([a-f\d])$/i;
	    hex = hex.replace(shorthandRegex, function(m, r, g, b) {
	        return r + r + g + g + b + b;
	    });

	    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
	    return 'rgba('+parseInt(result[1], 16)+', '+parseInt(result[2], 16)+', '+parseInt(result[3], 16)+', '+opacity+')';
	}
	
	wp.customize( 'tokokoo_menu_text_color', function( value ) {
		value.bind( function( newval ) {
			$( '#access .menu a' ).css('color', newval );
		} );
	} );
	
	wp.customize( 'tokokoo_menu_hover_background', function( value ) {
		value.bind( function( newval ) {
			var oldval = $( '#access .menu a' ).css('color');
			$( '#access .menu a' ).hover(
				function() {
					$(this).css('color', newval);
				},
				function() {
					$(this).css('color', oldval);
				}
			);
		} );
	} );
	
	wp.customize( 'tokokoo_submenu_background', function( value ) {
		value.bind( function( newval ) {
			$( '#access li .sub-menu, #access .menu .runing' ).css('background-color', newval );
			var oldval = $('.have-submenu a').css('background-color');
			$( '.have-submenu a').hover(
				function() {
					$(this).css( 'background-color', newval);
				},
				function() {
					$(this).css( 'background-color', oldval);
				}
			);
		} );
	} );

	wp.customize( 'tokokoo_submenu_text_color', function( value ) {
		value.bind( function( newval ) {
			$( '.sub-menu li a' ).css('color', newval);
		} );
	} );

	wp.customize( 'tokokoo_recent_product_wrapper', function( value ) {
		value.bind( function( newval ) {
			$( '.home-featured .featured-left .wrap-items' ).css('background-color', newval);
		} );
	} );

	wp.customize( 'tokokoo_pagination_color', function( value ) {
		value.bind( function( newval ) {
			$( '.pagination a' ).css('color', newval);
		} );
	} );

	wp.customize( 'tokokoo_pagination_hover_color', function( value ) {
		value.bind( function( newval ) {
			var oldval = $('.pagination a').css('color');
			$( '.pagination a').hover(
				function() {
					$(this).css( 'color', newval);
				},
				function() {
					$(this).css( 'color', oldval);
				}
			);
		} );
	} );

	wp.customize( 'tokokoo_blog_title_color', function( value ) {
		value.bind( function( newval ) {
			$( '.post-title a' ).css('color', newval);
		} );
	} );

	wp.customize( 'tokokoo_blog_title_hover_color', function( value ) {
		value.bind( function( newval ) {
			var oldval = $('.post-title a').css('color');
			$( '.post-title a').hover(
				function() {
					$(this).css( 'color', newval);
				},
				function() {
					$(this).css( 'color', oldval);
				}
			);
		} );
	} );

	/* ECommerce color */
	wp.customize( 'tokokoo_primary_accent_color', function( value ) {
		value.bind( function( newval ) {
			$( '.added_to_cart, .button, button, html input[type="button"], input[type="reset"], input[type="submit"], .list-item .item-data .item-block .added_to_cart:hover, .list-item .item-data .item-block .add-to-cart:hover, .added_to_cart:hover, .button:hover, button:hover, html input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, .woocommerce-tabs .tabs li a, .tabs-wraps .tabs li a, .sidebar .widget_shopping_cart .buttons .checkout' ).css('background', newval);
			$( '.single-product .summary .price' ).css('color', newval);
			$( '.single-product .summary .price' ).css('border-bottom-color', newval);
			var oldval = $('.single-product a').hover(
				function() {
					$(this).css('color', newval);
				},
				function() {
					$(this).css('color', oldval);
				}
			);
		} );
	} );

	wp.customize( 'tokokoo_secondary_accent_color', function( value ) {
		value.bind( function( newval ) {
			$( '.list-item .item-data' ).css('background-color', hexToRgb(newval, 0.8));
			$( '.list-item .item-data .item-block' ).css('border-bottom-color', newval);
		} );
	} );

	wp.customize( 'tokokoo_badge_color', function( value ) {
		value.bind( function( newval ) {
			$( '.onsale' ).css('background-color', newval);
			$( '.onsale' ).css('border-color', newval);
		} );
	} );

	wp.customize( 'tokokoo_tab_background', function( value ) {
		value.bind( function( newval ) {
			$( '.woocommerce-tabs .tabs li.active a' ).css('background', newval);
			var oldval = $( '.woocommerce-tabs .tabs li a' ).css('background');
			$( '.woocommerce-tabs .tabs li a').hover(
				function() {
					$(this).css('background', newval);
				},
				function() {
					$(this).css('background', oldval);
				}
			);
		} );
	} );

	/* Widget color */
	wp.customize( 'tokokoo_widget_title', function( value ) {
		value.bind( function( newval ) {
			$( '.sidebar .widget .widget-title, .widget-bottom .widget-title' ).css('color', newval);
		} );
	} );

	wp.customize( 'tokokoo_widget_list', function( value ) {
		value.bind( function( newval ) {
			$( '.sidebar a, .widget-bottom .widget .product_list_widget a' ).css('color', newval);
		} );
	} );

	wp.customize( 'tokokoo_widget_list_hover', function( value ) {
		value.bind( function( newval ) {
			var oldval = $( '.widget-bottom .widget .product_list_widget a' ).css('color');
			$( '.widget-bottom .widget .product_list_widget a, .sidebar a' ).hover(
				function() {
					$(this).css('color', newval);
				},
				function() {
					$(this).css('color', oldval);
				}
			);
		} );
	} );

	/* FOnt */
	wp.customize( 'tokokoo_body_font', function( value ) {
		value.bind( function( newval ) {
			$( 'body' ).css('font-family', newval);
		} );
	} );

	wp.customize( 'tokokoo_menu_font', function( value ) {
		value.bind( function( newval ) {
			$( '.menu' ).css('font-family', newval);
		} );
	} );

	wp.customize( 'tokokoo_item_title_font', function( value ) {
		value.bind( function( newval ) {
			$( '.product-title, .list-item .item-data .item-title' ).css('font-family', newval);
		} );
	} );

	wp.customize( 'tokokoo_content_font', function( value ) {
		value.bind( function( newval ) {
			$( '.entry-content, product-description, .woocommerce-tabs .panel' ).css('font-family', newval);
		} );
	} );

	wp.customize( 'tokokoo_widget_title_font', function( value ) {
		value.bind( function( newval ) {
			$( '.widget-title' ).css('font-family', newval);
		} );
	} );

	wp.customize( 'tokokoo_widget_content_font', function( value ) {
		value.bind( function( newval ) {
			$( '.widget-bottom, .sidebar' ).css('font-family', newval);
		} );
	} );




})( jQuery );