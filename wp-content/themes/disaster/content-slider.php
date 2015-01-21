<div id="primary-slider" class="primary-slider">
	
	<?php

		$rv_slider = of_get_option( 'tokokoo_slider_shortcode_revo' );
		$rv_slider_portfolio = of_get_option( 'tokokoo_slider_shortcode_revo_portfolio' );
			
		if ( is_plugin_active( 'revslider/revslider.php' ) ) {

		 	if ( is_page_template( 'page-templates/home.php' ) ) {
		 		echo do_shortcode( $rv_slider );
		 	} 
		 	if ( is_page_template( 'page-templates/portfolio.php' ) || is_page_template( 'page-templates/portfolio-2.php' ) || is_page_template( 'page-templates/portfolio-3.php' ) ) {
		 		echo do_shortcode( $rv_slider_portfolio );
		 	}
		}
	?>
</div>