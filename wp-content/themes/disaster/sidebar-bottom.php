<?php

/**
 * The Template for sidebar bottom .
 * 
 * @author 		Tokokoo
 * @package 	Raakbookoo
 * @version     1.0
 */

if ( is_active_sidebar( 'bottom' ) || is_active_sidebar( 'bottom-2' ) || is_active_sidebar( 'bottom-3' ) || is_active_sidebar( 'bottom-4' ) ): ?>
	
	<div class="widget-bottom">
		<div class="container">

			<?php for( $i=1; $i<=4; $i++ ) : ?>
				<?php $number = ( 1 === $i ) ? '' : '-'.$i; ?>

					<div class="widget-area">
						<?php dynamic_sidebar( 'bottom'. $number ); ?>
					</div>

			<?php endfor; ?>

		</div><!-- End .container -->
	</div>
	
<?php endif; ?>