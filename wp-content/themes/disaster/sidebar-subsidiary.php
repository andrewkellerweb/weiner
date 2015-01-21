<?php 

/**
 * The Template for sidebar subsidiary .
 * 
 * @author 		Tokokoo
 * @package 	Raakbookoo
 * @version     1.0
 */
 ?>

<div class="widget-bottom">
	<div class="container">
		<?php if ( is_active_sidebar( 'subsidiary' ) ) : ?>

			<?php dynamic_sidebar( 'subsidiary' ); ?>

		<?php endif; ?>
	</div>
</div>