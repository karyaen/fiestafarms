<?php
/*
Plugin Name: Weekly Flyer Link Widget
Plugin URI: http://hypenotic.com/flyer-widget/
Description: Adds a simple, single purpose widget for displaying a link to weekly flyers. Based on James Lao (http://jameslao.com).
Author: Jorge Villalobos	
Version: 1.0
Author URI: http://hypenotic.com/
*/

class WeeklyFlyer extends WP_Widget {

function WeeklyFlyer() {
	parent::WP_Widget(false, $name='Weekly Flyer');
}

/**
 * Displays Flyer Link widget on blog.
 */
function widget($args, $instance) {

	global $post, $wp_query;
	extract( $args );
	
	// If no title, use the name of the category.
	if( !$instance["title"] ) {
		$category_info = get_category($instance["cat"]);
		$instance["title"] = $category_info->name;
	}

	// Get array of post + attachment info.
	$flyerPost = get_posts('numberposts=1&category='.$instance["cat"].'');
	
	if ($flyerPost) {
	  
	  $flyerLink = get_posts('numberposts=1&post_parent='.$flyerPost[0]->ID.'&post_type=attachment');
	  
  	echo $before_widget;
	
  	// Widget title
  	echo $before_title;
  	if ( (bool) $instance["title_link"] )
  		echo '<a href="' . get_category_link($instance["cat"]) . '">' . $instance["title"] . '</a>';
  	else
  		echo $instance["title"];
  	echo $after_title;

  	// Flyer Link
  	echo "<div>\n"; ?>
  	
  	  <a class="post-title" href="<?php echo wp_get_attachment_url($flyerLink[0]->ID); ?>" title="<?php echo attribute_escape($flyerLink[0]->post_title); ?>"><span class="icon"></span><?php echo $flyerPost[0]->post_title; ?></a>
  
    <?php echo "</div>\n";
	
  	echo $after_widget;
	
  }

}

/**
 * Form processing... Dead simple.
 */
function update($new_instance, $old_instance) {
  
  $new_instance["cat"] = absint( $new_instance["cat"] );
  $new_instance["exclude"] = (bool) $new_instance["exclude"];
    
	return $new_instance;

}

/**
 * The configuration form.
 */
function form($instance) {
  
  ?>
	
		<p>
			<label for="<?php echo $this->get_field_id("title"); ?>">
				<?php _e( 'Title' ); ?>:
				<input class="widefat" id="<?php echo $this->get_field_id("title"); ?>" name="<?php echo $this->get_field_name("title"); ?>" type="text" value="<?php echo esc_attr($instance["title"]); ?>" />
			</label>
		</p>
		
		<p>
			<label>
				<?php _e( 'Category' ); ?>:
				<?php wp_dropdown_categories( array( 'name' => $this->get_field_name("cat"), 'selected' => $instance["cat"], 'hide_empty' => 0 ) ); ?>
			</label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id("title_link"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("title_link"); ?>" name="<?php echo $this->get_field_name("title_link"); ?>"<?php checked( (bool) $instance["title_link"], true ); ?> />
				<?php _e( 'Make widget title link' ); ?>
			</label>
		</p>

  <?php

}

}

add_action( 'widgets_init', create_function('', 'return register_widget("WeeklyFlyer");') );

?>
