
<div class="other-featured recent-book cl">
	<h2 class="title-featured"><?php _e( 'Recent Book', 'raakbookoo' ); ?></h2>
	
	<?php 
		$args = tokokoo_loop_args('product',3);
		global $post, $product;

		$recent_product = new WP_Query($args);?>
		<?php if ($recent_product->have_posts()) : ?>
		<ul class="wrap-item-ii">
			<?php while ($recent_product->have_posts()) : $recent_product->the_post(); ?>
				<li class="list-item-ii">
					<div class="item-left">
						<figure class="item-thumb">
							<?php 
								if ( current_theme_supports( 'get-the-image' ) ) 
								get_the_image( array( 'meta_key' => 'Thumbnail', 'size' => 'tokokoo-recent-book', 'link_to_post' => true,'default_image'=>'http://placehold.it/130x170' ) ); 
							?>
						</figure>
					</div>

					<div class="item-right">
						<span class="meta-top">
							<?php $publishers = wp_get_object_terms( $post->ID, 'publisher' ); ?>
							<?php foreach ($publishers as $publisher) {?>
								<a href="<?php echo get_term_link($publisher->slug,'publisher'); ?>"><?php echo $publisher->name .', ';?></a>
							<?php } ?>
						</span>
						<h2 class="item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<span class="meta-bottom">
							<?php $authors = wp_get_object_terms( $post->ID, 'authors' ); ?>
							<?php foreach ($authors as $author) {?>
									<a href="<?php echo get_term_link($author->slug,'authors'); ?>"><?php echo $author->name .', ';?></a>
							<?php } ?>
						</span>
						<p class="item-description"><?php echo tokokoo_limiter($post->post_content,100); ?></p>
						<?php woocommerce_get_template('loop/price.php'); ?>
						<?php woocommerce_template_loop_add_to_cart(); ?>
					</div><!-- End .item-right -->

				</li><!-- End .list-item-ii -->
			<?php endwhile; ?>
		</ul>
	<?php endif; ?>
	<?php wp_reset_postdata(); ?>

</div><!-- End .recent-book -->