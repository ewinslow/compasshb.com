<?php namespace CompassHB\Www;

class Helper
{
        /* Append Robots.txt */
        public function robots_mod($output, $public)
        {
            $comment1 = "# Get involved at github.com/compasshb\n\n";
            $comment2 = "\nUser-agent: ia_archiver\nDisallow: /\n\n";
            $output = $comment1.$output.$comment2;

            return $output;
        }

    public static function compass_video_og()
    {
        global $post;

        if ($post && $post->post_type == 'page' && $post->ID == '485') {

                // Find most recent sermon video
                $args = array(
                    'post_type' => 'sermon',
                    'posts_per_page' => 20,
                );

            wp_reset_query();
            query_posts($args);

            while (have_posts()) : the_post();
            if (get_post_meta(get_the_ID(), 'video_oembed', true)) {
                $video_thumb = implode(get_vimeo_thumb(get_post_meta(get_the_ID(), 'video_oembed', true)));
                echo '<meta property="og:image" content="'.$video_thumb.'" />';
                break;
            }
            endwhile;

            wp_reset_query();
        }
    }

        // ESV
        public static function esv($p, $f = 'mp3')
        {
            $key = getenv('ESV_API');
            $options = "include-footnotes=false&audio-format=".$f;
            $passage = urlencode($p);

            $url = "http://www.esvapi.org/v2/rest/passageQuery?key=$key&passage=$passage&$options";

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec($ch);
            curl_close($ch);

            return $response;
        }

        // SmugMug
        public static function smugmug()
        {
            $feedUrl = 'http://photos.compasshb.com/hack/feed.mg?Type=nicknameRecentPhotos&Data=compasshb&format=rss200&Size=Medium';
            $num = 4;

            $rawFeed = file_get_contents($feedUrl);
            $xml = new \SimpleXmlElement($rawFeed);
            $results = array();

            for ($i = 0; $i < $num; $i++) {
                // Parse Image Link
                $link = $xml->channel->item->link;
                $link = substr($link->asXML(), 6, -7);

                // Parse Image Source
                $namespaces = $xml->channel->item[$i]->getNameSpaces(true);
                $media = $xml->channel->item[$i]->children($namespaces['media']);
                $image = $media->group->content[3]->attributes();
                $image = $image['url']->asXML();
                $image = substr($image, 6, -1);

                $results[] = array($link, $image);
            }

            return $results;
        }

        // Vimeo
        public static function vimeo($video_field)
        {
            $video_field = substr($video_field, strrpos($video_field, '/') + 1);

            // Create your API App (developer.vimeo.com/apps), place the data here
            $vimeo_t = new \Vimeo\Vimeo(getenv('VIMEO_CLIENT_ID'), getenv('VIMEO_CLIENT_SECRET'),
                getenv('VIMEO_TOKEN'));

            // Define from which video you want to pull data and make the request
            $video = $vimeo_t->request("/videos/$video_field");

            // Get the video thumbnail
            $video_thumb = $video['body'];
            $video_thumb = $video_thumb['pictures'];
            $video_thumb = $video_thumb['sizes'];
            $video_thumb = end($video_thumb);
            $video_thumb = $video_thumb['link'];

            return array($video_thumb);
        }

        // Scripture Index
        public static function update_custom_terms($post_id)
        {

            // looks for bible references in input
            $regex_pattern = '/\b(Genesis|Exodus|Leviticus|Numbers|Deuteronomy|Joshua|Judges|Ruth|1 Samuel|2 Samuel|1 Kings|2 Kings|1 Chronicles|2 Chronicles|Ezra|Nehemiah|Esther|Job|Psalm|Proverbs|Ecclesiastes|Song of Solomon|Isaiah|Jeremiah|Lamentations|Ezekiel|Daniel|Hosea|Joel|Amos|Obadiah|Jonah|Micah|Nahum|Habakkuk|Zephaniah|Haggai|Zechariah|Malachi|Matthew|Mark|Luke|John|Acts|Romans|1 Corinthians|2 Corinthians|Galatians|Ephesians|Philippians|Colossians|1 Thessalonians|2 Thessalonians|1 Timothy|2 Timothy|Titus|Philemon|Hebrews|James|1 Peter|2 Peter|1 John|2 John|3 John|Jude|Revelation)\s(\d{1,3})(:\d{1,3}(\-\d{1,3}(:\d{1,3})?)?)?/';

            $post_type = get_post_type($post_id);

            // update terms only for these custom post types
            if ($post_type != 'sermon' && $post_type != 'article' && $post_type != 'read') {
                return;
            }

            // don't create or update terms for system generated posts
            if (get_post_status($post_id) == 'auto-draft') {
                return;
            }

            // identify where child terms will go

            $top_parent_term_sermon = term_exists('Sermons', 'scripture');
            switch ($post_type) {
                case "sermon":
                    $top_parent_term = term_exists('Cross References', 'scripture');
                    break;
                case "read":
                    $top_parent_term = term_exists('Scripture of the Day', 'scripture');
                    break;
                case "article":
                    $top_parent_term = term_exists('Articles', 'scripture');
                    break;
            }

            // get the terms currently associated with the post
            $post_terms = wp_get_object_terms($post_id, 'scripture');

            // delete child terms only associated with this post
            foreach ($post_terms as $post_term) {
                if ($post_term->count == 1) {
                    wp_delete_term($post_term->term_id, 'scripture');
                }
            }

            // delete all existing relationships between post and terms
            wp_delete_object_term_relationships($post_id, 'scripture');

            // search fields from post
            $input_string = get_post_field('post_title', $post_id).get_post_field('post_content', $post_id);
            $input_string_sermon = get_post_meta(get_the_ID(), 'sermon_text', true);

            $terms = self::find_verses($input_string, $regex_pattern);
            self::insert_and_set_terms($terms, $top_parent_term, $post_id);

            if ($input_string_sermon) {
                $terms = self::find_verses($input_string_sermon, $regex_pattern);
                self::insert_and_set_terms($terms, $top_parent_term_sermon, $post_id);
            }

            return;
        }

    public static function insert_and_set_terms($terms, $top_parent_term, $post_id)
    {

            // loop through every verse found
            foreach ($terms as $ref => $book) {

                // insert term under book name
                delete_option("scripture_children"); // clear taxonomy cache
                $parent_term = term_exists($book, 'scripture',
                    $top_parent_term['term_id']); // array is returned if taxonomy is given
                wp_insert_term($ref, 'scripture', array('parent' => $parent_term['term_id']));

                // Create relationship between CPT and term
                delete_option("scripture_children"); // clear taxonomy cache
                $ref_term = term_exists($ref, 'scripture', $parent_term['term_id']);
                $ref_term_id = (int) $ref_term['term_id'];
                wp_set_object_terms($post_id, $ref_term_id, 'scripture', true);
            }
    }

    public static function find_verses($input_string, $regex_pattern)
    {

            // finds all matches
            preg_match_all($regex_pattern, $input_string, $matches_out);

            // creates an associative array where the key is the full reference name and the value is the book,
            // e.g. "1 Thessalonians 5:12" => "1 Thessalonians"
            $terms = array_combine($matches_out[0], $matches_out[1]);

        return $terms;
    }

    public static function scripture_library_output_table()
    {
        $terms_ot = array(
                'Genesis',
                'Exodus',
                'Leviticus',
                'Numbers',
                'Deuteronomy',
                'Joshua',
                'Judges',
                'Ruth',
                '1 Samuel',
                '2 Samuel',
                '1 Kings',
                '2 Kings',
                '1 Chronicles',
                '2 Chronicles',
                'Ezra',
                'Nehemiah',
                'Esther',
                'Job',
                'Psalm',
                'Proverbs',
                'Ecclesiastes',
                'Song of Solomon',
                'Isaiah',
                'Jeremiah',
                'Lamentations',
                'Ezekiel',
                'Daniel',
                'Hosea',
                'Joel',
                'Amos',
                'Obadiah',
                'Jonah',
                'Micah',
                'Nahum',
                'Habakkuk',
                'Zephaniah',
                'Haggai',
                'Zechariah',
                'Malachi',
            );

        $terms_nt = array(
                'Matthew',
                'Mark',
                'Luke',
                'John',
                'Acts',
                'Romans',
                '1 Corinthians',
                '2 Corinthians',
                'Galatians',
                'Ephesians',
                'Philippians',
                'Colossians',
                '1 Thessalonians',
                '2 Thessalonians',
                '1 Timothy',
                '2 Timothy',
                'Titus',
                'Philemon',
                'Hebrews',
                'James',
                '1 Peter',
                '2 Peter',
                '1 John',
                '2 John',
                '3 John',
                'Jude',
                'Revelation',
            );

        $return = self::output_rows($terms_nt);
        $return .= self::output_rows($terms_ot);

        echo $return;
    }

    public static function output_rows($terms)
    {
        $sermon_term = term_exists('Sermons', 'scripture');
        $crossref_term = term_exists('Cross References', 'scripture');
        $article_term = term_exists('Articles', 'scripture');
        $read_term = term_exists('Scripture of the Day', 'scripture');

        $term_ids = array(
                (int) $sermon_term['term_id'],
                (int) $crossref_term['term_id'],
                (int) $article_term['term_id'],
                (int) $read_term['term_id'],
            );

        $desc = array(
                "Sermons",
                "Cross Refs",
                "Articles",
                "SOTD",
            );

        $return = "";

            // Output Rows
            foreach ($terms as $book) {
                $i = 0;
                $return .= '<div class="scripture-library">';
                $return .= '<h3>'.$book.'</h3>';

                foreach ($term_ids as $id) {
                    $book_term = term_exists($book, 'scripture', $id);
                    $book_term_id = (int) $book_term['term_id'];
                    $book_term_link = get_term_link($book_term_id, 'scripture');
                    $book_term_count = count(get_term_children($book_term_id, 'scripture'));

                    if ($book_term_count == 0) {
                        $book_term_link = "#";
                    }

                    $return .= '<p style="float: left; margin-right: 10px;">';
                    $return .= $desc[$i]."<br/><a href='".$book_term_link."'>".$book_term_count."</a></p>";
                    $i++;
                }
                $return .= '<br clear="both"/></div>';
            }

        return $return;
    }
}
