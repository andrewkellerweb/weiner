<?php
/**
 * Register the 'photo' post type
 * 
 * @package TokokooExtensions
 * @version 1.0
 * @author Tokokooo
 * @copyright Copyright (c) 2013, Tokokoo
 * @license license.txt
 */

/* Register the 'photo' post type. */
add_action( 'init', 'tokokoo_photo_type' );

/* Loads the functions & taxonomy file. */
add_action( 'init', 'tokokoo_loads_photo_library', 10 );

/* Custom post type icon. */
add_action( 'admin_head', 'tokokoo_photo_icon' );

/* Filter text message. */
add_filter( 'post_updated_messages', 'tokokoo_photo_updated_messages' );

/* Filter the 'enter title here' placeholder. */
add_filter( 'enter_title_here', 'tokokoo_photo_enter_title_here', 10 );

/* Add and remove meta box. */
add_action( 'do_meta_boxes', 'tokokoo_photo_remove_post_template' );

/* Change the some text using gettext filter. */
add_filter( 'gettext', 'tokokoo_change_photo_post_type_text', 10, 2 );

/* Add custom columns to the manage screen. */
add_filter( 'manage_edit-photo_columns', 'tokokoo_photo_custom_columns' );
add_action( 'manage_photo_posts_custom_column', 'tokokoo_photo_custom_columns_content', 10, 3 );
add_filter( 'manage_edit-photo_sortable_columns', 'tokokoo_photo_column_sortable' );

/* Add photo menu item to Admin Bar. */
add_action( 'wp_before_admin_bar_render', 'photo_adminbar' );

/**
 * Register post type
 * 
 * @since 1.0
 */
function tokokoo_photo_type() {

	global $wp_version;

	if ( $wp_version >= 3.8 ) {
		$menu_icon = 'dashicons-format-image';
	} else {
		$menu_icon = trailingslashit( TOKOKOO_EXTENSIONS_ASSETS ) . 'img/portfolio.png';
	}

	$labels = array(
		'name'					=> _x( 'Photo', 'post type general name', 'tokokoo' ),
	    'singular_name'			=> _x( 'Photo', 'post type singular name', 'tokokoo' ),
	    'add_new'				=> _x( 'Add New Photo', 'photo', 'tokokoo' ),
		'add_new_item'			=> __( 'Add New Photo', 'tokokoo' ),
		'edit_item'				=> __( 'Edit Photo', 'tokokoo' ),
		'new_item'				=> __( 'New Photo', 'tokokoo' ),
		'all_items'				=> __( 'All Photos', 'tokokoo' ),
		'view_item'				=> __( 'View Photos', 'tokokoo' ),
		'search_items'			=> __( 'Search Photos', 'tokokoo' ),
		'not_found'				=> __( 'No Photos Found', 'tokokoo' ),
    	'menu_name'				=> __( 'Photo', 'tokokoo' ),
		'parent_item_colon'		=> '',
	);

	$args = array(	
		'labels'				=> apply_filters( 'tokokoo_photo_labels', $labels ),
		'public'				=> true,
		'exclude_from_search'	=> false,
		'publicly_queryable'	=> true,
		'show_ui'				=> true,
		'show_in_menu'			=> true,
		'capability_type'		=> 'post',
		'rewrite'				=> apply_filters( 'tokokoo_photo_slug', array( 'slug' => 'photo', 'with_front' => false ) ),
		'query_var'				=> true,
		'menu_icon'				=> $menu_icon,
		'menu_position'			=> 51,
		'supports'				=> array( 'title', 'editor', 'thumbnail', 'revisions', 'page-attributes' )
	);

	register_post_type( 'photo', apply_filters( 'tokokoo_photo_arguments', $args ) );

}

/**
 * Loads the functions & taxonomy file.
 * 
 * @since 1.0
 */
function tokokoo_loads_photo_library() {

	/* Load the photo taxonomy file. */
	require_once( trailingslashit( TOKOKOO_EXTENSIONS_INCLUDES ) . 'photo-type/photo-tax.php' );

	require_once( trailingslashit( TOKOKOO_EXTENSIONS_INCLUDES ) . 'photo-type/photo-functions.php' );

}

/**
 * Displays the custom post type icon in the dashboard
 *
 * @since 1.0
 */
function tokokoo_photo_icon() { 
	
	global $wp_version;
	
	if ( ! $wp_version >= 3.8 ) : ?>
    
	<style type="text/css" media="screen">

    	/* Admin Menu - 16px */
        #menu-posts-photo .wp-menu-image {
            background: url('<?php echo trailingslashit( TOKOKOO_EXTENSIONS_ASSETS ) . 'img/portfolio.png'; ?>') no-repeat 7px 7px !important;
        }
		/* Post Screen - 32px */
        .icon32-posts-photo {
        	background: url('<?php echo trailingslashit( TOKOKOO_EXTENSIONS_ASSETS ) . 'img/portfolio32.png'; ?>') no-repeat left 3px !important;
        }

        @media
        only screen and (-webkit-min-device-pixel-ratio: 1.5),
        only screen and (   min--moz-device-pixel-ratio: 1.5),
        only screen and (     -o-min-device-pixel-ratio: 3/2),
        only screen and (        min-device-pixel-ratio: 1.5),
        only screen and (        		 min-resolution: 1.5dppx) {
        	
        	/* Admin Menu - 16px @2x */
        	#menu-posts-photo .wp-menu-image {
        		background-image: url('<?php echo trailingslashit( TOKOKOO_EXTENSIONS_ASSETS ) . 'img/portfolio_2x.png'; ?>') !important;
        		-webkit-background-size: 16px 48px;
        		-moz-background-size: 16px 48px;
        		background-size: 16px 48px;
        	}
        	/* Post Screen - 32px @2x */
        	.icon32-posts-photo {
        		background-image: url('<?php echo trailingslashit( TOKOKOO_EXTENSIONS_ASSETS ) . 'img/portfolio32_2x.png'; ?>') !important;
        		-webkit-background-size: 32px 32px;
        		-moz-background-size: 32px 32px;
        		background-size: 32px 32px;
        	}

        }

    </style>

<?php endif;
}

/**
 * Add filter to ensure the text photo is displayed when user updates a photo.
 * 
 * @since 1.0
 */
function tokokoo_photo_updated_messages( $messages ) {

	global $post, $post_ID;

	$messages['photo'] = array(
		0 => '',
		1 => sprintf( __( 'photo updated. <a href="%s">View photo</a>', 'tokokoo' ), esc_url( get_permalink($post_ID) ) ),
		2 => __( 'Custom field updated.', 'tokokoo' ),
		3 => __( 'Custom field deleted.', 'tokokoo' ),
		4 => __( 'photo updated.', 'tokokoo' ),
		5 => isset( $_GET['revision'] ) ? sprintf( __( 'photo restored to revision from %s', 'tokokoo' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __( 'photo published. <a href="%s">View photo</a>', 'tokokoo' ), esc_url( get_permalink($post_ID) ) ),
		7 => __( 'photo saved.', 'tokokoo' ),
		8 => sprintf( __( 'photo submitted. <a target="_blank" href="%s">Preview photo</a>', 'tokokoo' ), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
		9 => sprintf( __( 'photo scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview photo</a>', 'tokokoo' ),
		  // translators: Publish box date format, see http://php.net/date
		  date_i18n( __( 'M j, Y @ G:i', 'tokokoo' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
		10 => sprintf( __( 'photo draft updated. <a target="_blank" href="%s">Preview photo</a>', 'tokokoo' ), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	);

	return $messages;
}

/**
 * Filter the 'enter title here' placeholder.
 *
 * @since 1.0
 */
function tokokoo_photo_enter_title_here( $title ) {
	if ( get_post_type() == 'photo' ) {
		$title = __( 'Enter project title here', 'tokokoo' );
	}
	
	return $title;
}

/**
 * Remove post template meta box.
 *
 * @since 1.0
 */
function tokokoo_photo_remove_post_template() {
	if ( current_theme_supports( 'hybrid-core-template-hierarchy' ) )
		remove_meta_box( 'hybrid-core-post-template', 'photo', 'side' );
}

/**
 * Change the some text using gettext filter.
 *
 * @since 1.0
 */
function tokokoo_change_photo_post_type_text( $translation, $text ) {

	if ( get_post_type() == 'photo' ) {

		if ( $text == 'Publish' )
		    return __( 'Publish Photo', 'tokokoo' );

		if ( $text == 'Attributes' )
		    return __( 'Photo Order', 'tokokoo' );

		if ( $text == 'Featured Image' )
		    return __( 'Cover', 'tokokoo' );

		if ( $text == 'Set featured image' )
		    return __( 'Click here to set the project cover', 'tokokoo' );

		if ( $text == 'Remove featured image' )
		    return __( 'Click here to remove the project cover', 'tokokoo' );

	}

	return $translation;
}

/**
 * Add custom columns to the manage taxonomy screen.
 * 
 * @since 1.0
 */
function tokokoo_photo_custom_columns( $columns ) {

	$columns = array(
		'cb'						=> '<input type="checkbox" />',
        'title'						=> __( 'Photo Title', 'tokokoo' ),
        'photo_cover'			=> __( 'Cover', 'tokokoo' ),
        'taxonomy-photo_cat'	=> __( 'Photo Category', 'tokokoo' ),
        'taxonomy-role'				=> __( 'Roles', 'tokokoo' ),
        'photo_order'			=> __( 'Order', 'tokokoo' ),
        'date'						=> __( 'Date', 'tokokoo' ),
    );

	return $columns;
	
}

/**
 * Display the data to the columns.
 * 
 * @since 1.0
 */
function tokokoo_photo_custom_columns_content( $column, $post_id ) {
	global $post;

	switch( $column ) {

		case 'photo_cover' :

			$img = tokokoo_photo_column_image( $post_id );

			if ( $img ) 
				echo '<img src="' . esc_url( $img ) . '" />';
			else 
				echo __( 'No Cover', 'tokokoo' );

			break;

		case 'photo_order':

		    $order = $post->menu_order;
		    echo $order;

		    break;

		/* Just break out of the switch statement for everything else. */
		default :
			break;

	}

}

/**
 * Make column sortable.
 * 
 * @since 1.0
 */
function tokokoo_photo_column_sortable( $columns ) {

	$columns['taxonomy-photo_cat'] = 'taxonomy-photo_cat';
	$columns['photo_order'] = 'photo_order';
	return $columns;

}

/**
 * Get the featured image.
 * 
 * @since 1.0
 */
function tokokoo_photo_column_image( $post_id ) {

	$post_thumbnail_id = get_post_thumbnail_id( $post_id );

	if ( $post_thumbnail_id ) {
		$post_thumbnail_img = wp_get_attachment_image_src( $post_thumbnail_id, 'small' );
		return $post_thumbnail_img[0];
	}

}

/**
 * Add photo menu item to Admin Bar.
 *
 * @since 1.0
 */
function photo_adminbar() {

	global $wp_admin_bar;

	$wp_admin_bar->add_menu( array(
		'parent' => 'appearance',
		'id' => 'photo_post_type',
		'title' => __( 'photo', 'tokokoo' ),
		'href' => admin_url( 'edit.php?post_type=photo' )
	));
	
}
?>