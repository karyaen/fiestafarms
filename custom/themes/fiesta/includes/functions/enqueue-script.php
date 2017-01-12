<?php

/**
* Enqueue scripts
*/

function my_scripts() {
	// wp_deregister_script('jquery');
	// wp_register_script('jquery', get_template_directory_uri() . '/dist/js/jquery-migrate-1.2.1.min.js', null, '',false);
	// wp_enqueue_script('jquery');
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui-tabs');
	// wp_enqueue_script( 'modernizer', get_template_directory_uri() . '/dist/js/modernizr.custom.js', array('jquery'), '', true);
	// wp_register_script( 'menu', get_template_directory_uri() . '/dist/js/materialMenu.js', array('jquery'), '', true);
	// wp_enqueue_script('menu');
	wp_register_script( 'mix', get_template_directory_uri() . '/dist/js/jquery.mixitup.js', array('jquery'), '', true);
	wp_enqueue_script('mix');
	// wp_enqueue_script( 'grid', get_template_directory_uri() . '/dist/js/grid.js', array('jquery'), '', true);
	wp_register_script( 'app', get_template_directory_uri() . '/dist/js/app.min.js', array('jquery'), '', true);
	wp_enqueue_script('app');

}

add_action( 'wp_enqueue_scripts', 'my_scripts' );
?>