<?php

/**
 * The Template for displaying front end style switcher
 *
 * @author 		Tokokoo
 * @package 	Raakbookoo
 * @version     1.0
 */
?>

<?php if ( true == of_get_option( 'tokokoo_style_switcher' ) ) : ?>

	<div id="tt-theme-settings">

		<a href="#" class="button-setting"><?php _e( 'Setting', 'tokokoo' ); ?></a>

		<div class="inner">

			<div class="tt-layout">
				<h3 class="title-setting"><?php _e( 'Layout', 'tokokoo' ); ?></h3>
				<ul>
					<li><a href="#" data-layout="default-layout"><?php _e( 'default', 'tokokoo' ); ?></a></li>
					<li><a href="#" data-layout="box-layout"><?php _e( 'box', 'tokokoo' ); ?></a></li>
				</ul>
			</div>

			<div class="tt-bg-pattern">
				<h3 class="title-setting"><?php _e( 'Main pattern', 'tokokoo' ); ?></h3>
				<ul>
					<li><a href="#" data-pattern="pattern1">pattern1</a></li>
					<li><a href="#" data-pattern="pattern2">pattern2</a></li>
					<li><a href="#" data-pattern="pattern3">pattern3</a></li>
					<li><a href="#" data-pattern="pattern4">pattern4</a></li>
					<li><a href="#" data-pattern="pattern5">pattern5</a></li>
					<li><a href="#" data-pattern="pattern6">pattern6</a></li>
					<li><a href="#" data-pattern="pattern7">pattern7</a></li>
					<li><a href="#" data-pattern="pattern8">pattern8</a></li>
					<li><a href="#" data-pattern="pattern9">pattern9</a></li>
					<li><a href="#" data-pattern="pattern10">pattern10</a></li>
				</ul>
			</div>

			<div class="tt-bg-pattern-widget">
				<h3 class="title-setting"><?php _e( 'widget pattern', 'tokokoo' ); ?></h3>
				<ul>
					<li><a href="#" data-pattern-widget="pattern1">pattern1</a></li>
					<li><a href="#" data-pattern-widget="pattern2">pattern2</a></li>
					<li><a href="#" data-pattern-widget="pattern3">pattern3</a></li>
					<li><a href="#" data-pattern-widget="pattern4">pattern4</a></li>
					<li><a href="#" data-pattern-widget="pattern5">pattern5</a></li>
					<li><a href="#" data-pattern-widget="pattern6">pattern6</a></li>
					<li><a href="#" data-pattern-widget="pattern7">pattern7</a></li>
					<li><a href="#" data-pattern-widget="pattern8">pattern8</a></li>
					<li><a href="#" data-pattern-widget="pattern9">pattern9</a></li>
					<li><a href="#" data-pattern-widget="pattern10">pattern10</a></li>
				</ul>
			</div>

			<a href="#" class="reset-default">
				<?php _e( 'reset default', 'tokokoo' ); ?>
			</a>

		</div>
	</div>

<?php endif; ?>