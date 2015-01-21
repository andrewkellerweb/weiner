<article id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class('blogpost'); ?>">

	<div class="entry-wrapper">

		<?php if ( is_singular( get_post_type() ) ) { ?>

			<header class="entry-header">
				<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' );  ?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<div class="entry-summary">
					<?php hybrid_attachment(); // Function for handling non-image attachments. ?>
					<?php the_content(); ?>
				</div><!-- .entry-summary -->
				<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'raakbookoo' ), 'after' => '</p>' ) ); ?>
				<?php tokokoo_share_buttons(); ?>
			</div><!-- .entry-content -->

		<?php } else { ?>

			<div class="entry-content">

				<header class="entry-header">
					<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' );  ?>
				</header><!-- .entry-header -->

				<div class="entry-summary">
					<?php the_excerpt(); ?>
					<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'raakbookoo' ), 'after' => '</p>' ) ); ?>
				</div><!-- .entry-summary -->

			</div><!-- .entry-content -->

		<?php } ?>

	</div><!-- .entry-container -->

</article><!-- #article-<?php the_ID(); ?> -->