<?php

add_filter( 'single_template', 'single_page_template' );
function single_page_template($single_template) {
    global $post;

    if ($post->post_type == 'dm_device') {
        $single_template = plugin_dir_path(__DIR__) . '/View/single-dm_device.php';
    }
    return $single_template;
}
