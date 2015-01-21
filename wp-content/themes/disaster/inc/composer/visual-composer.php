<?php 

/**
 * Woocommerce recent products
 *
 * @author alispx
 **/
vc_map( array(
		'name' 					=> __( 'Recent Products', 'raakbookoo' ),
		'base' 					=> 'recent_products',
		'class' 					=> 'woocommerce-ico',
		'icon' 					=> 'woocommerce-ico',
		'category' 				=> __( 'Woocommerce', 'raakbookoo' ),
		'admin_enqueue_css' 	=> array( get_template_directory_uri() . '/inc/composer/composer-css.css' ),
		'description' 			=> __( 'Woocommerce Recent Product.', 'raakbookoo' ),
		'params' => array(
				array(
					'type' 			=> 'textfield',
					'holder' 		=> 'div',
					'class' 			=> '',
					'heading' 		=> __( 'Select Product Per Page', 'raakbookoo' ),
					'param_name' 	=> 'per_page',
					'value' 			=> 4,
					'description' 	=> __( 'Product Per Page.', 'raakbookoo' )
				),

				array(
					'type' 			=> 'dropdown',
					'holder' 		=> 'div',
					'class' 			=> '',
					'heading' 		=> __( 'Select Product Columns', 'raakbookoo' ),
					'param_name' 	=> 'columns',
					'value' 			=> array( '1', '2', '3', '4' ),
					'description' 	=> __( 'Product Columns.', 'raakbookoo' )
				),

				array(
					'type' 			=> 'dropdown',
					'holder' 		=> 'div',
					'class' 			=> '',
					'heading' 		=> __( 'Order By', 'raakbookoo' ),
					'param_name' 	=> 'orderby',
					'value' 			=> array( 'date', 'popularity', 'rating', 'price', 'price-desc' ),
					'description' 	=> __( 'Order product by.', 'raakbookoo' )
				),

				array(
					'type' 			=> 'dropdown',
					'holder' 		=> 'div',
					'class' 			=> '',
					'heading' 		=> __( 'Order', 'raakbookoo' ),
					'param_name' 	=> 'order',
					'value' 			=> array( 'desc', 'asc' ),
					'description' 	=> __( 'Order.', 'raakbookoo' )
				),

		)
) );

/**
 * Woocommerce Featured products
 *
 * @author alispx
 **/
vc_map( array(
		'name' 					=> __( 'Featured Products', 'raakbookoo' ),
		'base' 					=> 'featured_products',
		'class' 					=> 'woocommerce-ico',
		'icon' 					=> 'woocommerce-ico',
		'category' 				=> __( 'Woocommerce', 'raakbookoo' ),
		'admin_enqueue_css' 	=> array( get_template_directory_uri() . '/composer-css.css' ),
		'description' 			=> __( 'Woocommerce Featured Product.', 'raakbookoo' ),
		'params' => array(
				array(
					'type' 			=> 'textfield',
					'holder' 		=> 'div',
					'class' 			=> '',
					'heading' 		=> __( 'Select Product Per Page', 'raakbookoo' ),
					'param_name' 	=> 'per_page',
					'value' 			=> 4,
					'description' 	=> __( 'Product Per Page.', 'raakbookoo' )
				),

				array(
					'type' 			=> 'dropdown',
					'holder' 		=> 'div',
					'class' 			=> '',
					'heading' 		=> __( 'Select Product Columns', 'raakbookoo' ),
					'param_name' 	=> 'columns',
					'value' 			=> array( '1', '2', '3', '4' ),
					'description' 	=> __( 'Product Columns.', 'raakbookoo' )
				),

				array(
					'type' 			=> 'dropdown',
					'holder' 		=> 'div',
					'class' 			=> '',
					'heading' 		=> __( 'Order By', 'raakbookoo' ),
					'param_name' 	=> 'orderby',
					'value' 			=> array( 'date', 'popularity', 'rating', 'price', 'price-desc' ),
					'description' 	=> __( 'Order product by.', 'raakbookoo' )
				),

				array(
					'type' 			=> 'dropdown',
					'holder' 		=> 'div',
					'class' 			=> '',
					'heading' 		=> __( 'Order', 'raakbookoo' ),
					'param_name' 	=> 'order',
					'value' 			=> array( 'desc', 'asc' ),
					'description' 	=> __( 'Order.', 'raakbookoo' )
				),

		)
) );

/**
 * Woocommerce Product Category
 *
 * @author alispx
 **/
vc_map( array(
		'name' 					=> __( 'Products Category', 'raakbookoo' ),
		'base' 					=> 'product_category',
		'class' 					=> 'woocommerce-ico',
		'icon' 					=> 'woocommerce-ico',
		'category' 				=> __( 'Woocommerce', 'raakbookoo' ),
		'admin_enqueue_css' 	=> array( get_template_directory_uri() . '/composer-css.css' ),
		'description' 			=> __( 'Woocommerce Product Category.', 'raakbookoo' ),
		'params' => array(
				array(
					'type' 			=> 'textfield',
					'holder' 		=> 'div',
					'class' 			=> '',
					'heading' 		=> __( 'Category slug', 'raakbookoo' ),
					'param_name' 	=> 'category',
					'value' 			=> '',
					'description' 	=> __( 'Category Slug.', 'raakbookoo' )
				),

				array(
					'type' 			=> 'textfield',
					'holder' 		=> 'div',
					'class' 			=> '',
					'heading' 		=> __( 'Select Product Per Page', 'raakbookoo' ),
					'param_name' 	=> 'per_page',
					'value' 			=> 4,
					'description' 	=> __( 'Product Per Page.', 'raakbookoo' )
				),

				array(
					'type' 			=> 'dropdown',
					'holder' 		=> 'div',
					'class' 			=> '',
					'heading' 		=> __( 'Select Product Columns', 'raakbookoo' ),
					'param_name' 	=> 'columns',
					'value' 			=> array( '1', '2', '3', '4' ),
					'description' 	=> __( 'Product Columns.', 'raakbookoo' )
				),

				array(
					'type' 			=> 'dropdown',
					'holder' 		=> 'div',
					'class' 			=> '',
					'heading' 		=> __( 'Order By', 'raakbookoo' ),
					'param_name' 	=> 'orderby',
					'value' 			=> array( 'date', 'popularity', 'rating', 'price', 'price-desc' ),
					'description' 	=> __( 'Order product by.', 'raakbookoo' )
				),

				array(
					'type' 			=> 'dropdown',
					'holder' 		=> 'div',
					'class' 			=> '',
					'heading' 		=> __( 'Order', 'raakbookoo' ),
					'param_name' 	=> 'order',
					'value' 			=> array( 'desc', 'asc' ),
					'description' 	=> __( 'Order.', 'raakbookoo' )
				),

		)
) );

/**
 * Woocommerce Best Selling Product
 *
 * @author alispx
 **/
vc_map( array(
		'name' 					=> __( 'Best Selling Products', 'raakbookoo' ),
		'base' 					=> 'best_selling_products',
		'class' 					=> 'woocommerce-ico',
		'icon' 					=> 'woocommerce-ico',
		'category' 				=> __( 'Woocommerce', 'raakbookoo' ),
		'admin_enqueue_css' 	=> array( get_template_directory_uri() . '/composer-css.css' ),
		'description' 			=> __( 'Woocommerce Best Selling Product.', 'raakbookoo' ),
		'params' => array(

				array(
					'type' 			=> 'textfield',
					'holder' 		=> 'div',
					'class' 			=> '',
					'heading' 		=> __( 'Select Product Per Page', 'raakbookoo' ),
					'param_name' 	=> 'per_page',
					'value' 			=> 4,
					'description' 	=> __( 'Product Per Page.', 'raakbookoo' )
				),

				array(
					'type' 			=> 'dropdown',
					'holder' 		=> 'div',
					'class' 			=> '',
					'heading' 		=> __( 'Select Product Columns', 'raakbookoo' ),
					'param_name' 	=> 'columns',
					'value' 			=> array( '1', '2', '3', '4', '5', '6' ),
					'description' 	=> __( 'Product Columns.', 'raakbookoo' )
				),

		)
) );

/**
 * Woocommerce Sale Product
 *
 * @author alispx
 **/
vc_map( array(
		'name' 					=> __( 'Sale Products', 'raakbookoo' ),
		'base' 					=> 'sale_products',
		'class' 					=> 'woocommerce-ico',
		'icon' 					=> 'woocommerce-ico',
		'category' 				=> __( 'Woocommerce', 'raakbookoo' ),
		'admin_enqueue_css' 	=> array( get_template_directory_uri() . '/composer-css.css' ),
		'description' 			=> __( 'Woocommerce Sale Product.', 'raakbookoo' ),
		'params' => array(

				array(
					'type' 			=> 'textfield',
					'holder' 		=> 'div',
					'class' 			=> '',
					'heading' 		=> __( 'Select Product Per Page', 'raakbookoo' ),
					'param_name' 	=> 'per_page',
					'value' 			=> 4,
					'description' 	=> __( 'Product Per Page.', 'raakbookoo' )
				),

				array(
					'type' 			=> 'dropdown',
					'holder' 		=> 'div',
					'class' 			=> '',
					'heading' 		=> __( 'Select Product Columns', 'raakbookoo' ),
					'param_name' 	=> 'columns',
					'value' 			=> array( '1', '2', '3', '4', '5', '6' ),
					'description' 	=> __( 'Product Columns.', 'raakbookoo' )
				),

				array(
					'type' 			=> 'dropdown',
					'holder' 		=> 'div',
					'class' 			=> '',
					'heading' 		=> __( 'Order By', 'raakbookoo' ),
					'param_name' 	=> 'orderby',
					'value' 			=> array( 'date', 'popularity', 'rating', 'price', 'price-desc' ),
					'description' 	=> __( 'Order product by.', 'raakbookoo' )
				),

				array(
					'type' 			=> 'dropdown',
					'holder' 		=> 'div',
					'class' 			=> '',
					'heading' 		=> __( 'Order', 'raakbookoo' ),
					'param_name' 	=> 'order',
					'value' 			=> array( 'desc', 'asc' ),
					'description' 	=> __( 'Order.', 'raakbookoo' )
				),

		)
) );

/**
 * Woocommerce Top Rated Product
 *
 * @author alispx
 **/
vc_map( array(
		'name' 					=> __( 'Top Rated Products', 'raakbookoo' ),
		'base' 					=> 'top_rated_products',
		'class' 					=> 'woocommerce-ico',
		'icon' 					=> 'woocommerce-ico',
		'category' 				=> __( 'Woocommerce', 'raakbookoo' ),
		'admin_enqueue_css' 	=> array( get_template_directory_uri() . '/composer-css.css' ),
		'description' 			=> __( 'Woocommerce Top Rated Product.', 'raakbookoo' ),
		'params' => array(

				array(
					'type' 			=> 'textfield',
					'holder' 		=> 'div',
					'class' 			=> '',
					'heading' 		=> __( 'Select Product Per Page', 'raakbookoo' ),
					'param_name' 	=> 'per_page',
					'value' 			=> 4,
					'description' 	=> __( 'Product Per Page.', 'raakbookoo' )
				),

				array(
					'type' 			=> 'dropdown',
					'holder' 		=> 'div',
					'class' 			=> '',
					'heading' 		=> __( 'Select Product Columns', 'raakbookoo' ),
					'param_name' 	=> 'columns',
					'value' 			=> array( '1', '2', '3', '4', '5', '6' ),
					'description' 	=> __( 'Product Columns.', 'raakbookoo' )
				),

				array(
					'type' 			=> 'dropdown',
					'holder' 		=> 'div',
					'class' 			=> '',
					'heading' 		=> __( 'Order By', 'raakbookoo' ),
					'param_name' 	=> 'orderby',
					'value' 			=> array( 'date', 'popularity', 'rating', 'price', 'price-desc' ),
					'description' 	=> __( 'Order product by.', 'raakbookoo' )
				),

				array(
					'type' 			=> 'dropdown',
					'holder' 		=> 'div',
					'class' 			=> '',
					'heading' 		=> __( 'Order', 'raakbookoo' ),
					'param_name' 	=> 'order',
					'value' 			=> array( 'desc', 'asc' ),
					'description' 	=> __( 'Order.', 'raakbookoo' )
				),

		)
) );

/**
 * Woocommerce Top Rated Product
 *
 * @author alispx
 **/
vc_map( array(
		'name' 					=> __( 'Related Products', 'raakbookoo' ),
		'base' 					=> 'related_products',
		'class' 					=> 'woocommerce-ico',
		'icon' 					=> 'woocommerce-ico',
		'category' 				=> __( 'Woocommerce', 'raakbookoo' ),
		'admin_enqueue_css' 	=> array( get_template_directory_uri() . '/composer-css.css' ),
		'description' 			=> __( 'Woocommerce Related Product.', 'raakbookoo' ),
		'params' => array(

				array(
					'type' 			=> 'textfield',
					'holder' 		=> 'div',
					'class' 			=> '',
					'heading' 		=> __( 'Select Product Per Page', 'raakbookoo' ),
					'param_name' 	=> 'per_page',
					'value' 			=> 4,
					'description' 	=> __( 'Product Per Page.', 'raakbookoo' )
				),

				array(
					'type' 			=> 'dropdown',
					'holder' 		=> 'div',
					'class' 			=> '',
					'heading' 		=> __( 'Select Product Columns', 'raakbookoo' ),
					'param_name' 	=> 'columns',
					'value' 			=> array( '1', '2', '3', '4', '5', '6' ),
					'description' 	=> __( 'Product Columns.', 'raakbookoo' )
				),

				array(
					'type' 			=> 'dropdown',
					'holder' 		=> 'div',
					'class' 			=> '',
					'heading' 		=> __( 'Order By', 'raakbookoo' ),
					'param_name' 	=> 'orderby',
					'value' 			=> array( 'date', 'popularity', 'rating', 'price', 'price-desc' ),
					'description' 	=> __( 'Order product by.', 'raakbookoo' )
				),

		)
) );