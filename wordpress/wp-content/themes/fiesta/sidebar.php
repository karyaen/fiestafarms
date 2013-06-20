<ul id="sidebar">

<li  class="widget widget_apronstring">
<!--
<div><a href="http://fiestafarms.ca/tomatofest"><img src="/wp-content/uploads/2012/07/tomato-fest-banner.png" style="border: 0;"></a>
</div>
-->
      </li>



<?php
  global $is_apron;
  global $curr_page;
  if($is_apron == true && $curr_page->ID != 1552){
    ?>
    <li class="widget widget_shareyours">
         <a href="http://apronstrings.fiestafarms.ca" div class="apronstring-banner"></div></a><br />
        <div class="share-above-textwidget">Apron Strings is a place where we share recipes and stories that celebrate how our families have nourished us, both in body and soul.</div>
        <div class="share-banner"><a href="<?php echo get_permalink('1552'); ?>#middle">Share yours</a></div>
        <div class="share-textwidget">Share stories about your dad or grandfather's culinary adventures and win one of three Fiesta Farms gift certificates.  All entries will be featured on the Fiesta site during the month of June. <a href="http://fiestafarms.ca/7626/food/tell-us-about-your-dads-cooking-and-win">Enter here</a></div>
    </li>
    <?php
  }else{
      ?>
   
	<?php if (!is_category(7)) { ?>
		<li class="widget widget_apronstring">
        <a href="http://apronstrings.fiestafarms.ca"><div class="apronstring-banner"></div></a>
<p style="margin: 8px 0 0 3px;">Apron Strings is a place where we share recipes and stories that celebrate how our families have nourished us, both in body and soul.</p>
      </li>
<?php } ?>
<!--
	<?php if (!is_category(7)) { ?>
	  	<li class="widget widget_whatshouldieat">
        	<div><a href="http://www.facebook.com/fiestafarms?sk=app_190322544333196"><img src="/wp-content/uploads/2011/04/whatshouldieat.png" style="border: 0;"></a></div>
		</li>
	<?php } ?>

	<?php if (!is_category(7)) { ?>
		<li class="widget widget_whatshouldieat">
        	<div><a href="http://fiestafarms.ca/your-fiesta-story-and-recommended-product"><img src="/wp-content/themes/fiesta/images/bt_storyrec.png" style="border: 0;"></a></div>
		</li>
	<?php } ?>
-->



<!--
<li class="widget widget_apronstring">
<div><a href="http://fiestafarms.ca/category/your-strings"><img src="http://fiestafarms.ca/wp-content/uploads/2012/06/apron-strings-side-banner-read.png" style="border: 0;"></a>
</div>
      </li>

-->

<!--
   <li class="widget widget_apronstring">
        <div><a href="/7626/food/tell-us-about-your-dads-cooking-and-win"><img src="http://fiestafarms.ca/wp-content/themes/fiesta/images/apron-strings-side-banner.png" style="border: 0;"></a>
<p style="margin-top: 8px;">Share stories about your dad or grandfather's culinary adventures and win one of three Fiesta Farms gift certificates.  All entries will be featured on the Fiesta site during the month of June. <a href="/7626/food/tell-us-about-your-dads-cooking-and-win">Enter here</a>.</p></div>
      </li>
-->
      <?php
  }

  if (!is_page()) { // If this is part of the blog

	// Widgetized sidebar, if you have the plugin installed.	
	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Blog Sidebar') ) :

  endif; // End alternate to Widgetized Sidebar
  
   // End if his is part of the blog
  } else {

  
	// Widgetized sidebar, if you have the plugin installed.	
	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Pages Sidebar') ) :

  endif; // End alternate to Widgetized Sidebar
    
  }
?>
</ul>
