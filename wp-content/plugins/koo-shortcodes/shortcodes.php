<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/*-----------------------------------------------------------------------------------*/
/*	Column Shortcodes
/*-----------------------------------------------------------------------------------*/

add_shortcode( 'koo_one_third', 'koo_one_third' );
function koo_one_third( $atts, $content = null ) {
   return '<div class="koo-one-third">' . do_shortcode( stripslashes( $content ) ) . '</div>';
}

add_shortcode( 'koo_one_third_last', 'koo_one_third_last' );
function koo_one_third_last( $atts, $content = null ) {
   return '<div class="koo-one-third koo-column-last">' . do_shortcode( stripslashes( $content ) ) . '</div><div class="koo-clear"></div>';
}

add_shortcode( 'koo_two_third', 'koo_two_third' );
function koo_two_third( $atts, $content = null ) {
   return '<div class="koo-two-third">' . do_shortcode( stripslashes( $content ) ) . '</div>';
}

add_shortcode( 'koo_two_third_last', 'koo_two_third_last' );
function koo_two_third_last( $atts, $content = null ) {
   return '<div class="koo-two-third koo-column-last">' . do_shortcode( stripslashes( $content ) ) . '</div><div class="koo-clear"></div>';
}

add_shortcode( 'koo_one_half', 'koo_one_half' );
function koo_one_half( $atts, $content = null ) {
   return '<div class="koo-one-half">' . do_shortcode( stripslashes( $content ) ) . '</div>';
}

add_shortcode( 'koo_one_half_last', 'koo_one_half_last' );
function koo_one_half_last( $atts, $content = null ) {
   return '<div class="koo-one-half koo-column-last">' . do_shortcode( stripslashes( $content ) ) . '</div><div class="koo-clear"></div>';
}

add_shortcode( 'koo_one_fourth', 'koo_one_fourth' );
function koo_one_fourth( $atts, $content = null ) {
   return '<div class="koo-one-fourth">' . do_shortcode( stripslashes( $content ) ) . '</div>';
}

add_shortcode( 'koo_one_fourth_last', 'koo_one_fourth_last' );
function koo_one_fourth_last( $atts, $content = null ) {
   return '<div class="koo-one-fourth koo-column-last">' . do_shortcode( stripslashes( $content ) ) . '</div><div class="koo-clear"></div>';
}

add_shortcode( 'koo_three_fourth', 'koo_three_fourth' );
function koo_three_fourth( $atts, $content = null ) {
   return '<div class="koo-three-fourth">' . do_shortcode( stripslashes( $content ) ) . '</div>';
}

add_shortcode( 'koo_three_fourth_last', 'koo_three_fourth_last' );
function koo_three_fourth_last( $atts, $content = null ) {
   return '<div class="koo-three-fourth koo-column-last">' . do_shortcode( stripslashes( $content ) ) . '</div><div class="koo-clear"></div>';
}

add_shortcode( 'koo_one_fifth', 'koo_one_fifth' );
function koo_one_fifth( $atts, $content = null ) {
   return '<div class="koo-one-fifth">' . do_shortcode( stripslashes( $content ) ) . '</div>';
}

add_shortcode( 'koo_one_fifth_last', 'koo_one_fifth_last' );
function koo_one_fifth_last( $atts, $content = null ) {
   return '<div class="koo-one-fifth koo-column-last">' . do_shortcode( stripslashes( $content ) ) . '</div><div class="koo-clear"></div>';
}

add_shortcode( 'koo_two_fifth', 'koo_two_fifth' );
function koo_two_fifth( $atts, $content = null ) {
   return '<div class="koo-two-fifth">' . do_shortcode( stripslashes( $content ) ) . '</div>';
}

add_shortcode( 'koo_two_fifth_last', 'koo_two_fifth_last' );
function koo_two_fifth_last( $atts, $content = null ) {
   return '<div class="koo-two-fifth koo-column-last">' . do_shortcode( stripslashes( $content ) ) . '</div><div class="koo-clear"></div>';
}

add_shortcode( 'koo_three_fifth', 'koo_three_fifth' );
function koo_three_fifth( $atts, $content = null ) {
   return '<div class="koo-three-fifth">' . do_shortcode( stripslashes( $content ) ) . '</div>';
}

add_shortcode( 'koo_three_fifth_last', 'koo_three_fifth_last' );
function koo_three_fifth_last( $atts, $content = null ) {
   return '<div class="koo-three-fifth koo-column-last">' . do_shortcode( stripslashes( $content ) ) . '</div><div class="koo-clear"></div>';
}

add_shortcode( 'koo_four_fifth', 'koo_four_fifth' );
function koo_four_fifth( $atts, $content = null ) {
   return '<div class="koo-four-fifth">' . do_shortcode( stripslashes( $content ) ) . '</div>';
}

add_shortcode( 'koo_four_fifth_last', 'koo_four_fifth_last' );
function koo_four_fifth_last( $atts, $content = null ) {
   return '<div class="koo-four-fifth koo-column-last">' . do_shortcode( stripslashes( $content ) ) . '</div><div class="koo-clear"></div>';
}

add_shortcode( 'koo_one_sixth', 'koo_one_sixth' );
function koo_one_sixth( $atts, $content = null ) {
   return '<div class="koo-one-sixth">' . do_shortcode( stripslashes( $content ) ) . '</div>';
}

add_shortcode( 'koo_one_sixth_last', 'koo_one_sixth_last' );
function koo_one_sixth_last( $atts, $content = null ) {
   return '<div class="koo-one-sixth koo-column-last">' . do_shortcode( stripslashes( $content ) ) . '</div><div class="koo-clear"></div>';
}

add_shortcode( 'koo_five_sixth', 'koo_five_sixth' );
function koo_five_sixth( $atts, $content = null ) {
   return '<div class="koo-five-sixth">' . do_shortcode( stripslashes( $content ) ) . '</div>';
}

add_shortcode( 'koo_five_sixth_last', 'koo_five_sixth_last' );
function koo_five_sixth_last( $atts, $content = null ) {
   return '<div class="koo-five-sixth koo-column-last">' . do_shortcode( stripslashes( $content ) ) . '</div><div class="koo-clear"></div>';
}


/*-----------------------------------------------------------------------------------*/
/*	Buttons
/*-----------------------------------------------------------------------------------*/
add_shortcode( 'koo_button', 'koo_button' );
function koo_button( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'url' => '#',
		'target' => '_self',
		'style' => 'white',
		'size' => 'small',
		'type' => 'square'
    ), $atts ) );
	
   return '<a target="' . $target . '" class="koo-button ' . $size . ' ' . $style . ' ' . $type . '" href="' . esc_url( $url ) . '">' . do_shortcode( stripslashes( $content ) ) . '</a>';
}



/*-----------------------------------------------------------------------------------*/
/*	Alerts
/*-----------------------------------------------------------------------------------*/
add_shortcode( 'koo_alert', 'koo_alert' );
function koo_alert( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'style'   => 'white'
    ), $atts));
	
	return '<div class="koo-alert ' . $style . '">' . do_shortcode( stripslashes( $content ) ) . '</div>';
}


/*-----------------------------------------------------------------------------------*/
/*	Toggle Shortcodes
/*-----------------------------------------------------------------------------------*/
add_shortcode( 'koo_toggle', 'koo_toggle' );
function koo_toggle( $atts, $content = null ) {
    extract( shortcode_atts( array(
		'title'    	 => __( 'Title goes here', 'koo' ),
		'state'		 => 'open'
    ), $atts));

	return "<div data-id='" . $state . "' class=\"koo-toggle\"><span class=\"koo-toggle-title\">" . esc_attr( $title ) . "</span><div class=\"koo-toggle-inner\">". do_shortcode( stripslashes( $content ) ) ."</div></div>";
}


/*-----------------------------------------------------------------------------------*/
/*	Tabs Shortcodes
/*-----------------------------------------------------------------------------------*/
add_shortcode( 'koo_tabs', 'koo_tabs' );
function koo_tabs( $atts, $content = null ) {
	$defaults = array();
	extract( shortcode_atts( $defaults, $atts ) );
	
	// Extract the tab titles for use in the tab widget.
	preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
	
	$tab_titles = array();
	if( isset($matches[1]) ){ $tab_titles = $matches[1]; }
	
	$output = '';
	
	if( count($tab_titles) ){
	    $output .= '<div id="koo-tabs-'. rand(1, 100) .'" class="koo-tabs"><div class="koo-tab-inner">';
		$output .= '<ul class="koo-nav koo-clearfix">';
		
		foreach( $tab_titles as $tab ){
			$output .= '<li><a href="#koo-tab-'. sanitize_title( $tab[0] ) .'">' . $tab[0] . '</a></li>';
		}
	    
	    $output .= '</ul>';
	    $output .= do_shortcode( stripslashes( $content ) );
	    $output .= '</div></div>';
	} else {
		$output .= do_shortcode( stripslashes( $content ) );
	}
	
	return $output;
}

add_shortcode( 'koo_tab', 'koo_tab' );
function koo_tab( $atts, $content = null ) {
	$defaults = array( 'title' => __( 'Tab', 'koo' ) );
	extract( shortcode_atts( $defaults, $atts ) );
	
	return '<div id="koo-tab-'. sanitize_title( $title ) .'" class="koo-tab">'. do_shortcode( stripslashes( $content ) ) .'</div>';
}

/*-----------------------------------------------------------------------------------*/
/*	Hightlight Shortcodes
/*-----------------------------------------------------------------------------------*/
add_shortcode( 'koo_highlight', 'koo_highlight' );
function koo_highlight( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'style' => 'yellow',
  	), $atts ) );

	return '<span class="koo-highlight '. $style .'">' . do_shortcode( stripslashes( $content ) ) . '</span>';

}

/*-----------------------------------------------------------------------------------*/
/*	Box Shortcodes
/*-----------------------------------------------------------------------------------*/
add_shortcode( 'koo_box', 'koo_box' );
function koo_box( $atts, $content = null ) {

	extract( shortcode_atts( array(
		'style' => 'white',
		'title' => __( 'This is box title', 'koo' )
	), $atts ) );

	return '<div class="koo-box ' . $style . '"><div class="koo-box-title">' . esc_attr( $title ) . '</div><div class="koo-box-content">' . do_shortcode( stripslashes( $content ) ) . '</div></div>';

}

/*-----------------------------------------------------------------------------------*/
/*	Accordion Shortcodes
/*-----------------------------------------------------------------------------------*/
add_shortcode( 'koo_accordions', 'koo_accordions' );
function koo_accordions( $atts, $content = null ) {

	return '<div class="koo-accordion">' . do_shortcode( stripslashes( $content ) ) . '</div>';

}

add_shortcode( 'koo_accordion', 'koo_accordion' );
function koo_accordion( $atts, $content = null  ) {
	extract( shortcode_atts( array(
	  'title' => __( 'Title', 'koo' ),
	), $atts ) );
	  
   return '<div class="koo-accordion-title">'. $title .'</div><div class="koo-accordion-inner">' . do_shortcode( stripslashes( $content ) ) . '</div>';
}

?>