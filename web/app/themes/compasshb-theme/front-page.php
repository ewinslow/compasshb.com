<?php
get_header(); ?>

  	<div class="row" style="text-align: center; background-image: url(http://www.compasshb.com/app/uploads/2014/10/hbwebsitetileGRAY.jpg);padding-top: 10px;padding-bottom: 30px;">
        <div class="col-md-8 col-md-offset-2" style="margin-top: 40px;">
		    <?php
            $results = array();
            rewind_posts();
            query_posts('post_type=post&format=sermon&posts_per_page=3');

            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    $video_oembed = get_post_meta(get_the_ID(), 'video_oembed', true);
                    if ($video_oembed) {
                        $results['oembed'] = wp_oembed_get($video_oembed, array('height' => '800'));
                    }
                    $results['permalink'] = get_the_permalink();
                    $results['title'] = get_the_title();
                    break;
                }
            }
            $video_thumb = implode(apply_filters('chb_feed_vimeo', get_post_meta(get_the_ID(), 'video_oembed', true))); ?>
            <div style="border: 4px solid #ddd; margin: 0 auto; min-height: 375px; padding-top: 80px; background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(<?= $video_thumb; ?>); width: 100%; background-size: cover;">
                <p style="color: #fff; text-transform: uppercase;">Latest Sermon</p>
		        <h1><a class="tk-seravek-web" style="color: #fff; text-transform: uppercase" href="<?= $results['permalink']; ?>"><?= $results['title']; ?></a></h1>
		        <p style="color: #fff; text-transform: uppercase;"><br/>
		        <i class="glyphicon glyphicon-play-circle" style="font-size: 2.5em;"></i></p>
            </div>
        </div>
    </div>

    <div class="row" style="padding-bottom: 20px; text-align: center; background-image: url(http://www.compasshb.com/app/uploads/2014/10/hbwebsitetileGRAY.jpg); background-size: cover;">
        <div class="col-md-2 col-md-offset-2">
            <?php
                query_posts('&post_type=post&format=blog&showposts=1');
                while (have_posts()) : the_post();
                    $img_id = get_post_thumbnail_id($post->ID); //  ID of the img
                    $image = wp_get_attachment_image_src($img_id); // Get URL of the image
                     $alt_text = get_post_meta($img_id, '_wp_attachment_image_alt', true);
                    ?>
            <div style="text-transform: uppercase; color: #fff; padding: 10px; border: 4px #ddd solid; width: 100%; height: 105px; background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(<?= $image[0]; ?>); background-size: cover;">
                <h4 class="tk-seravek-web"><?= $alt_text; ?></h4>
            </div>
            <h4 style="color: #fff; text-align: left">
                    <?php
                    echo '<a style="color: #fff" href="'.get_the_permalink().'">'.get_the_title().'</a>';
                endwhile;
            ?>
            </h4>
        </div>
        <div class="col-md-2 col-md-offset-1">
            <h4 style="color: #fff; text-align: left">
                <?php
                query_posts('&post_type=post&format=blog&showposts=1&offset=1');
                while (have_posts()) : the_post();
                    $img_id = get_post_thumbnail_id($post->ID); //  ID of the img
                    $image = wp_get_attachment_image_src($img_id); // Get URL of the image
                    $alt_text = get_post_meta($img_id, '_wp_attachment_image_alt', true); ?>
                    <div style="text-transform: uppercase; color: #fff; padding: 10px; border: 4px #ddd solid; width: 100%; height: 105px; background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(<?= $image[0]; ?>); background-size: cover;">
                        <h4 class="tk-seravek-web"><?= $alt_text; ?></h4>
                    </div>
                    <?php
                    echo '<a style="color: #fff" href="'.get_the_permalink().'">'.get_the_title().'</a>';
                endwhile; ?>
            </h4>
        </div>
        <div class="col-md-2 col-md-offset-1">
            <div style="text-transform: uppercase; color: #fff; padding: 10px; border: 4px #ddd solid; width: 100%; height: 105px; background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(http://photos.compasshb.com/PhotoArchive/Worship-Services/Face-to-Face-Fellowship-122114/i-gjr7gvv/0/S/141221_WOR_SS-030-S.jpg)">
                <h4 class="tk-seravek-web">Scripture of the Day</h4>
            </div>
            <h4 style="color: #fff; text-align: left">
                <?php
                    query_posts('&post_type=post&format=scripture-of-the-day&showposts=1');
                    while (have_posts()) : the_post();
                        echo '<a style="color: #fff" href="'.get_the_permalink().'">'.get_the_title().'</a>';
                    endwhile;
                ?>
                <a href=""></a>
            </h4>
        </div>
    </div>

<!-- Directions -->
	<div class="row" style="background: none; background-color: #f7f7f7; padding-top: 30px;padding-bottom: 30px;">
		<div class="col-md-6" style="">
			<h2 style="text-align: center">Directions</h2><center>
    		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26542.154928917666!2d-118.04023219999998!3d33.7407795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80dd25f2e1f15bbd%3A0x2b2a43000587dfc0!2s5082+Argosy+Ave%2C+Huntington+Beach%2C+CA+92649!5e0!3m2!1sen!2sus!4v1420493991035" width="400" height="300" frameborder="0" style="border:0"></iframe></center>
		</div>
		<div class="col-md-6" >
			<h2 style="text-align: center;">Services</h2><br/>
        	<p style="text-align: center;">Sundays 11am</p>
        	<p style="text-align: center;">5082 Argosy Avenue</p>
        	<p style="text-align: center;">Huntington Beach, CA 92649</p><br/>
        	<p style="text-align: center;">
				<a class="btn btn-default" href="https://www.google.com/maps/place/5082+Argosy+Ave,+Huntington+Beach,+CA+92649/@33.7407795,-118.0402322,17z/data=!3m1!4b1!4m2!3m1!1s0x80dd25f2e1f15bbd:0x2b2a43000587dfc0" role="button">View Map</a>
			</p>
		</div>
	</div>

<!-- Parallax -->
	<div class="row">
	  	<div style="background-image: url(http://photos.compasshb.com/PhotoArchive/Worship-Services/1st-Service-New-Building-01111/i-KLP4pcT/2/X2/150111_Wor_SS-093-X2.jpg);padding-top: 250px; background-attachment: fixed; background-position: 50% 0px; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; background-repeat: no-repeat;"></div>
	</div>

<!-- Scripture of the Day -->
	<div class="row" style="background-color: #FFF">
		<div class="col-md-8" style="background-image: url(http://www.compasshb.com/app/uploads/2014/07/TabletPad-1Thessalonians5-r1.jpg); padding-top: 400px; background-position: left top; background-size: contain; background-repeat: no-repeat"></div>
		<div class="col-md-4" style="padding-top: 40px;min-height: 380px">
	      <h1 style="text-align: center;"><span style="font-size: 36px;">Scripture of the Day</span></h1>
		  <p style="text-align: center;"><span style="font-size: medium;">Get energized by reading a passage of scripture each day with our church! Be encouraged by what other people have to say about the passage and share your thoughts!</span><br/><br/><a class="btn btn-default" href="read" role="button">Read Now <i class=" glyphicon glyphicon-arrow-right"></i></a></p>
	    </div>
	</div>

<!-- Recent Sermons -->
  <div class="row" style="background: none; background-color: #dddddd; padding-bottom: 20px;">
	<div class="col-xs-10 col-xs-offset-1">
        <h2>Recent Sermons</h2>
	    <?php
        rewind_posts();
        query_posts('post_type=post&format=sermon&posts_per_page=4&post_status=publish');
        $count = 1;
        while (have_posts()) : the_post(); ?>
            <div class="col-md-3">
            <?php
            // Get video cover art
            $json = file_get_contents('http://vimeo.com/api/oembed.json?url='.get_post_meta(get_the_ID(), 'video_oembed',
                true));
            $obj = json_decode($json);
            $thumbnail = $obj->thumbnail_url;
            ?>
                <div style="background-image: url('<?= $thumbnail; ?>'); background-size: cover; width: 100%; height: 150px">
                </div>
                <div style="background-color: #FFF; padding: 10px; height: 135px; max-height: 135px; text-overflow: ellipsis">
                    <h6><a href="<?= get_the_permalink(); ?>"
                    title="<?= get_the_title(); ?>"><?php $sermon_number = get_post_meta(get_the_ID(), 'sermon_number',
                     true);
                    if ($sermon_number) {
                        echo '#'.$sermon_number.'. ';
                    }
                    the_title(); ?></a></h6>
                    <small><?php the_time('l, F j, Y', '<p>', '</p>'); ?></small>
                    <br/><br/>
                    <a class="btn btn-default" href="<?= get_the_permalink(); ?>" role="button">Watch</a>
                </div>
             </div>
    <?php $count++; endwhile;
wp_reset_query(); ?>
	</div>
  </div>


<!-- Recent Videos -->
  <div class="row" style="background: none; background-color: #dddddd; padding-bottom: 20px;">
	<div class="col-xs-10 col-xs-offset-1">
	 <h2>Recent Videos</h2>
    <?php
    rewind_posts();
    query_posts('post_type=post&format=blog&post_status=publish');
    $count = 0;
    while (have_posts()) : the_post();
        if (get_post_meta(get_the_ID(), 'video_oembed', true) == '') {
            continue;
        } ?>
        <div class="col-md-6">
            <?php
            // Get video cover art
            $json = file_get_contents('http://vimeo.com/api/oembed.json?url='.get_post_meta(get_the_ID(), 'video_oembed',
                true));
            $obj = json_decode($json);
            $thumbnail = $obj->thumbnail_url; ?>
            <div style="background-image: url('<?= $thumbnail; ?>'); background-size: cover; width: 100%; height: 200px">
            </div>
            <div style="background-color: #FFF; padding: 10px; height: 135px; max-height: 135px; text-overflow: ellipsis">
                <h6><a href="<?= get_the_permalink(); ?>" title="<?= get_the_title(); ?>"><?= the_title(); ?></a></h6>
                <small><?php the_time('l, F j, Y', '<p>', '</p>'); ?></small>
                <br/><br/>
                <a class="btn btn-default" href="<?= get_the_permalink(); ?>" role="button">Watch</a>
            </div>
        </div>
    <?php
        $count++;
    if ($count == 2) {
        break;
    }
    endwhile;
    wp_reset_query(); ?>
	</div>
  </div>

<!-- Recent Photography / SmugMug -->
  <div class="row" style="background: none">
      <div class="col-xs-10 col-xs-offset-1">
    <h2>Recent Photography</h2>
	<?php
    $results = apply_filters('chb_feed_smugmug', $results);
    foreach ($results as $result) {
        ?>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <div class="photo-box">
            <div class="image-wrap">
                <a href="<?= $result[0];
        ?>"><img src="<?= $result[1];
        ?>"></a>
            </div>
        </div>
    </div>
<?php

    } ?><br/><br/>&nbsp;<br/><br/>
  </div>
    </div>

<!-- Instagram -->
 <div class="row" style="background:none; background-color: #f7f7f7;padding-top: 20px;padding-bottom: 20px;">
     <div class="col-xs-10 col-xs-offset-1">
	 <h2>Instagram Photos</h2>
  <script src="//raw.githubusercontent.com/stevenschobert/instafeed.js/master/instafeed.min.js"></script>
  <script>
	$(function() {

	    //Set up instafeed
	    var feed = new Instafeed({
	        clientId: '33473128faab4f4a82212917e24bb13a',
			accessToken: '1363574956.3347312.f1121cc764834e57be8a04bf17cc8aea',
	        target: 'instafeed',
	        get: 'user',
	        userId: 1363574956,
	        links: true,
	        limit: 4,
	        sortBy: 'most-recent',
	        resolution: 'standard_resolution',
	        template: '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><div class="photo-box"><div class="image-wrap"><a href="{{link}}"><img src="{{image}}"></a><div class="likes">{{likes}} Likes</div></div><div class="description">{{caption}}<div class="date">{{model.date}}</div></div></div></div>',
		});
		feed.run();
	});
  </script>
  <style>
	.image-wrap {background-color: #FFF;}
	.description {background-color: #FFF; padding: 5px; height: 75px; overflow: hidden; text-overflow: ellipsis; }
  </style>
 	  <div class="col-xs-12">
         <div class="instagram-content">
             <div class="row photos-wrap">
             <!-- Instafeed target div -->
             <div id="instafeed"></div>
         </div>
     </div>
  </div>
 </div>
     </div>
<?php get_footer();
