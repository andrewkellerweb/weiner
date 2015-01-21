<?php

/**
 * Template Name: Archive
 *
 *
 */

get_header(); ?>

	<?php tokokoo_wrapper_start(); ?>
	
		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>
				
				<article id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

					<div class="tokokoo-archives widget">

						<div class="widget_archive">

							<h2><?php _e('The last 20 page','raakbookoo')?></h2>

							<ul>
								<?php wp_get_archives( array( 'type' => 'postbypost', 'limit' => 20 ) ); ?>
							</ul>

						</div><!-- .widget_archive -->

						<div class="bottom">
							<div class="left">

								<h2><?php _e( 'Categories', 'raakbookoo' ); ?></h2>
						  		<ul class="archive-list"><?php wp_list_categories( 'depth=0&title_li=&' ); ?></ul>

							</div><!-- End .left -->

							<div class="right">
								
								<h2><?php _e( 'Monthly Archives', 'raakbookoo' ); ?></h2>
						  		<ul class="archive-list"><?php wp_get_archives( 'type=monthly&limit=12' ); ?></ul>
							</div><!-- End .right -->

						</div><!-- End .bottom -->

					</div><!-- End .tokokoo-archives -->

					
				</article><!-- #article-<?php the_ID(); ?> -->

			<?php endwhile; ?>

		<?php endif; ?>
		
	<?php tokokoo_wrapper_end(); ?>

	<?php get_sidebar( 'primary' ); ?>

<?php get_footer(); ?>