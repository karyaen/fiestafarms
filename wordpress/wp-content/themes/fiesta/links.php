<?php
/*
Template Name: Links
*/
?>

<?php get_header(); ?>

<div id="middle">
  
  <div id="links_page" class="center_container">

  	<div id="content" class="narrowcolumn" role="main">

  		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

  		<div class="post" id="post-<?php the_ID(); ?>">

        <h2><?php the_title(); ?></h2>
        
        <div class="entry">
          
          <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
  				
  			  <ul class="links_list">
            <?php wp_list_bookmarks(array(
                                      'title_before' => '<h3>',
                                      'title_after' => '</h3>',
                                      'link_after' => ':',
                                      'show_description' => 1
                                    )); ?>
          </ul>
        </div>
        
        <?php edit_post_link('<span class="arrow">&#x21EA;</span> Edit this Post &raquo;', '', ''); ?>  		  
      
      </div>
      
      <?php endwhile; endif; ?>

    </div>

    <?php get_sidebar(); ?>

    <br class="clear" />

  </div>

</div>

<?php get_footer(); ?>
