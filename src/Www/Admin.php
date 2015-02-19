<?php namespace CompassHB\Www;

require 'MetaBox.php';

    class Admin
    {
        public $pluginDir;
        public $pluginPath;
        protected static $instance;

        /**
         * Args for the Sermon post type.
         *
         * @var array
         */
        protected $postSermonTypeArgs = array(
            'public' => true,
            'rewrite' => array('slug' => 'sermons', 'with_front' => false),
            'menu_position' => 6,
            'menu_icon' => 'dashicons-microphone',
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'author',
                'thumbnail',
                'custom-fields',
            ),
            'taxonomies' => array(''),
        );

        /**
         * Args for the Video post type.
         *
         * @var array
         */
        protected $postVideoTypeArgs = array(
            'public' => true,
            'rewrite' => array('slug' => 'videos', 'with_front' => false),
            'menu_position' => 6,
            'menu_icon' => 'dashicons-video-alt3',
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'author',
                'thumbnail',
                'custom-fields',
                'comments',
            ),
            'taxonomies' => array(''),
            'has_archive' => true,
        );

        /**
         * Static Singleton Factory Method.
         *
         * @return Admin
         */
        public static function instance()
        {
            if (!isset(self::$instance)) {
                $className = __CLASS__;
                self::$instance = new $className();
            }

            return self::$instance;
        }

        /**
         * Initializes plugin variables and sets up WordPress hooks/actions.
         */
        protected function __construct()
        {
            $this->pluginPath = trailingslashit(dirname(dirname(__FILE__)));
            $this->pluginDir = trailingslashit(basename($this->pluginPath));

            $this->addHooks();
            $this->createCategories();
            $this->registerPostType();
        }

        /**
         * Add filters and actions.
         */
        protected function addHooks()
        {
            add_action('init', array($this, 'init'), 10);

            add_filter('robots_txt', array('CompassHB\Www\Helper', 'robots_mod'));

            add_action('compass_video_og', array('CompassHB\Www\Helper', 'compass_video_og'));

            // Routing
            add_filter('template_include', array('CompassHB\Www\Routes', 'route'));

            // Feeds
            add_filter('chb_feed_esv', array('CompassHB\Www\Helper', 'esv'));
            add_filter('chb_feed_vimeo', array('CompassHB\Www\Helper', 'vimeo'));
            add_filter('chb_feed_smugmug', array('CompassHB\Www\Helper', 'smugmug'));

            // Scripture Index Taxonomy
            add_action('scripture_library_output_table', array('CompassHB\Www\Helper', 'scripture_library_output_table'));
            add_action('save_post', array(
                'CompassHB\Www\Helper',
                'update_custom_terms',
            )); // update when a post is created or edited for scripture index

            // Disable HTML comments in third-party plugins
            add_filter('w3tc_can_print_comment', function ($w3tc_setting) {
                return false;
            });

            add_action('admin_menu', function () {
            //    remove_menu_page('edit.php?post_type=page');
            });
        }

        public function createCategories()
        {
            //Define the category
            $ministries = array(
                array(
                    'cat_name' => 'The United (Jr. High/High School)',
                    'category_description' => 'Reaching teens for Jesus through the gospel & teaching teens how to live like Jesus through his word',
                    'category_nicename' => 'youth',
                    'category_parent' => '',
                ),
                array(
                    'cat_name' => 'College',
                    'category_description' => 'College Ministry',
                    'category_nicename' => 'college',
                    'category_parent' => '',
                ),
            );

            // Create the category
            foreach ($ministries as $min) {
                if (!term_exists($min['cat_name'], 'category')) {
                    wp_insert_term($min['cat_name'], 'category', array(
                        'description' => $min['category_description'],
                        'slug' => $min['category_nicename'],
                        'parent' => $min['category_parent'],
                    ));
                }
            }

            $posttypes = array(
                array(
                    'cat_name' => 'Regular Post (Default)',
                    'category_description' => 'Blogs, articles and videos.',
                    'category_nicename' => 'default',
                    'category_parent' => '',
                ),
                array(
                    'cat_name' => 'Sermons',
                    'category_description' => 'Sermons',
                    'category_nicename' => 'college',
                    'category_parent' => '',
                ),
                array(
                    'cat_name' => 'Scripture of the Day',
                    'category_description' => 'SOTD',
                    'category_nicename' => 'default',
                    'category_parent' => '',
                ),
                array(
                    'cat_name' => 'Regular Post (Default)',
                    'category_description' => 'Blogs, articles and videos.',
                    'category_nicename' => 'default',
                    'category_parent' => '',
                ),
                array(
                    'cat_name' => 'Regular Post (Default)',
                    'category_description' => 'Blogs, articles and videos.',
                    'category_nicename' => 'default',
                    'category_parent' => '',
                ),
            );
        }

        /**
         * Run on applied action init.
         */
        public function init()
        {
            $this->registerPostType();
        }

        /**
         * Register the post types.
         */
        public function registerPostType()
        {
            $this->generatePostTypeLabels();

            register_taxonomy(
                'scripture', array('post'), array(
                    'hierarchical' => true,
                    'query_var' => true,
                    'rewrite' => array(
                        'slug' => 'scripture',
                        'with_front' => false,
                        'hierarchical' => true,
                    ),
                    'public' => false,
                    'show_ui' => false,
                    'labels' => $this->taxonomyScriptureLabels,
                    'capabilities' => array(
                        'manage_terms' => 'edit_users',
                        'edit_terms' => 'edit_users',
                        'delete_terms' => 'edit_users',
                    ),
                )
            );

            register_taxonomy(
                'format', array('post'), array(
                    'hierarchical' => true,
                    'query_var' => true,
                    'show_admin_column' => true,
                    'rewrite' => array(
                        'slug' => 'format',
                        'with_front' => false,
                        'hierarchical' => true,
                    ),
                    'public' => true,
                    'show_ui' => true,
                    'labels' => $this->taxonomyPostTypeLabels,
                    'capabilities' => array(
                        'manage_terms' => 'edit_users',
                        'edit_terms' => 'edit_users',
                        'delete_terms' => 'edit_users',
                    ),
                )
            );
        }

        /**
         * Generate custom post type labels.
         */
        protected function generatePostTypeLabels()
        {
            $this->taxonomyScriptureLabels = array(
                'name' => 'Scripture Categories',
                'singular_name' => 'Scripture Category',
                'search_items' => 'Search Scripture Categories',
                'all_items' => 'All Scripture Categories',
                'parent_item' => 'Parent Scripture Category',
                'parent_item_colon' => 'Parent Scripture Category:',
                'edit_item' => 'Edit Scripture Category',
                'update_item' => 'Update Scripture Category',
                'add_new_item' => 'Add New Scripture Category',
                'new_item_name' => 'New Scripture Category Name',
            );

            $this->taxonomyPostTypeLabels = array(
                'name' => 'Format',
                'singular_name' => 'Format',
                'search_items' => 'Search Post Format',
                'all_items' => 'All Post Format',
                'parent_item' => 'Parent Post Format',
                'parent_item_colon' => 'Parent Post Format:',
                'edit_item' => 'Edit Post Format',
                'update_item' => 'Update Post Format',
                'add_new_item' => 'Add New Post Format',
                'new_item_name' => 'New Post Type Name',
            );
        }
    }
