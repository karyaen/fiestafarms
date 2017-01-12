<?php
/**
 * Search & Filter Pro 
 *
 * Sample Results Template
 * 
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      http://www.designsandcode.com/
 * @copyright 2015 Designs & Code
 * 
 * Note: these templates are not full page templates, rather 
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think 
 * of it as a template part
 * 
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs 
 * and using template tags - 
 * 
 * http://codex.wordpress.org/Template_Tags
 *
 */

if ( $query->have_posts() )
{
	?>
	<p class="results-found">
		<?php echo $query->found_posts; ?> Resources
	</p>


	<div class="results-grid">
	<?php
		while ($query->have_posts())
		{
		$query->the_post();

		// General Meta
		$featNum    	= get_post_meta( get_the_ID(), '_details_feat', true );
		$date_card    	= get_post_meta( get_the_ID(), '_source_date', true );

		// Get the initative and the color
		$init = get_the_terms( get_the_ID(), 'initiatives' );

		$meta_data      = get_cuztom_term_meta($init[0]->term_id, $init[0]->taxonomy);
		$color            = $meta_data['_color'];

		// Get the resource type
		$types = get_the_terms( get_the_ID(), 'resource_type' );
		                         
		if ( $types && ! is_wp_error( $types )) {

			$type_links = array();
			
			foreach ( $types as $type ) {
			    $type_links[] = $type->name;
			}

			$count_type = count($type_links);

			// print_r($count_type);

			$thetypes = join( ", ", $type_links );
		}  

		// Get the media type
		if (has_term('','media_type')) {
			$media_type = get_the_terms( get_the_ID(), 'media_type' );
			$mt = $media_type[0]->name;
			$media_data      = get_cuztom_term_meta($media_type[0]->term_id, $media_type[0]->taxonomy);
			$medimg            = $media_data['_icon'];
			$medurl            = wp_get_attachment_image_src($medimg, true);
		} else {
			$medurl = '';
		}
		                          
	?>
			<div class="resource__single <?php echo $termsString; ?>">
				<a href="<?php the_permalink(); ?>"><div class="card effect__hover">
					<div class="card__front search-card">
					    <h4><?php echo the_title(); ?></h4>
					    <div><?php if(function_exists('the_ratings')) { the_ratings(); } ?></div>
					    <p><img src="<?php if ($medurl !== '') { echo $medurl[0]; } ?>" alt="<?php if ($medurl !== '') { echo $mt; } ?>"></p>

					    <?php if ( has_term('Sustain Member Resource', 'label') ) { ?>
					    <div class="ribbon"><span>S.O. Member</span></div>
					    <?php } ?>

					    <?php if ( $featNum == '1' || $featNum == '2' || $featNum == '3' || $featNum == '4' || $featNum == '5' || $featNum == '6' || $featNum == '7' || $featNum == '8' || $featNum == '9' || $featNum == '10' || $featNum == '11'  ) { ?>
					    <div class="ribbon feat-ribbon"><span>Featured</span></div>
					    <?php } ?>

					</div>
					<div class="card__back">
						<div class="card--top-meta">
							<p class="resource__single--rtype">
								<?php if ($types) { ?>
									<?php if ($count_type > 1) { ?>
										Types: <?php echo $thetypes; ?>
									<?php } else { ?>
										Type: <?php echo $thetypes; ?>
									<?php } ?>
								<?php } ?>
							</p>
							<p class="resource__single--date">
								Date: 
								<?php if ($date_card) { echo $date_card; } else { echo get_the_time('M j, Y');} ?> 
							</p>
						</div>
						<div class="card--bottom-meta">
							<p><?php echo aa_excerpt(20); ?></p>
						</div>
					</div>
				</div></a>
			</div>
			
		<?php }	?></div>

	<p class="results-page">
		Page <?php echo $query->query['paged']; ?> of <?php echo $query->max_num_pages; ?>
	</p>
	
	<div class="pagination">
		
		<div class="nav-previous"><?php next_posts_link( 'Older posts', $query->max_num_pages ); ?></div>
		<div class="nav-next"><?php previous_posts_link( 'Newer posts' ); ?></div>
		<?php
			/* example code for using the wp_pagenavi plugin */
			if (function_exists('wp_pagenavi'))
			{
				echo "<br />";
				wp_pagenavi( array( 'query' => $query ) );
			}
		?>
	</div>
	<?php
}
else
{
	echo "No Results Found";
}
?>