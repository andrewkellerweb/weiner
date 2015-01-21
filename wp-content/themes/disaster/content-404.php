<article id="post-0" class="<?php hybrid_entry_class('blogpost'); ?>">

	<div class="entry-wrapper">	

		<header class="entry-header">
			<span class="category"><?php _e( '404 Not Found', 'raakbookoo' ); ?></span>
			<h1 class="post-title entry-title"><?php esc_html_e( 'Oops! That page can\'t be found.', 'raakbookoo' ); ?></h1>
		</header><!-- .entry-header -->

		<div class="entry-content">

			<div class="entry-summary">
			
				<p><?php esc_html_e( 'The following is a list of the latest posts from the blog. Maybe it will help you find what you\'re looking for.', 'raakbookoo' ); ?></p>

				<ul>
					<?php wp_get_archives( array( 'limit' => 10, 'type' => 'postbypost' ) ); ?>
				</ul>

			</div><!-- .entry-summary -->

		</div><!-- .entry-content -->

	</div><!-- .entry-wrapper -->

</article><!-- #post-->