<?php get_header(); ?>
<div id="middle">
  <div class="center_container">
  	<div id="content" role="main">
  	
  	<?php // Exclude Flyer Category
  	if ( is_home() ) { 
  		$frontpage = get_cat_ID('Front Page');
  		$cats = "&cat=$frontpage";
  	} else { 		
		$flyerCat = get_cat_ID('Weekly Flyer');
		$cats = "&cat=-$flyerCat";
  	}
	query_posts($query_string . $cats);  	
	?>
  	<?php if (have_posts()) : ?>

  		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
				
        <?php include( TEMPLATEPATH . '/post-content.php' ); ?>
			  
				<br class="clear" />

			</div>

  		<?php endwhile; ?>
      
      <?php if (show_posts_nav()) { ?>
  		<div class="navigation bottom_navigation">
  			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
  			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
  			<br class="clear" />
  		</div>
  		<?php } ?>

  	<?php else : ?>

  		<h2 class="center">Not Found</h2>
  		<p class="center">Sorry, but you are looking for something that isn't here.</p>
  		<?php get_search_form(); ?>

  	<?php endif; ?>

  	</div>

    <?php get_sidebar(); ?>
  
    <br class="clear" />
  </div>
</div>
<?php get_footer();?>
