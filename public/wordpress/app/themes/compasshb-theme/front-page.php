<?php
get_header(); ?>

    <style>
    .clickable:hover {
        text-decoration: none;
    }
    a p .glyphicon {
        font-size: 5rem;
    }
    </style>
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
                    if (empty($video_oembed)) {
                        continue;
                    }
                    $results['permalink'] = get_the_permalink();
                    $results['title'] = get_the_title();
                    break;
                }
            }
            $video_thumb = implode(apply_filters('chb_feed_vimeo', get_post_meta(get_the_ID(), 'video_oembed', true))); ?>
           <a class="clickable" href="<?= $results['permalink']; ?>" style="color: #fff; text-transform: uppercase; display: block; border: 4px solid #ddd; margin: 0 auto; min-height: 375px; padding-top: 80px; background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(<?= $video_thumb; ?>); width: 100%; background-size: cover;">
               <br/><p style="color: #fff; text-transform: uppercase;">Watch Latest Sermon</p>
               <h1 class="tk-seravek-web" style="text-transform: uppercase"><?= $results['title']; ?></h1>
               <p style="color: #fff; text-transform: uppercase;"><br/>
                   <i class="glyphicon glyphicon-play-circle"></i></p>
           </a>
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
            <a class="clickable" href="<?= get_the_permalink(); ?>" style="display: block; text-transform: uppercase; color: #fff; padding: 10px; border: 4px #ddd solid; width: 100%; height: 105px; background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(<?= $image[0]; ?>); background-size: cover;">
                <h4 class="tk-seravek-web"><?= $alt_text; ?></h4>
            </a>

            <h4 style="color: #fff; text-align: left">
                <a class="clickable" style="color: #fff" href="<?= get_the_permalink(); ?>"><?= get_the_title(); ?></a>
            </h4>
            <?php  endwhile; ?>
        </div>
        <div class="col-md-2 col-md-offset-1">
                <?php
                query_posts('&post_type=post&format=blog&showposts=1&offset=1');
                while (have_posts()) : the_post();
                    $img_id = get_post_thumbnail_id($post->ID); //  ID of the img
                    $image = wp_get_attachment_image_src($img_id); // Get URL of the image
                    $alt_text = get_post_meta($img_id, '_wp_attachment_image_alt', true); ?>
                     <a class="clickable" href="<?= get_the_permalink(); ?>" style="display: block; text-transform: uppercase; color: #fff; padding: 10px; border: 4px #ddd solid; width: 100%; height: 105px; background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(<?= $image[0]; ?>); background-size: cover;">
                <h4 class="tk-seravek-web"><?= $alt_text; ?></h4>
            </a>

            <h4 style="color: #fff; text-align: left">
                <a class="clickable" style="color: #fff" href="<?= get_the_permalink(); ?>"><?= get_the_title(); ?></a>
            </h4>
            <?php  endwhile; ?>
        </div>
        <div class="col-md-2 col-md-offset-1">
                <?php
                    query_posts('&post_type=post&format=scripture-of-the-day&showposts=1');
                    while (have_posts()) : the_post();?>
                        <a class="clickable" href="/read/" style="display: block; text-transform: uppercase; color: #fff; padding: 10px; border: 4px #ddd solid; width: 100%; height: 105px; background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(http://photos.compasshb.com/PhotoArchive/Worship-Services/Face-to-Face-Fellowship-122114/i-gjr7gvv/0/S/141221_WOR_SS-030-S.jpg); background-size: cover;">
                            <h4 class="tk-seravek-web">Scripture of the Day</h4>
                        </a>
                        <h4><a class="clickable" style="color: #fff" href="/read/"><?= get_the_title(); ?></a></h4>
                    <?php
                    endwhile;?>
        </div>
    </div>

<!-- Directions -->
    <div class="row" style="background: none; background-color: #f7f7f7; padding-top: 30px;padding-bottom: 30px;">
        <div class="col-md-4" style="">
            <h2 style="text-align: center">Directions</h2><center>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26542.154928917666!2d-118.04023219999998!3d33.7407795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80dd25f2e1f15bbd%3A0x2b2a43000587dfc0!2s5082+Argosy+Ave%2C+Huntington+Beach%2C+CA+92649!5e0!3m2!1sen!2sus!4v1420493991035" width="400" height="300" frameborder="0" style="border:0"></iframe></center>
        </div>
        <div class="col-md-4 text-center" >
            <h2>Time &amp; Location</h2><br/>
            <p>Sundays 11am</p>
            <p>5082 Argosy Avenue</p>
            <p>Huntington Beach, CA 92649</p><br/>
            <p><a class="btn btn-default" href="https://www.google.com/maps/place/5082+Argosy+Ave,+Huntington+Beach,+CA+92649/@33.7407795,-118.0402322,17z/data=!3m1!4b1!4m2!3m1!1s0x80dd25f2e1f15bbd:0x2b2a43000587dfc0" role="button">View Map</a></p>
        </div>
        <div class="col-md-4 text-center">
            <h2>Upcoming Service</h2><br/>
            <?php
                query_posts('&post_type=post&format=sermon&post_status=future&showposts=1');
                while (have_posts()) : the_post();
                    $sermon_worksheet = get_post_meta(get_the_ID(), 'sermon_worksheet', true);
                    $sermon_announcements = get_post_meta(get_the_ID(), 'sermon_announcements', true);
                ?>
                    <p><?= the_title(); ?> (<?= get_post_meta(get_the_ID(), 'sermon_text', true); ?>)</p>
                    <p>Pastor <?= get_post_meta(get_the_ID(), 'byline', true); ?></p>
                    <?php
                    if ($sermon_worksheet) {
                        ?>
                        <a href="<?= $sermon_worksheet;
                        ?>" class="btn btn-default">Worksheet</a>
                    <?php 
                    }

                    if ($sermon_announcements) {
                        ?>
                        <a href="<?= $sermon_announcements;
                        ?>" class="btn btn-default">Announcements</a>
                    <?php 
                    }
                    endwhile; ?>
        </div>
    </div>
</div>

<!-- Parallax -->
    <div class="row">
        <div style="background-image: url(http://photos.compasshb.com/PhotoArchive/Worship-Services/1st-Service-New-Building-01111/i-KLP4pcT/2/X2/150111_Wor_SS-093-X2.jpg);padding-top: 250px; background-attachment: fixed; background-position: 50% 0px; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; background-repeat: no-repeat;"></div>
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
  <div class="row" style="background: none; padding-bottom: 40px;">
      <div class="col-xs-10 col-xs-offset-1">
        <div class="col-md-8">
            <h2>Recent Photography</h2>
            <?php
            $results = apply_filters('chb_feed_smugmug', $results);
            foreach ($results as $result) {
                ?>
            <div class="col-md-6" style="padding-bottom: 10px">
                <a href="<?= $result[0];
                ?>"><img src="<?= $result[1];
                ?>" style="height: 175px;"></a>
            </div>
            <?php 
            } ?>
        </div>
        <div class="col-md-4">
             <h2>Recent Tweets</h2>
             <a class="twitter-timeline" height="300" data-dnt="true" href="https://twitter.com/BradMSmith/lists/compasshb" data-widget-id="566872417012690945" data-chrome="noheader transparent">Tweets from https://twitter.com/BradMSmith/lists/compasshb</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        </div>
    </div>
    <br/><br/>&nbsp;<br/><br/>
</div>
</div>

<?php // @todo: add instragram photos ?>

<?php get_footer();
