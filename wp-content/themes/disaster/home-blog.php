<?php 

/**
 * The Template for displaying latest blog on homepage .
 * 
 * @author 		Tokokoo
 * @package 	Raakbookoo
 * @version     1.0
 */
 ?>

<section class="from-blog">

	<h3 class="title-blog"><?php _e( 'from our blog', 'raakbookoo' ); ?></h3>

	<?php 
		$counter 		= 1;
		$args 			= tokokoo_loop_args( 'post', 5 );
		$latest_blog 	= new WP_Query( $args );
	
	if ( $latest_blog->have_posts() ) : while ( $latest_blog->have_posts() ) : $latest_blog->the_post(); ?>

		<?php if ( $counter == 1 ) { ?> 

		<div class="blog-sticky">
			<figure class="blog-thumb">
				<?php 
					if ( current_theme_supports( 'get-the-image' ) ) 
					get_the_image( array( 'meta_key' => 'Thumbnail', 'size' => 'tokokoo-from-blog', 'link_to_post' => true, 'default_image'=>'http://placehold.it/130x130' ) ); 
				?>
			</figure>
			<article class="blog-data">
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<p class="entry-text"><?php echo tokokoo_limiter( $post->post_content, 300 ); ?></p>
				<span class="read-more">
					<a href="<?php the_permalink(); ?>"><?php _e( 'read-more', 'raakbookoo' ); ?></a>
				</span>
			</article>
		</div><!-- End .blog-stick -->

		<?php } else { ?>
			<?php ob_start(); ?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			<?php $anothers[] = ob_get_contents(); ?>
			<?php ob_end_clean(); ?>
		<?php } $counter++; ?>

	<?php endwhile; // end of the loop. ?>
	<?php endif; ?>

		<div class="other-blog">
			<h3 class="title-other"><?php _e( 'other blog', 'raakbookoo' ); ?></h3>
			<ul>
				<?php if ( isset( $anothers ) && ! empty( $anothers ) ) {
					foreach ( $anothers as $another ) {
						echo $another;
					}
				} ?>
			</ul>
		</div><!-- End .other-blog -->

	<?php wp_reset_postdata(); ?>

</section><!-- End .item-thumb -->