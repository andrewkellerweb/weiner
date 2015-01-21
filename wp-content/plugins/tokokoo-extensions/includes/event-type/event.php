<?php
/**
 * Register the 'Event' post type
 * 
 * @package TokokooExtensions
 * @version 1.0
 * @author Tokokooo
 * @copyright Copyright (c) 2013, Tokokoo
 * @license license.txt
 */
if ( ! class_exists( 'Tokokoo_Event_Manager' ) ) :
class Tokokoo_Event_Manager {

	function __construct() {
		
		/* Load the functions files. */
		add_action('init', array(&$this,'includes'), 10);

		add_action('wp_enqueue_scripts',array( &$this ,'loadscript'), 10 );
		
		/* Register activation hook. */
		add_action( 'init', array( $this, 'activation' ) );
	}

	/**
	 * Loads the initial files needed by the plugin.
	 *
	 * @since  1.0
	 * @access public
	 * @return void
	 */
	function includes() {
		require_once( trailingslashit( TOKOKOO_EXTENSIONS_INCLUDES ) . 'event-type/event-type.php' );
		require_once( trailingslashit( TOKOKOO_EXTENSIONS_INCLUDES ) . 'event-type/widget-upcoming-event.php' );
	}

	function loadscript() {

		if( ! is_admin() ) {
			wp_enqueue_script( 'google-maps-api', 'http://maps.googleapis.com/maps/api/js?sensor=true', false );
			wp_enqueue_script( 'tokokoo-maps', trailingslashit( TOKOKOO_EXTENSIONS_ASSETS ) . 'js/gmaps.js' ,array( 'jquery' ), false );
		}
	}

	/**
	 * Method that runs only when the plugin is activated.
	 *
	 * @since  1.0
	 * @access public
	 * @return void
	 */
	function activation() {
		/* Get the administrator role. */
		$role = get_role( 'administrator' );

		/* If the administrator role exists, add required capabilities for the plugin. */
		if ( !empty( $role ) ) {
			$role->add_cap( 'manage_event' );
			$role->add_cap( 'create_event_items' );
			$role->add_cap( 'edit_event_items' );
		}
	}

}

new Tokokoo_Event_Manager();

endif;
