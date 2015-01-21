<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.14
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $woocommerce, $product;

?>
<div class="images">

	<?php
		if ( has_post_thumbnail() ) {

			$image_title 		= esc_attr( get_the_title( get_post_thumbnail_id() ) );
			$image_link  		= wp_get_attachment_url( get_post_thumbnail_id() );
			$image       		= get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
				'title' => $image_title
				) );
			$attachment_count   = count( $product->get_gallery_attachment_ids() );

			if ( $attachment_count > 0 ) {
				$gallery = '[product-gallery]';
			} else {
				$gallery = '';
			}

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s"  rel="prettyPhoto' . $gallery . '">%s</a>', $image_link, $image_title, $image ), $post->ID );

		} else {

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="Placeholder" />', woocommerce_placeholder_img_src() ), $post->ID );

		}
	?>

	<?php do_action( 'woocommerce_product_thumbnails' ); ?>
	
	<?php 
		$display_button = of_get_option( 'tokokoo_sample_file' );

	if ( false == $display_button ) : ?>

		<div class="button-action">
			<?php 
				$preview_file_url  = get_post_meta( get_the_ID(), '_tokokoo_sample_file_url', true );
				$preview_file_path = get_post_meta( get_the_ID(), '_tokokoo_sample_file_path', false );
			?>
			
			<?php if ( ! empty( $preview_file_url ) ) : ?>
				<?php $url = 'https://docs.google.com/viewer?url='.$preview_file_url; ?>
				<a href="<?php echo esc_attr( $url ); ?>" class="button preview" target="_blank"><span class="ico"><?php _e( 'ico', 'raakbookoo' ); ?></span><?php _e( 'preview', 'raakbookoo' ); ?></a>
			<?php endif; ?>

			<?php if ( ! empty ( $preview_file_path ) ) : ?>
				<?php $path = $preview_file_path[0]; ?>
				<a href="<?php echo esc_attr( $path ); ?>" class="button download" target="_blank"><span class="ico"><?php _e( 'ico', 'raakbookoo' ); ?></span><?php _e( 'download', 'raakbookoo' ); ?></a>
			<?php endif; ?>
		</div><!-- End .button-action -->

	<?php endif; ?>
</div>
