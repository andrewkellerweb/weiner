<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category Tokokoo Metabox
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */
#InvictusKickfest
add_filter( 'cmb_meta_boxes', 'event_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function event_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_event_';

	$meta_boxes[] = array(
		'id'         => 'event_metabox',
		'title'      => 'Event Details',
		'pages'      => array( 'event', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Location',
				'desc' => 'Event Location',
				'id'   => $prefix . 'location',
				'type'     => 'text_medium',
			),
			array(
				'name' => 'Venue',
				'desc' => 'Event Venue',
				'id'   => $prefix . 'venue',
				'type'     => 'text_medium',
			),
			array(
				'name' => 'Date',
				'desc' => 'Event Date',
				'id'   => $prefix . 'date',
				'type' => 'text_date',
			),
			array(
	            'name' => 'Starting Time',
	            'desc' => 'When this event started',
	            'id'   => $prefix . 'started_time',
	            'type' => 'text_time',
	        ),
	        array(
	            'name' => 'End Time',
	            'desc' => 'When this event End',
	            'id'   => $prefix . 'end_time',
	            'type' => 'text_time',
	        ),
	        array(
				'name'   => 'Price',
				'desc'   => 'Price',
				'id'     => $prefix . 'price',
				'type'   => 'text_money',
			),
	        array(
				'name' => 'Available Ticket',
				'desc' => 'Available Ticket',
				'id'   => $prefix . 'available_ticket',
				'type' => 'text_small',
			),
			array(
				'name'    => 'Ticket Status',
				'desc'    => 'Ticket Status',
				'id'      => $prefix . 'ticket_status',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Select Status ', 'value' => 'none', ),
					array( 'name' => 'Available', 'value' => 'Available', ),
					array( 'name' => 'Sold Out', 'value' => 'Sold Out', ),
				),
			),
			array(
				'name' => 'Buy Link',
				'desc' => 'Link to buy ticket',
				'id'   => $prefix . 'buy_link',
				'type' => 'text',
			),

		)
	);

	$meta_boxes[] = array(
		'id'         => 'event_map',
		'title'      => 'Event Location Map',
		'pages'      => array( 'event', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Latitude',
				'desc' => 'Latitude',
				'id'   => $prefix . 'latitude',
				'type'    => 'text_medium',
			),
			array(
				'name' => 'Longitude',
				'desc' => 'Longitude',
				'id'   => $prefix . 'longitude',
				'type'    => 'text_medium',
			),
			
		)
	);

	$meta_boxes[] = array(
		'id'         => 'event_description',
		'title'      => 'Event Description',
		'pages'      => array( 'event', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Description',
				'desc' => 'Event Description',
				'id'   => $prefix . 'description',
				'type'    => 'wysiwyg',
				'options' => array(	'textarea_rows' => 5, ),
			),
			
		)
	);

	// Add metabox for features post type
	$prefix = '_features_';
	$options_array = array();
	$options_array = apply_filters( 'features_options_target', $options_array);
	$meta_boxes[] = array(
		'id'		=> $prefix.'options',
		'title'		=> __('Options', 'tokokoo'),
		'pages'		=> array( 'features' ),
		'context'	=> 'normal',
		'priority'	=> 'default',
		'show_names'=> true,
		'fields'	=> array(
			array(
				'name' => __( 'Feature target', 'tokokoo' ),
				'id' => $prefix.'target',
				'desc' => __( 'Select your target page you want to display this feature', 'tokokoo' ),
				'type' => 'select',
				'options' => $options_array
			),
			array(
				'name' => __( 'Feature Link', 'tokokoo' ),
				'id' => $prefix.'url',
				'std' => 'http://',
				'desc' => __( 'Link target for the feature.', 'tokokoo' ),
				'type' => 'text'
			),

		)
	);

	// Add metabox for features post type
	$prefix = '_testimonials_';
	$meta_boxes[] = array(
		'id'		=> $prefix.'options',
		'title'		=> __('Options', 'tokokoo'),
		'pages'		=> array( 'testimonials' ),
		'context'	=> 'normal',
		'priority'	=> 'default',
		'show_names'=> true,
		'fields'	=> array(
			
			array(
				'name' => __( 'Testimonials Link', 'tokokoo' ),
				'id' => $prefix.'url',
				'std' => 'http://',
				'desc' => __( 'Link target for the testimonials.', 'tokokoo' ),
				'type' => 'text'
			),

			array(
				'name' => __( 'Position', 'tokokoo' ),
				'id' => $prefix.'position',
				'std' => 'CEO of example.com',
				'desc' => __( 'The position of user ', 'tokokoo' ),
				'type' => 'text'
			),

		)
	);
	
	// Add other metaboxes as needed

	return apply_filters( 'tokokoo_cmb_metabox', $meta_boxes );
}

function sanitize_feature_url( $new, $meta_key, $id ) {
	return esc_url( $new );
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once ( trailingslashit( TOKOKOO_EXTENSIONS_CMB_METABOX ) . 'init.php' );

}