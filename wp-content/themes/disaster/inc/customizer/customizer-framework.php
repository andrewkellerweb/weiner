<?php

/**
 * Theme Customizer Framework
 * 
 *
 * @author 		Tokokoo
 * @license 	license.txt
 * @since 		1.0
 * @developer 	@alispx
 */


/**
 * Register Custom Sections, Settings, And Controls
 *
 * @since 1.0
 */
add_action( 'customize_register', 'tokokoo_theme_customizer_register' );

function tokokoo_theme_customizer_register( $wp_customize ) {
	
	// Rename Colors Sections Into General Colors
	$wp_customize->get_section( 'colors' )->title = __( 'General Colors', 'raakbookoo' );
	$wp_customize->get_control( 'background_color' )->priority = 30;

	global $colors, $sections;

	require_once( trailingslashit ( THEME_DIR ) . 'inc/customizer/textarea-control.php' );
	require_once( trailingslashit ( THEME_DIR ) . 'inc/customizer/googlefont-control.php' );
	require_once( trailingslashit ( THEME_DIR ) . 'inc/customizer/customizer-data.php' );

	//create the section from array data
	foreach ( $sections as $section ) {

		if ( isset ( $section['priority'] ) ) {
			$priority = $section['priority'];
		} else {
			$priority = '';
		}

		$wp_customize->add_section( $section['slug'], 
			array(
				'title'    => __( $section['label'], 'raakbookoo' ),
				'priority' => $priority,
		));

	}

	//create the componen from array data
	foreach ( $colors as $color ) {
		
		if ( isset ( $color['transport'] ) ) {
			$transport = $color['transport'];
		} else {
			$transport = 'postMessage';
		}

		if ( isset ( $color['priority'] ) ) {
			$priority = $color['priority'];
		} else {
			$priority = '';
		}

		// Define each customizer type 
		switch ( $color['type'] ) {
			
			case 'color':

				$wp_customize->add_setting( $color['slug'], 
					array( 
						'default' 		=> $color['default'], 
						'type' 			=> 'theme_mod', 
						'transport'		=> $transport, 
						'capability' 	=> 'edit_theme_options' ) );
				
				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], 
					array( 
						'label' 		=> __( $color['label'], 'raakbookoo' ), 
						'section' 		=> $color['section'], 
						'priority'		=> $priority, 
						'settings' 		=> $color['slug'] ) 
					) );
				
				break;
			
			case 'select' :

				$wp_customize->add_setting( $color['slug'], 
					array(
						'default' 		=> $color['default'],
						'type' 			=> 'theme_mod', 
						'transport'   	=> $transport,
						'capability' 	=> 'edit_theme_options'
					) );
				
				$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 
					$color['slug'], 
					array( 
						'label' 		=> __( $color['label'], 'raakbookoo' ), 
						'section' 		=> $color['section'],
						'default' 		=> $color['default'],
						'priority'		=> $priority,
						'settings' 		=> $color['slug'], 
						'choices'		=> $color['choices'], 
						'type'			=> 'select'
						)
					));

				break;

			case 'select_font' :

				$wp_customize->add_setting( $color['slug'], 
					array(
						'default' 		=> $color['default'],
						'type' 			=> 'theme_mod', 
						'transport'   	=> $transport,
						'capability' 	=> 'edit_theme_options'
					) );
				
				$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 
					$color['slug'], 
					array( 
						'label' 		=> __( $color['label'], 'raakbookoo' ), 
						'section' 		=> $color['section'],
						'default' 		=> $color['default'],
						'priority'		=> $priority,
						'settings' 		=> $color['slug'], 
						'choices'		=> $color['choices'], 
						'type'			=> 'select'
						)
					));

				break;

			case 'text':

				$wp_customize->add_setting( $color['slug'] , 
					array(
						'default'		=> $color['default'],
						'type'			=> 'theme_mod',
						'transport'   	=> $transport,
						'capability'	=> 'edit_theme_options',
				) );

				$wp_customize->add_control( $color['slug'] , 
					array(
						'label'		=> __( $color['label'], 'raakbookoo' ),
						'section'	=> $color['section'],
						'priority'	=> $priority,
						'settings'	=> $color['slug'],
						'type'		=> 'text' 
					) );

				break;

			case 'textarea' :

				$wp_customize->add_setting( $color['slug'], 
					array(
				    	'default'	=> $color['default'],
				) );
				 
				$wp_customize->add_control( new Tokokoo_Customize_Textarea_Control( $wp_customize, 
					$color['slug'], 
					array(
					    'label'   		=> __( $color['label'], 'raakbookoo' ),
					    'section' 		=> $color['section'],
						'priority'		=> $priority, 
					    'settings'		=> $color['slug'],
				) ) );

				break;

			case 'images' :

				$wp_customize->add_setting( $color['slug'], 
					array( 
						'default' 		=> $color['default'], 
						'capability' 	=> 'edit_theme_options', 
						'type' 			=> 'theme_mod' 
						));   

				$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 
					$color['slug'], 
					array( 
						'label' 		=> __( $color['label'], 'raakbookoo' ), 
						'section' 		=> $color['section'],
						'priority'		=> $priority, 
						'settings' 		=> $color['slug']
						 )));

				break;

			case 'font' :

				$wp_customize->add_setting( $color['slug'], 
					array(
		            	'default'        => __( $color['label'], 'raakbookoo' ),
		        ) );

		        $wp_customize->add_control( new Google_Font_Dropdown_Custom_Control( $wp_customize, 
		        	$color['slug'], 
		        	array(
			            'label'   		=> __( $color['label'], 'raakbookoo' ),
			            'section' 		=> $color['section'],
			            'priority'		=> $priority,
			            'settings'   	=> $color['slug']
			        ) ) );

				break;

			default:
				
				break;
		}

	}
	
}

/**
 * Used by hook: 'customize_preview_init'
 *
 * @see add_action( 'customize_preview_init', $func )
 */
add_action( 'customize_preview_init', 'tokokoo_customizer_live_preview' , 1 );

function tokokoo_customizer_live_preview() {
	global $colors;
	
	require_once( trailingslashit ( THEME_DIR ) . 'inc/customizer/customizer-data.php' );  
	
	wp_enqueue_script( 'customizer-preview', get_template_directory_uri().'/inc/customizer/js/customizer-preview.js', array( 'jquery', 'customize-preview' ), '', true );
	wp_localize_script(	'customizer-preview', 'custStyle', $colors );

 }

/**
 * Sanitize Print To Head
 *
 * @since 1.0
 */
add_action( 'wp_head', 'tokokoo_customizer_css', 10 );

function tokokoo_customizer_css() { 
	
	global $colors;

	$style = '';
	
	require_once( trailingslashit ( THEME_DIR ) . 'inc/customizer/customizer-data.php' );

	foreach ( $colors as $color ) {

		if ( ! empty( $color['property'] ) ) {
			$property = $color['property'];
		} else {
			$property = '';
		}

		if ( ! empty( $color['property2'] ) ) {
			$property2 = $color['property2'];
		} else {
			$property2 = '';
		}	

		$selectors 	= $color['selector'];
		$newvalue	= get_theme_mod( $color['slug'] );

		if ( $color['type'] == 'color' ) {
			if ( isset( $newvalue ) && ! empty( $newvalue ) ) {
				$style .=  $selectors. " { $property : $newvalue; } ";
			}
		} else if ( $color['type'] == 'images' ) {
			if ( isset( $newvalue ) && ! empty( $newvalue ) ) {
				$style .=  $selectors. " { $property : url('".$newvalue."') $property2; } ";
			}
		} else if ( $color['type'] == 'select_font' ) {
			if ( isset( $newvalue ) && ! empty( $newvalue ) ) {
				$style .=  $selectors. " { $property : '".$newvalue."' $property2; } ";
			}
		}
	}

	$style = "\n" . '<style type="text/css">' . trim( $style ) . '</style>' . "\n";

	echo $style;

}
