<?php

/**
 * Template Name: Contact
 *
 *
 */

get_header(); ?>
	
	<?php tokokoo_wrapper_start(); ?>

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">
					<div class="entry-wrapper">
						
						<?php if ( of_get_option( 'tokokoo_contact_maps' ) == 1 ) { ?> 
							<div class="entry-feature">
								<div class="inner">

										<div class="maps-wrap">
											<div id="map" style="height:500px"></div>

										</div><!-- End .maps-wrap -->
						
								</div><!-- inner -->
							</div><!-- End .entry-feature -->
						<?php } ?>

						<div class="entry-content">
							<div class="entry-summary">	
								<div class="post-phone">
									<span class="tagline"><?php echo of_get_option( 'tokokoo_contact_tagline' ); ?></span>
									<a href="tel:<?php echo of_get_option( 'tokokoo_contact_phone' ); ?>"><?php echo of_get_option( 'tokokoo_contact_phone' ); ?></a>
								</div>

								<div class="post-address">
									<address><?php echo of_get_option( 'tokokoo_contact_address' ); ?></address>
								</div>
							</div>
						</div>
					</div><!-- .entry-wrapper -->

					
					<div id="comments-template">
					    <div class="comments-wrap">
							<div id="respond">
								<?php if( function_exists( 'ninja_forms_display_form' ) ){ 
									echo do_shortcode( of_get_option( 'tokokoo_contact_shortcode' ) );
								} else {
									_e( 'You Need to install and activate Ninja Form Plugin', 'raakbookoo' );
								} ?>
							</div>
						</div>
					</div>

				</article><!-- #article-<?php the_ID(); ?> -->

			<?php endwhile; ?>
			
		<?php endif; ?>
		
	<?php tokokoo_wrapper_end(); ?>

	<?php get_sidebar( 'primary' ); ?>

<?php get_footer()?>