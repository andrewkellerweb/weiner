<?php

/**
 * The Template for sidebar shop .
 * 
 * @author 		Tokokoo
 * @package 	Raakbookoo
 * @version     1.0
 */

if ( is_active_sidebar( 'shop' ) ) : ?>

	<aside id="sidebar-shop" class="sidebar sidebar-shop">

		<?php dynamic_sidebar( 'shop' ); ?>

	</aside><!-- #sidebar-shop .sidebar .sidebar-shop -->

<?php endif; ?>