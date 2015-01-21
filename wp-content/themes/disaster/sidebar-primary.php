<?php 

/**
 * The Template for sidebar primary .
 * 
 * @author 		Tokokoo
 * @package 	Raakbookoo
 * @version     1.0
 */

if ( is_active_sidebar( 'primary' ) ) : ?>

	<div class="widget-area primary-sidebar sidebar" id="sidebar" role="complementary">

		<?php dynamic_sidebar( 'primary' ); ?>

	</div><!-- #sidebar .widget-area .primary-sidebar -->

<?php endif; ?>