<?php
// Async/Defer Scripts
/*function to add async to all scripts*/
function js_async_attr($tag){

# Add async to all remaining scripts
return str_replace( ' src', ' defer src', $tag );
}
add_filter( 'script_loader_tag', 'js_async_attr', 10 );

/*** Remove Query String from Static Resources ***/
function remove_cssjs_ver( $src ) {
 if( strpos( $src, '?ver=' ) )
 $src = remove_query_arg( 'ver', $src );
 return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );

/**
 * If more than one page exists, return TRUE.
 */
function show_posts_nav() {
	global $wp_query;
	return ($wp_query->max_num_pages > 1);
}

/*

*/
if ( function_exists('register_sidebar') ) {
  register_sidebar(array(
      'name' => 'Home Intro Block',
      'id' => 'home-intro-block',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h2 class="widgettitle">',
      'after_title' => '</h2>',
      ));

  register_sidebar(array(
      'name' => 'Blog Sidebar',
      'id' => 'sidebar-blog',
      'before_widget' => '<li id="%1$s" class="widget %2$s">',
      'after_widget' => '</li>',
      'before_title' => '<h3 class="widgettitle">',
      'after_title' => '</h3>',
      ));

  register_sidebar(array(
      'name' => 'Pages Sidebar',
      'id' => 'sidebar-pages',
      'before_widget' => '<li id="%1$s" class="widget %2$s">',
      'after_widget' => '</li>',
      'before_title' => '<h3 class="widgettitle">',
      'after_title' => '</h3>',
      ));

  /*
  register_sidebar(array(
      'name' => sprintf(_('Sidebar %d'), $i),
      'id' => 'sidebar-$i'
      'before_widget' => '<li id="%1$s" class="widget %2$s">',
      'after_widget' => '</li>',
      'before_title' => '<h3 class="widgettitle">',
      'after_title' => '</h3>',
      ));
  */
}

add_theme_support( 'post-thumbnails', array('post') );

function get_thumb_src($post_id, $item=0){
    $att_array = array(
    'post_parent' => $post_id,
    'post_type' => 'attachment',
    'post_mime_type' => 'image',
    'order_by' => 'menu_order'
    );

    //get the post attachments
    $attachments = get_posts($att_array);

    //make sure there are attachments
    if (is_array($attachments)){
        //loop through them
        return wp_get_attachment_url($attachments[$item]->ID);
    }
}

function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }	
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  $content = preg_replace('/<img[^>]+./','', $content);
  return $content;
}
?>