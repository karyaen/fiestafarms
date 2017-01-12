<?php
/*
Template Name: Apron Strings
*/
?>

<?php get_header(); ?>  

<div class="home-hero" id="header-check">
    <!-- <div class="main-wrapper"> -->
        <h1 class="header-text">
            Where we share recipes and stories that celebrate how our families have nourished us, both in body and soul.
        </h1>
    <!-- </div> -->
    <div class="fullscreen-bg" id="vid-check">
         <iframe id="ytplayer"  src="https://www.youtube.com/embed/ffJ9_bozBRM?rel=0&autoplay=1&showinfo=0&controls=0&loop=1&enablejsapi=1" frameborder="0"></iframe>
         <img src="<?php bloginfo('template_url' ); ?>/dist/images/apronlogo.png">
    </div>
</div>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<!-- Submission Info + CTA -->
<section class="news-submit">
    <div class ="main-wrapper">
        <article class="submit-story">
        <h2>The Apron Strings Project</h2>
            <div><?php the_content(); ?></div>
            <button id="test-button" class="cta-button">share your story</button>
        </article>
    </div>
</section>

<?php endwhile; else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<section class="print-container">
    <form class="controls" id="Filters">

      <div>
        <h4>Content</h4>
        <button class="filter-btn" data-filter=".recipes-from-videos">Videos</button>
        <button class="filter-btn" data-filter=".recipes-apron-strings-food">Recipes</button>
        <button class="filter-btn" data-filter=".guest-posts,.stories">Blog Posts</button>
      </div>
      
      <div>
        <h4>Year</h4>
        <button class="filter-btn" data-filter="._2015">2015</button>
        <button class="filter-btn" data-filter="._2014">2014</button>
        <button class="filter-btn" data-filter="._2013">2013</button>
        <button class="filter-btn" data-filter="._2012">2012</button>
        <button class="filter-btn" data-filter="._2011">2011</button>
        <button class="filter-btn" data-filter="._2010">2010</button>
      </div>
      
      
      <button id="Reset">Clear Filters</button>

    </form>
    
    

    <div id="Container" class="container">
        <!-- Filter Images -->

        <div class="outer-container--resources">

            <div class="results-container">
                <?php echo do_shortcode( '[searchandfilter id="113" show="results"]' ); ?>
            </div>

        </div>

        <?php 

        $postscats      = wp_get_post_categories( 'apron-strings', 'recipes-from-videos', 'guest-posts', 'stories', 'recipes-apron-strings-food' );

        $args = array(
            'posts_per_page' => 10,
            'category__in' => array(43,44,45,47,50)
        ); 

        $loop = new WP_Query($args); ?>

            <?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); 
                //$banner_id      = get_post_meta($post->ID, '_banner_image', true);
                //$banner_url     = wp_get_attachment_image_src($banner_id,'banner', true);
                ?>
                
                <?php $url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
                <?php $category_classes = ''; ?>

                <?php $categories = get_the_terms($post->ID , 'category'); 
                ?>

                <?php if($categories){
                    foreach($categories as $category){
                        $category_classes .= ' '.$category->slug;
                    };
                }; 
                ?>

                <?php if ( get_the_post_thumbnail($post->ID) != '' ) { ?>

                  <div class="mix<?php echo $category_classes; ?> _<?php the_time('Y'); ?>" data-postid="<?php the_ID(); ?>" data-myorder="<?php echo get_the_ID(); ?>" style="background-image: url(<?php echo $url[0] ?>); background-size: cover;">
                    <div class="panel__overlay" style="background-image: url('<?php echo catch_that_image(); ?>');"></div>
                    <a href="<?php the_permalink(); ?>"><p><?php the_title(); ?></p></a>
                  </div>

                <?php } elseif ( in_category('recipes-from-videos') ) { ?>

                 <div class="mix<?php echo $category_classes; ?> _<?php the_time('Y'); ?>" data-postid="<?php the_ID(); ?>" data-myorder="<?php echo get_the_ID(); ?>">
                 <div class="panel__overlay" style="background-image: url('<?php echo catch_that_image(); ?>');"></div>
                    <a href="<?php the_permalink(); ?>"><p><?php the_title(); ?></p></a>
                    <i class="fa fa-youtube-play marker"></i>
                 </div>
                <div class="og-expander">
                    <div class="og-expander-inner">
                        <span class="og-close"></span>
                        
                        <div class="og-details">
                            <?php if(social_share()) { social_share();} ?>

                        </div>
                    </div>
                </div>
                 

                <?php } elseif ( in_category('guest-posts') || in_category('stories') ) { ?>

                    <div class="mix<?php echo $category_classes; ?> _<?php the_time('Y'); ?>" data-postid="<?php the_ID(); ?>" data-myorder="<?php echo get_the_ID(); ?>">
                    <div class="panel__overlay" style="background-image: url('<?php echo catch_that_image(); ?>');"></div>
                    <a href="<?php the_permalink(); ?>"><p><?php the_title(); ?></p></a>
                    <i class="fa fa-pencil marker"></i>
                 </div>
                <div class="og-expander">
                        <div class="og-expander-inner">
                            <span class="og-close"></span>
                            
                            <div class="og-details">
                            <?php if(social_share()) { social_share();} ?>

                            </div>
                        </div>
                </div>

                <?php } elseif ( in_category('recipes-apron-strings-food') ) { ?>
                    <div class="mix<?php echo $category_classes; ?> _<?php the_time('Y'); ?>" data-postid="<?php the_ID(); ?>" data-myorder="<?php echo get_the_ID(); ?>">
                    <div class="panel__overlay" style="background-image: url('<?php echo catch_that_image(); ?>');"></div>
                    <a href="<?php the_permalink(); ?>"><p><?php the_title(); ?></p></a>
                    <i class="fa fa-cutlery marker"></i>
                 </div>
                <div class="og-expander">
                        <div class="og-expander-inner">
                            <span class="og-close"></span>
                            
                            <div class="og-details">
                            <?php if(social_share()) { social_share();} ?>

                            </div>
                        </div>
                </div>

                <?php   } else { ?>

                    <div class="mix<?php echo $category_classes; ?> _<?php the_time('Y'); ?>" data-postid="<?php the_ID(); ?>" data-myorder="<?php echo get_the_ID(); ?>" >
                    <div class="panel__overlay" style="background-image: url('<?php echo catch_that_image(); ?>');"></div>
                    <a href="<?php the_permalink(); ?>"><p><?php the_title(); ?></p></a>
                    <i class="fa fa-file-text marker"></i>
                 </div>
                <div class="og-expander">
                        <div class="og-expander-inner">
                            <span class="og-close"></span>
                            
                            <div class="og-details">

                            <?php if(social_share()) { social_share();} ?>

                            </div>
                        </div>
                </div>

                <?php   } ?>
    
            <?php endwhile; endif; ?>

    </div>

</section>
    
<?php get_footer(); ?>