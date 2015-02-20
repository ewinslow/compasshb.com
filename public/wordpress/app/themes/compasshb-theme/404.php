<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package CompassHB
 */
get_header(); ?>
</div>

<article class="container-fluid" style="margin-bottom: 30px">
    <section class="row" style="background-image:  linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(/app/themes/compasshb-theme/images/header-sermon.jpg); background-size: cover; background-position: center">
        <div class="col-xs-11 col-xs-offset-1" style="padding-top: 60px;" >
            <h1 class="tk-seravek-web" style='color: #fff; padding: 10px 3px; text-transform: uppercase '>404 - Page Not Found</h1>
        </div>
    </section>

    <section class="row">
        <div class="col-md-7 col-md-offset-1" style="background-color: #fff; border: 1px solid #E4E4E4; padding: 20px; margin-top: 20px">
                <script>
                    (function () {
                        var cx = '015847432826014960883:v16f7yattli';
                        var gcse = document.createElement('script');
                        gcse.type = 'text/javascript';
                        gcse.async = true;
                        gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
                        '//www.google.com/cse/cse.js?cx=' + cx;
                        var s = document.getElementsByTagName('script')[0];
                        s.parentNode.insertBefore(gcse, s);
                    })();
                </script>
                <gcse:search></gcse:search>
                <?php the_widget('WP_Widget_Recent_Posts');
                /* translators: %1$s: smiley */
                $archive_content = '<p>'.sprintf(__('Try looking in the monthly archives. %1$s', 'compasshb'),
                        convert_smilies(':)')).'</p>';
                ?>
        </div>
    </section>
</article>
<?php get_footer(); ?>
