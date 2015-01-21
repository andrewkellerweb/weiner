<?php if ( has_nav_menu( 'primary' ) ) : ?>
	
	<nav id="access" role="navigation">
		<h3 class="assistive-text"><?php _e( 'Main menu', 'raakbookoo' );  ?></h3>
		<?php 
			wp_nav_menu( 
				array( 
					'theme_location' 	=> 'primary', 
					'container_class' 	=> 'menu-menu-container', 
					'menu_class' 		=> 'menu', 
					'menu_id' 			=> 'menu-menu', 
					'fallback_cb' 		=>'',
				) 
			); 
		?>
	</nav><!-- .site-navigation .primary-navigation -->

<?php else : ?>

	<nav id="access" role="navigation">
		<h3 class="assistive-text"><?php _e( 'Main menu', 'raakbookoo' ); ?></h3>
		<ul class="menu" id="menu-menu">
			<?php wp_list_pages( array( 'depth' => 1,'sort_column' => 'menu_order','title_li' => '', 'include' => 2 ) ); ?>
		</ul>
	</nav><!-- End #access -->

<?php endif;?>