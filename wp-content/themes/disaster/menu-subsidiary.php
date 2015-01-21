<?php 

/**
 * The Template for displaying menu primary.
 * 
 * @author 		Tokokoo
 * @package 	Raakbookoo
 * @version     1.0
 */

if ( has_nav_menu( 'subsidiary' ) ) : ?>
	
	<nav id="footer-menu" class="footer-menu" role="navigation">
		<?php 
			wp_nav_menu( 
				array( 
					'theme_location' 	=> 'subsidiary', 
					'container_class' 	=> 'menu-subsidiary-container', 
					'menu_class' 		=> 'subsidiary-nav', 
					'menu_id' 			=> 'menu-subsidiary', 
					'fallback_cb' 		=> '',
				) 
			); 
		?>
	</nav><!-- .site-navigation .primary-navigation -->

<?php else : ?>

	<nav role="navigation" class="footer-menu" id="footer-menu">
		<div class="menu-subsidiary-container">

			<ul class="subsidiary-nav" id="menu-subsidiary">
				<?php wp_list_pages( array( 'depth' => 1,'sort_column' => 'menu_order','title_li' => '', 'include' => 2 ) ) ?>
			</ul><!-- End .subsidiary-nav -->

		</div><!-- End .subsidiary-nav -->

	</nav><!-- End .footer-menu -->

<?php endif;?>