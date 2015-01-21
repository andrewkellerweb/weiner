<?php @header( 'HTTP/1.1 404 Not found', true, 404 );

// Loads the header.php template.
get_header(); 
?>

	<?php tokokoo_wrapper_start(); ?>

		<div class="blog-page blog-single">

			<?php 
				// Loads the content-404.php template.
				get_template_part( 'content', '404' ); 
			?>

		</div><!-- .blog-page -->

	</div><!-- #content .site-content -->

<?php 
	// Loads the footer.php template.
	get_footer(); 
?>