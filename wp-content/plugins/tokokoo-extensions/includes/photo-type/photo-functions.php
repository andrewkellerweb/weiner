<?php
/**
 * Portfolip post type & shortcode function.
 *
 * @package TokokooExtensions
 * @version 1.0
 * @author Tokokooo
 * @copyright Copyright (c) 2013, Tokokoo
 * @license license.txt
 */

/* Shortcode to display the photo. */
add_shortcode( 'koo-photo-recent', 'tokokoo_photo_shortcode_recent' );
add_shortcode( 'koo-photo-random', 'tokokoo_photo_shortcode_random' );

/**
 * Recent photo shortcode.
 *
 * @since 1.0
 */
function tokokoo_photo_shortcode_recent( $atts ) {

	extract( shortcode_atts( array(
		'per_page'  => '12',
		'orderby' => 'date',
		'order' => 'desc',
		'image_size' => 'thumbnail'
	), $atts ) );

	$args = array(
		'post_type'	=> 'photo',
		'post_status' => 'publish',
		'ignore_sticky_posts' => 1,
		'posts_per_page' => $per_page,
		'orderby' => $orderby,
		'order' => $order
	);

	ob_start();

	$photo = new WP_Query( $args );

	if ( $photo->have_posts() ) : 

		tokokoo_photo_markup( $photo, $image_size );

	endif;

	wp_reset_postdata();

	$output = ob_get_clean();

	return $output;

}


/**
 * Random photo shortcode.
 *
 * @since 1.0
 */
function tokokoo_photo_shortcode_random( $atts ) {

	extract( shortcode_atts( array(
		'per_page'  => '12',
		'image_size' => 'thumbnail'
	), $atts ) );

	$args = array(
		'post_type'	=> 'photo',
		'post_status' => 'publish',
		'ignore_sticky_posts' => 1,
		'posts_per_page' => $per_page,
		'orderby' => 'rand'
	);

	ob_start();

	$photo = new WP_Query( $args );

	if ( $photo->have_posts() ) : 

		tokokoo_photo_markup( $photo, $image_size );

	endif;

	wp_reset_postdata();

	$output = ob_get_clean();

	return $output;

}


/**
 * photo Markup; ready to be overriden in theme
 *
 * @since 1.0
 */
if ( ! function_exists( 'tokokoo_photo_markup' ) ):

	function tokokoo_photo_markup( $photo, $image_size ) {

	?>

		<ul class="photos">

			<?php while ( $photo->have_posts() ) : $photo->the_post(); ?>
							
				<li class="photo">
				
					<?php 
						if ( current_theme_supports( 'get-the-image' ) ) 
							get_the_image( array( 'meta_key' => 'Thumbnail', 'size' => $image_size, 'link_to_post' => false, 'image_class' => 'photo-thumb' ) ); 
					?>

					<div class="entry-content">
						<span class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
					</div>

				</li>

			<?php endwhile; ?>

		</ul><!-- .photos -->

	<?php		

	}

endif;