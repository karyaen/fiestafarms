<?php
$encLink = urlencode(get_permalink());
$encTitle = urlencode(get_the_title());
$encExcerpt = urlencode(apply_filters('get_the_excerpt', $post->post_excerpt));
?>
<div class="sharing-widgets">
  <ul>
    <li class="twitter"><a href="http://twitter.com/home?status=<?php echo "$encTitle: $encLink (via @fiestafarms)"; ?>" title="Share on Twitter">Twitter</a></li>
    <li class="facebook"><a href="http://www.facebook.com/sharer.php?u=<?php echo "$encLink&amp;t=$encTitle"; ?>" title="Share on Facebook">Facebook</a></li>
    <li class="digg"><a href="http://digg.com/submit?phase=2&amp;url=<?php echo "$encLink&amp;title=$encTitle&amp;bodytext=$encExcerpt"; ?>" title="Digg this post">Digg</a></li>
    <!--<li class="reddit"><a href="http://reddit.com/submit?url=<?php echo "$encLink&amp;title=$encTitle"; ?>" title="Share on Reddit">Reddit</a></li>-->
    <li class="stumbleupon"><a href="http://www.stumbleupon.com/submit?url=<?php echo "$encLink&amp;title=$encTitle"; ?>" title="Share on StumbleUpon">StumbleUpon</a></li>
    <li class="delicious"><a href="http://delicious.com/post?url=<?php echo "$encLink&amp;title=$encTitle&amp;notes=$encExcerpt"; ?>" title="Bookmark + share on Delicious">Delicious</a></li>
  </ul>
  <br class="clear" />
</div>