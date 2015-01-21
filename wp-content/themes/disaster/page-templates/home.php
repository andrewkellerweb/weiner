<?php

/**
 * Template Name: Home v1
 *
 *
 */
global $force_display;
get_header();
$force_display = true;?>
	
<?php tokokoo_wrapper_start(); ?>

	<?php if ( of_get_option( 'tokokoo_featured_book_section' ) == true ) : ?>

		<div class="home-featured cl">

			<div class="featured-left">

				<h2 class="title-featured"><?php _e( 'Exclusive On this month', 'raakbookoo' ); ?></h2>
				
				<?php if ( class_exists( 'woocommerce' ) ) { ?>
					<!-- Get Featured Product -->
					<?php echo tokokoo_get_product( 12, '_featured', 'yes' ); ?>

				<?php } else { ?>

					<div class="featured-notice">
						<?php _e( 'You need to install/activate woocommerce plugin to display this section', 'raakbookoo' ); ?>
					</div>

				<?php } ?>

			</div><!-- End .featured-left -->

			<!-- Testimonials section -->
			<?php get_template_part( 'home', 'testimonials' ); ?>

		</div><!-- End .home-featured -->

	<?php endif; ?>

	<?php if ( of_get_option( 'tokokoo_recent_book_section' ) == true ) { ?>

		<?php if ( class_exists( 'woocommerce' ) ) : ?>

			<!-- Recent Book Section -->
			<?php woocommerce_get_template_part( 'content', 'recent-product' ); ?>

		<?php else : ?>
			
			<div class="recent-notice">
				<?php _e( 'You need to install/activate woocommerce plugin to display this section', 'raakbookoo' ); ?>
			</div>
			
		<?php endif; ?>

	<?php } ?>

	<?php if ( of_get_option( 'tokokoo_searchform_section' ) == true ) { ?>

		<?php if ( class_exists( 'woocommerce' ) ) : ?>

			<!-- Searchform Featured -->
			<?php get_template_part( 'home', 'searchform' ); ?>

		<?php else : ?>

			<div class="search-notice">
				<?php _e( 'You need to install/activate woocommerce plugin to display this section', 'raakbookoo' ); ?>
			</div>

		<?php endif; ?>

	<?php } ?>
	
	<?php if ( of_get_option( 'tokokoo_from_blog_section' ) == true ) : ?>
		
		<div class="featured-bottom">
		
			<!-- From our blog section -->
			<?php get_template_part( 'home', 'blog' ); ?>
			
			<?php if ( class_exists( 'woocommerce') ) {
				 // Best Selling Book Section
				woocommerce_get_template_part( 'content', 'best-seller' ); 
			
			} else { ?>
				
				<div class="bs-notice">
					<?php _e( 'You need to install/activate woocommerce plugin to display this section', 'raakbookoo' ); ?>
				</div>

			<?php } ?>
			
		</div><!-- End .featured-bottom -->

	<?php endif; ?>

<?php tokokoo_wrapper_end(); ?>

<?php get_footer()?>