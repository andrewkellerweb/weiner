<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 * 
 * @author 		Tokokoo
 * @package 	raakbookoo
 * @version     1.0
 */


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array('list-item');
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';
?>

<li <?php post_class( $classes ); ?>>

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
	
	<div class="inner">
		<figure class="item-img">
			<?php
				/**
				 * woocommerce_before_shop_loop_item_title hook
				 *
				 * @hooked woocommerce_show_product_loop_sale_flash - 10
				 * @hooked woocommerce_template_loop_product_thumbnail - 10
				 */
				do_action( 'woocommerce_before_shop_loop_item_title' );
			?>
		</figure>
		
		<div class="item-data">
			<h2 class="item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<span class="item-meta"></span>

			<div class="item-block">
				<div class="inner-block">
					<?php
						/**
						 * woocommerce_after_shop_loop_item_title hook
						 *
						 * @hooked woocommerce_template_loop_price - 10
						 */
						do_action( 'woocommerce_after_shop_loop_item_title' );

						woocommerce_template_loop_add_to_cart();
					?>
				</div>
			</div>
		</div><!-- End .item-data -->	
	</div><!-- End .inner -->

	<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>

</li>