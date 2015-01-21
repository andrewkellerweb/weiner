
<?php
	// Loads the header.php template.
	get_header(); 
?>
 		
	<?php tokokoo_wrapper_start(); ?>

		<div class="blog-page <?php tokokoo_blog_class(); ?>">

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>
					
					<?php hybrid_get_content_template(); ?>
					
					<?php if ( is_singular() ) { ?>
						<?php 
							// Loads the comments.php template.
							if ( of_get_option( 'tokokoo_comment_form', 1 ) && comments_open() ) comments_template( '/comments.php', true ); 
						?>
					<?php } ?>

				<?php endwhile; ?>

			<?php elseif ( current_user_can( 'edit_posts' ) ) : ?>

				<?php get_template_part( 'no-results' ); ?>

			<?php endif; ?>

		</div>
		
	</div><!-- #content .site-content -->
		
	<?php 
		// Loads the loop-nav.php template.
		get_template_part( 'loop', 'nav' ); 
	?>
		
	</section><!-- #primary .content-area .has-sidebar -->

	<?php get_template_part( 'sidebar', 'primary' ); ?>

<?php 
	// Loads the footer.php template.
	get_footer(); 
?>