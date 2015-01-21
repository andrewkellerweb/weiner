<?php
/**
 * Register the 'Features' post type
 * 
 * @package TokokooExtensions
 * @version 1.0
 * @author Tokokooo
 * @copyright Copyright (c) 2013, Tokokoo
 * @license license.txt
 */

/* Register the 'Features' post type. */
add_action( 'init', 'tokokoo_features_type' );

/* Custom post type icon. */
add_action( 'admin_head', 'tokokoo_features_icon' );

/* Filter text message. */
add_filter( 'post_updated_messages', 'tokokoo_features_updated_messages' );

/* Filter the 'enter title here' placeholder. */
add_filter( 'enter_title_here', 'tokokoo_features_enter_title_here', 10 );

/* Add and remove meta box. */
add_action( 'do_meta_boxes', 'tokokoo_features_remove_post_template' );

/* Change the some text using gettext filter. */
add_filter( 'gettext', 'tokokoo_change_features_post_type_text', 10, 2 );

/* Add custom columns to the manage screen. */
add_action( 'manage_features_posts_custom_column', 'tokokoo_features_columns_content', 10, 2 );
add_filter( 'manage_edit-features_sortable_columns', 'tokokoo_sortable_columns_features', 10, 2 );
add_action( 'load-edit.php', 'tokokoo_features_load', 10, 2 );

/* Add features menu item to Admin Bar. */
add_action( 'wp_before_admin_bar_render', 'features_adminbar' );

/**
 * Register post type
 * 
 * @since 1.0
 */
function tokokoo_features_type() {

	global $wp_version;

	if ( $wp_version >= 3.8 ) {
		$menu_icon = 'dashicons-star-filled';
	} else {
		$menu_icon = trailingslashit( TOKOKOO_EXTENSIONS_ASSETS ) . 'img/features.png';
	}

	$labels = array(
		'name'					=> _x( 'Features', 'post type general name', 'tokokoo' ),
		'singular_name'			=> _x( 'Features', 'post type singular name', 'tokokoo' ),
		'add_new'				=> _x( 'Add New Features', 'Features', 'tokokoo' ),
		'add_new_item'			=> __( 'Add New Features', 'tokokoo' ),
		'edit_item'				=> __( 'Edit Features', 'tokokoo' ),
		'new_item'				=> __( 'New Features', 'tokokoo' ),
		'all_items'				=> __( 'All Featuress', 'tokokoo' ),
		'view_item'				=> __( 'View Featuress', 'tokokoo' ),
		'search_items'			=> __( 'Search Featuress', 'tokokoo' ),
		'not_found'				=> __( 'No Featuress Found', 'tokokoo' ),
		'menu_name'				=> __( 'Features', 'tokokoo' ),
		'parent_item_colon'		=> '',
	);

	$args = array(	
		'labels'				=> apply_filters( 'tokokoo_features_labels', $labels ),
		'public'				=> true,
		'exclude_from_search'	=> false,
		'publicly_queryable'	=> true,
		'show_ui'				=> true,
		'show_in_menu'			=> true,
		'capability_type'		=> 'post',
		'rewrite'				=> apply_filters( 'tokokoo_features_slug', array( 'slug' => 'features', 'with_front' => false ) ),
		'query_var'				=> true,
		'menu_icon'				=> $menu_icon,
		'menu_position'			=> 51,
		'supports'				=> array( 'title', 'excerpt', 'thumbnail', 'page-attributes' )
	);

	register_post_type( 'features', apply_filters( 'tokokoo_features_arguments', $args ) );

}

/**
 * Displays the custom post type icon in the dashboard
 *
 * @since 1.0
 */
function tokokoo_features_icon() { 
	
	global $wp_version;
	
	if ( ! $wp_version >= 3.8 ) : ?>
	
	<style type="text/css" media="screen">

		/* Admin Menu - 16px */
		#menu-posts-features .wp-menu-image {
			background: url('<?php echo trailingslashit( TOKOKOO_EXTENSIONS_ASSETS ) . 'img/features.png'; ?>') no-repeat 7px 7px !important;
		}
		/* Post Screen - 32px */
		.icon32-posts-features {
			background: url('<?php echo trailingslashit( TOKOKOO_EXTENSIONS_ASSETS ) . 'img/features-screen.png'; ?>') no-repeat left 3px !important;
		}

	</style>

<?php endif;
}

/**
 * Add filter to ensure the text features is displayed when user updates a features.
 * 
 * @since 1.0
 */
function tokokoo_features_updated_messages( $messages ) {

	global $post, $post_ID;

	$messages['features'] = array(
		0 => '',
		1 => sprintf( __( 'Features updated. <a href="%s">View Features</a>', 'tokokoo' ), esc_url( get_permalink($post_ID) ) ),
		2 => __( 'Custom field updated.', 'tokokoo' ),
		3 => __( 'Custom field deleted.', 'tokokoo' ),
		4 => __( 'Features updated.', 'tokokoo' ),
		5 => isset( $_GET['revision'] ) ? sprintf( __( 'Features restored to revision from %s', 'tokokoo' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __( 'Features published. <a href="%s">View Features</a>', 'tokokoo' ), esc_url( get_permalink($post_ID) ) ),
		7 => __( 'Features saved.', 'tokokoo' ),
		8 => sprintf( __( 'Features submitted. <a target="_blank" href="%s">Preview Features</a>', 'tokokoo' ), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
		9 => sprintf( __( 'Features scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Features</a>', 'tokokoo' ),
		  // translators: Publish box date format, see http://php.net/date
		  date_i18n( __( 'M j, Y @ G:i', 'tokokoo' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
		10 => sprintf( __( 'Features draft updated. <a target="_blank" href="%s">Preview Features</a>', 'tokokoo' ), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	);

	return $messages;
}

/**
 * Filter the 'enter title here' placeholder.
 *
 * @since 1.0
 */
function tokokoo_features_enter_title_here( $title ) {
	if ( get_post_type() == 'features' ) {
		$title = __( 'Enter Features title here', 'tokokoo' );
	}
	
	return $title;
}

/**
 * Remove post template meta box.
 *
 * @since 1.0
 */
function tokokoo_features_remove_post_template() {
	if ( current_theme_supports( 'hybrid-core-template-hierarchy' ) )
		remove_meta_box( 'hybrid-core-post-template', 'features', 'side' );
}

/**
 * Change the some text using gettext filter.
 *
 * @since 1.0
 */
function tokokoo_change_features_post_type_text( $translation, $text ) {

	if ( get_post_type() == 'features' ) {

		if ( $text == 'Publish' )
			return __( 'Publish Features', 'tokokoo' );

		if ( $text == 'Attributes' )
			return __( 'Features Order', 'tokokoo' );

		if ( $text == 'Featured Image' )
			return __( 'Image', 'tokokoo' );

		if ( $text == 'Set featured image' )
			return __( 'Click here to set the Features image', 'tokokoo' );

		if ( $text == 'Remove featured image' )
			return __( 'Click here to remove the Features image', 'tokokoo' );

	}

	return $translation;
}

/**
 * Add custom column to the manage screen.
 * 
 * @since 1.3
 */
add_filter( 'manage_edit-features_columns', 'features_columns' ) ;
function features_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Feature Title', 'tokokoo' ),
		'featured_img' => __( 'Featured Image', 'tokokoo' ),
		'feature_target' => __( 'Target', 'tokokoo' ),
		'feature_url' => __( 'URL', 'tokokoo' ),
		'feature_order' => __( 'Order', 'tokokoo' ),
		'date' => __( 'Date', 'tokokoo' ),
	);

	return $columns;
	
}

/**
 * Display the data to the columns.
 * 
 * @since 1.3
 */
function tokokoo_features_columns_content( $column, $post_id ) {

	global $post;

	switch( $column ) {

		case 'featured_img' :

			$featured_image = tokokoo_features_image( $post_id );

			if ( $featured_image ) {

				echo '<img src="' . esc_url( $featured_image ) . '" />';

			} else {

				echo __( 'No Image', 'tokokoo' );

			} 

			break;

		case 'feature_target' :

			$target = get_post_meta( $post_id, '_features_target', true );

			echo $target;

			break;

		case 'feature_url' :

			$url = get_post_meta( $post_id, '_features_url', true );

			if ( empty( $url ) ) {

				echo __( 'No URL', 'tokokoo' );

			} else {

				echo esc_url( $url );

			}

			break;

		case 'feature_order':

		    $order = $post->menu_order;
		    echo $order;

		    break;

		/* Just break out of the switch statement for everything else. */
		default :
			break;

	}

}

/**
 * Get the featured image.
 * 
 * @since 1.3
 */
function tokokoo_features_image( $post_id ) {

	$post_thumbnail_id = get_post_thumbnail_id( $post_id );

	if ( $post_thumbnail_id ) {
		$post_thumbnail_img = wp_get_attachment_image_src( $post_thumbnail_id, 'small' );
		return $post_thumbnail_img[0];
	}

}

/**
 * Assign sortable columns to the 'features' column.
 * 
 * @since 1.3
 */
function tokokoo_sortable_columns_features( $columns ) {

	$columns['feature_target'] = 'feature_target';

	return $columns;

}

/**
 * Features Load
 * 
 * @since 1.3
 */
function tokokoo_features_load() {
	add_filter( 'request', 'tokokoo_sortable_feature_target' );
}

/**
 * Features Target
 * 
 * @since 1.3
 */
function tokokoo_sortable_feature_target( $vars ) {

	if ( isset( $vars['post_type'] ) && 'features' == $vars['post_type'] ) {

		if ( isset( $vars['orderby'] ) && 'feature_target' == $vars['orderby'] ) {

			$vars = array_merge(
				$vars,
				array(
					'meta_key' => '_feature_target',
					'orderby' => 'meta_value'
				)
			);

		}
	}

	return $vars;
}

/**
 * Add features menu item to Admin Bar.
 *
 * @since 1.0
 */
function features_adminbar() {

	global $wp_admin_bar;

	$wp_admin_bar->add_menu( array(
		'parent' => 'appearance',
		'id' => 'features_post_type',
		'title' => __( 'Features', 'tokokoo' ),
		'href' => admin_url( 'edit.php?post_type=features' )
	));
	
}
