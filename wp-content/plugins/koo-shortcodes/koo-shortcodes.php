<?php
/*
Plugin Name: Koo Shortcodes
Plugin URI: http://tokokoo.com
Description: A simple shortcode generator.
Version: 0.1
Author: Tokokoo
Author URI: http://tokokoo.com
Author Email: satrya@tokokoo.com
License: GPLv2

This shortcodes plugin is a fork version from ZillaShortcodes - http://www.themezilla.com/plugins/zillashortcodes
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'Koo_Shortcodes' ) ) :

class Koo_Shortcodes {

	/**
	 * PHP5 constructor method.
	 *
	 * @since 0.1
	 */
    public function __construct() {

		add_action( 'plugins_loaded', array( &$this, 'constants' ), 1 );

		add_action( 'plugins_loaded', array( &$this, 'i18n' ), 2 );

		add_action( 'plugins_loaded', array( &$this, 'includes' ), 3 );
		
        add_action( 'init', array( &$this, 'init' ) );

        add_action( 'init', array( &$this, 'tinymce' ) );

        add_action( 'admin_init', array( &$this, 'admin_init' ) );

	}

	/**
	 * Defines constants used by the plugin.
	 *
	 * @since 0.1
	 */
	public function constants() {

		define( 'KOO_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );

		define( 'KOO_URI', trailingslashit( plugin_dir_url( __FILE__ ) ) );

		define( 'KOO_TINYMCE_DIR', KOO_DIR .'tinymce' );

    	define( 'KOO_TINYMCE_URI', KOO_URI .'tinymce' );

	}

	/**
	 * Loads the translation files.
	 *
	 * @since 0.1
	 */
	public function i18n() {

		/* Load the translation of the plugin. */
		load_plugin_textdomain( 'koo', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

	}

	/**
	 * Loads the initial files needed by the plugin.
	 *
	 * @since 0.1
	 */
	public function includes() {

    	require_once( KOO_DIR .'shortcodes.php' );

	}
	
	/**
	 * Enqueue scripts & styles for the front-end
	 *
	 * @since 0.1
	 */
	public function init() {

		if( ! is_admin() ) {

			wp_enqueue_style( 'koo-shortcodes', KOO_URI . 'shortcodes.css' );
			wp_enqueue_script( 'jquery-ui-accordion' );
			wp_enqueue_script( 'jquery-ui-tabs' );
			wp_enqueue_script( 'koo-shortcodes-lib', KOO_URI . 'js/koo-shortcodes-lib.js', array( 'jquery', 'jquery-ui-accordion', 'jquery-ui-tabs' ), '0.1', true );

		}

	}
	
	/**
	 * Registers TinyMCE rich editor buttons
	 *
	 * @since 0.1
	 */
	public function tinymce() {
		
		if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) )
			return;
	
		if ( get_user_option('rich_editing') == 'true' ) {
			add_filter( 'mce_external_plugins', array( &$this, 'add_rich_plugins' ) );
			add_filter( 'mce_buttons', array( &$this, 'register_rich_buttons' ) );
		}

	}
	
	/**
	 * Defins TinyMCE rich editor js plugin
	 *
	 * @since 0.1
	 */
	function add_rich_plugins( $plugin_array ) {

		$plugin_array['kooShortcodes'] = KOO_TINYMCE_URI . '/plugin.js';
		return $plugin_array;

	}
	
	/**
	 * Adds TinyMCE rich editor buttons
	 *
	 * @since 0.1
	 */
	function register_rich_buttons( $buttons ) {

		array_push( $buttons, "|", 'koo_button' );
		return $buttons;

	}
	
	/**
	 * Enqueue scripts and styles for the admin page
	 *
	 * @since 0.1
	 */
	public function admin_init() {
		// css
		wp_enqueue_style( 'koo-popup', KOO_TINYMCE_URI . '/css/popup.css', false, '1.0', 'all' );
		
		// js
		wp_enqueue_script( 'jquery-ui-sortable' );
		wp_enqueue_script( 'jquery-livequery', KOO_TINYMCE_URI . '/js/jquery.livequery.js', false, '1.1.1', false );
		wp_enqueue_script( 'jquery-appendo', KOO_TINYMCE_URI . '/js/jquery.appendo.js', false, '1.0', false );
		wp_enqueue_script( 'base64', KOO_TINYMCE_URI . '/js/base64.js', false, '1.0', false );
		wp_enqueue_script( 'koo-popup', KOO_TINYMCE_URI . '/js/popup.js', false, '1.0', false );
		
		wp_localize_script( 'jquery', 'KooShortcodes', array( 'plugin_folder' => WP_PLUGIN_URL .'/koo-shortcodes' ) );

	}
    
}

$koo_shortcodes = new Koo_Shortcodes();

endif;
?>