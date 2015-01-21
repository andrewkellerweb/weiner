<?php 

add_action( 'wp_enqueue_scripts', 'tokokoo_contact_maps_scripts', 40 );
add_action( 'wp_footer', 'tokokoo_add_map_scripts', 99 );

/**
 * Load the Google Maps Scripts.
 *
 * @since 1.0
 */
function tokokoo_contact_maps_scripts() {

	if(is_page_template( 'page-templates/contact.php' )):

		$contact_map_option = of_get_option('tokokoo_contact_maps');

		if($contact_map_option == 1){
			wp_enqueue_script( 'google-maps-api', 'http://maps.googleapis.com/maps/api/js?sensor=true', false );
			wp_enqueue_script( 'maps', get_template_directory_uri().'/js/gmaps.js', false );
			

			}
	endif;
}

/**
 * Add the Google Maps Custom Scripts.
 *
 * @since 1.0
 */
function tokokoo_add_map_scripts() {

	if(is_page_template( 'page-templates/contact.php' )):
	 ?>
	<script type="text/javascript">
	    var map;
	    jQuery(document).ready(function(){
	      map = new GMaps({
	        el: '#map',
	        lat: <?php $latitude = of_get_option('tokokoo_contact_maps_latitude');
	        			$map_latitude = (!empty($latitude)) ? of_get_option('tokokoo_contact_maps_latitude') : -6.903932 ; echo $map_latitude ?>,
	        lng: <?php $longitude = of_get_option('tokokoo_contact_maps_longitude');
	        			$map_longitude = (!empty($longitude)) ? of_get_option('tokokoo_contact_maps_longitude') : 107.610344 ; echo $map_longitude ?>,
	        zoom :<?php $zoom = of_get_option('tokokoo_contact_maps_zoom');
	        			$map_zoom = (!empty($zoom)) ? of_get_option('tokokoo_contact_maps_zoom') : 15 ; echo $map_zoom ?>,
	        
	      });

	     <?php $title = of_get_option('tokokoo_contact_maps_marker_title');
	        			$marker_title = (!empty($title)) ? of_get_option('tokokoo_contact_maps_marker_title') : 'Marker Title' ;?>

	     <?php $content = of_get_option('tokokoo_contact_maps_marker_content');
	        			$marker_content = (!empty($content)) ? of_get_option('tokokoo_contact_maps_marker_content') : 'Marker Content' ;?>

	     var markerTitle = '<h1><?php echo $marker_title ?></h1>';
	     var markerContent = '<p><?php echo $marker_content ?><p>';
	     map.addMarker({
	        lat: <?php echo of_get_option('tokokoo_contact_maps_latitude')?>,
	        lng: <?php echo of_get_option('tokokoo_contact_maps_longitude')?>,
	        title: 'Marker with InfoWindow',
	        infoWindow: {
	          content: markerTitle + markerContent,
	          			
	        }
	      });

	    });
	</script>
	

<?php endif; }
	



	
	
