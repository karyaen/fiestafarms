<?php get_header(); ?>

<div id="middle">
  
  <div class="center_container">
    
  	<div id="content" role="main">

  	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  		
  		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
  			
  			<?php include( TEMPLATEPATH . '/post-content.php' ); ?>
  			
  			<br class="clear" />
  			
  			<?php comments_template(); ?>
  			
  			<br class="clear" />
  		
  		</div>

  		<div class="navigation bottom_navigation">
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
		
  	<?php endwhile; else: ?>

  		<p>Sorry, no posts matched your criteria.</p>

  <?php endif; ?>

  	</div>
	
    <?php get_sidebar(); ?>

    <br class="clear" />

  </div>
  
</div>

<?php get_footer(); ?>
