<?php if (is_page_template('page-apronstrings.php')) { ?>

      <footer class="main-footer">
        <section class="links">
          <article>
            <h3>Information</h3>
            <ul>
              <li><a href="">List Item</a></li>
              <li><a href="">List Item</a></li>
              <li><a href="">List Item</a></li>
              <li><a href="">List Item</a></li>
            </ul>
          </article>
          <article>
            <h3>Fiesta Farms</h3>
            <ul>
              <li><a href="">List Item</a></li>
              <li><a href="">List Item</a></li>
              <li><a href="">List Item</a></li>
              <li><a href="">List Item</a></li>
            </ul>
          </article>
          <article>
            <h3>Follow Us</h3>

          </article>
        </section>
        
        <section class="rights">
          <p>Web fonts served by Adobe Typekit. Made with &hearts; in Toronto.</p>
        </section>
      </footer>
    <?php wp_footer(); ?>

  </body>
</html>

<?php } else { ?>

  <?php if (is_category('garden')) { ?>
  <div id="footer" style="background: #204824 url('<?php bloginfo('template_directory'); ?>/images/footer-garden.jpg') top center repeat-x;">
  <?php } else { ?>
  <div id="footer" style="background: #204824 url('<?php bloginfo('template_directory'); ?>/images/footer_bg.png') top center repeat-x;">
  <?php } ?>

  <div class="center_container">

    <p class="copy">&copy; 2009 - 2014 Fiesta Farms. All Rights Reserved. Site by <a href="http://hypenotic.com">Hypenotic</a>.</p>
    <ul class="bottom_nav">
    <li<?php if (is_home('') || is_single()) {echo " class=\"current_page_item\"";} ?>><a href="/">Blog</a></li>
    <li<?php if (is_page('Events')) {echo " class=\"current_page_item\""; }?>><a href="<?php bloginfo('url') ?>/events">Events</a></li>
    <li<?php if (is_page('Resources')) {echo " class=\"current_page_item\""; }?>><a href="<?php bloginfo('url') ?>/resources">Resources</a></li>
    <li<?php if (is_page('Philosphy')) {echo " class=\"current_page_item\""; }?>><a href="<?php bloginfo('url') ?>/philosophy">Philosophy</a></li>
    <li<?php if (is_category('Garden')) {echo " class=\"current_page_item\""; }?>><a href="<?php bloginfo('url') ?>/category/garden">Fiesta Garden</a></li>
    <li<?php if (is_category('Video')) {echo " class=\"current_page_item\""; }?>><a href="<?php bloginfo('url') ?>/category/food/video">Video</a></li>
    <li<?php if (is_page('Accessibility')) {echo " class=\"current_page_item\""; }?>><a href="<?php bloginfo('url') ?>/accessibility-policy">Accessibility</a></li>
  </ul>
      <br class="clear" />
    </div>
  </div>
  <?php wp_footer(); ?>
  <!-- Get Satisfaction Widget -->
  <script type="text/javascript" charset="utf-8">
    var is_ssl = ("https:" == document.location.protocol);
    var asset_host = is_ssl ? "https://s3.amazonaws.com/getsatisfaction.com/" : "http://s3.amazonaws.com/getsatisfaction.com/";
    document.write(unescape("%3Cscript src='" + asset_host + "javascripts/feedback-v2.js' type='text/javascript'%3E%3C/script%3E"));
  </script>

  <script type="text/javascript" charset="utf-8">
    var feedback_widget_options = {};

    feedback_widget_options.display = "overlay";  
    feedback_widget_options.company = "fiestafarms";
    feedback_widget_options.placement = "left";
    feedback_widget_options.color = "#ab3a21";
    feedback_widget_options.style = "question";
    
    var feedback_widget = new GSFN.feedback_widget(feedback_widget_options);
  </script>

  <script type="text/javascript" src="http://include.reinvigorate.net/re_.js"></script>
  <script type="text/javascript">
  try {
  reinvigorate.track("cke0k-79it7uf6yt");
  } catch(err) {}
  </script>

  <!-- Google Analytics -->
  <script type="text/javascript">
  var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
  document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
  </script>
  <script type="text/javascript">
  try {
  var pageTracker = _gat._getTracker("UA-11256902-1");
  pageTracker._trackPageview();
  } catch(err) {}</script>

  </body>
  </html>



<?php } ?>
