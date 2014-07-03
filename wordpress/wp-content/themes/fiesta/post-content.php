<?php
$show_post = false;
if(is_home()){
    $post_cat = wp_get_post_categories($post->ID);
    $tags = get_the_tags($post->ID);
    $post_tag = false;
    if(is_array($tags)){
        foreach($tags as $tag){
            if($tag->name == 'frontpage') $post_tag = true;
        }
    }
    if(!in_array( 43, $post_cat ) || (in_array( 43, $post_cat ) &&  $post_tag == true)){
        $show_post = true;
    }else{
        $show_post = false;
    }
}else{
    $show_post = true;
}
if($show_post == true):
?>
<h2><?php if (!is_single()) { ?><a href="<?php the_permalink() ?>" rel="bookmark" title="Continue Reading: <?php the_title_attribute(); ?>"><?php } ?><?php the_title(); ?><?php if (!is_single()) { ?></a><?php } ?></h2>
<div class="byline">By <a href="#"><?php the_author() ?></a> <span class="date">on <?php the_time('F jS, Y') ?></span> <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></div>

<div style="padding: 10px 0 10px 0;">
<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style">
<a class="addthis_button_facebook_like" fb:like:layout="button_count" fb:like:href="<?php echo get_permalink(); ?>" style="width: 75px !important;"></a>
<a class="addthis_button_tweet" tw:via="fiestafarms"  style="width: 100px !important;" addthis:url="<?php echo get_permalink(); ?>"></a>
<a class="addthis_button_google_plusone" g:plusone:size="medium" style="width: 65px !important;"></a>

<!--<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>-->
<!--<a class="addthis_button_tweet"></a>-->
<a class="addthis_counter addthis_pill_style" addthis:url="<?php echo get_permalink(); ?>"></a>
</div>
<?php if(function_exists('kk_star_ratings') && in_category("your-strings")) : echo '<br />'.kk_star_ratings($post->ID).' <br /><br />'; endif; ?> 
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4df11a8d5a9d5f30"></script>
<!-- AddThis Button END -->
</div>

<?php if (is_single()) { ?>
<div class="navigation">
  <?php

  $prevPost = get_adjacent_post(false, '', true);
  $nextPost = get_adjacent_post(false, '', false);

  if ($prevPost) { 
	  echo "<div class=\"alignleft\"><a href=\"" . get_permalink($prevPost->ID) . "\" title=\"" . attribute_escape($prevPost->post_title) . "\">&laquo; Previous Post</a></div>";
	} 

	if ($nextPost) { 
	  echo "<div class=\"alignright\"><a href=\"" . get_permalink($nextPost->ID) . "\" title=\"" . attribute_escape($nextPost->post_title) . "\">Next Post &raquo;</a></div>";
	}

	?>
	<br class="clear" />
</div>
<?php } ?>

<div class="entry">
  
	<?php
	
	the_content('Continue &raquo;');
	
  // echo "<pre>"; print_r(strtotime($post->post_date) . "<br />" . $post->post_date . "<br />" . time()); echo "</pre>";
	
	if ( in_category( array( 5, 9 ) ) && strtotime($post->post_date) > strtotime("2010-03-26 00:00:01") ) { 
    // $specials = get_attachments();
	  //echo "<pre>"; print_r($specials); echo "</pre>";
	  $specials = get_children( array(
	                  "post_parent"     => get_the_id(),
	                  "numberposts"     => -1,
	                  "post_type"       => "attachment",
	                  "post_mime_type"  => "image",
	                  "orderby"         => "menu_order",
	                  "order"           => "ASC") );
    
    if ( $specials ) {
      
      $specials_list = "<ul class=\"specials\">";
      
      foreach ( $specials as $special ) {
        
        $spImgSrc = wp_get_attachment_image_src($special->ID,'thumbnail');
        list($spImgSrc, $spImgW, $spImgH) = $spImgSrc;
        $spImgSrcWH = image_hwstring($spImgW, $spImgH);
        $spImgDesc = get_post_meta($special->ID, '_wp_attachment_image_alt', true);
        $spURL = attribute_escape($special->post_content);
        if ( $spURL ) {
          $spTitle = "<a href=\"$spURL\">$special->post_title &raquo;</a>";
        } else {
          $spTitle = $special->post_title;
        }
        
        // </a>
        
        $specials_list .= "<li><div class=\"special_content\"><h3>$spTitle</h3><p class=\"special_date\"><strong>$special->post_excerpt</strong></p><p>" . get_post_meta($special->ID, '_wp_attachment_image_alt', true) . "</p></div><img src=\"" . attribute_escape($spImgSrc) . "\" alt=\"$spImgDesc\" $spImgSrcWH/><br class=\"clear\" /></li>\n";
              
      } // END foreach ($images)
      
      $specials_list .= "</ul>\n";
      
      echo $specials_list;
    }
	
	}
	
	?>
	
	<br class="clear" />
	
	<?php if (is_single()) { wp_link_pages(array('before' => '<br class="clear" /><p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); } ?>
	
	<div class="meta-data">

    <?php include( TEMPLATEPATH . '/sharing-widgets.php' ); ?>

    <!--
    <span class="categories"><span class="arrow">&#x21EA;</span> Posted in <?php the_category(', ') ?>.</span><?php the_tags(' <span class="tags">Tags: ', ', ', '.</span>'); ?>
    -->
    <br class="clear" />

  </div>
</div>
<?php edit_post_link('<span class="arrow">&#x21EA;</span> Edit this Post &raquo;', '', '');
endif;
?>