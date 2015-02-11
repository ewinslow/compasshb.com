<?php namespace CompassHB\Www;

    /**
     * Define page and category templates without needing to
     * configure these inside the admin
     */
    class Routes
    {
        public static function route($template)
        {
            global $wp;
            global $title;
            $slug = '';
            $new_template = '';

            // Category Routing (Ministries) - Checks if a category archive page is being displayed
            if (is_category()) {
                global $cat;

                $ministry = get_category($cat);
                $route = $ministry->category_nicename;

                $new_template = locate_template(array("templates/ministry-{$route}.php"));
            } else {
                // Default Routing (Static Pages)
                // Slug, Title
                $static_pages = array(
                    'who-we-are' => 'Who We Are',
                    'kids-ministry' => 'Kids Ministry',
                    'eight-distinctives' => 'Eight Distinctives',
                    'what-we-believe' => 'What We Believe',
                    'ice-cream-evangelism' => 'Ice Cream Evangelism',
                    'give' => 'Give',
                    'giving' => 'Give',
                    'calendar' => 'Calendar',
                    'read' => 'Scripture of the Day',
                    'sermon' => 'Sermon Library',
                    'series' => 'Series',
                );

                if (array_key_exists('pagename', $wp->query_vars)) {
                    $slug = $wp->query_vars['pagename'];
                } elseif (array_key_exists('name', $wp->query_vars)) {
                    $slug = $wp->query_vars['name'];
                }

                if (array_key_exists($slug, $static_pages)) {
                    $new_template = locate_template(array("templates/page-{$slug}.php"));
                }
            }

            if ('' != $new_template) {
                return $new_template;
            }

            return $template;
        }
    }
