<?php 

/**
 * Custom type exploder "explode data from theme option"
 *
 * @return void
 * @author Alispx
 **/
add_action( 'cmb_render_exploder', 'tokokoo_cmb_exploder', 10, 2 );
function tokokoo_cmb_exploder( $field, $meta ) {
	$item = $field['options'];
	foreach ( $item as $value ) {
		if ( $value ) {
			$value = str_replace( "\r", '', $value );
			echo '<label for="'. $field['id']."[$value]". '">', $value, '</label>';
			$a = isset( $meta[$value] ) ? $meta[$value] : '';
			echo '<input type="text" name="'. $field['id']."[$value]". '" id="'. $field['id']."[$value]". '" value="'.$a.'" />';
		}
	}

}

/**
 * Custom Type File List
 *
 * @return void
 * @author Alispx
 **/
add_action( 'cmb_render_file_list', 'tokokoo_cmb_file_list', 20, 2 );
function tokokoo_cmb_file_list( $field, $meta ) {

	echo '<input class="cmb_upload_file" type="text" size="36" name="', $field['id'], '" value="" />';
	echo '<input class="cmb_upload_button button" type="button" value="Upload File" />';
	echo '<p class="cmb_metabox_description">', $field['desc'], '</p>';
		$args = array(
				'post_type' => 'attachment',
				'numberposts' => null,
				'post_status' => null,
				'post_parent' => $post->ID
			);
			$attachments = get_posts($args);
			if ($attachments) {
				echo '<ul class="attach_list">';
				foreach ( $attachments as $attachment ) {
					echo '<li>'.wp_get_attachment_link( $attachment->ID, 'thumbnail', 0, 0, 'Download' );
					echo '<span>';
					echo apply_filters('the_title', '&nbsp;'.$attachment->post_title);
					echo '</span></li>';
				}
				echo '</ul>';
			}
}