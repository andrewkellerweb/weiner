<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div itemscope itemtype="http://schema.org/Product" id="product-<?php the_ID(); ?>" <?php post_class('inner cl'); ?>>
	<div class="wrap-left">
		<?php
			/**
			 * woocommerce_show_product_images hook
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary' );
		?>

	</div>
	
	<div class="wrap-right">
		<div class="summary entry-summary">
			<div class="right-inner">
				
				<?php woocommerce_template_single_price(); ?>

				<div class="data-top">

					<div class="product_meta">
						<span class="posted_in">
							<?php $publishers = wp_get_object_terms( $post->ID, 'publisher' ); ?>
							<?php foreach ( $publishers as $publisher ) { ?>
								<a href="<?php echo get_term_link( $publisher->slug,'publisher' ); ?>"><?php echo $publisher->name .', ';?></a>
							<?php } ?>
						</span>
					</div>
			
					<!-- Product Title -->
					<h2 class="product-title">
						<?php the_title(); ?>
					</h2>

					<div class="product-author">
						<?php $authors = wp_get_object_terms( $post->ID, 'authors' ); ?>
						<?php foreach ( $authors as $author ) {?>
								<a href="<?php echo get_term_link( $author->slug, 'authors' ); ?>"><?php echo $author->name .', ';?></a>
						<?php } ?>
					</div>
				</div><!-- End .data-top -->

				<div class="product-description" itemprop="description">


					<?php
						/**
						 * woocommerce_single_product_summary hook
						 *
						 * @hooked woocommerce_template_single_title - 5 :removed
						 * @hooked woocommerce_template_single_price - 10 :removed
						 * @hooked woocommerce_template_single_excerpt - 20
						 * @hooked woocommerce_template_single_add_to_cart - 30 :removed
						 * @hooked woocommerce_template_single_meta - 40
						 * @hooked woocommerce_template_single_sharing - 50
						 */
						do_action( 'woocommerce_single_product_summary' );
					?>
					<p class="products-note">
						<?php woocommerce_template_single_meta(); ?>
					</p>
						
					<?php woocommerce_template_single_add_to_cart(); ?>
					
					
					
						
				</div><!-- End .product-description -->
				
			</div>
		</div><!-- .summary -->
	</div>


</div><!-- #product-<?php the_ID(); ?> -->

<div class="inner-bottom cl">
	<?php
		/**
		 * woocommerce_after_single_product_summary hook
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_output_related_products - 20 : removed
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>
</div><!-- End .inner-bottom -->

<div class="bottom-two">
	<div class="two-inner cl">

		<?php 
			$details_product = of_get_option( 'tokokoo_book_details_section' ); 

		if ( false == $details_product ) : ?>

			<div class="detail-product">
				<h3 class="title"><?php _e( 'detail product', 'raakbookoo' ); ?></h3>

				<div class="content">
					<ul>
						<?php $metas = get_post_meta( $post->ID, '_tokokoo_book_details', false ); ?>
							<?php
							if ( $metas ) {
								foreach ( $metas as $key=>$value ) {
									foreach ( $value as $label => $item ) { ?>
										<li><?php echo $label ?> : <span class="value"><?php echo $item; ?></span></li>
									<?php }
								}
							 } else {
								_e( 'No detail information', 'raakbookoo' );
							 }?>
					</ul>
				</div><!-- End .content -->
			</div>

		<?php endif; ?>
		
		<?php 
			$about_author = of_get_option( 'tokokoo_author_info' ); 

		if ( false == $about_author ) : ?>

		<div class="about-author">
			<h4 class="title"><?php _e('about the author','raakbookoo' ); ?></h4>
			
				<?php
			        if ( has_term( '', 'authors' ) ) {
			            $authors=get_the_terms( get_the_ID(), 'authors' );  

			            foreach($authors as $author){ 
			            	$termlink = get_term_link( $author->slug, 'authors' );?>
			            	
							<div class="content">
							<?php if ( get_field( 'book_authors', 'authors_'.$author->term_id ) ) { ?>
			                	<a class="author-ava" href="<?php echo $termlink; ?>">
			                		<img src="<?php the_field( 'book_authors', 'authors_'.$author->term_id ); ?>" alt="<?php echo $author->name; ?>" width="60" >
			                	</a>
			                <?php } else { ?>
								<a href="<?php echo $termlink; ?>">
									<img class="author-ava" src="<?php echo get_template_directory_uri().'/img/avatar.png'; ?>" alt="Author">
								</a>
			                <?php } ?>
								<p class="author-des"><?php echo $author->description; ?></p>
							</div><!-- End .content -->
			        <?php }
			        } else {
			        	_e( 'No Author assigned to this book', 'raakbookoo' );
			        }
				?>
			
		</div><!-- End .about-author -->

		<?php endif; ?>
		
	</div><!-- End .two-inner -->

</div><!-- End .bottom-two -->

<?php woocommerce_output_related_products(); ?>

<?php woocommerce_upsell_display(); ?>

<?php do_action( 'woocommerce_after_single_product' ); ?>