<?php

if ( ! class_exists( 'WP_Customize_Control' ) )
	return NULL;

/**
 * A class to create a dropdown for all google fonts
 */
 class Google_Font_Dropdown_Custom_Control {
   

	/**
	 * Get the google fonts from the API or in the cache
	 *
	 * @param  integer $amount
	 *
	 * @return String
	 */
	public function get_fonts( $amount = 100 ) {
		
		$selectDirectory = get_template_directory(). '/inc/customizer/';
		$selectDirectoryInc = get_template_directory(). '/inc/customizer/';

		$finalselectDirectory = '';

		if ( is_dir( $selectDirectory ) ) {
			$finalselectDirectory = $selectDirectory;
		}

		if ( is_dir( $selectDirectoryInc ) ) {
			$finalselectDirectory = $selectDirectoryInc;
		}

		$fontFile = $finalselectDirectory . '/cache/google-web-fonts.txt';

		//Total time the file will be cached in seconds, set to a week
		$cachetime = 86400 * 7;

		if ( file_exists( $fontFile ) && $cachetime < filemtime( $fontFile ) ) {
			$content = json_decode( file_get_contents( $fontFile ) );
		} else {

			$googleApi = 'https://www.googleapis.com/webfonts/v1/webfonts?sort=popularity&key={API_KEY}';

			$fontContent = wp_remote_get( $googleApi, array( 'sslverify'   => false ) );

			$fp = fopen( $fontFile, 'w' );
			fwrite( $fp, $fontContent['body'] );
			fclose( $fp );

			$content = json_decode( $fontContent['body'] );
		}

		if( $amount == 'all' ) {
			return $content->items;
		} else {
			return array_slice( $content->items, 0, $amount );
		}
	}
 }