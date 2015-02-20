<?php
use CompassHB\WwwAdmin\Admin;

if (!function_exists('compasshb_setup')) {
    /**
     * Set up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function compasshb_setup()
    {
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails', array('post'));

        date_default_timezone_set('America/Los_Angeles');
        Admin::instance();
    }
}
add_action('after_setup_theme', 'compasshb_setup');

/**
 * Enqueue scripts and styles.
 */
function compasshb_scripts()
{
    wp_enqueue_style('compasshb-style', get_stylesheet_uri());

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'compasshb_scripts');

function compasshb_admin_scripts($hook)
{
    if ($hook != 'post-new.php' && $hook != 'post.php') {
        return;
    }
    wp_enqueue_script('post_validation', WP_CONTENT_URL.'/themes/compasshb-theme/admin.js');
}
add_action('admin_enqueue_scripts', 'compasshb_admin_scripts');

    /** add extra parameters to vimeo request api (oEmbed) */
    function add_param_oembed_fetch_url($provider, $url, $args)
    {
        // unset args that WP is already taking care
        $newargs = $args;
        unset($newargs['discover']);
        unset($newargs['width']);
        unset($newargs['height']);

        // build the query url
        $parameters = urlencode(http_build_query($newargs));

        return $provider.'&'.$parameters;
    }

    /** add player id to iframe id on vimeo */
    function add_player_id_to_iframe($html, $url, $args)
    {
        if (isset($args['autoplay'])) {
            $html = str_replace('<iframe', '<iframe id="'.$args['autoplay'].'"', $html);
        }

        return $html;
    }

    add_filter('oembed_fetch_url', 'add_param_oembed_fetch_url', 10, 3);
    add_filter('oembed_result', 'add_player_id_to_iframe', 10, 3);

    // Include the thumbnail as hidden image when using oembed
    // http://vimeo.com/api/oembed.xml?url=http%3A//vimeo.com/114506444
    add_filter('oembed_dataparse', 'compasshb_oembed_filter', 10, 3);
    function compasshb_oembed_filter($return, $data, $url)
    {
        $return .= '<img src="'.$data->thumbnail_url.'" style="display: none" alt="'.htmlspecialchars($data->title).'"/>';

        return $return;
    }

    /*
     * Download ('/podcast') endpoint
     * For downloading Vimeo videos
     */
    add_action('init', 'compasshb_rewrite_add_rewrites');
    // Define the endpont
    function compasshb_rewrite_add_rewrites()
    {
        add_rewrite_endpoint('podcast', EP_PERMALINK);
    }

    add_action('template_redirect', 'compasshb_rewrite_catch_form');
    // Handle the endpoint
    function compasshb_rewrite_catch_form()
    {
        if (is_singular() && get_query_var('podcast') && has_term('Sermon', 'format')) {
            $post = get_queried_object();
            $video_field = get_post_meta(get_the_ID(), 'video_oembed', true);
            $video_field = substr($video_field, strrpos($video_field, '/') + 1);
            $video_id = get_query_var('podcast');
            if (substr($video_id, -4, 4) == '.mp4') {
                $video_id = substr($video_id, 0, -4);

                // Create your API App (developer.vimeo.com/apps), place the data here
                $vimeo = new \Vimeo\Vimeo(getenv('VIMEO_CLIENT_ID'), getenv('VIMEO_CLIENT_SECRET'), getenv('VIMEO_TOKEN'));
                // Define from which video you want to pull data and make the request
                $video = $vimeo->request("/videos/$video_field");
                $video = $video['body'];
                $video = $video['download'];
                $video = $video[1];
                $video = $video['link'];
                if ($video) {
                    wp_redirect($video, '302');
                } else {
                    wp_redirect(home_url());
                }
            } else {
                wp_redirect(home_url());
            }
            exit();
        }
    }

        /* Adds video link to podcast feed to create enclosures on feed.press */
    function addToFeed($content)
    {
        global $post;
        $video_oembed = get_post_meta($post->ID, 'video_oembed', true);

        // Video Podcasts
        if (is_feed() && $video_oembed != "") {
            $content = '<a href="'.get_the_permalink().'podcast/'.
                        substr($video_oembed, strrpos($video_oembed, '/') + 1).'.mp4">Video: '.
                        get_post_meta($post->ID, 'sermon_text', true).'</a> - '.get_the_author().' - '.
                        get_post_meta($post->ID, '_yoast_wpseo_metadesc', true).' ';
        }

        // Scripture of the Day Podcast
        elseif (is_feed() && has_term('Scripture of the Day', 'format')) {
            $esv_content = apply_filters('chb_feed_esv', get_the_title(), 'mp3');
            $start = strrpos($esv_content, 'http://stream.esvmedia.org');
            $end = strrpos($esv_content, '">Listen</a>');
            $length = $end - $start;
            $content = '<a href="'.substr($esv_content, $start, $length).'.mp3">Listen</a>'.$esv_content;
        }

        return $content;
    }
    add_filter('the_content', 'addToFeed', 99);
