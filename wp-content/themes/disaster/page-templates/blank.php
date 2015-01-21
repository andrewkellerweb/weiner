<?php 

/**
 * Template Name: Blank
 *
 *
 */
?>

<!DOCTYPE html>
<!--[if IE 8]>    <html class="ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]>    <html class="ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">

<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->

<title><?php hybrid_document_title(); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

</head>

<body id="root" class="<?php hybrid_body_class(); ?>" <?php tokokoo_body_attribute(); ?>>

	<?php
		// Activate warning message for IE users.
		tokokoo_ie_warning_message(); 
	?>
	
	<div class="site" id="page">

		<header id="masthead" class="site-header cl" role="banner">

			<div class="header-top">
			
				<div class="container">
					<?php tokokoo_site_title();?>

					<nav class="wrap-account-top">
						<ul class="account-top">
							<?php if( ! is_user_logged_in() ) { ?>
							
								<?php if ( function_exists( 'tokokoo_my_account_url' ) ) : ?>
									<li class="my-account use-sprite" title="<?php _e( 'My Account', 'raakbookoo' ); ?>"><?php tokokoo_my_account_url(); ?></li>
								<?php else : ?>
									<li class="my-login use-sprite" title="<?php _e( 'Login', 'raakbookoo' ); ?>"><a href="<?php echo wp_login_url( home_url() ); ?>"><?php _e( 'Login', 'raakbookoo' ); ?></a></li>
								<?php endif; ?>

							<?php } else { ?>

								<?php if ( function_exists( 'tokokoo_my_account_url' ) ) : ?>
									<li class="my-account use-sprite" title="<?php _e( 'My Account', 'raakbookoo' ); ?>"><?php tokokoo_my_account_url(); ?></li>
								<?php endif; ?>
								<li class="my-logout use-sprite" title="<?php _e( 'Logout', 'raakbookoo' ); ?>"><?php tokokoo_logout_url(); ?></li>

							<?php } ?>

							<?php if ( class_exists( 'woocommerce' ) ) : ?>

								<li class="my-cart use-sprite">
									<a class="cart-text" href="#"><?php _e( 'my carts', 'raakbookoo' ); ?></a>
									<span class="mycart"><?php tokokoo_cart_count(); ?></span>
									
									<!-- Dropdown Cart  -->
									<?php the_widget( 'WC_Widget_Cart' ); ?>
								</li>

							<?php endif; ?>

								<li class="search use-sprite">
									<a href="#" class="open-search"><?php _e( 'open', 'raakbookoo' ); ?></a>
									<ul class="data-search">
										<li>
											<div class="search-top">
												<?php
													if ( is_plugin_active( 'yith-woocommerce-ajax-search/init.php' ) && class_exists( 'woocommerce' ) ) {
														woocommerce_get_template_part( 'yith-woocommerce-ajax-search' );
													} else {
														get_search_form();
													}
												?>
											</div><!-- End .top-search -->
										</li>
									</ul><!-- End .data-search -->
								</li>
						</ul><!-- End .account -->
					</nav><!-- End Nav -->
				</div><!-- .container -->
			</div><!-- End .header-top -->

			<div class="access-wrap">
				<div class="container">
					<?php get_template_part( 'menu', 'primary' ) ?>
				</div><!-- End .container -->
			</div><!-- End .access-wrap -->
			
		</header><!-- End #masthead -->

		<div class="site-main" id="main">
			
			<div class="container">

				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php the_content(); ?>

					<?php endwhile; ?>

				<?php endif; ?>

<?php get_footer(); // Loads the footer.php template. ?>
	
	
