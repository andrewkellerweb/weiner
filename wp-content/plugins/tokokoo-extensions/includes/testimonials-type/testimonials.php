<?php
/**
 * Register the 'Testimonials' post type
 * 
 * @package TokokooExtensions
 * @version 1.0
 * @author Tokokooo
 * @copyright Copyright (c) 2013, Tokokoo
 * @license license.txt
 */

add_action( 'init', 'tokokoo_testimonials_type' ,20);

/**
 * Register post type
 * 
 * @since 1.0
 */
function tokokoo_testimonials_type() {

	global $wp_version;

	if ( $wp_version >= 3.8 ) {
		$menu_icon = 'dashicons-format-chat';
	} else {
		$menu_icon = trailingslashit( TOKOKOO_EXTENSIONS_ASSETS ) . 'img/testimonials.png';
	}

	$labels = array(
		'name'					=> _x( 'Testimonials', 'post type general name', 'tokokoo' ),
		'singular_name'			=> _x( 'Testimonials', 'post type singular name', 'tokokoo' ),
		'add_new'				=> _x( 'Add New Testimonials', 'Testimonials', 'tokokoo' ),
		'add_new_item'			=> __( 'Add New Testimonials', 'tokokoo' ),
		'edit_item'				=> __( 'Edit Testimonials', 'tokokoo' ),
		'new_item'				=> __( 'New Testimonials', 'tokokoo' ),
		'all_items'				=> __( 'All Testimonials', 'tokokoo' ),
		'view_item'				=> __( 'View Testimonials', 'tokokoo' ),
		'search_items'			=> __( 'Search Testimonials', 'tokokoo' ),
		'not_found'				=> __( 'No Testimonials Found', 'tokokoo' ),
		'menu_name'				=> __( 'Testimonials', 'tokokoo' ),
		'parent_item_colon'		=> '',
	);

	$args = array(	
		'labels'				=> apply_filters( 'tokokoo_testimonials_labels', $labels ),
		'public'				=> true,
		'exclude_from_search'	=> false,
		'publicly_queryable'	=> true,
		'show_ui'				=> true,
		'show_in_menu'			=> true,
		'capability_type'		=> 'post',
		'rewrite'				=> apply_filters( 'tokokoo_testimonials_slug', array( 'slug' => 'testimonials', 'with_front' => false ) ),
		'query_var'				=> true,
		'menu_icon'				=> $menu_icon,
		'menu_position'			=> 51,
		'supports'				=> array( 'title', 'excerpt','thumbnail','page-attributes' )
	);

	register_post_type( 'testimonials', apply_filters( 'tokokoo_testimonials_arguments', $args ) );

}


add_filter( 'post_updated_messages', 'testimonial_updated_messages' );
function testimonial_updated_messages( $messages ) {

	global $post, $post_ID;

	$messages['testimonials'] = array(
		0 => '',
		1 => __( 'Testimonial updated.', 'tokokoo' ),
		2 => __( 'Custom field updated.', 'tokokoo' ),
		3 => __( 'Custom field deleted.', 'tokokoo' ),
		4 => __( 'Testimonial updated.', 'tokokoo' ),
		5 => isset( $_GET['revision'] ) ? sprintf( __( 'Testimonial restored to revision from %s', 'tokokoo' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => __( 'Testimonial published.', 'tokokoo' ),
		7 => __( 'Testimonial saved.', 'tokokoo' ),
		8 => __( 'Testimonial submitted.', 'tokokoo' ),
		9 => sprintf( __( 'Testimonial scheduled for: <strong>%1$s</strong>.', 'tokokoo' ),
		  date_i18n( __( 'M j, Y @ G:i', 'tokokoo' ), strtotime( $post->post_date ) ) ),
		10 => sprintf( __( 'Testimonial draft updated. <a target="_blank" href="%s">Preview Testimonial</a>', 'tokokoo' ), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	);

	return $messages;

}

/**
 * Add custom column to the manage screen.
 * 
 * @since 1.3
 */
add_filter( 'manage_edit-testimonials_columns', 'testimonials_columns' ) ;
function testimonials_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Testimonial Title', 'tokokoo' ),
		'testimonial_img' => __( 'Testimonial Image', 'tokokoo' ),
		'testimonial_url' => __( 'URL', 'tokokoo' ),
		'date' => __( 'Date', 'tokokoo' ),
	);

	return $columns;
	
}

/**
 * Display the data to the columns.
 * 
 * @since 1.3
 */
add_action( 'manage_testimonials_posts_custom_column', 'testimonials_columns_content', 10, 2 );
function testimonials_columns_content( $column, $post_id ) {
	global $post;

	switch( $column ) {

		case 'testimonial_img' :

			$featured_image = testimonials_featured_image( $post_id );

			if ( $featured_image ) 
				echo '<img src="' . esc_url( $featured_image ) . '" />';
			else 
				echo __( 'No Image', 'tokokoo' );

			break;

		case 'testimonial_url' :

			$url = get_post_meta( $post_id, '_testimonials_url', true );

			if ( empty( $url ) )
				echo __( 'No URL', 'tokokoo' );

			else
				echo esc_url( $url );

			break;

		/* Just break out of the switch statement for everything else. */
		default :
			break;

	}

}

/**
 * Get the testimonial image.
 * 
 * @since 1.0
 */
function testimonials_featured_image( $post_id ) {

	$post_thumbnail_id = get_post_thumbnail_id( $post_id );

	if ( $post_thumbnail_id ) {
		$post_thumbnail_img = wp_get_attachment_image_src( $post_thumbnail_id, 'small' );
		return $post_thumbnail_img[0];
	}

}


/**
 * Displays the testimonials post type icon in the dashboard
 */
function testimonials_icon() {

	global $wp_version;
	
	if ( ! $wp_version >= 3.8 ) : ?>

    <style type="text/css" media="screen">
        #menu-posts-testimonials .wp-menu-image {
            background: url('<?php echo trailingslashit( TOKOKOO_EXTENSIONS_ASSETS ) . 'img/testimonials.png'; ?>') no-repeat 6px 6px !important;
        }
    
    	#icon-edit.icon32-posts-testimonials {
    		background: url('<?php echo trailingslashit( TOKOKOO_EXTENSIONS_ASSETS ) . 'img/testimonials-screen.png'; ?>') no-repeat;
    	}
    </style>

<?php endif;
}
  
add_action('admin_head', 'testimonials_icon');
