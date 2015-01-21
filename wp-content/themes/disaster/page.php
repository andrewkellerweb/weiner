<?php 
// Loads the header.php template.
get_header(); ?>

	<section class="content-area <?php tokokoo_dynamic_sidebar_class(); ?>" id="primary">
			
		<div class="site-content" id="content">

			<div class="blog-page blog-single">

			<?php if( function_exists( 'tokokoo_is_woocommerce_pages' ) && tokokoo_is_woocommerce_pages() ): ?>


			<?php endif; ?>
					
			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class('hentry'); ?>">

					<?php if( function_exists( 'tokokoo_is_woocommerce_pages' ) && tokokoo_is_woocommerce_pages() ): ?>

						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'raakbookoo' ), 'after' => '</p>' ) ); ?>

					<?php else: ?>

						<div class="entry-wrapper">

							<header class="entry-header">
								<h2 class='post-title entry-title'><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></h2>
							</header><!-- .entry-header -->
							
							<?php if ( current_theme_supports( 'get-the-image' ) ) $image = get_the_image( array( 'meta_key' => 'Thumbnail', 'size' => 'tokokoo-avatar', 'default' => 'http://www.placehold.it/560x560') ); ?>

							<?php if ($image): ?>

							<div class="entry-feature">

								<div class="inner">
									<?php echo $image; ?>
								</div><!-- inner -->
								
							</div><!-- End .entry-feature -->

							<?php endif; ?>

							<div class="entry-content">

								<div class="entry-summary">
									<?php the_content(); ?>
								</div><!-- .entry-summary -->

							</div><!-- End .entry-content -->

						</div><!-- .entry-wrapper -->

					<?php endif; ?>
					
					</article><!-- #article-<?php the_ID(); ?> -->

				<?php endwhile; ?>

			<?php endif; ?>

			<?php if( function_exists( 'tokokoo_is_woocommerce_pages' ) && tokokoo_is_woocommerce_pages() ): ?>


			<?php endif; ?>

			</div>

		</div><!-- #content .site-content -->
		
		<?php if ( function_exists( 'is_cart' ) &&  is_cart() ) {
			woocommerce_cross_sell_display(); 
		} ?>
	</section><!-- #primary .content-area .has-sidebar -->

		<?php get_template_part( 'sidebar', 'primary' );?>
 
<?php get_footer(); // Loads the footer.php template. ?>
	
	
