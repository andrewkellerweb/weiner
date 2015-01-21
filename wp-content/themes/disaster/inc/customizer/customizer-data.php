<?php 

/**
 * Theme Customizer Data
 * 
 *
 * @author 		Tokokoo
 * @license 	license.txt
 * @since 		1.0
 * @developer 	@alispx
 */

/* =====================================================================================================*
 *  Define Global variable Needed 								 												*
 * =====================================================================================================*/
	

	$colors 	= array();
	$sections 	= array();

/* =====================================================================================================*
 *  General Color 										 												*
 * =====================================================================================================*/
	$image_path = get_template_directory_uri() .'/img/';
	$colors[] = array( 
		'slug'		=> 'tokokoo_menu_background', 
		'default'	=> $image_path .'line-bg.png', 
		'priority'	=> 1, 
		'label'		=> 'Menu Background',
		'section'	=> 'colors',
		'selector'	=> '.access-wrap',
		'property'	=> 'background',
		'property2'	=> 'repeat 0 0',
		'transport'	=> 'postMessage',
		'type' 		=> 'images'
	);
	
	$colors[] = array( 
			'slug'		=> 'tokokoo_menu_color', 
			'default'	=> '#ef7f69', 
			'priority'	=> 3, 
			'label'		=> 'Menu Color',
			'section'	=> 'colors',
			'selector'	=> '#access .menu a, #access .menu a:link',
			'property'	=> 'color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);
	
	$colors[] = array( 
			'slug'		=> 'tokokoo_menu_hover_color', 
			'default'	=> '#695b4d', 
			'priority'	=> 5, 
			'label'		=> 'Menu Hover Color',
			'section'	=> 'colors',
			'selector'	=> '#access .menu a:hover, #access .menu a:link:hover',
			'property'	=> 'color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

	$colors[] = array( 
			'slug'		=> 'tokokoo_menu_hover_background', 
			'default'	=> '#ef7f69', 
			'priority'	=> 7, 
			'label'		=> 'Menu Hover Background',
			'section'	=> 'colors',
			'selector'	=> '#access .have-submenu a:hover, #access .have-submenu a:link:hover',
			'property'	=> 'background-color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);
	
	$colors[] = array( 
			'slug'		=> 'tokokoo_sub_menu_color', 
			'default'	=> '#ffffff', 
			'priority'	=> 9, 
			'label'		=> 'Sub Menu Color',
			'section'	=> 'colors',
			'selector'	=> '#access .have-submenu a:hover, #access .have-submenu a:link:hover',
			'property'	=> 'color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);
	
	$colors[] = array( 
			'slug'		=> 'tokokoo_sub_menu_background', 
			'default'	=> '#ef7f69', 
			'priority'	=> 10, 
			'label'		=> 'Sub Menu Background',
			'section'	=> 'colors',
			'selector'	=> '#access .sub-menu',
			'property'	=> 'background-color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

	$colors[] = array( 
			'slug'		=> 'tokokoo_breadcrumb_color', 
			'default'	=> '#c56b24', 
			'priority'	=> 11, 
			'label'		=> 'Breadcrumb Color',
			'section'	=> 'colors',
			'selector'	=> '.breadcrumbs a, .breadcrumbs a:link',
			'property'	=> 'color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

	$colors[] = array( 
			'slug'		=> 'tokokoo_breadcrumb_hover_color', 
			'default'	=> '#695b4d', 
			'priority'	=> 12, 
			'label'		=> 'Breadcrumb Hover Color',
			'section'	=> 'colors',
			'selector'	=> '.breadcrumbs a:hover, .breadcrumbs a:link:hover',
			'property'	=> 'color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

	$colors[] = array( 
			'slug'		=> 'tokokoo_primary_button_background', 
			'default'	=> '#ef7f69', 
			'priority'	=> 13, 
			'label'		=> 'Primary Button Background',
			'section'	=> 'colors',
			'selector'	=> '.added_to_cart, .button, button, html input[type="button"], input[type="reset"], input[type="submit"]',
			'property'	=> 'background',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		); 

	$colors[] = array( 
			'slug'		=> 'tokokoo_primary_button_border', 
			'default'	=> '#ce5c45', 
			'priority'	=> 14, 
			'label'		=> 'Primary Button Border',
			'section'	=> 'colors',
			'selector'	=> '.added_to_cart, .button, button, html input[type="button"], input[type="reset"], input[type="submit"]',
			'property'	=> 'border-color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

	$colors[] = array( 
			'slug'		=> 'tokokoo_secondary_button_background', 
			'default'	=> '#ce5c45', 
			'priority'	=> 14, 
			'label'		=> 'Secondary Button Background',
			'section'	=> 'colors',
			'selector'	=> '.added_to_cart[name="update_cart"], .button[name="update_cart"], button[name="update_cart"], html input[type="button"][name="update_cart"], input[type="reset"][name="update_cart"], input[type="submit"][name="update_cart"]',
			'property'	=> 'background',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

/* =====================================================================================================*
 *  Woocommerce Color 										 											*
 * =====================================================================================================*/

	$sections[] = array(
		'slug'		=> 'tokokoo_woocommerce_color',
		'label'		=> 'Woocommerce Colors',
		'priority'	=> 60,
	);

		$colors[] = array( 
			'slug'		=> 'tokokoo_searchform_background', 
			'default'	=> $image_path .'line-bg.png', 
			'priority'	=> 1, 
			'label'		=> 'Searchform Background',
			'section'	=> 'tokokoo_content_color',
			'selector'	=> '.featured-search .searchform',
			'property'	=> 'background',
			'property2'	=> 'repeat 0 0',
			'transport'	=> 'postMessage',
			'type' 		=> 'images'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_price_wrapper', 
			'default'	=> '#fffbfb', 
			'priority'	=> 2, 
			'label'		=> 'Price Wrapper',
			'section'	=> 'tokokoo_woocommerce_color',
			'selector'	=> '.list-item .item-data .item-block',
			'property'	=> 'background-color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_price_wrapper', 
			'default'	=> '#fffbfb', 
			'priority'	=> 3, 
			'label'		=> 'Price Wrapper',
			'section'	=> 'tokokoo_woocommerce_color',
			'selector'	=> '.list-item .item-data .item-block',
			'property'	=> 'background-color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_price_color', 
			'default'	=> '#ef7f69', 
			'priority'	=> 4, 
			'label'		=> 'Price Color',
			'section'	=> 'tokokoo_woocommerce_color',
			'selector'	=> '.list-item .item-data .price',
			'property'	=> 'color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_price_color_sale', 
			'default'	=> '#aaaaaa', 
			'priority'	=> 5, 
			'label'		=> 'Price Color Sale',
			'section'	=> 'tokokoo_woocommerce_color',
			'selector'	=> '.list-item .item-data .price del',
			'property'	=> 'color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_addtocart_color', 
			'default'	=> '#775337', 
			'priority'	=> 6, 
			'label'		=> 'Add To Cart Color',
			'section'	=> 'tokokoo_woocommerce_color',
			'selector'	=> '.list-item .item-data .item-block .added_to_cart, .list-item .item-data .item-block .add-to-cart',
			'property'	=> 'color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_addtocart_hover_color', 
			'default'	=> '#ef7f69', 
			'priority'	=> 7, 
			'label'		=> 'Add To Cart Hover Color',
			'section'	=> 'tokokoo_woocommerce_color',
			'selector'	=> '.list-item .item-data .item-block .added_to_cart:hover, .list-item .item-data .item-block .add-to-cart:hover',
			'property'	=> 'color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_single_price_background', 
			'default'	=> '#ffffff', 
			'priority'	=> 8, 
			'label'		=> 'Single Price Background',
			'section'	=> 'tokokoo_woocommerce_color',
			'selector'	=> '.single-product .summary .price',
			'property'	=> 'background-color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_single_price_color', 
			'default'	=> '#ef7f69', 
			'priority'	=> 9, 
			'label'		=> 'Single Price Color',
			'section'	=> 'tokokoo_woocommerce_color',
			'selector'	=> '.single-product .summary .price',
			'property'	=> 'color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_single_price_border', 
			'default'	=> '#ef7f69', 
			'priority'	=> 10, 
			'label'		=> 'Single Price Border',
			'section'	=> 'tokokoo_woocommerce_color',
			'selector'	=> '.single-product .summary .price',
			'property'	=> 'border-bottom-color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_single_category', 
			'default'	=> '#695b4d', 
			'priority'	=> 11, 
			'label'		=> 'Single Category',
			'section'	=> 'tokokoo_woocommerce_color',
			'selector'	=> '.single-product .summary .product_meta > span, .single-product .data-top .product-author',
			'property'	=> 'color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_single_category_hover', 
			'default'	=> '#ef7f69', 
			'priority'	=> 12, 
			'label'		=> 'Single Category Hover',
			'section'	=> 'tokokoo_woocommerce_color',
			'selector'	=> '.single-product .summary .product_meta > span:hover, .single-product .data-top .product-author:hover',
			'property'	=> 'color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_tab_section_background', 
			'default'	=> '#fffdfb', 
			'priority'	=> 13, 
			'label'		=> 'Tab Section Background',
			'section'	=> 'tokokoo_woocommerce_color',
			'selector'	=> '.single-product .inner-bottom',
			'property'	=> 'background',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_tab_menu_background', 
			'default'	=> '#ef7f69', 
			'priority'	=> 14, 
			'label'		=> 'Tab Menu Background',
			'section'	=> 'tokokoo_woocommerce_color',
			'selector'	=> '.woocommerce-tabs .tabs li a, .tabs-wraps .tabs li a',
			'property'	=> 'background',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_tab_active_background', 
			'default'	=> '#e0bea3', 
			'priority'	=> 15, 
			'label'		=> 'Tab Active Background',
			'section'	=> 'tokokoo_woocommerce_color',
			'selector'	=> '.woocommerce-tabs .tabs li.active a, .woocommerce-tabs .tabs li:hover a, .tabs-wraps .tabs li.active a, .tabs-wraps .tabs li:hover a',
			'property'	=> 'background-color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_tab_menu_border', 
			'default'	=> '#ce5c45', 
			'priority'	=> 16, 
			'label'		=> 'Tab Menu Background',
			'section'	=> 'tokokoo_woocommerce_color',
			'selector'	=> '.woocommerce-tabs .tabs li a, .tabs-wraps .tabs li a',
			'property'	=> 'border-color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_tab_menu_color', 
			'default'	=> '#ffffff', 
			'priority'	=> 17, 
			'label'		=> 'Tab Menu Color',
			'section'	=> 'tokokoo_woocommerce_color',
			'selector'	=> '.woocommerce-tabs .tabs li a, .tabs-wraps .tabs li a',
			'property'	=> 'border-color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_badge_sale_background', 
			'default'	=> '#ef7f69', 
			'priority'	=> 18, 
			'label'		=> 'Badge Sale Background',
			'section'	=> 'tokokoo_woocommerce_color',
			'selector'	=> '.onsale',
			'property'	=> 'background-color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_badge_sale_border', 
			'default'	=> '#ffffff', 
			'priority'	=> 19, 
			'label'		=> 'Badge Sale Border',
			'section'	=> 'tokokoo_woocommerce_color',
			'selector'	=> '.onsale',
			'property'	=> 'border-color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_badge_sale_color', 
			'default'	=> '#ffffff', 
			'priority'	=> 20, 
			'label'		=> 'Badge Sale Color',
			'section'	=> 'tokokoo_woocommerce_color',
			'selector'	=> '.onsale',
			'property'	=> 'color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_author_separator', 
			'default'	=> '#dec9cd', 
			'priority'	=> 21, 
			'label'		=> 'Author Separator',
			'section'	=> 'tokokoo_woocommerce_color',
			'selector'	=> '.about-author .content',
			'property'	=> 'border-bottom-color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);


		


/* =====================================================================================================*
 *  Content Color 										 											*
 * =====================================================================================================*/

	$sections[] = array(
		'slug'		=> 'tokokoo_content_color',
		'label'		=> 'Content Colors',
		'priority'	=> 55,
	);

		$colors[] = array( 
			'slug'		=> 'tokokoo_post_title_color', 
			'default'	=> '#695b4d', 
			'priority'	=> 1, 
			'label'		=> 'Post Title Color',
			'section'	=> 'tokokoo_content_color',
			'selector'	=> '.post-title a',
			'property'	=> 'color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_post_title_hover_color', 
			'default'	=> '#ef7f69', 
			'priority'	=> 2, 
			'label'		=> 'Post Title Hover Color',
			'section'	=> 'tokokoo_content_color',
			'selector'	=> '.post-title a:hover',
			'property'	=> 'color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_post_content_color', 
			'default'	=> '#695b4d', 
			'priority'	=> 3, 
			'label'		=> 'Post Content Color',
			'section'	=> 'tokokoo_content_color',
			'selector'	=> '.blog-home .hentry p',
			'property'	=> 'color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_post_format_icon_background', 
			'default'	=> '#695b4d', 
			'priority'	=> 4, 
			'label'		=> 'Post Format Icon Background',
			'section'	=> 'tokokoo_content_color',
			'selector'	=> '.entry-header:before',
			'property'	=> 'background-color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_comment_background', 
			'default'	=> '#ffffff', 
			'priority'	=> 5, 
			'label'		=> 'Comment Background',
			'section'	=> 'tokokoo_content_color',
			'selector'	=> '.comments-wrap',
			'property'	=> 'background-color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_comment_reply_title', 
			'default'	=> '#ef7f69', 
			'priority'	=> 6, 
			'label'		=> 'Comment Reply Title',
			'section'	=> 'tokokoo_content_color',
			'selector'	=> '#reply-title',
			'property'	=> 'color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_comment_link', 
			'default'	=> '#ef7f69', 
			'priority'	=> 7, 
			'label'		=> 'Comment Link',
			'section'	=> 'tokokoo_content_color',
			'selector'	=> '.comments-wrap a',
			'property'	=> 'color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_boder_color', 
			'default'	=> '#dec9cd', 
			'priority'	=> 8, 
			'label'		=> 'Post Border Color',
			'section'	=> 'tokokoo_content_color',
			'selector'	=> '.blog-single .entry-data, .blog-home .hentry',
			'property'	=> 'border-bottom-color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_boder_color', 
			'default'	=> $image_path .'line-bg.png', 
			'priority'	=> 9, 
			'label'		=> 'Pagination Background',
			'section'	=> 'tokokoo_content_color',
			'selector'	=> '.loop-nav, .pagination',
			'property'	=> 'border-bottom-color',
			'property2'	=> 'repeat 0 0',
			'transport'	=> 'postMessage',
			'type' 		=> 'images'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_boder_color', 
			'default'	=> '#ffffff', 
			'priority'	=> 10, 
			'label'		=> 'Best Selling Background',
			'section'	=> 'tokokoo_content_color',
			'selector'	=> '.featured-bottom .best-sell',
			'property'	=> 'background-color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);


	
/* =====================================================================================================*
 *  Widget Sidebar Color 										 										*
 * =====================================================================================================*/

	$sections[] = array(
		'slug'		=> 'tokokoo_widget_sidebar_color',
		'label'		=> 'Widget Sidebar Colors',
		'priority'	=> 70,
	);

		$colors[] = array( 
			'slug'		=> 'tokokoo_widget_border', 
			'default'	=> '#dec9cd', 
			'priority'	=> 0, 
			'label'		=> 'Widget Top Border',
			'section'	=> 'tokokoo_widget_sidebar_color',
			'selector'	=> '.sidebar .widget',
			'property'	=> 'border-top-color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_widget_title_color', 
			'default'	=> '#695b4d', 
			'priority'	=> 1, 
			'label'		=> 'Widget Title Color',
			'section'	=> 'tokokoo_widget_sidebar_color',
			'selector'	=> '.sidebar .widget .widget-title',
			'property'	=> 'color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_widget_content_link', 
			'default'	=> '#695b4d', 
			'priority'	=> 2, 
			'label'		=> 'Widget Content Link',
			'section'	=> 'tokokoo_widget_sidebar_color',
			'selector'	=> '.widget .cart_list li a, .widget .cart-list li a, .widget .product_list_widget li a',
			'property'	=> 'color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_widget_content_link_hover', 
			'default'	=> '#ef7f69', 
			'priority'	=> 3, 
			'label'		=> 'Widget Content Link',
			'section'	=> 'tokokoo_widget_sidebar_color',
			'selector'	=> '.widget .cart_list li a:hover, .widget .cart-list li a:hover, .widget .product_list_widget li a:hover',
			'property'	=> 'color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_widget_list_border_bottom', 
			'default'	=> '#f3c8c0', 
			'priority'	=> 4, 
			'label'		=> 'Widget item Border',
			'section'	=> 'tokokoo_widget_sidebar_color',
			'selector'	=> '.sidebar .widget ul > li',
			'property'	=> 'border-bottom-color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_widget_tag_cloud', 
			'default'	=> '#ef7f69', 
			'priority'	=> 5, 
			'label'		=> 'Widget Tag Cloud',
			'section'	=> 'tokokoo_widget_sidebar_color',
			'selector'	=> '.tagcloud > a, .tagcloud a:link, .post_tag-cloud > a, .post_tag-cloud a:link, .term-cloud > a, .term-cloud a:link',
			'property'	=> 'background-color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

		
/* =====================================================================================================*
 *  Widget Bottom Color 										 												*
 * =====================================================================================================*/

	$sections[] = array(
		'slug'		=> 'tokokoo_widget_bottom_color',
		'label'		=> 'Widget Bottom Colors',
		'priority'	=> 70,
	);

		$colors[] = array( 
			'slug'		=> 'tokokoo_widget_bottom_title_color', 
			'default'	=> '#2e2925', 
			'priority'	=> 1, 
			'label'		=> 'Widget Bottom Title Color',
			'section'	=> 'tokokoo_widget_bottom_color',
			'selector'	=> '.widget-bottom .widget-title',
			'property'	=> 'color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_widget_bottom_content_link', 
			'default'	=> '#FAF5F1', 
			'priority'	=> 3, 
			'label'		=> 'Widget Bottom Content Link',
			'section'	=> 'tokokoo_widget_bottom_color',
			'selector'	=> '.widget-bottom .widget .product_list_widget a',
			'property'	=> 'color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_widget_bottom_content_border', 
			'default'	=> '#ffffff', 
			'priority'	=> 4, 
			'label'		=> 'Widget Bottom Content Border',
			'section'	=> 'tokokoo_widget_bottom_color',
			'selector'	=> '.widget-bottom .widget .product_list_widget li',
			'property'	=> 'border-bottom-color',
			'transport'	=> 'postMessage',
			'type' 		=> 'color'
		);		

			

/* =====================================================================================================*
 *  General Typography										 												*
 * =====================================================================================================*/
	require_once( trailingslashit ( THEME_DIR ) . 'inc/customizer/googlefont-control.php' );  
	$fetch_font = new Google_Font_Dropdown_Custom_Control();

	$fonts = $fetch_font->get_fonts();

	foreach ($fonts as $key => $value) {
		$gfont[$value->family] = $value->family;
	}


	$sections[] = array(
		'slug'		=> 'tokokoo_genaral_typography',
		'label'		=> 'General Typography',
		'priority'	=> 75,
	);


		$colors[] = array( 
			'slug'		=> 'tokokoo_site_title', 
			'default'	=> 'Droid Sans', 
			'priority'	=> 1, 
			'label'		=> 'Site Title',
			'section'	=> 'tokokoo_genaral_typography',
			'selector'	=> '.site-header #site-title',
			'property'	=> 'font-family',
			'property2'	=> ', san-serif',
			'transport'	=> 'postMessage',
			'choices' 	=> $gfont,
			'type' 		=> 'select_font'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_site_description', 
			'default'	=> 'Bitter', 
			'priority'	=> 2, 
			'label'		=> 'Site Description',
			'section'	=> 'tokokoo_genaral_typography',
			'selector'	=> '.site-header #site-description',
			'property'	=> 'font-family',
			'property2'	=> ', san-serif',
			'transport'	=> 'postMessage',
			'choices' 	=> $gfont,
			'type' 		=> 'select_font'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_header_menu_font', 
			'default'	=> 'Bitter', 
			'priority'	=> 3, 
			'label'		=> 'Site Menu',
			'section'	=> 'tokokoo_genaral_typography',
			'selector'	=> '#access .menu',
			'property'	=> 'font-family',
			'property2'	=> ', san-serif',
			'transport'	=> 'postMessage',
			'choices' 	=> $gfont,
			'type' 		=> 'select_font'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_section_title_font', 
			'default'	=> 'Lato', 
			'priority'	=> 4, 
			'label'		=> 'Section Title',
			'section'	=> 'tokokoo_genaral_typography',
			'selector'	=> '.home-featured .title-featured, .other-featured .title-featured, .featured-bottom .title-blog, .featured-bottom .title-other, .featured-bottom .title-best-sell, .related-portfolio > h3, .products-featured .title-featured, .woocommerce-tabs .panel h2, .tabs-wraps .panel h2, .bottom-two .title, .related > h2',
			'property'	=> 'font-family',
			'property2'	=> ', san-serif',
			'transport'	=> 'postMessage',
			'choices' 	=> $gfont,
			'type' 		=> 'select_font'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_post_title_font', 
			'default'	=> 'Bitter', 
			'priority'	=> 5, 
			'label'		=> 'Post Title',
			'section'	=> 'tokokoo_genaral_typography',
			'selector'	=> '.list-item .item-data .item-title, .post-title, .portfolio .port-title, .featured-bottom .from-blog .entry-title, .featured-bottom .from-blog .other-blog ul li',
			'property'	=> 'font-family',
			'property2'	=> ', san-serif',
			'transport'	=> 'postMessage',
			'choices' 	=> $gfont,
			'type' 		=> 'select_font'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_page_title_font', 
			'default'	=> 'Bitter', 
			'priority'	=> 6, 
			'label'		=> 'Page Title',
			'section'	=> 'tokokoo_genaral_typography',
			'selector'	=> '.page-title',
			'property'	=> 'font-family',
			'property2'	=> ', san-serif',
			'transport'	=> 'postMessage',
			'choices' 	=> $gfont,
			'type' 		=> 'select_font'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_body_font', 
			'default'	=> 'Bitter', 
			'priority'	=> 0, 
			'label'		=> 'Body Font',
			'section'	=> 'tokokoo_genaral_typography',
			'selector'	=> 'body',
			'property'	=> 'font-family',
			'property2'	=> ', san-serif',
			'transport'	=> 'postMessage',
			'choices' 	=> $gfont,
			'type' 		=> 'select_font'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_sidebar_title', 
			'default'	=> 'Lato', 
			'priority'	=> 7, 
			'label'		=> 'Widget Title ',
			'section'	=> 'tokokoo_genaral_typography',
			'selector'	=> '.sidebar .widget .widget-title, .widget-bottom .widget-title',
			'property'	=> 'font-family',
			'property2'	=> ', san-serif',
			'transport'	=> 'postMessage',
			'choices' 	=> $gfont,
			'type' 		=> 'select_font'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_sidebar_content', 
			'default'	=> 'Bitter', 
			'priority'	=> 8, 
			'label'		=> 'Widget Content ',
			'section'	=> 'tokokoo_genaral_typography',
			'selector'	=> '.widget-content',
			'property'	=> 'font-family',
			'property2'	=> ', san-serif',
			'transport'	=> 'postMessage',
			'choices' 	=> $gfont,
			'type' 		=> 'select_font'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_product_title', 
			'default'	=> 'Bitter', 
			'priority'	=> 9, 
			'label'		=> 'Product Price',
			'section'	=> 'tokokoo_genaral_typography',
			'selector'	=> '.list-item .item-data .item-title, .list-item-ii .item-title, .single-product .product-title',
			'property'	=> 'font-family',
			'property2'	=> ', san-serif',
			'transport'	=> 'postMessage',
			'choices' 	=> $gfont,
			'type' 		=> 'select_font'
		);		

		$colors[] = array( 
			'slug'		=> 'tokokoo_product_price_font', 
			'default'	=> 'Bitter', 
			'priority'	=> 10, 
			'label'		=> 'Product Price',
			'section'	=> 'tokokoo_genaral_typography',
			'selector'	=> '.single-product .summary .price, .list-item-ii .price, .list-item .item-data .price',
			'property'	=> 'font-family',
			'property2'	=> ', san-serif',
			'transport'	=> 'postMessage',
			'choices' 	=> $gfont,
			'type' 		=> 'select_font'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_global_heading_font', 
			'default'	=> 'Lato', 
			'priority'	=> 11, 
			'label'		=> 'Global Heading Font',
			'section'	=> 'tokokoo_genaral_typography',
			'selector'	=> 'h1,h2,h3,h4,h5,h6',
			'property'	=> 'font-family',
			'property2'	=> ', san-serif',
			'transport'	=> 'postMessage',
			'choices' 	=> $gfont,
			'type' 		=> 'select_font'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_global_content_font', 
			'default'	=> 'Bitter', 
			'priority'	=> 14, 
			'label'		=> 'Global Content Font',
			'section'	=> 'tokokoo_genaral_typography',
			'selector'	=> 'body p',
			'property'	=> 'font-family',
			'property2'	=> ', san-serif',
			'transport'	=> 'postMessage',
			'choices' 	=> $gfont,
			'type' 		=> 'select_font'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_global_category_font', 
			'default'	=> 'Lato', 
			'priority'	=> 14, 
			'label'		=> 'Global Category Font',
			'section'	=> 'tokokoo_genaral_typography',
			'selector'	=> '.list-item-ii .meta-top, .list-item-ii .meta-bottom, .single-product .summary .product_meta, .single-product .data-top .product-author',
			'property'	=> 'font-family',
			'property2'	=> ', san-serif',
			'transport'	=> 'postMessage',
			'choices' 	=> $gfont,
			'type' 		=> 'select_font'
		);

		$colors[] = array( 
			'slug'		=> 'tokokoo_footer_menu_font', 
			'default'	=> 'Lato', 
			'priority'	=> 15, 
			'label'		=> 'Footer Menu',
			'section'	=> 'tokokoo_genaral_typography',
			'selector'	=> '.footer-menu',
			'property'	=> 'font-family',
			'property2'	=> ', san-serif',
			'transport'	=> 'postMessage',
			'choices' 	=> $gfont,
			'type' 		=> 'select_font'
		);

		

		
	