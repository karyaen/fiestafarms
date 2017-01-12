<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<link rel="icon" type="image/x-icon" href="/fiestafarms.ico" />
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<!-- FONTS -->
<script>
  (function(d) {
    var config = {
      kitId: 'exf5itx',
      scriptTimeout: 3000,
      async: true
    },
    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='//use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
  })(document);
</script>
<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700,700italic|Pacifico' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<?php if (is_front_page()) { ?>
<meta name="google-site-verification" content="2kbK116TyxpLhAzMt84EYHoPnZF1Y26Bd9f3Df0ghmg" />
<meta name="msvalidate.01" content="0F861DB1FB05A61CE740C0DD63EDEAFD" />
<meta name="y_key" content="36a3dcd770adca5b" />
<?php } ?>

	<!-- Facebook Meta Tags -->
<meta property="fb:admins" value="151856824439" />
<meta property="og:url" content="<?php echo get_permalink(); ?>"/>
<meta property="og:title" content="<?php echo get_the_title(); ?>"/>

<meta property="og:site_name" content="Fiesta Farms"/>
<meta property="og:description" content="Fiesta Farms is Toronto's largest independently owned grocery store. We're pioneers and leaders in helping people reflect their values with a shopping cart."/>


<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<?php
$templateDir = get_bloginfo('template_directory');
wp_register_style('style', get_template_directory_uri() . '/dist/css/style.css');
wp_enqueue_style( 'style' );

// Scripts
if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
wp_enqueue_script('thickbox');
wp_enqueue_script('fiestajs',"$templateDir/js/fiesta.js");
wp_enqueue_script('jquery.youtubeplaylist',"$templateDir/js/jquery.youtubeplaylist.js");
?>

<?php wp_head(); ?>
<script type="text/ecmascript">
    jQuery(function() {
        jQuery("ul.apsframes").ytplaylist({autoPlay: false, holderId: 'apsvideo', playerHeight: '197', playerWidth: '335'});
    });
</script>

<script type='text/javascript'>
(function (d, t) {
  var bh = d.createElement(t), s = d.getElementsByTagName(t)[0];
  bh.type = 'text/javascript';
  bh.src = '//www.bugherd.com/sidebarv2.js?apikey=dvd4ifcbxfndyij7chqo1q';
  s.parentNode.insertBefore(bh, s);
  })(document, 'script');
</script>

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','//connect.facebook.net/en_US/fbevents.js');

fbq('init', '482947628545053');
fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=482947628545053&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

</head>

<?php if (is_page_template('page-apronstrings.php')) { ?>
  <body class="apron-strings-body">

<?php } else { ?>


  <?php
      global $is_apron;
      global $curr_page;
      if ( is_category() ){
          if(intval(get_query_var('cat') != 43)){
              $is_apron = cat_is_ancestor_of(43, intval(get_query_var('cat')));
          }else{
              $is_apron = true;
          }
      }
      if ( is_page() ){
          $curr_page = get_page(get_the_ID());
          if($curr_page->ID == 1552 || $curr_page->ID == 1554) $is_apron = true;
      }
      if ( is_single() ){
          global $post;
          $post_cat = wp_get_post_categories($post->ID);
          if(in_array( 43, $post_cat )) $is_apron = true;
      }
    
  ?>
  <body <?php if($is_apron) body_class('apron-section');else body_class(); ?>>
  <div id="header">
    <?php if($is_apron): ?>
      <div id="header-wrapper">
        <div id="half-pattern">
          <a href="http://fiestafarms.ca"><div id="btnBackToHome"></div></a>
          <div id="apron-logo"></div>
          <a href="#" id="btnRecipe" class="animated bounceIn"></a>
          <iframe id="apron-big-vid" width="854" height="475" src="" frameborder="0" allowfullscreen></iframe>
        </div>
        <ul id="apron-videos">
          <li><a href="http://www.youtube.com/embed/1diRkTjyqBE"><img src="<?php echo $templateDir.'/images/';?>Hussein.jpg" data-hover-img="<?php echo $templateDir.'/images/';?>Hussein_r.jpg" /></a></li>
          <li><a href="http://www.youtube.com/embed/_2AWjtItksE"><img src="<?php echo $templateDir.'/images/';?>Tony.jpg" data-hover-img="<?php echo $templateDir.'/images/';?>Tony_r.jpg" /></a></li>
          <li><a href="http://www.youtube.com/embed/2SJlhEYi5_4"><img src="<?php echo $templateDir.'/images/';?>David.jpg" data-hover-img="<?php echo $templateDir.'/images/';?>David_r.jpg" /></a></li>
          <li><a href="http://www.youtube.com/embed/1GsB_D3uVsM"><img src="<?php echo $templateDir.'/images/';?>Phil.jpg" data-hover-img="<?php echo $templateDir.'/images/';?>Phil_r.jpg" /></a></li>
          <li><a href="http://www.youtube.com/embed/P8IFeMUZKqQ"><img src="<?php echo $templateDir.'/images/';?>Leo.jpg" data-hover-img="<?php echo $templateDir.'/images/';?>Leo_r.jpg" /></a></li>
        </ul>     
    </div>
    <?php
    endif;
    ?>

  <?php if (is_category('Garden') && !$is_apron) { ?>
  <img src="http://www.fiestafarms.ca/custom/themes/fiesta/images/header-gardens.jpg" style="height: 330px;">
    <div class="center_container">
      <div class="follow_us">
        <ul>
          <li class="twitter"><a href="http://twitter.com/fiestafarms" title="Follow us on Twitter">Twitter</a></li>
          <li class="facebook"><a href="http://www.facebook.com/fiestafarms" title="Become a fan on Facebook">Facebook</a></li>
          <li class="youtube"><a href="http://www.youtube.com/user/fiestafarmstoronto" title="Subscribe to our YouTube channel">YouTube</a></li>
          <li class="flickr"><a href="http://www.flickr.com/photos/fiestafarms/" title="Checkout our Flickr photostream">Flickr</a></li>
          <li class="feed"><a href="/feed" title="Subscribe to our Feed">Feed</a></li>
        </ul>
        <br class="clear" />
      </div>
    </div>
  </div>

  <?php } else { ?>

    <div id="toronto" class="animated bounceInUp"></div>
      <div id="cloud1" class="animated bounceInDown"></div>
      <div id="cloud2" class="animated bounceInDown"></div>
      <div id="cloud3" class="animated bounceInDown"></div>
      <div id="hill-green"></div>
      <div class="center_container">
      <div id="hill-yellow-sign"></div>
        <div id="hill-brown"></div>
    <div class="follow_us">
        <ul>
          <li class="twitter"><a href="http://twitter.com/fiestafarms" title="Follow us on Twitter">Twitter</a></li>
          <li class="facebook"><a href="http://www.facebook.com/fiestafarms" title="Become a fan on Facebook">Facebook</a></li>
          <li class="youtube"><a href="http://www.youtube.com/user/fiestafarmstoronto" title="Subscribe to our YouTube channel">YouTube</a></li>
          <li class="flickr"><a href="http://www.flickr.com/photos/fiestafarms/" title="Checkout our Flickr photostream">Flickr</a></li>
          <li class="feed"><a href="/feed" title="Subscribe to our Feed">Feed</a></li>
        </ul>
        <br class="clear" />
      </div>
    </div>
    <div id="weather1" class="animated fadeInDownBig"></div>
    <a href="http://www.fiestafarms.ca"><div id="weather2"></div></a>
    <div id="weather3"></div>
  </div>
  <?php } ?>

  <div id="top_navigation">
    <div class="center_container">
      <ul id="main_sections">
    <li<?php if (is_home('') || is_single()) {echo " class=\"current_page_item\"";} ?>><a href="/">Blog</a></li>
    <li<?php if (is_page('Events')) {echo " class=\"current_page_item\""; }?>><a href="<?php bloginfo('url') ?>/events">Events</a></li>
    <li<?php if (is_page('Resources')) {echo " class=\"current_page_item\""; }?>><a href="<?php bloginfo('url') ?>/resources">Resources</a></li>
    <li<?php if (is_page('Philosphy')) {echo " class=\"current_page_item\""; }?>><a href="<?php bloginfo('url') ?>/philosophy">Philosophy</a></li>
    <li<?php if (is_category('Video')) {echo " class=\"current_page_item\""; }?>><a href="<?php bloginfo('url') ?>/category/food/video">Video</a></li>
    <!-- <li<?php if (is_page('now-hiring')) {echo " class=\"current_page_item\""; }?>><a href="<?php bloginfo('url') ?>/now-hiring">Now Hiring</a></li> -->
    <li class="fiestagardens" <?php if (is_category('Garden')) {echo " class=\"current_page_item\""; }?>><a style="color: #a2bf37; font-weight:bold;" href="<?php bloginfo('url') ?>/category/garden">Fiesta Gardens</a></li>
    
       
      </ul>
      <ul id="secondary_sections">
        <?php wp_list_pages("title_li=&depth=1&include=2,658"); ?>   
      </ul>
      <br class="clear" />
    </div>
  </div>



<?php } ?>
