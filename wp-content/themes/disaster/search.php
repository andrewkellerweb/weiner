<?php
	// Loads the header.php template.
	get_header(); 
?>
	
	<?php tokokoo_wrapper_start(); ?>

		<div class="blog-page <?php tokokoo_blog_class(); ?>">
			
			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'search' ); ?>

				<?php endwhile; ?>

			<?php else : ?>

				<?php 
					// Loads the no-results.php template.
					get_template_part( 'no-results' ); 
				?>

			<?php endif; ?>
			
		</div>
		
	</div><!-- #content .site-content -->
		
	<?php 
		// Loads the loop-nav.php template.
		get_template_part( 'loop', 'nav' ); 
	?>
		
	</section><!-- #primary .content-area .has-sidebar -->

	<?php get_sidebar( 'primary' ); ?>
 
<?php 
	// Loads the footer.php template.
	get_footer(); 
?>