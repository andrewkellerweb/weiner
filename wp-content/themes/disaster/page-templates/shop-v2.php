<?php

/**
 * Template Name: Shop V2
 *
 *
 */

get_header()?>
	
	<?php tokokoo_wrapper_start(); ?>

		<div class="products-featured cl">

			<h2 class="title-featured"><?php _e( 'Exclusive On this month', 'raakbookoo' ); ?></h2>

				<?php $temp = $wp_query; 
					  $wp_query = null; 
					  $wp_query = new WP_Query(); 
					  $wp_query->query('showposts=12&post_type=product'.'&paged='.$paged); ?>

				<ul class="wrap-items cl"> 
					<?php while ($wp_query->have_posts()) : $wp_query->the_post();
					  	woocommerce_get_template_part( 'content', 'product' );
					  endwhile; ?>
				</ul>
					<?php get_template_part( 'loop', 'nav' ); ?>
				<?php 
				  $wp_query = null; 
				  $wp_query = $temp;  // Reset
				?>
		</div>

	
	<?php tokokoo_wrapper_end(); ?>
	
	<!-- Recent Book Section -->
	<?php woocommerce_get_template_part( 'content', 'recent-product' ); ?>
	
<?php get_footer(); ?>