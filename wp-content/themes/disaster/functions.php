<?php
/* Load the core theme framework. */
require_once( trailingslashit( get_template_directory() ) . 'library/hybrid.php' );
new Hybrid();

/* Load the tokokoo core framework. */
require_once( trailingslashit( get_template_directory() ) . 'core/tokokoo.php' );

/* Do theme setup on the 'after_setup_theme' hook. */
add_action( 'after_setup_theme', 'tokokoo_theme_setup' );

/* Load additional libraries. */
add_action( 'after_setup_theme', 'tokokoo_load_libraries', 15 );

/**
 * Theme setup function. This function adds support for theme features and defines the default theme
 * actions and filters.
 *
 * @since 1.0
 */
function tokokoo_theme_setup() {

	/* Get action/filter hook prefix. */
	$prefix = hybrid_get_prefix();

	/* Set content width. */
	hybrid_set_content_width( 670 );

	/* Tokokoo features. */
	if ( class_exists( 'Tokokoo_Extensions' ) ) {
		add_theme_support( 'tokokoo-post-types', array( 'portfolio','testimonials' ) );
		add_theme_support( 'tokokoo-shortcodes' );
		add_theme_support( 'tokokoo-custom-css' );
		add_theme_support( 'tokokoo-customizer' );
		add_theme_support( 'tokokoo-image-resizer' );
	}

	/* Add theme support for core framework features. */
	add_theme_support( 
		'hybrid-core-menus', 
		array( 'primary', 'subsidiary' ) 
	);
	
	add_theme_support( 
		'hybrid-core-sidebars', 
		array( 'primary' ) 
	);

	/* Add theme support for framework extensions. */
	add_theme_support( 
		'theme-layouts', 
		array( '1c', '1c-full', '2c-l', '2c-r' ), array( 'default' => '2c-l' ) 
	);

	/* Add theme support for WordPress features. */
	add_editor_style();
	add_theme_support( 
		'custom-background',
		array( 'default-color' => 'ffffff' )
	);

	/* Embed width defaults. */
	add_filter( 'embed_defaults', 'tokokoo_embed_defaults' );

	/* Filter the sidebar widgets. */
	add_filter( 'sidebars_widgets', 'tokokoo_disable_sidebars' );
	add_action( 'template_redirect', 'tokokoo_one_column' );
	add_action( 'template_redirect', 'tokokoo_one_column_full' );

	/* Register custom sidebar for widget bottom */
	add_action( 'widgets_init', 'tokokoo_register_bottom_sidebar', 20 );

	/* Add custom image sizes. */
	add_action( 'init', 'tokokoo_add_image_sizes' );
	/* Add custom image sizes custom name. */
	add_filter( 'image_size_names_choose', 'tokokoo_custom_name_image_sizes', 11, 1 );

	/* Load the theme styles & scripts. */
	add_action( 'wp_enqueue_scripts', 'tokokoo_scripts' );

	/* Filter size of the gravatar on comments. */
	add_filter( "{$prefix}_list_comments_args", 'tokokoo_comments_args' );

	/* Load the media grabber. */
	add_theme_support( 'hybrid-core-media-grabber' );

}

/**
 * Loads some additional PHP scripts into the theme for usage.
 *
 * @since 1.0
 */
function tokokoo_load_libraries() {

	/* Get action/filter hook prefix. */
	$prefix = hybrid_get_prefix();

	/* Custom option settings. */
	require_once( trailingslashit ( THEME_DIR ) . 'inc/theme-settings.php' );

	/* Needed plugins. */
	require_once( trailingslashit ( THEME_DIR ) . 'inc/plugins.php' );

	/* Define custom metabox field */
	require_once( trailingslashit ( THEME_DIR ) . 'inc/theme-metabox.php' );

	/* Load Contact Maps Script */
	require_once( trailingslashit ( THEME_DIR ) . 'inc/contact-maps.php' );

	require_once( rtrim( dirname( __FILE__ ), '/' ) . '/inc/plugins/acf-taxonomy-field/taxonomy-field.php' );

	/* Load WooCommerce custom functions if the plugin exist. */
	if ( class_exists( 'woocommerce' ) ) {
		require_once( trailingslashit ( THEME_DIR ) . 'inc/theme-woocommerce.php' );
	}

	/* Theme customizer */
	require_once( trailingslashit ( THEME_DIR ) . 'inc/customizer/customizer-framework.php' );

	/* Visual Composer : next features */
	// if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
	// 	require_once( trailingslashit ( THEME_DIR ) . 'inc/composer/visual-composer.php' );
	// }

}

/**
 * Overwrites the default widths for embeds. This is especially useful for making sure videos properly
 * expand the full width on video pages. This function overwrites what the $content_width variable handles
 * with context-based widths.
 *
 * @since 1.0
 */
function tokokoo_embed_defaults( $args ) {

	$args['width'] = 670;

	if ( current_theme_supports( 'theme-layouts' ) ) {

		$layout = theme_layouts_get_layout();

		if ( 'layout-1c-full' == $layout )
			$args['width'] = 970;

	}

	return $args;
}

/**
 * Function for deciding which pages should have a one-column layout.
 *
 * @since 1.0
 */
function tokokoo_one_column() {
	if ( is_attachment() && 'layout-default' == theme_layouts_get_layout() )
		add_filter( 'get_theme_layout', 'tokokoo_theme_layout_one_column' );
}

/**
 * Function for deciding which pages should have a one-column Full layout.
 *
 * @since 1.0
 */
function tokokoo_one_column_full() {

	if ( is_page_template( 'page-templates/home.php' ) || is_page_template( 'page-templates/shop-v2.php' ) || is_page_template( 'page-templates/portfolio.php' ) || is_page_template( 'page-templates/portfolio-3.php' ) || is_singular('portfolio') || is_tax('portfolio_cat','role')  ){
		add_filter( 'get_theme_layout', 'tokokoo_theme_layout_one_column_full' );
	}
	
	if ( class_exists( 'woocommerce' ) && ( tokokoo_is_woocommerce_pages() ) ) 
		add_filter( 'get_theme_layout', 'tokokoo_theme_layout_one_column_full' );

}

/**
 * Filters 'get_theme_layout' by returning 'layout-1c'.
 *
 * @since 1.0
 */
function tokokoo_theme_layout_one_column( $layout ) {
	return 'layout-1c';
}

/**
 * Filters 'get_theme_layout' by returning 'layout-1c-full'.
 *
 * @since 1.0
 */
function tokokoo_theme_layout_one_column_full( $layout ) {
	return 'layout-1c-full';
}

/**
 * Filters 'get_theme_layout' by returning 'layout-2c-l'.
 *
 * @since 1.0
 */
function tokokoo_theme_layout_two_column_left( $layout ) {
	return 'layout-2c-l';
}

/**
 * Disables sidebars if viewing a one-column page.
 *
 * @since 1.0
 */
function tokokoo_disable_sidebars( $sidebars_widgets ) {

	if ( current_theme_supports( 'theme-layouts' ) && !is_admin() ) {

		if ( 'layout-1c' == theme_layouts_get_layout() || 'layout-1c-full' == theme_layouts_get_layout() ) {
			$sidebars_widgets['primary'] = false;
		}

	}

	return $sidebars_widgets;

}

/**
 * Adds custom image sizes.
 *
 * @since 1.0
 */
function tokokoo_add_image_sizes() {
	add_image_size( 'tokokoo-widget', 45, 45, true );
	add_image_size( 'tokokoo-featured', 670, 377, true );
	add_image_size( 'tokokoo-from-blog', 130, 130, true );
	add_image_size( 'tokokoo-recent-book', 130, 170, true );
	add_image_size( 'tokokoo-blog' , 420, 220, true );
	add_image_size( 'tokokoo-blog-single' , 870, 410, true );
	add_image_size( 'tokokoo-portfolio' , 560, 560, true );
	add_image_size( 'tokokoo-avatar' , 60, 60, true );
}

/**
 * Adds custom image sizes custom name.
 *
 * @since 1.0
 */
function tokokoo_custom_name_image_sizes( $sizes ) {
	$sizes['tokokoo-widget'] = __( 'Widget', 'raakbookoo' );
	$sizes['tokokoo-featured'] = __( 'Featured', 'raakbookoo' );
	$sizes['tokokoo-from-blog'] = __( 'From Blog', 'raakbookoo' );
	$sizes['tokokoo-recent-book'] = __( 'Recent Book', 'raakbookoo' );
	$sizes['tokokoo-blog'] = __( 'Blog List', 'raakbookoo' );
	$sizes['tokokoo-blog-single'] = __( 'Blog Single', 'raakbookoo' );
	$sizes['tokokoo-portfolio'] = __( 'Portfolio', 'raakbookoo' );
	$sizes['tokokoo-avatar'] = __( 'Avatar', 'raakbookoo' );
	return $sizes;
}

/**
 * Load the theme styles & scripts.
 *
 * @since 1.0
 */
function tokokoo_scripts() {
	if(!is_admin()) {
		wp_enqueue_style( 'tokokoo-fonts', 'http://fonts.googleapis.com/css?family=Bitter:400,400italic,700|Lato:400,300,300italic,400italic,700,900,700italic,900italic|Open+Sans:400,700,700italic,300,400italic', false, '1.0', 'all' );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'tokokoo-plugins', trailingslashit ( THEME_URI ) . 'js/plugins.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_script( 'tokokoo-methods', trailingslashit ( THEME_URI ) . 'js/methods.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_script( 'tokokoo-settings', trailingslashit ( THEME_URI ) . 'js/settings.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_script( 'tokokoo-methods', trailingslashit ( THEME_URI ) . 'js/gmaps.js', array( 'jquery' ), '1.0', true );
	}
}

/**
 * Filter size of the gravatar on comments.
 * 
 * @since 1.0
 */
function tokokoo_comments_args( $args ) {
	$args['avatar_size'] = 60;
	return $args;
}


/**
 * Limiting character length
 * 
 * If you don't like to set end of word with (dots), Just remove $ending at $text output variable
 * @since 1.0
 */
function tokokoo_limiter($text, $limit = 25, $ending = '...') { 

	if (strlen($text) > $limit) {
			$text = strip_tags($text);
			$text = substr($text, 0, $limit);
			$text = substr($text, 0, -(strlen(strrchr($text, ' '))));
			$text = $text . $ending;
		}
	
		return $text;
}



/**
 * Registers custom sidebars.
 * 
 * @since 1.0
 */
function tokokoo_register_bottom_sidebar() {
	
	register_sidebars( 4, 
		array(
			'id' => 'bottom',
			'name' => __( 'Bottom #%d', 'raakbookoo' ),
			'description' => __( 'The widget area appears on the bottom page.', 'raakbookoo' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-wrap widget-inside">',
			'after_widget' => '</div></section>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);

}
/**
 * Wrapper start
 * @since 1.0
 */
function tokokoo_wrapper_start(){ ?>

	<section class="content-area <?php tokokoo_dynamic_sidebar_class(); ?>" id="primary">
		<div id="content" class="site-content hfeed">

<?php }
 
/**
 * Wrapper end
 * @since 1.0
 */
function tokokoo_wrapper_end(){
	echo '</div>';
	echo '</section>';
}

/**
 * Wrapper post
 *
 * @access public
 * @param array $atts
 * @return string
 */
function tokokoo_loop_args( $post_type ='', $per_page = 12, $orderby = 'date', $order = 'desc' ){

	$params = array(
		'post_type'	=> $post_type,
		'post_status' => 'publish',
		'ignore_sticky_posts'	=> 1,
		'posts_per_page' => $per_page,
		'orderby' => $orderby,
		'order' => $order
	);

	return $params;
}


/**
 * Login URL on header.php
 * @since 1.0
 */
function tokokoo_login_url() {
	printf( __( '<a href="%s">Login</a>', 'raakbookoo' ), wp_login_url( home_url() ) );
}

/**
 * Logout URL on header.php
 * @since 1.0
 */
function tokokoo_logout_url() {
	printf( __( '<a href="%s">Logout</a>', 'raakbookoo' ), wp_logout_url( home_url() ) );
}


/**
 * Conditional Blog Class
 * @since 1.0
 */
function tokokoo_blog_class() {

	if ( is_single() ) {
		echo 'blog-single';
	} else {
		echo 'blog-home';
	}

}

if ( !is_admin() ) {
	add_filter( 'wp_dropdown_cats', 'tokokoo_dropdown_cats');
}

function tokokoo_dropdown_cats($input) {
	preg_match("~name='([\w\-\_]+)'~", $input, $result);
	$taxonomy = $result[1];
	preg_match_all('~value="([\d]+)"~', $input, $result);
	$terms_ID = $result[1];
	foreach( $terms_ID as $term_ID ) {
		$term = get_term( $term_ID, $taxonomy );
		$input = str_replace('value="'.$term_ID.'"', 'value="'.$term->slug.'"', $input);
	}
	return $input;
}


/**
 * function body attribute
 *
 * @return void
 * @author tokokoo
 **/
function tokokoo_body_attribute() {

	$theme_layout = of_get_option( 'tokokoo_theme_layout' );
	$main_pattern = of_get_option( 'tokokoo_main_pattern' );
	$widget_pattern = of_get_option( 'tokokoo_widget_pattern' );

	if ( 'boxed' == $theme_layout ) {
		$layout = 'data-layout="box-layout"';
	} else {
		$layout = '';
	}

	switch ( $main_pattern ) {
		case 'default':
			$pattern = '';
			break;

		case 'pattern1':
			$pattern = 'data-pattern="pattern1"';
			break;

		case 'pattern2':
			$pattern = 'data-pattern="pattern2"';
			break;

		case 'pattern3':
			$pattern = 'data-pattern="pattern3"';
			break;

		case 'pattern4':
			$pattern = 'data-pattern="pattern4"';
			break;

		case 'pattern5':
			$pattern = 'data-pattern="pattern5"';
			break;

		case 'pattern6':
			$pattern = 'data-pattern="pattern6"';
			break;

		case 'pattern7':
			$pattern = 'data-pattern="pattern7"';
			break;

		case 'pattern8':
			$pattern = 'data-pattern="pattern8"';
			break;

		case 'pattern9':
			$pattern = 'data-pattern="pattern9"';
			break;

		case 'pattern10':
			$pattern = 'data-pattern="pattern10"';
			break;
		
		default:
			$pattern = '';
			break;
	}

	switch ( $widget_pattern ) {
		case 'default':
			$w_pattern = '';
			break;

		case 'pattern1':
			$w_pattern = 'data-pattern-widget="pattern1"';
			break;

		case 'pattern2':
			$w_pattern = 'data-pattern-widget="pattern2"';
			break;

		case 'pattern3':
			$w_pattern = 'data-pattern-widget="pattern3"';
			break;

		case 'pattern4':
			$w_pattern = 'data-pattern-widget="pattern4"';
			break;

		case 'pattern5':
			$w_pattern = 'data-pattern-widget="pattern5"';
			break;

		case 'pattern6':
			$w_pattern = 'data-pattern-widget="pattern6"';
			break;

		case 'pattern7':
			$w_pattern = 'data-pattern-widget="pattern7"';
			break;

		case 'pattern8':
			$w_pattern = 'data-pattern-widget="pattern8"';
			break;

		case 'pattern9':
			$w_pattern = 'data-pattern-widget="pattern9"';
			break;

		case 'pattern10':
			$w_pattern = 'data-pattern-widget="pattern10"';
			break;
		
		default:
			$w_pattern = '';
			break;
	}

	echo $layout .' '. $pattern .' '. $w_pattern;

}
 
