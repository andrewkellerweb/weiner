<article id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class('blogpost'); ?>">

	<div class="entry-container">

		<header class="entry-header">
			<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' );  ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'raakbookoo' ), 'after' => '</p>' ) ); ?>
			<?php tokokoo_share_buttons(); ?>
		</div><!-- .entry-content -->

	</div><!-- .entry-container -->

</article><!-- #article-<?php the_ID(); ?> -->