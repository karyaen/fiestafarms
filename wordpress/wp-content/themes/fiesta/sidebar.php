<ul id="sidebar">
<?php
    if (!is_page()) {	
        if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Blog Sidebar') ) :
        endif; 
    } else {

    if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Pages Sidebar') ) :
    endif;
    }
?>
</ul>