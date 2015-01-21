<?php
	get_header();

	tokokoo_wrapper_start();
	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div class="blog-page blog-single">

		<article class="hentry">

			<div class="single-portfolio">

				<div class="portfolio-left">

					<div class="portfolio-data">
						<?php 
							$gallery = get_field( 'tokokoo_project_galleries' );
							$size = 'tokokoo-portfolio';
							if($gallery) :
						?>

						<div class="portfolio-img slider-img">

							<div class="flexslider">

								<ul class="slides">
								<?php while( has_sub_field( 'tokokoo_project_galleries' ) ) : ?>
									<li>
										<img src="<?php the_sub_field( 'tokokoo_project_image' ); ?>" />
									</li>
								<?php endwhile; ?>
								</ul>

							</div><!-- End flexslider -->
						</div>

						<?php else: ?>

							<?php if ( current_theme_supports( 'get-the-image' ) ) get_the_image( array( 'meta_key' => 'Thumbnail', 'size' => 'bajukoo-portfolio', 'image_class' => 'photo', 'before' => '<div class="portfolio-img">', 'after' => '</div>' ) ); ?>

						<?php endif; ?>

						<div class="portfolio-header">

							<h2 class="title"><?php the_title(); ?></h2>

							<div class="portfolio-meta">

								<span class="roles"><?php printf( __( 'Roles: %s', 'raakbookoo'  ), get_the_term_list( get_the_ID(), 'role', '', ', ', '' ) ); ?></span>
								
							</div><!-- End .portfolio-meta -->

						</div><!-- End .portfolio -->

						<div class="portfolio-text">
							
							<?php the_content(); ?>

						</div><!-- End .portfolio-text -->

					</div><!-- End .portfolio-data -->
					
				</div><!-- End .portfolio-left -->

				<div class="portfolio-right">

					<div class="related-portfolio portfolio">
						
						<?php
							$custom_taxterms = wp_get_object_terms( $post->ID, 'role', array( 'fields' => 'ids' ) );
							
							if ( ! empty( $custom_taxterms ) ) :
							$args = array(
										'post_type' => 'portfolio',
										'post_status' => 'publish',
										'posts_per_page' => 4, // you may edit this number
										'orderby' => 'rand',
										'tax_query' => array(
										    array(
										        'taxonomy' => 'role',
										        'field' => 'id',
										        'terms' => $custom_taxterms
										    )
										),
										'post__not_in' => array ( $post->ID ) );

							$related_items = new WP_Query( $args );
						?>
						<?php if ( $related_items->have_posts() ) :?>

							<h3><?php _e( 'Related projects', 'raakbookoo' ); ?></h3>

							<ul class="portfolio-list porto-i">

							<?php while ( $related_items->have_posts() ) : $related_items->the_post(); ?>
								
								<li class="port-item">

									<figure class="port-img">

										<a href="<?php the_permalink(); ?>">
											<?php if ( current_theme_supports( 'get-the-image' ) ) get_the_image( array( 'meta_key' => 'Thumbnail', 'size' => 'bajukoo-portfolio', 'image_class' => 'photo', 'before' => '<div class="portfolio-img">', 'after' => '</div>' ) ); ?>
										<span class="block"></span></a>

									</figure>

									<div class="port-action">

										<span class="port-cat">

											<?php $categories = get_the_terms( $post->ID, 'portfolio_cat' ); ?>

											<?php if ( $categories ) : ?>

												<?php foreach ( $categories as $category ) : ?>

													<a href="<?php echo get_term_link( $category ) ?>"><?php echo esc_attr( $category->slug ) . ' '; ?></a>

												<?php endforeach ?>

											<?php endif; ?>

										</span>

										<h2 class="port-title">
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h2>

										<a class="port-view button" href="<?php echo esc_url ( ( get_post_meta( $post->ID, 'tokokoo_project_url', true ) ) ? get_post_meta( $post->ID, 'tokokoo_project_url', true ) : the_permalink() ); ?>"><?php _e('view project', 'raakbookoo'); ?></a>
										
									</div><!-- End .port-action -->
									
								</li><!-- End .port-item -->

							<?php endwhile; ?>

							</ul>

						<?php else: ?>

							<p class="portfolio-message"><?php _e( 'This post does not have related item', 'raakbookoo' ); ?></p>

						<?php endif; ?>

					<?php else: ?>

						<p class="portfolio-message"><?php _e( 'The role of this item is empty', 'raakbookoo' ); ?></p>

					<?php endif; ?>

					</div>
					
				</div><!-- End .portfolio -->

			</div><!-- End .single-portfolio -->

		</article><!-- End .hentry -->

	</div><!-- End .blog-single -->

<?php
	endwhile;
	endif;
	
	tokokoo_wrapper_end();
	get_footer();
?>