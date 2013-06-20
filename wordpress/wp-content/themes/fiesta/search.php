<?php get_header(); ?>
<div id="middle">
<div class="center_container">
	<div id="content" role="main">
  	<?php if (have_posts()) : ?>
  		<h2 class="pagetitle">Search Results</h2>
		<?php while (have_posts()) : the_post(); ?>
		<div <?php post_class() ?>>
			<small><?php the_time('l, F jS, Y') ?></small>
			<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
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
<?php get_footer(); ?>