<?php
if ( class_exists( 'woocommerce' ) ) {

	/* Disable WooCommerce styles */
	 add_filter( 'woocommerce_enqueue_styles', '__return_false' );
	
	add_theme_support( 'woocommerce' );

	// My account URL on header.php
	function tokokoo_my_account_url() {
		printf ( __( '<a href="%s">My Account</a>', 'raakbookoo' ), get_permalink( wc_get_page_id( 'myaccount' ) ) );
	}

	// Count product in cart
	function tokokoo_cart_count(){
		global $woocommerce;
		$cart_counter = $woocommerce->cart->cart_contents_count;
		echo $cart_counter;
	}
	
	/**
	 * Define image sizes
	 */
	function tokokoo_woocommerce_image_dimensions() {
		$catalog = array(
			'width' => '160', // px
			'height' => '210', // px
			'crop' => 1 // true
		);

		$single = array(
			'width' => '290', // px
			'height' => '360', // px
			'crop' => 1 // true
		);

		$thumbnail = array(
			'width' => '70', // px
			'height' => '70', // px
			'crop' => 1 // true
		);

		// Image sizes
		update_option( 'shop_catalog_image_size', $catalog ); // Product category thumbs
		update_option( 'shop_single_image_size', $single ); // Single product image
		update_option( 'shop_thumbnail_image_size', $thumbnail ); // Image gallery thumbs
	}
	
	/**
	 * Returns true if on WooCommerce pages
	 * Includes: Cart, Checkout, Pay, Thanks (Order Received), View Order, Order Tracking,
	 *   My Account, Edit Address, Change Password, and Term
	 * @return boolean 
	 */
	function tokokoo_is_woocommerce_pages() {
		if ( is_cart() || is_checkout() || is_account_page() ) {
			return true;
		} else {
			return false;
		}
	}
		
	
	/**
	 * Filter product price; return 'Free' if not set
	 */
	function tokokoo_product_price() {
		
		global $product;
		
		if ($price_html = $product->get_price_html()) {
			echo $price_html;
		}
		else {
			_e( 'Free!', 'raakbookoo' );
		}

	}	
	
	
	/** Template Hooks ********************************************************/

	if ( ! is_admin() || defined('DOING_AJAX') ) {
				
		/**
		 * Remove Breadcrumbs
		 */
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
				
		/**
		 * Remove woocommerce hooked functions
		 */
		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
		// remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
		remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
		remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display', 10 );
		
		/** Put other necessary Hook Removal/Addition here */
		
	}

	// Register Custom Taxonomy Author
	function tokokoo_book_author()  {

		$labels = array(
			'name'                       => _x( 'Authors', 'Taxonomy General Name', 'raakbookoo' ),
			'singular_name'              => _x( 'Author', 'Taxonomy Singular Name', 'raakbookoo' ),
			'menu_name'                  => __( 'Author', 'raakbookoo' ),
			'all_items'                  => __( 'All Authors', 'raakbookoo' ),
			'parent_item'                => __( 'Parent Author', 'raakbookoo' ),
			'parent_item_colon'          => __( 'Parent Author:', 'raakbookoo' ),
			'new_item_name'              => __( 'New Author Name', 'raakbookoo' ),
			'add_new_item'               => __( 'Add New Author', 'raakbookoo' ),
			'edit_item'                  => __( 'Edit Author', 'raakbookoo' ),
			'update_item'                => __( 'Update Author', 'raakbookoo' ),
			'separate_items_with_commas' => __( 'Separate authors with commas', 'raakbookoo' ),
			'search_items'               => __( 'Search authors', 'raakbookoo' ),
			'add_or_remove_items'        => __( 'Add or remove authors', 'raakbookoo' ),
			'choose_from_most_used'      => __( 'Choose from the most used authors', 'raakbookoo' ),
		);
		$rewrite = array(
			'slug'                       => apply_filters( 'tokokoo_author_slug', 'authors' ),
			'with_front'                 => true,
			'hierarchical'               => true,
		);
		$args = array(
			'labels'                     => apply_filters( 'tokokoo_author_labels', $labels ),
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true, 
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'query_var'                  => apply_filters( 'tokokoo_publisher_query_var', 'authors' ),
			'rewrite'                    => $rewrite,
		);
		register_taxonomy( 'authors', 'product', $args );

	}

	// Hook into the 'init' action
	add_action( 'init', 'tokokoo_book_author', 0 );


	// Register Custom Taxonomy Publisher
	function tokokoo_book_publisher()  {

		$labels = array(
			'name'                       => _x( 'Publishers', 'Taxonomy General Name', 'raakbookoo' ),
			'singular_name'              => _x( 'Publisher', 'Taxonomy Singular Name', 'raakbookoo' ),
			'menu_name'                  => __( 'Publisher', 'raakbookoo' ),
			'all_items'                  => __( 'All Publishers', 'raakbookoo' ),
			'parent_item'                => __( 'Parent Publisher', 'raakbookoo' ),
			'parent_item_colon'          => __( 'Parent Publisher:', 'raakbookoo' ),
			'new_item_name'              => __( 'New Publisher Name', 'raakbookoo' ),
			'add_new_item'               => __( 'Add New Publisher', 'raakbookoo' ),
			'edit_item'                  => __( 'Edit Publisher', 'raakbookoo' ),
			'update_item'                => __( 'Update Publisher', 'raakbookoo' ),
			'separate_items_with_commas' => __( 'Separate publishers with commas', 'raakbookoo' ),
			'search_items'               => __( 'Search publishers ', 'raakbookoo' ),
			'add_or_remove_items'        => __( 'Add or remove publishers ', 'raakbookoo' ),
			'choose_from_most_used'      => __( 'Choose from the most used publishers ', 'raakbookoo' ),
		);
		$rewrite = array(
			'slug'                       => apply_filters( 'tokokoo_publisher_slug', 'publisher' ),
			'with_front'                 => true,
			'hierarchical'               => true,
		);
		$args = array(
			'labels'                     => apply_filters( 'tokokoo_publisher_labels', $labels ),
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'query_var'                  => apply_filters( 'tokokoo_publisher_query_var', 'publisher' ),
			'rewrite'                    => $rewrite,
		);
		register_taxonomy( 'publisher', 'product', $args );

	}

	// Hook into the 'init' action
	add_action( 'init', 'tokokoo_book_publisher', 0 );

	/**
	 * Get Recent Products
	 *
	 * @access public
	 * @param array $atts
	 * @return string
	 */
	function tokokoo_get_product( $per_page = 12, $meta_key = '', $meta_value='', $orderby = 'date', $order = 'desc' ){

		global $woocommerce_loop, $woocommerce;

		$args = array(
			'post_type'	=> 'product',
			'post_status' => 'publish',
			'ignore_sticky_posts'	=> 1,
			'posts_per_page' => $per_page,
			'meta_key' => $meta_key,
			'meta_value' => $meta_value,
			'orderby' => $orderby,
			'order' => $order
		);

		ob_start();
		$products = new WP_Query( $args );

		if ( $products->have_posts() ) : ?>
			
			<?php woocommerce_product_loop_start(); ?>

				<?php while ( $products->have_posts() ) : $products->the_post(); ?>
					<?php woocommerce_get_template_part( 'content', 'product' ); ?>
				<?php endwhile; // end of the loop. ?>
			
			<?php woocommerce_product_loop_end(); ?>
			
		<?php else: ?>
			<?php woocommerce_get_template( 'loop/no-products-found.php' ); ?>
		<?php endif;
		wp_reset_postdata();

		return ob_get_clean();
	}

	/**
	 * Wrapper product loop
	 *
	 * @access public
	 * @param array $atts
	 * @return string
	 */
	function tokokoo_product_args( $per_page = 12, $meta_key = '', $meta_value='', $orderby = 'date', $order = 'desc' ){

		$params = array(
			'post_type'	=> 'product',
			'post_status' => 'publish',
			'ignore_sticky_posts'	=> 1,
			'posts_per_page' => $per_page,
			'meta_key' => $meta_key,
			'meta_value' => $meta_value,
			'orderby' => $orderby,
			'order' => $order
		);

		return $params;
	}

	// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
	add_filter('add_to_cart_fragments', 'tokokoo_header_add_to_cart_fragment');
	function tokokoo_header_add_to_cart_fragment( $fragments ) {
		global $woocommerce;
		
		ob_start(); ?>

		<a class="cart-text" href="#"><?php _e( 'My Cart', 'raakbookoo' ); ?>
			<span class="mycart"><?php tokokoo_cart_count(); ?></span>
		</a>
		
		<?php
		$fragments['a.cart-text'] = ob_get_clean();
		
		return $fragments;
	}

	/**
	 * Conditional Product Class
	 *
	 * @since 1.0
	 */
	function tokokoo_product_ul_class() {

		if ( is_page_template( 'page-templates/shop-v2.php' ) ) {
			echo '';
		} else {
			echo 'style-i';
		}
	}

	/**
	 * Controlling single page thumbnail
	 *
	 * @since 1.2.1
	 */
	add_action( 'wp_enqueue_scripts', 'tokokoo_display_single_thumbnail', 99 );
	function tokokoo_display_single_thumbnail() {

		$display_thumbnail = of_get_option( 'tokokoo_single_thumbnail' );

		if ( true == $display_thumbnail ) { ?>
			<style type="text/css">.thumbnails { display: block !important; margin-top : 10px; }</style>
		<?php }
	}
	
}
?>