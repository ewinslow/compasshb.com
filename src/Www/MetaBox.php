<?php

/**
 * Calls the class on the post edit screen.
 */
function call_metaBox()
{
    new MetaBox();
}

if (is_admin()) {
    add_action('load-post.php', 'call_metaBox');
    add_action('load-post-new.php', 'call_metaBox');
}

class MetaBox
{

    /**
     * Hook into the appropriate actions when the class is constructed.
     */
    public function __construct()
    {
        add_action('add_meta_boxes', [$this, 'add_meta_box']);
        add_action('save_post', [$this, 'save']);
    }

    /**
     * Adds the meta box container.
     */
    public function add_meta_box($post_type)
    {
        $post_types = ['post', 'page'];     //limit meta box to certain post types
        if (in_array($post_type, $post_types)) {
            add_meta_box(
                'some_meta_box_name', 'Extra Fields for Compass HB', [$this, 'render_meta_box_content'], $post_type, 'advanced', 'high'
            );
        }
    }

    /**
     * Save the meta when the post is saved.
     *
     * @param  int $post_id The ID of the post being saved.
     * @return int $post_id
     */
    public function save($post_id)
    {
        /*
         * We need to verify this came from the our screen and with proper authorization,
         * because save_post can be triggered at other times.
         */

        // Check if our nonce is set.
        if (!isset($_POST['myplugin_inner_custom_box_nonce'])) {
            return $post_id;
        }

        $nonce = $_POST['myplugin_inner_custom_box_nonce'];

        // Verify that the nonce is valid.
        if (!wp_verify_nonce($nonce, 'myplugin_inner_custom_box')) {
            return $post_id;
        }

        // If this is an autosave, our form has not been submitted,
        //     so we don't want to do anything.
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $post_id;
        }

        // Check the user's permissions.
        if ('page' == $_POST['post_type']) {
            if (!current_user_can('edit_page', $post_id)) {
                return $post_id;
            }
        } else {
            if (!current_user_can('edit_post', $post_id)) {
                return $post_id;
            }
        }

        /* OK, its safe for us to save the data now. */

        // Sanitize the user input.
        $userinputs = [
            'byline',
            'sermon_text',
            'sermon_series',
            'sermon_number',
            'video_oembed',
        ];
        foreach ($userinputs as $userinput) {
            $mydata = sanitize_text_field($_POST[$userinput]);
            // Update the meta field.
            if (strlen($mydata) > 0) {
                update_post_meta($post_id, $userinput, $mydata);
            }
        }

        // Save attachments IDs
        $fileuploads = ['sermon_worksheet', 'sermon_announcements'];
        // Make sure the file array isn't empty
        foreach ($fileuploads as $fileupload) {
            if (!empty($_FILES[$fileupload]['name'])) {

                // Setup the array of supported file types. In this case, it's just PDF.
                $supported_types = array('application/pdf');

                // Get the file type of the upload
                $arr_file_type = wp_check_filetype(basename($_FILES[$fileupload]['name']));
                $uploaded_type = $arr_file_type['type'];

                // Check if the type is supported. If not, throw an error.
                if (in_array($uploaded_type, $supported_types)) {

                    // Use the WordPress API to upload the file
                    $upload = wp_upload_bits($_FILES[$fileupload]['name'], null, file_get_contents($_FILES[$fileupload]['tmp_name']));

                    if (isset($upload['error']) && $upload['error'] != 0) {
                        wp_die('There was an error uploading your file. The error is: '.$upload['error']);
                    } else {
                        update_post_meta($post_id, $fileupload, $upload['url']);
                    } // end if/else
                } else {
                    wp_die("The file type that you've uploaded is not a PDF.");
                } // end if/else
            } // end if
        }
    }

    /**
     * Render Meta Box content.
     *
     * @param WP_Post $post The post object.
     */
    public function render_meta_box_content($post)
    {

        // Add an nonce field so we can check for it later.
        wp_nonce_field('myplugin_inner_custom_box', 'myplugin_inner_custom_box_nonce');

        // Use get_post_meta to retrieve an existing value from the database.
        $value['byline'] = get_post_meta($post->ID, 'byline', true);
        $value['sermon_text'] = get_post_meta($post->ID, 'sermon_text', true);
        $value['sermon_series'] = get_post_meta($post->ID, 'sermon_series', true);
        $value['sermon_number'] = get_post_meta($post->ID, 'sermon_number', true);
        $value['video_oembed'] = get_post_meta($post->ID, 'video_oembed', true);

        $posts = get_posts([
            'post_type' => 'post',
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'taxonomy' => 'format',
            'term' => 'sermon-series',
            'nopaging' => true,
        ]);

        // Display the form, using the current value.
        // @todo: http://code.tutsplus.com/articles/attaching-files-to-your-posts-using-wordpress-custom-meta-boxes-part-1--wp-22291
        echo '<h4>Sermons and Regular Posts</h4>';
        echo '<label for="byline">Byline</label><input type="text" id="byline" name="byline" value="'.esc_attr($value['byline']).'" size="25" /><br/>';
        echo '<label for="video_oembed">Vimeo Video URL: </label><input type="text" id="video_oembed" name="video_oembed" value="'.esc_attr($value['video_oembed']).'" size="50" /><br/><br/>';

        echo '<h4>Sermons Only</h4>';
        echo '<label for="sermon_number">Sermon ID #</label><input type="text" id="sermon_number" name="sermon_number" value="'.esc_attr($value['sermon_number']).'" size="25" /><br/>';
        echo '<label for="sermon_text">Sermon Text</label><input type="text" id="sermon_text" name="sermon_text" value="'.esc_attr($value['sermon_text']).'" size="25" /><br/>';
        echo '<label for="sermon_series">Sermon Series</lable><select id="sermon_series" name="sermon_series">';
        echo '<option value="">None</option>';
        foreach ($posts as $post) {
            if ($post->ID == $value['sermon_series']) {
                $selected = 'selected';
            }
            echo '<option value='.$post->ID.' '.$selected.'>'.$post->post_title.'</option>';
        }
        echo "</select><br/>";
        echo '<label for="sermon_worksheet">Sermon Worksheet (PDF only): </label><input type="file" id="sermon_worksheet" name="sermon_worksheet" value="" size="25" /><br/>';
        echo '<label for="sermon_announcements">Sermon Announcements (PDF only): </label><input type="file" id="sermon_announcements" name="sermon_announcements" value="" size="25" /><br/>';
    }
}

function update_edit_form()
{
    echo ' enctype="multipart/form-data"';
} // end update_edit_form
add_action('post_edit_form_tag', 'update_edit_form');
