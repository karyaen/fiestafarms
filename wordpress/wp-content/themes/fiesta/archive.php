<?php get_header(); ?>

<div id="middle">
  
  <div class="center_container">

  	<div id="content" role="main">

  		<?php if (have_posts()) : ?>

   	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
   	  <?php /* If this is a category archive */ if (is_category()) { ?>
  		<!--<h2><?php single_cat_title(); ?> Category</h2>-->
   	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
  		<h2 class="pagetitle">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
   	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
  		<h2 class="pagetitle">Archive for <?php the_time('F jS, Y'); ?></h2>
   	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
  		<h2 class="pagetitle">Archive for <?php the_time('F, Y'); ?></h2>
   	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
  		<h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>
  	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
  		<h2 class="pagetitle">Author</h2>
   	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
  		<h2 class="pagetitle">Blog</h2>
   	  <?php } ?>

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
  		
  	<?php else :

  		if ( is_category() ) { // If this is a category archive
  			printf("<h2 class='center'>Sorry, but there aren't any posts in the %s category yet.</h2>", single_cat_title('',false));
  		} else if ( is_date() ) { // If this is a date archive
  			echo("<h2>Sorry, but there aren't any posts with this date.</h2>");
  		} else if ( is_author() ) { // If this is a category archive
  			$userdata = get_userdatabylogin(get_query_var('author_name'));
  			printf("<h2 class='center'>Sorry, but there aren't any posts by %s yet.</h2>", $userdata->display_name);
  		} else {
  			echo("<h2 class='center'>No posts found.</h2>");
  		}
  		get_search_form();

  	endif;
  ?>

  	</div>

    <?php get_sidebar(); ?>

    <br class="clear" />

  </div>
  
</div>

<?php get_footer(); ?>