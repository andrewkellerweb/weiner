<article id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class( 'blogpost' ); ?>">

	<div class="entry-wrapper">		
		
		<?php 
			if ( current_theme_supports( 'get-the-image' ) ) :
				$featimage = get_the_image( array( 'meta_key' => 'Thumbnail', 'size' => 'tokokoo-blog', 'image_class' => 'entry-thumbnail', 'echo' => false ) ); 

				if ( $featimage ) :	?>	
				
					<div class="entry-feature">
						<div class="inner">
							<?php echo $featimage; ?>
						</div><!-- inner -->
					</div><!-- End .entry-feature -->
 
				<?php endif; ?>
		<?php endif; ?>

		<div class="entry-content">

			<header class="entry-header">
				<h2 class="post-title entry-title">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h2>
				<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">' . __( '[entry-published] [entry-comments-link before="| "] [entry-author before="| "] [entry-terms before="| Tags:"] [entry-terms taxonomy="category" before="| Posted in:"]', 'raakbookoo' ) . '</div>' ); ?>
			</header><!-- .entry-header -->
		
			<div class="entry-summary">
				<?php the_excerpt(); ?>
				<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'raakbookoo' ), 'after' => '</p>' ) ); ?>
			</div><!-- .entry-summary -->

		</div><!-- .entry-content --> 

	</div><!-- .entry-wrapper -->

</article><!-- #article-<?php the_ID(); ?> -->