<?php
/**
 * Template Name: Portfolio v1
 *
 *
 */
get_header(); 
global $portfolio_varian;
switch ($portfolio_varian) {
	case 2:
		$varian_number = 'ii';
		break;
	
	case 3:
		$varian_number = 'iii';
		break;
	
	default:
		$varian_number = 'i';
		break;
}
?>

	<section class="content-area <?php tokokoo_dynamic_sidebar_class(); ?>" id="primary">

		<div id="content" class="site-content hfeed">

			<div class="portfolio">

				<?php
					  $temp = $wp_query; 
					  $wp_query = null; 
					  $wp_query = new WP_Query(); 
					  $wp_query->query('showposts=6&post_type=portfolio'.'&paged='.$paged );
					
					if ( $wp_query->have_posts() ) :
				?>

				<ul class="portfolio-list porto-<?php echo $varian_number; ?>">

					<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
					
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

				<?php else : ?>

					<?php if ( current_user_can( 'publish_posts' ) ) { ?>
						<h2 class="title-wrapper"><?php printf( __( 'Ready to publish your first portfolio? <a href="%1$s">Get started here</a>.', 'raakbookoo' ), esc_url( admin_url( 'post-new.php?post_type=portfolio' ) ) ); ?></h2>
					<?php } else { ?>
						<h2 class="title-wrapper"><?php esc_html_e( 'It seems we can\'t find what you\'re looking for. Perhaps searching can help.', 'raakbookoo' ); ?></h2>
					<?php } ?>

				<?php endif; ?>

				<?php 
				  $wp_query = null; 
				  $wp_query = $temp;  // Reset
				?>
				
			</div><!-- End .portfolio -->

		</div><!-- #content .site-content .hfeed -->

	</section><!-- End #content-area #primary -->

	<?php if( 2 === $portfolio_varian ) get_sidebar( 'primary' ); ?>

<?php get_footer()?>