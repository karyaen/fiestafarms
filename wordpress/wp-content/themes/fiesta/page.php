<?php get_header(); ?>

<div id="middle">
  
  <div class="center_container">

  	<div id="content" class="narrowcolumn" role="main">

  		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  		<div class="post" id="post-<?php the_ID(); ?>">
    		
    		<h2><?php the_title(); ?></h2>
  			
  			<div class="entry">
  			  
  				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
             
  				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
  				
  				<br class="clear" />

  			</div>
  		
  		  <?php edit_post_link('<span class="arrow">&#x21EA;</span> Edit this Post &raquo;', '', ''); ?>  		  

  		</div>
  		
  		<?php endwhile; endif; ?>
  		
  		<br class="clear" />
  	
  	</div>

    <?php get_sidebar(); ?>

    <br class="clear" />
  
  </div>
  
</div>

<?php get_footer(); ?>
