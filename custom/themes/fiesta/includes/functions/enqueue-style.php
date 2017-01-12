<?php

/**
* Enqueue styles
*/

function my_styles() {
	wp_register_style('menu', get_template_directory_uri() . '/dist/css/style.css');
 	wp_enqueue_style( 'menu' );
	wp_register_style('flickity', 'https://cdnjs.cloudflare.com/ajax/libs/flickity/1.1.0/flickity.min.css');
	wp_enqueue_style( 'flickity' );
	wp_register_style('style', get_template_directory_uri() . '/style.css');
 	wp_enqueue_style( 'style' );
 	//wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' );
}

add_action('wp_enqueue_scripts', 'my_styles');

?>