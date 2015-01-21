<?php 
/*
* Event Manager Post Type
*/
add_action( 'init', 'tokokoo_event_type', 15 );

/* Custom post type style. */
add_action( 'admin_head', 'tokokoo_event_button_style' );

/* Filter text message. */
add_filter( 'post_updated_messages', 'tokokoo_event_updated_messages' );

/* Filter the 'enter title here' placeholder. */
add_filter( 'enter_title_here', 'tokokoo_event_enter_title_here', 10 );

/* Change the some text using gettext filter. */
add_filter( 'gettext', 'tokokoo_change_event_post_type_text', 10, 2 );

/* Add custom columns to the manage screen. */
add_filter( 'manage_edit-event_columns', 'tokokoo_event_custom_columns' );
add_action( 'manage_event_posts_custom_column', 'tokokoo_event_custom_columns_content', 10, 3 );

/* Load the admin files. */
add_action( 'admin_head', 'tokokoo_event_icon' );


/**
 * Register post type
 * 
 * @since 1.0
 */
function tokokoo_event_type() {

    global $wp_version;

    if ( $wp_version >= 3.8 ) {
        $menu_icon = 'dashicons-calendar';
    } else {
        $menu_icon = trailingslashit( TOKOKOO_EXTENSIONS_ASSETS ) . 'img/event16.png';
    }

    $labels = array(
        'name'                  => _x( 'Event', 'post type general name', 'tokokoo' ),
        'singular_name'         => _x( 'Event', 'post type singular name', 'tokokoo' ),
        'add_new'               => _x( 'Add New Event', 'Event', 'tokokoo' ),
        'add_new_item'          => __( 'Add New Event', 'tokokoo' ),
        'edit_item'             => __( 'Edit Event', 'tokokoo' ),
        'new_item'              => __( 'New Event', 'tokokoo' ),
        'all_items'             => __( 'All Events', 'tokokoo' ),
        'view_item'             => __( 'View Events', 'tokokoo' ),
        'search_items'          => __( 'Search Events', 'tokokoo' ),
        'not_found'             => __( 'No Events Found', 'tokokoo' ),
        'menu_name'             => __( 'Event', 'tokokoo' ),
        'parent_item_colon'     => '',
    );

    $args = array(  
        'labels'                => apply_filters( 'tokokoo_event_labels', $labels ),
        'public'                => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'capability_type'       => 'post',
        'rewrite'               => apply_filters( 'tokokoo_event_slug', array( 'slug' => 'event', 'with_front' => false ) ),
        'query_var'             => true,
        'menu_icon'             => $menu_icon,
        'menu_position'         => 51,
        'supports'              => array( 'title', 'thumbnail' )
    );

    register_post_type( 'event', apply_filters( 'tokokoo_event_arguments', $args ) );

}
	 

/* Remove theme layout metaboxe. */
add_action( 'add_meta_boxes', 'event_remove_layout_metabox', 11 );
function event_remove_layout_metabox() {
	remove_meta_box( 'theme-layouts-post-meta-box', 'event', 'side' );
}

add_action( 'admin_menu', 'event_remove_meta_boxes' );
function event_remove_meta_boxes() {
    remove_meta_box( 'locationdiv', 'event', 'side');
    remove_meta_box( 'venuediv', 'event', 'side');
}

/**
 * Add filter to ensure the text event is displayed when user updates a event.
 * 
 * @since 1.0
 */
function tokokoo_event_updated_messages( $messages ) {

    global $post, $post_ID;

    $messages['event'] = array(
        0 => '',
        1 => sprintf( __( 'Event updated. <a href="%s">View Event</a>', 'tokokoo' ), esc_url( get_permalink($post_ID) ) ),
        2 => __( 'Custom field updated.', 'tokokoo' ),
        3 => __( 'Custom field deleted.', 'tokokoo' ),
        4 => __( 'Event updated.', 'tokokoo' ),
        5 => isset( $_GET['revision'] ) ? sprintf( __( 'Event restored to revision from %s', 'tokokoo' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        6 => sprintf( __( 'Event published. <a href="%s">View Event</a>', 'tokokoo' ), esc_url( get_permalink($post_ID) ) ),
        7 => __( 'Event saved.', 'tokokoo' ),
        8 => sprintf( __( 'Event submitted. <a target="_blank" href="%s">Preview Event</a>', 'tokokoo' ), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
        9 => sprintf( __( 'Event scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Event</a>', 'tokokoo' ),
          // translators: Publish box date format, see http://php.net/date
          date_i18n( __( 'M j, Y @ G:i', 'tokokoo' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
        10 => sprintf( __( 'Event draft updated. <a target="_blank" href="%s">Preview Event</a>', 'tokokoo' ), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    );

    return $messages;
}

/**
 * Filter the 'enter title here' placeholder.
 *
 * @since 1.0
 */
function tokokoo_event_enter_title_here( $title ) {
    if ( get_post_type() == 'event' ) {
        $title = __( 'Enter Event title here', 'tokokoo' );
    }
    
    return $title;
}

/**
 * Change the some text using gettext filter.
 *
 * @since 1.0
 */
function tokokoo_change_event_post_type_text( $translation, $text ) {

    if ( get_post_type() == 'event' ) {

        if ( $text == 'Publish' )
            return __( 'Publish Event', 'tokokoo' );

        if ( $text == 'Attributes' )
            return __( 'Event Order', 'tokokoo' );

        if ( $text == 'Event Image' )
            return __( 'Image', 'tokokoo' );

        if ( $text == 'Set featured image' )
            return __( 'Click here to set the Event image', 'tokokoo' );

        if ( $text == 'Remove featured image' )
            return __( 'Click here to remove the Event image', 'tokokoo' );

    }

    return $translation;
}

/**
 * Add custom columns to the manage taxonomy screen.
 * 
 * @since 1.0
 */
function tokokoo_event_custom_columns( $columns ) {

    $columns = array(
        'cb'                        => '<input type="checkbox" />',
        'title'                     => __( 'Event Title', 'tokokoo' ),
        'event_image'               => __( 'Event Image', 'tokokoo' ),
        'event_venue'               => __( 'Venue', 'tokokoo' ),
        'event_date'                => __( 'Event Date', 'tokokoo' ),
        'ticket_status'             => __( 'Ticket Status', 'tokokoo' ),
        'date'                      => __( 'Date', 'tokokoo' ),
    );

    return $columns;
    
}

/**
 * Display the data to the columns.
 * 
 * @since 1.0
 */
function tokokoo_event_custom_columns_content( $column, $post_id ) {
    global $post;

    switch( $column ) {

        case 'event_image' :

            $img = tokokoo_event_column_image( $post_id );

            if ( $img ) 
                echo '<img src="' . esc_url( $img ) . '" />';
            else 
                echo __( 'No Image', 'tokokoo' );

            break;

        case 'event_venue' :

            $venue = get_post_meta( $post_id, '_event_venue', true );

            if ( $venue ) {
            
                echo $venue;
                
            } else {

                echo __( 'Not Available', 'tokokoo' );
            }

            break; 

        case 'event_date' :

            $event_date = get_post_meta( $post_id, '_event_date', true );

            if ( $event_date ) {
            
                echo date( 'd M Y', strtotime( $event_date ) );
                
            } else {

                echo __( 'Not Available', 'tokokoo' );
            }

            break;

        case 'ticket_status' :

            $ticket_status = get_post_meta( $post_id, '_event_ticket_status', true );

            if ( 'Available' == $ticket_status ) {
            
                echo '<span class="tk-ev-button tk-available">'. __( 'Available', 'tokokoo' ) . '</span>';
                
            } else if ( 'Sold Out' == $ticket_status ) {

                echo '<span class="tk-ev-button tk-soldout">'. __( 'Sold Out', 'tokokoo' ) . '</span>';
            
            } else {

                echo '<span class="tk-na"> - </span>';
            }

            break;


        /* Just break out of the switch statement for everything else. */
        default :
            break;

    }

}

/**
 * Get the featured image.
 * 
 * @since 1.0
 */
function tokokoo_event_column_image( $post_id ) {

    $post_thumbnail_id = get_post_thumbnail_id( $post_id );

    if ( $post_thumbnail_id ) {
        $post_thumbnail_img = wp_get_attachment_image_src( $post_thumbnail_id, 'small' );
        return $post_thumbnail_img[0];
    }

}

/**
 * Add Event menu item to Admin Bar.
 *
 * @since 1.0
 */
function Event_adminbar() {

    global $wp_admin_bar;

    $wp_admin_bar->add_menu( array(
        'parent' => 'appearance',
        'id' => 'event_post_type',
        'title' => __( 'Event', 'tokokoo' ),
        'href' => admin_url( 'edit.php?post_type=event' )
    ));
    
}

/**
 * Displays the custom post type icon in the dashboard
 */
function tokokoo_event_icon() { 
    
    global $wp_version;

    if ( ! $wp_version >= 3.8 ) : ?>

    <style type="text/css" media="screen">
        #menu-posts-event .wp-menu-image {
            background: url(<?php echo trailingslashit(TOKOKOO_EXTENSIONS_ASSETS); ?>img/event16.png) no-repeat 6px 6px !important;
        }
        
        #icon-edit.icon32-posts-event {background: url(<?php echo trailingslashit(TOKOKOO_EXTENSIONS_ASSETS); ?>img/event32.png) no-repeat;}
    </style>

    <?php endif;
}

/**
 * Custom Style
 *
 * @since 1.0
 */
function tokokoo_event_button_style() { 
    ?>
    
    <style type="text/css" media="screen">

        .tk-ev-button {
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: normal;
            line-height: 1.428571429;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 4px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            -o-user-select: none;
            user-select: none;
            vertical-align: middle;
        }

        .tk-available {
            color: #fff;
            background-color: #5cb85c;
            border-color: #4cae4c;
        }

        .tk-soldout {
            color: #fff;
            background-color: #d9534f;
            border-color: #d43f3a;
        }

        .tk-na {
            font-size: 20px;
            display: block;
            margin-left: 20%;
            margin-top: 10%;
        }

    </style>

<?php }

    
