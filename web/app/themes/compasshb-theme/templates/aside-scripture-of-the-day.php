<h4>Scripture of the Day</h4>
<br/>
<?php
wp_reset_query();
query_posts('&post_type=post&format=scripture-of-the-day&showposts=5');
while (have_posts()) : the_post();
    echo '<li><a href="'.get_the_permalink().'">'.get_the_title().'</a></li>';
endwhile;
wp_reset_query();
?>
<br/>
<p><a href="http://feeds.compasshb.com/read" class="feedpress-button" name="feed-9178">Subscribe to Compass Bible Church &raquo; Scripture of the Day</a></p><br/>
<p><span style="padding-right: 20px;"><a href="https://itunes.apple.com/us/podcast/scripture-of-the-day/id945286142">Subscribe to iTunes Podcast</a></span></p>
<script src="//static.feedpress.it/js/button.js" async></script>
