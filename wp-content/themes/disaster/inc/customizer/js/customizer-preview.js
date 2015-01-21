
( function( $ ) {

	$.each( custStyle, function( index ) {

		var colorType 		= custStyle[index].type;
		var colorSlug		= custStyle[index].slug;
		var colorProperty	= custStyle[index].property;
		var colorProperty2	= custStyle[index].property2;
		var colorSelector 	= custStyle[index].selector;

		if ( colorType == 'color' ) {
			wp.customize( colorSlug, function( value ) {
				value.bind( function( to ) {
					$( colorSelector ).css( colorProperty, to ? to : '' );
				});
			});

		} else if ( colorType == 'text' || colorType == 'textarea' ) {
			wp.customize( colorSlug, function( value ) {
				value.bind( function( newval ) {
					$( colorSelector ).html( newval );
				} );
			} );

		} else if ( colorType == 'images' ) {
			wp.customize( colorSlug, function( value ) {
				value.bind( function( newval ) {
					$( colorSelector ).css( colorProperty, 'url(' + "'" + to + "'" + ')' + colorProperty2 );
				} );
			} );
		} else if ( colorType == 'select_font' ) {
			wp.customize( colorSlug, function( value ) {
				value.bind( function( to ) {
					$( colorSelector ).css( colorProperty, to ? to : '' );
				});
			});

		} 

	});
	 
} )( jQuery );