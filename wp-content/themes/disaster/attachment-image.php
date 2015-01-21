<?php
	// Loads the header.php template.
	get_header(); 
?>

	<div class="content-area" id="primary">

		<div class="site-content" id="content">

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

						<div class="entry-container">

							<header class="entry-header">
								<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' );  ?>
							</header><!-- .entry-header -->

							<div class="entry-content">

								<?php if ( has_excerpt() ) {
									$src = wp_get_attachment_image_src( get_the_ID(), 'full' );
									echo do_shortcode( sprintf( '[caption align="aligncenter" width="%1$s"]%3$s %2$s[/caption]', esc_attr( $src[1] ), get_the_excerpt(), wp_get_attachment_image( get_the_ID(), 'full', false ) ) );
								} else {
									echo wp_get_attachment_image( get_the_ID(), 'full', false, array( 'class' => 'aligncenter' ) );
								} ?>

								<?php the_content(); ?>
								<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'raakbookoo' ), 'after' => '</p>' ) ); ?>

							</div><!-- .entry-content -->

						</div><!-- .entry-container -->

					</article><!-- .hentry -->

					<div class="attachment-meta">

						<?php $gallery = gallery_shortcode( array( 'columns' => 4, 'numberposts' => 8, 'id' => $post->post_parent, 'exclude' => get_the_ID() ) ); ?>

						<?php if ( ! empty( $gallery ) ) { ?>
							<div class="image-gallery">
								<h3><?php _e( 'Gallery', 'raakbookoo' ); ?></h3>
								<?php echo $gallery; ?>
							</div>
						<?php } ?>

					</div><!-- .attachment-meta -->

					<?php 
						// Loads the comments.php template.
						if ( of_get_option( 'tokokoo_comment_form', 1 ) && comments_open() ) comments_template( '/comments.php', true ); 
					?>

				<?php endwhile; ?>

			<?php elseif ( current_user_can( 'edit_posts' ) ) : ?>

				<?php get_template_part( 'no-results' ); ?>

			<?php endif; ?>

		</div><!-- #content .site-content -->

	</div><!-- #primary .content-area .has-sidebar -->

<?php 
	// Loads the footer.php template.
	get_footer(); 
?>