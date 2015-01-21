<?php
	/**
	* Theme Customizer
	* Display theme customization sections
	* @author Tokokoo
	* @license license.txt
	* @since 1.0
	*/

	// Register customizer
	add_action( 'customize_register', 'tokokoo_theme_customizer_register' );

	// Print stylesheet in header to alter the display of site
	add_action( 'wp_head', 'tokokoo_customizer_css', 10 );

/**
 * Convert hex value to rgba
 *
 * @since 1.0
 */

	function hex2rgba($hex, $opacity) {
		$hex = str_replace("#", "", $hex);

		if(strlen($hex) == 3) {
		  $r = hexdec(substr($hex,0,1).substr($hex,0,1));
		  $g = hexdec(substr($hex,1,1).substr($hex,1,1));
		  $b = hexdec(substr($hex,2,1).substr($hex,2,1));
		} else {
		  $r = hexdec(substr($hex,0,2));
		  $g = hexdec(substr($hex,2,2));
		  $b = hexdec(substr($hex,4,2));
		}
		$rgba = array($r, $g, $b, $opacity);
		return 'rgba('.implode(",", $rgba).')'; // returns the rgba values separated by commas
	}


/**
 * Register Custom Sections, Settings, And Controls
 *
 * @since 1.0
 */

	function tokokoo_theme_customizer_register($wp_customize) {
	/* =====================================================================================================*
	*  General Color 										 												*
	*  =====================================================================================================*/
		// Rename Colors Sections Into General Colors
		$wp_customize->get_section('colors')->title = __( 'General Colors','raakbookoo' );
		$wp_customize->get_control('background_color')->priority = 0;

		//global $default_setting,$color_slugs;
			
		$general_colors = array();
		$general_colors[] = array( 'slug' => 'tokokoo_menu_text_color', 'default' => '#ef7f69', 'priority' => 3, 'label' => __('Menu text color', 'raakbookoo'));
		$general_colors[] = array( 'slug' => 'tokokoo_menu_hover_background', 'default' => '#ef7f69', 'priority' => 4, 'label' => __('Menu hover color', 'raakbookoo'));
		$general_colors[] = array( 'slug' => 'tokokoo_submenu_background', 'default' => '#ef7f69', 'priority' => 5, 'label' => __('Sub Menu Background', 'raakbookoo'));
		$general_colors[] = array( 'slug' => 'tokokoo_submenu_text_color', 'default' => '#ffffff', 'priority' => 6, 'label' => __('Sub Menu Text Color', 'raakbookoo'));
		$general_colors[] = array( 'slug' => 'tokokoo_recent_product_wrapper', 'default' => '#eee1d4', 'priority' => 7, 'label' => __('Exclusive this month Background', 'raakbookoo'));
		$general_colors[] = array( 'slug' => 'tokokoo_pagination_color', 'default' => '#e56b41', 'priority' => 8, 'label' => __('Pagination color', 'raakbookoo'));
		$general_colors[] = array( 'slug' => 'tokokoo_pagination_hover_color', 'default' => '#e56b41', 'priority' => 9, 'label' => __('Pagination hover color', 'raakbookoo'));
		$general_colors[] = array( 'slug' => 'tokokoo_blog_title_color', 'default' => '#695b4d', 'priority' => 10, 'label' => __('Blog title color', 'raakbookoo'));
		$general_colors[] = array( 'slug' => 'tokokoo_blog_title_hover_color', 'default' => '#ef7f69', 'priority' => 11, 'label' => __('Blog title hover color', 'raakbookoo'));

		foreach( $general_colors as $general_color) {
			$wp_customize->add_setting($general_color['slug'], array('default' => $general_color['default'], 'type' => 'theme_mod', 'transport'=>'postMessage','capability' => 'edit_theme_options'));
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $general_color['slug'], array('label' => $general_color['label'], 'section' => 'colors','priority'=>$general_color['priority'],'settings' => $general_color['slug'])));
		}

		/* =====================================================================================================*
		*  ECOMMERCE COLOR 										 												*
		*  =====================================================================================================*/
		$wp_customize->add_section( 'tokokoo_ecommerce_color' , array(
			'title'      => __( 'Ecommerce Color', 'raakbookoo' ),
			'priority'   => 50,
		) );

		// Ecommerce Color
		$ecommerce_colors = array();
		$ecommerce_colors[] = array( 'slug' => 'tokokoo_primary_accent_color', 'default' => '#ef7f69', 'priority' => 1, 'label' => __('Primary accent color', 'raakbookoo'));
		$ecommerce_colors[] = array( 'slug' => 'tokokoo_secondary_accent_color', 'default' => '#775337', 'priority' => 2, 'label' => __('Secondary accent color', 'raakbookoo'));
		$ecommerce_colors[] = array( 'slug' => 'tokokoo_badge_color', 'default' => '#f6775a', 'priority' => 3, 'label' => __('Badge color', 'raakbookoo'));
		$ecommerce_colors[] = array( 'slug' => 'tokokoo_tab_background', 'default' => '#f6ebe3', 'priority' => 4, 'label' => __('Tab color', 'raakbookoo'));

		foreach( $ecommerce_colors as $ecommerce_color) {
			// SETTINGS & CONTROLS
			$wp_customize->add_setting($ecommerce_color['slug'], array('default' => $ecommerce_color['default'], 'type' => 'theme_mod', 'transport' => 'postMessage', 'capability' => 'edit_theme_options'));
			$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, $ecommerce_color['slug'], array('label' => $ecommerce_color['label'], 'section' => 'tokokoo_ecommerce_color', 'priority' => $ecommerce_color['priority'], 'settings' => $ecommerce_color['slug'])));
			$color_slugs[] = $ecommerce_color['slug'];
		}


		/* =====================================================================================================*
		*  Widget COLOR 										 												*
		*  =====================================================================================================*/
		$wp_customize->add_section( 'tokokoo_widget_color' , array(
			'title'      => __( 'Widget Color', 'raakbookoo' ),
			'priority'   => 70,
		) );

		// Widget Color
		$widget_colors = array();
		$widget_colors[] = array( 'slug' => 'tokokoo_widget_title', 'default' => '#2e2925', 'priority' => 1, 'label' => __('Widget title', 'raakbookoo'));
		$widget_colors[] = array( 'slug' => 'tokokoo_widget_list', 'default' => '##FAF5F1', 'priority' => 2, 'label' => __('Widget list', 'raakbookoo'));
		$widget_colors[] = array( 'slug' => 'tokokoo_widget_list_hover', 'default' => '#ef7f69', 'priority' => 3, 'label' => __('Widget list hover', 'raakbookoo'));

		foreach( $widget_colors as $widget_color) {
			// SETTINGS & CONTROLS
			$wp_customize->add_setting($widget_color['slug'], array('default' => $widget_color['default'], 'type' => 'theme_mod', 'transport' => 'postMessage', 'capability' => 'edit_theme_options'));
			$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, $widget_color['slug'], array('label' => $widget_color['label'], 'section' => 'tokokoo_widget_color', 'priority' => $widget_color['priority'], 'settings' => $widget_color['slug'])));
			$color_slugs[] = $widget_color['slug'];
		}

		/* =====================================================================================================*
		*  TYPOGRAPHY 										 													*
		*  =====================================================================================================*/
		$wp_customize->add_section( 'tokokoo_typography' , array(
			'title'      => __( 'Typography', 'raakbookoo' ),
			'priority'   => 30,
		) );
		
		global $font_slugs;
		$fonts = array();
		$list_font = array(
			'Arial' 			=> 'Arial',
			'Bitter' 			=> 'Bitter',
			'Cantarell' 		=> 'Cantarell',
			'Cabin'				=> 'Cabin',
			'Open Sans' 		=> 'Open Sans',
			'Lato'				=> 'Lato',
			'Montserrat' 		=> 'Montserrat',
			'Oxygen'			=> 'Oxygen',
			'Play' 				=> 'Play',
			'Roboto'			=> 'Roboto',
			'Source San Pro'	=> 'Source San Pro',
			'Ubuntu'			=> 'Ubuntu',
			'Titillium Web'		=> 'Titillium Web',
			
			);

		$fonts[] = array('slug'=>'tokokoo_body_font', 'default' => 'Bitter', 'priority'=>1,'label' => __('Body Font', 'raakbookoo'));
		$fonts[] = array('slug'=>'tokokoo_menu_font', 'default' => 'Bitter', 'priority'=>3,'label' => __('Navigation Menu Font', 'raakbookoo'));
		$fonts[] = array('slug'=>'tokokoo_item_title_font', 'default' => 'Bitter', 'priority'=>4,'label' => __('Item title Font', 'raakbookoo'));
		$fonts[] = array('slug'=>'tokokoo_content_font', 'default' => 'Bitter', 'priority'=>5,'label' => __('Content Font', 'raakbookoo'));
		$fonts[] = array('slug'=>'tokokoo_widget_title_font', 'default' => 'Lato', 'priority'=>6,'label' => __('Widget Title Font', 'raakbookoo'));
		$fonts[] = array('slug'=>'tokokoo_widget_content_font', 'default' => 'Bitter', 'priority'=>7,'label' => __('Widget Content Font', 'raakbookoo'));
		
	
		foreach( $fonts as $font ) {

			// SETTINGS & CONTROLS
			$wp_customize->add_setting($font['slug'], array('default' => $font['default'], 'transport'   => 'postMessage','capability' => 'edit_theme_options'));
			$wp_customize->add_control(new WP_Customize_Control($wp_customize, $font['slug'], array('label' => $font['label'],'type'=>'select','choices'=>$list_font, 'section' => 'tokokoo_typography','priority'=>$font['priority'],
					'settings' => $font['slug'])));
			//$font_slugs[] = $font['slug'];
		}
	}

	/**
	 * Used by hook: 'customize_preview_init'
	 * 
	 * @see add_action('customize_preview_init',$func)
	 */
	function tokokoo_customizer_live_preview() {
		wp_enqueue_script('tokokoo-themecustomizer', get_template_directory_uri().'/js/theme-customizer.js', array( 'jquery','customize-preview'),'',true);
	}
	add_action( 'customize_preview_init', 'tokokoo_customizer_live_preview' , 10);
	

	/**
	 * Sanitize Print To Head
	 *
	 * @since 1.0
	 */
	function tokokoo_customizer_css() { ?>
	<style type="text/css">
	
		<?php if ( get_theme_mod('tokokoo_menu_text_color') ) { ?>
			#access .menu a { color: <?php echo get_theme_mod('tokokoo_menu_text_color'); ?>; }
		<?php } ?>

		<?php if ( get_theme_mod('tokokoo_menu_hover_background') ) { ?>
			#access .menu a:hover { color: <?php echo get_theme_mod('tokokoo_menu_text_color'); ?>; }
		<?php } ?>

		<?php if ( get_theme_mod('tokokoo_submenu_background') ) { ?>
			 #access .have-submenu a:hover, #access .have-submenu a:link:hover, #access .have-submenu a, #access li .sub-menu, #access .menu .runing { background-color: <?php echo get_theme_mod('tokokoo_submenu_background'); ?>; }
		<?php } ?>

		<?php if ( get_theme_mod('tokokoo_submenu_text_color') ) { ?>
			 .sub-menu li a { color: <?php echo get_theme_mod('tokokoo_submenu_text_color'); ?>; }
		<?php } ?>

		<?php if ( get_theme_mod('tokokoo_recent_product_wrapper') ) { ?>
			 .home-featured .featured-left .wrap-items { background-color: <?php echo get_theme_mod('tokokoo_recent_product_wrapper'); ?>; }
		<?php } ?>

		<?php if ( get_theme_mod('tokokoo_pagination_color') ) { ?>
			 .pagination a { color: <?php echo get_theme_mod('tokokoo_pagination_color'); ?>; }
		<?php } ?>

		<?php if ( get_theme_mod('tokokoo_pagination_hover_color') ) { ?>
			 .pagination a:link:hover { color: <?php echo get_theme_mod('tokokoo_pagination_hover_color'); ?>; }
		<?php } ?>

		<?php if ( get_theme_mod('tokokoo_blog_title_color') ) { ?>
			 .post-title a { color: <?php echo get_theme_mod('tokokoo_blog_title_color'); ?>; }
		<?php } ?>

		<?php if ( get_theme_mod('tokokoo_blog_title_hover_color') ) { ?>
			 .post-title a:hover { color: <?php echo get_theme_mod('tokokoo_blog_title_color'); ?>; }
		<?php } ?>

		/* Ecommerce color */
		<?php if ( get_theme_mod('tokokoo_primary_accent_color') ) { ?>
			 .added_to_cart, .button, button, html input[type="button"], input[type="reset"], input[type="submit"], .list-item .item-data .item-block .added_to_cart:hover, .list-item .item-data .item-block .add-to-cart:hover, .added_to_cart:hover, .button:hover, button:hover, html input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, .woocommerce-tabs .tabs li a, .tabs-wraps .tabs li a, .sidebar .widget_shopping_cart .buttons .checkout { background: <?php echo get_theme_mod('tokokoo_primary_accent_color'); ?>; }
			 .added_to_cart, .button, button, html input[type="button"], input[type="reset"], input[type="submit"], .list-item .item-data .item-block .added_to_cart:hover, .list-item .item-data .item-block .add-to-cart:hover, .added_to_cart:hover, .button:hover, button:hover, html input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, .woocommerce-tabs .tabs li a, .tabs-wraps .tabs li a { border-color: <?php echo get_theme_mod('tokokoo_primary_accent_color'); ?>; }
			 .single-product .summary .price, .single-product a:hover, .single-product a:link:hover { color: <?php echo get_theme_mod('tokokoo_primary_accent_color'); ?>; }
			 .single-product .summary .price { border-bottom-color: <?php echo get_theme_mod('tokokoo_primary_accent_color'); ?>; }
		<?php } ?>

		<?php if ( get_theme_mod('tokokoo_secondary_accent_color') ) { ?>
			 .list-item .item-data { background-color: <?php echo hex2rgba(get_theme_mod('tokokoo_secondary_accent_color'), 0.8); ?>; }
			 .list-item .item-data .item-block { border-bottom-color: <?php echo get_theme_mod('tokokoo_secondary_accent_color'); ?>; }
		<?php } ?>

		<?php if ( get_theme_mod('tokokoo_badge_color') ) { ?>
			 .onsale { background-color: <?php echo get_theme_mod('tokokoo_badge_color'); ?>; }
			 .onsale { border-color: <?php echo get_theme_mod('tokokoo_badge_color'); ?>; }
		<?php } ?>

		<?php if ( get_theme_mod('tokokoo_tab_background') ) { ?>
			 .woocommerce-tabs .tabs li.active a, .woocommerce-tabs .tabs li a:hover { background: <?php echo get_theme_mod('tokokoo_tab_background'); ?>; }
			 .woocommerce-tabs .tabs li.active a, .woocommerce-tabs .tabs li a:hover { border-color: <?php echo get_theme_mod('tokokoo_tab_background'); ?>; }
		<?php } ?>

		/* Widget color */
		<?php if ( get_theme_mod('tokokoo_widget_title') ) { ?>
			 .sidebar .widget .widget-title, .widget-bottom .widget-title { color: <?php echo get_theme_mod('tokokoo_widget_title'); ?>; }
		<?php } ?>

		<?php if ( get_theme_mod('tokokoo_widget_list') ) { ?>
			 .sidebar a, .widget-bottom .widget .product_list_widget a { color: <?php echo get_theme_mod('tokokoo_widget_list'); ?>; }
		<?php } ?>

		<?php if ( get_theme_mod('tokokoo_widget_list_hover') ) { ?>
			 .widget-bottom .widget .product_list_widget a:hover, .sidebar a:hover { color: <?php echo get_theme_mod('tokokoo_widget_list_hover'); ?>; }
		<?php } ?>

		/* Font */
		<?php if ( get_theme_mod('tokokoo_body_font') ) { ?>
			 body { font-family: "<?php echo get_theme_mod('tokokoo_body_font'); ?>", sans-serif;}
		<?php } ?>

		<?php if ( get_theme_mod('tokokoo_menu_font') ) { ?>
			 .menu { font-family: "<?php echo get_theme_mod('tokokoo_menu_font'); ?>", sans-serif;}
		<?php } ?>

		<?php if ( get_theme_mod('tokokoo_item_title_font') ) { ?>
			 .product-title, .list-item .item-data .item-title { font-family: "<?php echo get_theme_mod('tokokoo_item_title_font'); ?>", sans-serif;}
		<?php } ?>

		<?php if ( get_theme_mod('tokokoo_content_font') ) { ?>
			 .entry-content, product-description, .woocommerce-tabs .panel { font-family: "<?php echo get_theme_mod('tokokoo_content_font'); ?>", sans-serif;}
		<?php } ?>

		<?php if ( get_theme_mod('tokokoo_widget_title_font') ) { ?>
			 .widget-title { font-family: "<?php echo get_theme_mod('tokokoo_widget_title_font'); ?>", sans-serif;}
		<?php } ?>

		<?php if ( get_theme_mod('tokokoo_widget_content_font') ) { ?>
			 .widget-bottom, .sidebar { font-family: "<?php echo get_theme_mod('tokokoo_widget_content_font'); ?>", sans-serif;}
		<?php } ?>


	</style>
	<?php
	}


?>