<?php
/**
 * Bootstrap Basic theme
 * 
 * @package bootstrap-basic
 */

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

function mono_filter_shortcode( $atts, $content = null ) {
	return '<figure class="monochrome-photo">' . $content . '</figure>';
}
add_shortcode( 'monochrome', 'mono_filter_shortcode' );


function large_image_shortcode( $atts, $content = null ) {
	$values = shortcode_atts(array(
		'large' => 6,
		'medium' => 8,
		'small' => 9,
	),$atts);  
	$div_class = "large-image " . "col-md-" . $values[large] . " " . "col-sm-" . $values[medium] . " " . "exsmall col-xs-" . $values[small];
	return '<div class="' . $div_class . '">' . $content . '</div>';
}
add_shortcode( 'large_image', 'large_image_shortcode' );