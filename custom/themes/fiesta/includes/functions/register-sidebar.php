<?php

/**
* Register Wordpress sidebar widget
*/

register_sidebar(array(
 	'name' => __( 'Social Media Icons' ),
 	'id' => 'socialshare',
 	'description' => __( 'Widgets in this area will be shown at the end of an interview.' ),
  	'before_widget' => '',
  	'after_widget' => '',
  	'before_title' => '<span class="hidden" style="display: none;">',
  	'after_title' => '</span>'
));

register_sidebar(array(
 	'name' => __( 'Homepage - About' ),
 	'id' => 'homepage-about',
 	'description' => __( 'Widgets in this area will be shown on the homepage beside News + Events.' ),
  	'before_widget' => '',
  	'after_widget' => '',
  	'before_title' => '<span class="hidden" style="display: none;">',
  	'after_title' => '</span>'
));

?>