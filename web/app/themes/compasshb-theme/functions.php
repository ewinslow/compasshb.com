<?php
use CompassHB\Www\Admin;

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
