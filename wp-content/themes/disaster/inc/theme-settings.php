<?php

/* Add custom options to the theme settings. */
add_filter( 'tokokoo_options_setting', 'tokokoo_add_custom_options' );

/**
 * Custom options setting.
 *
 * @since 1.0
 */

function tokokoo_add_custom_options( $options ) {

	$options[] = array( 
		'name' => __( 'Slides', 'raakbookoo' ),
		'type' => 'heading'
	);

	if ( ! is_plugin_active( 'revslider/revslider.php' ) ) {
		$options[] = array(
			'desc'	=> __( 'You need to install and activate Revolution slider plugin to use this option.', 'raakbookoo' ),
			'id'    => 'tokokoo_slider_shortcode_revo_activate',
			'type'	=> 'info' 
		);
	}
	else {

		$options[] = array( 
			'name'	=> __( 'Shortcode For Homepage', 'raakbookoo' ),
			'desc'	=> __('This will be displayed on the Home page','raakbookoo'),
			'id'	=> 'tokokoo_slider_shortcode_revo',
			'type'	=> 'textarea' 
		);

		$options[] = array( 
			'name'	=> __( 'Shortcode For Portfolio', 'raakbookoo' ),
			'desc'	=> __('This will be displayed on the Portfolio page','raakbookoo'),
			'id'	=> 'tokokoo_slider_shortcode_revo_portfolio',
			'type'	=> 'textarea' 
		);
	}

	$options[] = array( 
		'name' => __( 'Contact And Map', 'raakbookoo' ),
		'type' => 'heading'
	);

		$options[] = array( 
			'name'	=> __( 'Contact Shortcode', 'raakbookoo' ),
			'desc'	=> __('This is the shortcode from Ninja Form Plugin','raakbookoo'),
			'id'	=> 'tokokoo_contact_shortcode',
			'type'	=> 'textarea' 
		);

		$options[] = array( 
			'name'	=> __( 'Enable Contact Map', 'raakbookoo' ),
			'desc'	=> __( 'This will activate the Contact Map Feature. Or else, the map will be obtained from content page (Google Map Embedded Script) ', 'raakbookoo' ),
			'id'	=> 'tokokoo_contact_maps',
			'type'	=> 'checkbox' 
		);

		$options[] = array( 
			'name'	=> __( 'Latitude', 'raakbookoo' ),
			'id'	=> 'tokokoo_contact_maps_latitude',
			'desc'	=> __('example : -6.903932','raakbookoo'),
			'std'	=> __('-6.903932','raakbookoo'),
			'type'	=> 'text' 
		);

		$options[] = array( 
			'name'	=> __( 'Longitude', 'raakbookoo' ),
			'id'	=> 'tokokoo_contact_maps_longitude',
			'desc'	=> __('example : 107.611717','raakbookoo'),
			'std'	=> __('107.611717','raakbookoo'),
			'type'	=> 'text' 
		);

		$options[] = array( 
			'name'	=> __( 'Zoom', 'raakbookoo' ),
			'desc'	=> __('Set the zoom number of the map, the default is 15','raakbookoo'),
			'id'	=> 'tokokoo_contact_maps_zoom',
			'std'	=> __('15','slider'),
			'type'	=> 'text' 
		);

		$options[] = array( 
			'name'	=> __( 'Marker Title', 'slider' ),
			'desc'	=> __('Set title of the marker','slider'),
			'id'	=> 'tokokoo_contact_maps_marker_title',
			'type'	=> 'text' 
		);

		$options[] = array( 
			'name'	=> __( 'Marker Content', 'slider' ),
			'desc'	=> __('Set content of the marker','raakbookoo'),
			'id'	=> 'tokokoo_contact_maps_marker_content',
			'type'	=> 'textarea' 
		);

		$options[] = array( 
			'name'	=> __( 'Tagline', 'raakbookoo' ),
			'desc'	=> __('Want to call us directly? Please hit the button below to talk on Skype => Write your company tagline here','raakbookoo'),
			'id'	=> 'tokokoo_contact_tagline',
			'type'	=> 'textarea' 
		);

		$options[] = array( 
			'name'	=> __( 'Phone', 'raakbookoo' ),
			'desc'	=> __('Write your company phone number here','raakbookoo'),
			'id'	=> 'tokokoo_contact_phone',
			'std'	=> '022 - 2503530',
			'type'	=> 'text' 
		);

		$options[] = array( 
			'name'	=> __( 'Address', 'raakbookoo' ),
			'desc'	=> __('Write your company address here','raakbookoo'),
			'id'	=> 'tokokoo_contact_address',
			'type'	=> 'editor' 
		);

		/* ============================== End Contact Settings ================================= */

		$options[] = array( 
			'name' => __( 'Home', 'raakbookoo' ),
			'type' => 'heading'
		);

		$options[] = array(
			'desc' => __( 'Control what displayed on your home', 'raakbookoo' ),
			'type' => 'info'
		);
		
		$options[] = array( 
			'name'	=> __( 'Featured book and testimonials', 'raakbookoo' ),
			'desc'	=> __( 'Display featured book and testimonials section', 'raakbookoo' ),
			'id'	=> 'tokokoo_featured_book_section',
			'std'	=> true,
			'type'	=> 'checkbox' 
		);
		
		$options[] = array( 
			'name'	=> __( 'Recent book ', 'raakbookoo' ),
			'desc'	=> __( 'Display recent book section', 'raakbookoo' ),
			'id'	=> 'tokokoo_recent_book_section',
			'std'	=> true,
			'type'	=> 'checkbox' 
		);
		
		$options[] = array( 
			'name'	=> __( 'Search form ', 'raakbookoo' ),
			'desc'	=> __( 'Display Search Form section', 'raakbookoo' ),
			'id'	=> 'tokokoo_searchform_section',
			'std'	=> true,
			'type'	=> 'checkbox' 
		);
		
		$options[] = array( 
			'name'	=> __( 'From our blog and best seller', 'raakbookoo' ),
			'desc'	=> __( 'Display from our blog and best seller section', 'raakbookoo' ),
			'id'	=> 'tokokoo_from_blog_section',
			'std'	=> true,
			'type'	=> 'checkbox' 
		);
		
		
		/* ============================== End Home Settings ================================= */

		$options[] = array( 
			'name' => __( 'Book Details', 'raakbookoo' ),
			'type' => 'heading'
		);

		$options[] = array(
			'desc' => __( 'Insert your product details', 'raakbookoo' ),
			'type' => 'info'
		);
		
		$options[] = array( 
			'name'	=> __( 'Product details', 'raakbookoo' ),
			'desc'	=> '',
			'id'	=> 'tokokoo_book_details',
			'type'	=> 'textarea' 
		);

		/* ============================== End Book Details Settings ================================= */

		$options[] = array( 
			'name' => __( 'Theme Layout', 'raakbookoo' ),
			'type' => 'heading'
		);

		$options[] = array(
			'desc' => __( 'Configure your theme layout', 'raakbookoo' ),
			'type' => 'info'
		);
		
		$options[] = array( 
			'name'		=> __( 'Display Front End Style Switcher', 'raakbookoo' ),
			'desc'		=> 'Front end style switcher make user easyly to switch their own site layout and pattern',
			'id'		=> 'tokokoo_style_switcher',
			'type'		=> 'checkbox',
		);

		$options[] = array( 
			'name'		=> __( 'Select theme layout', 'raakbookoo' ),
			'desc'		=> '',
			'id'		=> 'tokokoo_theme_layout',
			'type'		=> 'select',
			'class'		=> 'mini',
			'options'	=> array(
				'default'	=> __( 'Default', 'raakbookoo' ),
				'boxed'		=> __( 'Boxed', 'raakbookoo' ),
			) 
		);

		$imagepath = get_template_directory_uri() . '/img/pattern/';
		$options[] = array(
				'name' => 'Choose your main pattern',
				'desc' => 'Main pattern images .',
				'id' => 'tokokoo_main_pattern',
				'std' => '',
				'type' => 'images',
				'options' => array(
						'default' => $imagepath . 'main-img/default.jpg',
						'pattern1' => $imagepath . 'main-img/pattern1.jpg',
						'pattern2' => $imagepath . 'main-img/pattern2.jpg',
						'pattern3' => $imagepath . 'main-img/pattern3.jpg',
						'pattern4' => $imagepath . 'main-img/pattern4.jpg',
						'pattern5' => $imagepath . 'main-img/pattern5.jpg',
						'pattern6' => $imagepath . 'main-img/pattern6.jpg',
						'pattern7' => $imagepath . 'main-img/pattern7.jpg',
						'pattern8' => $imagepath . 'main-img/pattern8.jpg',
						'pattern9' => $imagepath . 'main-img/pattern9.jpg',
						'pattern10' => $imagepath . 'main-img/pattern10.jpg',
						)
		);

		$options[] = array(
				'name' => 'Choose your widget pattern',
				'desc' => 'Widget pattern images .',
				'id' => 'tokokoo_widget_pattern',
				'std' => '',
				'type' => 'images',
				'options' => array(
						'default' => $imagepath . 'widget-img/default.jpg',
						'pattern1' => $imagepath . 'widget-img/pattern1.jpg',
						'pattern2' => $imagepath . 'widget-img/pattern2.jpg',
						'pattern3' => $imagepath . 'widget-img/pattern3.jpg',
						'pattern4' => $imagepath . 'widget-img/pattern4.jpg',
						'pattern5' => $imagepath . 'widget-img/pattern5.jpg',
						'pattern6' => $imagepath . 'widget-img/pattern6.jpg',
						'pattern7' => $imagepath . 'widget-img/pattern7.jpg',
						'pattern8' => $imagepath . 'widget-img/pattern8.jpg',
						'pattern9' => $imagepath . 'widget-img/pattern9.jpg',
						'pattern10' => $imagepath . 'widget-img/pattern10.jpg',
						)
		);

	/* ============================== End Theme Layout Settings ================================= */
	
		$options[] = array( 
			'name' => __( 'Shop', 'raakbookoo' ),
			'type' => 'heading'
		);

		$options[] = array(
			'desc' => __( 'Configure your shop page', 'raakbookoo' ),
			'type' => 'info'
		);
		
		$options[] = array( 
			'name'		=> __( 'Disable Sample File Button', 'raakbookoo' ),
			'desc'		=> 'Sample file button will not be displayed if it checked',
			'id'		=> 'tokokoo_sample_file',
			'type'		=> 'checkbox',
		);

		$options[] = array( 
			'name'		=> __( 'Disable Book Details', 'raakbookoo' ),
			'desc'		=> 'Book Details will not be displayed if it checked',
			'id'		=> 'tokokoo_book_details_section',
			'type'		=> 'checkbox',
		);

		$options[] = array( 
			'name'		=> __( 'Disable Author Info', 'raakbookoo' ),
			'desc'		=> 'Author Info not be displayed if it checked',
			'id'		=> 'tokokoo_author_info',
			'type'		=> 'checkbox',
		);

		$options[] = array( 
			'name'		=> __( 'Display Single Thumbnail', 'raakbookoo' ),
			'desc'		=> 'Single Thumbnail will be displayed if it checked',
			'id'		=> 'tokokoo_single_thumbnail',
			'type'		=> 'checkbox',
		);

	return $options;

}
/* Sample function to add custom option to the theme settings. */
//add_filter( 'tokokoo_options_setting', 'tokokoo_custom_options', 4 );
function tokokoo_custom_options( $options ) {

	$options[] = array( 
		'name' => __( 'Custom Options', 'raakbookoo' ),
		'type' => 'heading'
	);

	$options[] = array( 
		'name'	=> __( 'Custom Text', 'raakbookoo' ),
		'desc'	=> '',
		'id'	=> 'tokokoo_custom_option',
		'type'	=> 'text' 
	);

	return $options;

}

/* Sample function to add custom option to General Settings. */
//add_filter( 'tokokoo_options_setting_general', 'tokokoo_general_settings_custom_option' );
function tokokoo_general_settings_custom_option( $options ) {

	$options[] = array( 
		'name'	=> __( 'Custom Text', 'raakbookoo' ),
		'desc'	=> '',
		'id'	=> 'tokokoo_custom_option_general',
		'type'	=> 'text' 
	);

	return $options;

}

/* Sample function to add custom option to Page Settings. */
//add_filter( 'tokokoo_options_setting_page', 'tokokoo_page_settings_custom_option' );
function tokokoo_page_settings_custom_option( $options ) {

	$options[] = array( 
		'name'	=> __( 'Custom Text', 'raakbookoo' ),
		'desc'	=> '',
		'id'	=> 'tokokoo_custom_option_page',
		'type'	=> 'text' 
	);

	return $options;

}

