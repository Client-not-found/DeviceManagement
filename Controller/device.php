<?php

add_action('init', 'dm_create_device');
function dm_create_device() {
    register_post_type( 'dm_device', array(
        'labels' => array(
            'name' => __('Devices'),
            'singular_name' => __('Device')
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-desktop',
        'rewrite' => array('slug' => 'devices'),
    ));

    add_metadata( 'dm_device', get_queried_object_id(), 'dm_log', 1, false);
}
