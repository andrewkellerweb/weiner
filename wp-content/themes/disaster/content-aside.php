<article id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class('blogpost'); ?>">

	<div class="entry-wrapper">
		
		<?php if ( is_singular( get_post_type() ) ) { ?>

			<div class="entry-data">
				<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">' . 
					__( '[entry-published before="<span class=\'post-date\'>" after="</span>"] [entry-comments-link before="<span class=\'comment-link\'>" after="</span>"] [entry-author] [entry-terms before="Tags: "] [entry-terms taxonomy="category"]', 'raakbookoo' ) . '</div>' ); ?>
				<?php tokokoo_post_author(); ?>
			</div>

			<div class="entry-content">
				<div class="entry-summary">
					<?php the_content(); ?>
				</div><!-- .entry-summary -->
				<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'raakbookoo' ), 'after' => '</p>' ) ); ?>
				<?php tokokoo_share_buttons(); ?>
			</div><!-- .entry-content -->

		<?php } else { ?>

			<div class="entry-content">

				<header class="entry-header">
					<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">' . __( '[entry-published] [entry-comments-link before="| "] [entry-author before="| "] [entry-terms before="| Tags:"] [entry-terms taxonomy="category" before="| Posted in:"]', 'raakbookoo' ) . '</div>' ); ?>
				</header><!-- .entry-header -->
		
				<div class="entry-summary">
					<?php the_excerpt(); ?>
					<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'raakbookoo' ), 'after' => '</p>' ) ); ?>
				</div><!-- .entry-summary -->

			</div><!-- .entry-content -->

		<?php } ?>

	</div><!-- .entry-container -->
	
</article><!-- #article-<?php the_ID(); ?> -->