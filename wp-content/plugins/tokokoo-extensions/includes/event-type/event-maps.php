<?php 
/*
* Event Maps
*/
function event_add_map_scripts() {?>

	<script type="text/javascript">
	    var map;
	    jQuery(document).ready(function(){
	      map = new GMaps({
	        el: '#map',
	        lat: <?php $event_latitude = get_post_meta( $post->ID, '_event_latitude', true );
	        			$map_latitude = (!empty($event_latitude)) ? get_post_meta( $post->ID, '_event_latitude', true ) : -6.903932 ; echo $map_latitude ?>,
	        lng: <?php $event_longitude = get_post_meta( $post->ID, '_event_longitude', true );
	        			$map_longitude = (!empty($event_longitude)) ? get_post_meta( $post->ID, '_event_longitude', true ) : 107.610344 ; echo $map_longitude ?>,
	        zoom : 15,
	      });
	    
	     map.addMarker({
	        lat: <?php echo $event_latitude; ?>,
	        lng: <?php echo $event_longitude; ?>,
	      });
	    });
	</script>

<?php}

