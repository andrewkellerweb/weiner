<div class="container">

	<?php if ( current_theme_supports( 'breadcrumb-trail' ) ) breadcrumb_trail( array( 'show_browse' => 'false', 'show_on_front' => false )); ?>

	<?php if ( is_home() && !is_front_page() ) : ?>

		<h1 class="page-title"><?php echo get_post_field( 'post_title', get_queried_object_id() ); ?></h1>

	<?php elseif ( is_singular( 'post' ) ) : ?>

		<h2 class="page-title"><?php _e( 'Blog', 'raakbookoo' ); ?></h2>

	<?php elseif ( is_attachment() ) : ?>

		<h2 class="page-title"><?php _e( 'Attachment', 'raakbookoo' ); ?></h2>

	<?php elseif ( is_page() && ! is_front_page() ) : ?>
		
		<h2 class="page-title"><?php echo get_post_field( 'post_title', get_queried_object_id() ); ?></h2>

	<?php elseif ( is_category() ) : ?>

		<h1 class="page-title"><?php single_cat_title(); ?></h1>

	<?php elseif ( is_tag() ) : ?>

		<h1 class="page-title"><?php single_tag_title(); ?></h1>

	<?php elseif ( is_tax() ) : ?>

		<h1 class="page-title"><?php single_term_title(); ?></h1>

	<?php elseif ( is_author() ) : ?>

		<?php $user_id = get_query_var( 'author' ); ?>

		<div id="hcard-<?php echo esc_attr( get_the_author_meta( 'user_nicename', $user_id ) ); ?>" class="loop-meta vcard">

			<h1 class="page-title fn n"><?php the_author_meta( 'display_name', $user_id ); ?></h1>

		</div><!-- .loop-meta -->

	<?php elseif ( is_search() ) : ?>

		<h1 class="page-title"><?php printf( __( 'You are browsing the search results for "%s"', 'raakbookoo' ), esc_attr( get_search_query() ) ); ?></h1>

	<?php elseif ( is_date() ) : ?>

		<h1 class="page-title"><?php _e( 'Archives by date', 'raakbookoo' ); ?></h1>

	<?php elseif ( is_post_type_archive() ) : ?>

		<h1 class="page-title"><?php post_type_archive_title(); ?></h1>

	<?php elseif ( is_archive() ) : ?>

		<h1 class="page-title"><?php _e( 'Archives', 'raakbookoo' ); ?></h1>

	<?php elseif ( is_singular( 'portfolio' ) ) : ?>

		<?php $post_type = get_post_type_object( get_query_var( 'post_type' ) ); ?>

		<h2 class="page-title"><?php echo $post_type->label; ?></h2>

	<?php elseif ( class_exists( 'woocommerce' ) ) : 

		if( is_shop() || is_singular( 'product' ) ) : ?>		
			<h2 class="page-title"><?php woocommerce_page_title(); ?></h2>
		<?php endif; ?>

	<?php endif; ?>

</div><!-- .container -->