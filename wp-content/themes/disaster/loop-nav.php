<?php if ( is_attachment() ) : ?>

	<div class="loop-nav">
		<?php previous_post_link( '%link', '<span class="previous">' . __( '<span class="meta-nav">&larr;</span> Return to entry', 'raakbookoo' ) . '</span>' ); ?>
	</div><!-- .paging -->

<?php elseif ( is_singular( 'post' ) ) : ?>

	<div class="loop-nav">
		<?php previous_post_link( '%link', '<span class="previous">' . __( '<span class="meta-nav">&larr;</span> Previous', 'raakbookoo' ) . '</span>' ); ?>
		<?php next_post_link( '%link', '<span class="next">' . __( 'Next <span class="meta-nav">&rarr;</span>', 'raakbookoo' ) . '</span>' ); ?>
	</div><!-- .paging -->

<?php elseif ( ! is_singular() && current_theme_supports( 'loop-pagination' ) ) :
		loop_pagination( array(
			'before' => '<nav class="pagination">',
			'after' => '</nav>',
			'prev_text' => __( 'Previous', 'raakbookoo' ),
			'next_text' => __( 'Next', 'raakbookoo' )
		) ); ?>

<?php elseif ( ! is_singular() && $nav = get_posts_nav_link( array( 'sep' => '', 'prelabel' => '<span class="previous">' . __( '<span class="meta-nav">&larr;</span> Previous', 'raakbookoo' ) . '</span>', 'nxtlabel' => '<span class="next">' . __( 'Next &rarr;', 'raakbookoo' ) . '</span>' ) ) ) : ?>

	<div class="loop-nav">
		<?php echo $nav; ?>
	</div><!-- .loop-nav -->

<?php endif; ?>