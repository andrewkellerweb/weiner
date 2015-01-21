<?php 

/**
 * The home testimonial template
 * 
 * @author 		Tokokoo
 * @package 	Raakbookoo
 * @version     1.0
 */
 ?>

<div class="featured-right">

	<h2 class="title-featured"><?php _e( 'What people are saying', 'raakbookoo' ); ?></h2>

	<ul class="inner">

		<?php 
		$params 		= tokokoo_loop_args( 'testimonials', 3 );
		$testimonials 	= new WP_Query( $params );

			if ( $testimonials->have_posts() ) : 
				
				while ( $testimonials->have_posts() ) : $testimonials->the_post(); ?>
					
					<li class="testimonial-list">
						<figure class="testimonial-avatar">
							<?php 
								if ( current_theme_supports( 'get-the-image' ) ) 
								get_the_image( array( 'meta_key' => 'Thumbnail', 'size' => 'tokokoo-featured', 'default_image' => get_template_directory_uri().'/img/avatar.png') ); 
							?>
						</figure>
						<blockquote class="testimonial">
							<p><?php echo tokokoo_limiter( $post->post_excerpt, 200 ); ?></p>
						</blockquote>
						<p class="testimonial-author">
							<?php the_title(); ?>
							<?php $position = get_post_meta( get_the_ID(), '_testimonials_position', false ); ?>
							<?php if ( $position ): ?>
								<span><?php echo  $position[0]; ?></span>
							<?php endif ?>
						</p>
					</li><!-- End .testimonial-list -->

			<?php endwhile; // end of the loop. ?>
			<?php endif;
			wp_reset_postdata(); ?>

	</ul>

</div><!-- End .featured-right -->