<?php
/*
Plugin Name: Sub pages
Plugin URI: http://floatingsun.net/code/wordpress/
Description: Adds a sidebar widget to display subpages of the current page
Author: Diwaker Gupta
Author URI: http://floatingsun.net/
Version: 0.3
Min WP Version: 2.0
Max WP Version: 2.2
*/

function subpages_widget_init() {
	// Check for the required API functions
	if ( !function_exists('register_sidebar_widget') || !function_exists('register_widget_control') )
		return;

    function subpages_widget_control() {
        $options = $newoptions = get_option('subpages');
        if ( $_POST['subpages-submit'] ) {
            $newoptions['title'] = strip_tags(stripslashes($_POST['subpages-title']));
            $newoptions['siblings_title'] =
                strip_tags(stripslashes($_POST['subpages-siblings-title']));
            $newoptions['show_siblings'] = strip_tags(stripslashes($_POST['subpages-show-siblings']));
        }
        if ( $options != $newoptions ) {
            $options = $newoptions;
            update_option('subpages', $options);
        }
    ?>
        <div style="text-align:right">
        <label for="subpages-title" style="line-height:35px;display:block;">Widget title: <input type="text" id="subpages-title" name="subpages-title" value="<?php echo htmlspecialchars($options['title']); ?>" /></label>
        <!-- FIXME: check the box only if the option had been set the last time -->
        <input type="checkbox" name="subpages-show-siblings" value="yes" checked="<?php echo $options['show_siblings']; ?>">Show siblings?</input>
        <label for="subpages-siblings-title"
        style="line-height:35px;display:block;">Siblings title: <input
        type="text" id="subpages-siblings-title"
        name="subpages-siblings-title" value="<?php echo
        htmlspecialchars($options['siblings_title']); ?>" /></label>
        <input type="hidden" name="subpages-submit" id="subpages-submit" value="1" />
        </div>
    <?php
    }

	// This prints the widget
	function subpages_widget($args) {
		extract($args);
		$defaults = array('title' => 'Subpages', 'siblings_title' => 'Siblings', 'before_title' => '<li>', 'after_title' => '</li>', 'show_siblings' => 'no');
		$options = (array) get_option('subpages');

		foreach ( $defaults as $key => $value )
			if ( !isset($options[$key]) )
				$options[$key] = $defaults[$key];
        global $post;
        global $wpdb;
        if (is_page()) {
            $current_page = $post->ID;
            if(wp_list_pages("child_of=".$current_page."&echo=0")) {
                echo $before_widget;
                echo $before_title . $options['title'] . $after_title;
                echo "<ul>";
                wp_list_pages("title_li=&depth=1&child_of=".$current_page);
                echo "</ul>";
                echo $after_widget;
            }
            if($options['show_siblings'] == 'yes') {
                $parent = $wpdb->get_var("SELECT post_parent FROM $wpdb->posts WHERE ID='$current_page'");
                if($parent != 0) {
                    echo $before_widget;
                    echo $before_title . $options['siblings_title'] . $after_title;
                    echo "<ul>";    
                    wp_list_pages("title_li=&depth=1&child_of=".$parent); //&exclude=".$current_page
                    echo "</ul>";
                    echo $after_widget;
                }
            } 
        }
    }

	// Tell Dynamic Sidebar about our new widget and its control
	register_sidebar_widget('Sub Pages', 'subpages_widget');
	register_widget_control('Sub Pages', 'subpages_widget_control');
}

// Delay plugin execution to ensure Dynamic Sidebar has a chance to load first
add_action('plugins_loaded', 'subpages_widget_init');
?>
