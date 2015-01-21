<?php 

/**
 * The Template for displaying taxonomy portfolio_cat
 *
 * @author 		Tokokoo
 * @package 	Raakbookoo
 * @version     1.0
 */

get_header(); ?>

	<section class="content-area no-sidebar" id="primary">

		<div id="content" class="site-content hfeed">

			<div class="portfolio">

				<ul class="portfolio-list porto-ii">

					<?php while ( have_posts() ) : the_post(); ?>
					
						<li class="port-item">

							<figure class="port-img">
								<?php if ( current_theme_supports( 'get-the-image' ) ) get_the_image( array( 'meta_key' => 'Thumbnail', 'size' => 'tokokoo-portfolio', 'default_image' => 'http://www.placehold.it/560x560' ) ); ?>

							</figure>

							<div class="port-action">

								<span class="port-cat">
									<?php $categories = get_the_terms( $post->ID, 'portfolio_cat' ); ?>

									<?php if($categories) : ?>

										<?php foreach ( $categories as $category ) : ?>

											<a href="<?php echo get_term_link( $category ) ?>"><?php echo esc_attr( $category->slug ) . ' '; ?></a>

										<?php endforeach ?>

									<?php endif; ?>
								</span>

								<h2 class="port-title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?>.</a>
								</h2>

								<a href="<?php echo esc_url ( ( get_post_meta( $post->ID, 'tokokoo_project_url', true ) ) ? get_post_meta( $post->ID, 'tokokoo_project_url', true ) : the_permalink() ); ?>" class="port-view button"><?php _e('view project', 'raakbookoo'); ?></a>
								
							</div><!-- End .port-action -->
							
						</li><!-- End .port-item -->

					<?php endwhile; ?>

				</ul><!-- End .portfolio-list -->

				<?php get_template_part( 'loop', 'nav' ); ?>
				
			</div><!-- End .portfolio -->

		</div><!-- #content .site-content .hfeed -->

	</section><!-- End #content-area #primary -->

	<?php get_template_part( 'sidebar', 'primary' ); ?>

<?php get_footer()?>