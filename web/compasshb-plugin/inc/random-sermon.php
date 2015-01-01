<?php

add_action('template_redirect','random_template');

function random_template() {
       if (get_query_var('random') == 1) {
               $posts = get_posts('post_type=sermon&orderby=rand&numberposts=1');
               foreach($posts as $post) {
                       $link = get_permalink($post);
               }
               wp_redirect($link,307);
               exit;
       }
}

add_action('init','random_add_rewrite');

function random_add_rewrite() {
       global $wp;
       $wp->add_query_var('random');
       add_rewrite_rule('random/?$', 'index.php?random=1', 'top');
}