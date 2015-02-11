<?php
/**
 * The template for displaying all single posts.
 *
 * @package CompassHB
 */
get_header(); ?>
</div>
    <?php while (have_posts()) : the_post();
        $format = wp_get_post_terms(get_the_ID(), 'format');
        $format = $format[0]->name; ?>
        <article class="container-fluid" style="margin-bottom: 30px">

            <section class="row" style="background-image:  linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(/app/themes/compasshb-theme/images/header-<?= sanitize_title($format) ?>.jpg); background-size: cover; background-position: center">
                <div class="col-xs-11 col-xs-offset-1" style="padding-top: 60px;" >
                    <h1 class="tk-seravek-web" style='color: #fff; padding: 10px 3px; text-transform: uppercase '><?php the_title(); ?></h1>
                    <p class="lead" style="color: #fff; margin-top: -20px"><?= $format; ?></p>
                </div>
            </section>

            <section class="row">
                <div class="col-md-7 col-md-offset-1" style="background-color: #fff; border: 1px solid #E4E4E4; padding: 20px; margin-top: 20px">
                    <p style='text-transform: uppercase; font-size: .9rem;'>
                        <span style="padding-right: 20px;"><?= str_replace('Sep', 'Sept', get_the_date('l, M')); ?>. <?= get_the_date(' j, Y'); ?></span>
                        <?php if ($format == 'Sermon') {
    $sermon_worksheet = get_post_meta(get_the_ID(), 'sermon_worksheet', true);
    $sermon_announcements = get_post_meta(get_the_ID(), 'sermon_announcements', true);
    if ($sermon_worksheet != '') {
        echo '<span style="margin-right: 20px;"><a href="'.$sermon_worksheet.'">Worksheet</a></span>';
    }
    if ($sermon_announcements != '') {
        echo '<span><a href="'.$sermon_announcements.'">Announcements</a></span>';
    }
}?>
                    </p>
                    <?php $video_oembed = get_post_meta(get_the_ID(), 'video_oembed', true);
                    if ($video_oembed) {
                        echo wp_oembed_get($video_oembed, array('height' => '800'));
                    }
                        // Message for weekend
                        if (date('D') == "Sun" || date('D') == "Sat") {
                            echo "<em>Scripture of the Day is posted Monday - Friday. Come back on Monday for the next post!</em>";
                        }?>
                    <p class="lead"><?php the_excerpt(); ?></p>
                    <?php
                    the_content();

                    if ($format == 'Scripture of the Day') {
                        if (wp_is_mobile()) {
                            do_action('chb_feed_esv', get_the_title(), 'mp3');
                        } else {
                            do_action('chb_feed_esv', get_the_title(), 'flash');
                        }
                        ?>
                        <p style="color: #888;"><em>Scripture taken from The Holy Bible, English Standard Version.
                                Copyright &copy;2001
                                by <a href="http://www.crosswaybibles.org" target="_blank">Crossway Bibles</a>, a
                                publishing
                                ministry of Good News Publishers. Used by permission. All rights reserved. Text provided
                                by the <a
                                    href="http://www.gnpcb.org/esv/share/services/" target="_blank">Crossway Bibles Web
                                    Service</a>.</em>
                        </p><br/>
                        <div style="max-width: 600px; margin: 0 auto;">
                            <br/><input type="submit" style="width: 100%"
                                        value="View Comments (<?= get_comments_number();
                        ?>)"
                                        onclick='jQuery( "#disqus_thread" ).show();'/><br/><br/>
                        </div>
                        <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
                    <?php

                    }
                        // Get the post comments & comment_form
                        comments_template();
                    ?><br/><br/><?php
                        // Pagination
                        $previous_post = get_adjacent_post(true, [], true, 'format');
                        $next_post = get_adjacent_post(true, [], false, 'format');
                        if ($previous_post) {
                            echo '<a class="btn btn-default" href="'.get_permalink($previous_post->ID).'"><i class="glyphicon glyphicon-chevron-left"></i> '.$previous_post->post_title.'</a>';
                        }
                    if ($next_post) {
                        echo '<a class="btn btn-default" style="float: right" href="'.get_permalink($next_post->ID).'">'.$next_post->post_title.' <i class="glyphicon glyphicon-chevron-right"></i></a>';
                    }
                    ?>
                    </div>
                    <aside class="col-md-2 col-md-offset-1" role="complementary" style="background-color: #fff; border: 1px solid #E4E4E4; margin-top: 20px; padding: 20px;">
                        <?php
                        if (locate_template('templates/aside-'.sanitize_title($format).'.php')) {
                            get_template_part('templates/aside', sanitize_title($format));
                        } else {
                            get_template_part('templates/aside', 'default');
                        } ?>
                    </aside>
            </section>
        </article>
    <?php endwhile; // end of the loop. ?>

<div class="container-fluid">
<?php get_footer(); ?>
