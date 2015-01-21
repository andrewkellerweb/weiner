<?php 

/**
 * The Template for displaying searchform.
 * 
 * @author 		Tokokoo
 * @package 	Raakbookoo
 * @version     1.0
 */
 ?>
 
<form class="searchform" id="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<label class="assistive-text" for="s"><?php _e( 'Search', 'raakbookoo' ); ?></label>
	<input class="input-text" type="text" placeholder="Search" id="s" name="s">
	<input type="submit" value="Search" id="searchsubmit" name="submit">
</form><!-- .searchform -->