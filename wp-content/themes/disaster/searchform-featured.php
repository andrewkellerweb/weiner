<?php 

/**
 * The Template for displaying custom searchform.
 * 
 * @author 		Tokokoo
 * @package 	Raakbookoo
 * @version     1.0
 */

global $force_display;

if ( is_shop() ) { ?>

	<div class="featured-search just-for-shop">
		<div class="container">
			<div class="searchform">

				<form action="<?php echo esc_url( home_url( '/' ) ); ?>" id="searchform" method="get" role="search">
					<div>
						<label for="s" class="screen-reader-text"><?php _e( 'Search', 'raakbookoo' ); ?></label>
						<input type="text" id="s" class="input-text" name="s" value="<?php echo get_search_query() ?>">
						
						<?php
							$category = get_term_by( 'slug', get_query_var( 'product_cat' ), 'product_cat' ); 
							$cat_args = array(
										'taxonomy'        =>'product_cat',
										'show_option_all' => __( 'All Categories', 'raakbookoo' ),
										'hide_empty'      => 1,
										'orderby'         => 'ID',
										'order'           => 'ASC',
										'name'            => 'product_cat'
							);
							$category = get_term_by( 'slug', get_query_var( 'product_cat' ), 'product_cat' ); 
							if ( $category ) {
								$cat_args['selected'] = $category->term_id;							
							}
							wp_dropdown_categories( $cat_args );
						 ?>

						<?php 
							$author = get_term_by( 'slug', get_query_var( 'authors' ), 'authors' ); 
							$author_args = array(
										'taxonomy'        =>'authors',
										'show_option_all' => __( 'All Authors', 'raakbookoo' ),
										'hide_empty'      => 1,
										'orderby'         => 'ID',
										'order'           => 'ASC',
										'name'            => 'authors'
							);
							$author = get_term_by( 'slug', get_query_var( 'authors' ), 'authors' ); 
							if ( $author ) {
								$author_args['selected'] = $author->term_id;
							}
							wp_dropdown_categories( $author_args );
						 ?>
						<input type="submit" value="<?php _e( 'Search', 'raakbookoo' ); ?>" id="searchsubmit">

						<span class="separator"></span>

					</div>

				</form>
					<?php if ( class_exists( 'woocommerce' ) ) : 
						woocommerce_catalog_ordering();
					endif;?>
			</div><!-- End .searchform -->

		</div>
		
	</div><!-- End .featured-search -->


<?php } elseif ( ! is_front_page() || true === $force_display ) { ?>

	<div class="featured-search first-style for-all-page">
		<div class="container">
			<div class="searchform">

				<form action="<?php echo esc_url( home_url( '/' ) ); ?>" id="searchform" method="get" role="search">
					<div>
						<span class="text-search">
							<?php _e( 'Need to find particular books?', 'raakbookoo' ); ?> 
						</span>

						<label for="s" class="screen-reader-text"><?php _e( 'Search', 'raakbookoo' ); ?></label>
						<input type="text" id="s" class="input-text" name="s" value="<?php echo get_search_query() ?>">

						<?php
							$category = get_term_by( 'slug', get_query_var( 'product_cat' ), 'product_cat' ); 
							$cat_args = array(
										'taxonomy'        =>'product_cat',
										'show_option_all' => __( 'All Categories', 'raakbookoo' ),
										'hide_empty'      => 1,
										'orderby'         => 'ID',
										'order'           => 'ASC',
										'name'            => 'product_cat'
							);
							$category = get_term_by( 'slug', get_query_var( 'product_cat' ), 'product_cat' ); 
							if ( $category ) {
								$cat_args['selected'] = $category->term_id;							
							}							
							wp_dropdown_categories( $cat_args );
						 ?>

						<?php 
							$author = get_term_by( 'slug', get_query_var( 'authors' ), 'authors' ); 
							$author_args = array(
										'taxonomy'        =>'authors',
										'show_option_all' => __( 'All Authors', 'raakbookoo' ),
										'hide_empty'      => 1,
										'orderby'         => 'ID',
										'order'           => 'ASC',
										'name'            => 'authors'
							);
							$author = get_term_by( 'slug', get_query_var( 'authors' ), 'authors' ); 
							if ( $author ) {
								$author_args['selected'] = $author->term_id;
							}
							wp_dropdown_categories( $author_args );
						 ?>

						<input type="submit" value="<?php _e( 'Search book', 'raakbookoo' ); ?>" id="searchsubmit">
						<input type="hidden" name="post_type" value="product" />

					</div>

				</form>

			</div><!-- End .searchform -->

		</div>

	</div><!-- End .featured-search .first-style-->

<?php } ?>
		
