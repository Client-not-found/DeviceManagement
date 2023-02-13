<?php


add_action('init', 'dm_create_device');
add_action('add_meta_boxes', 'dm_add_worth');
add_action('add_meta_boxes', 'dm_add_devicelog');
add_action('save_post', 'dm_save_postdata');
add_action('save_post', 'dm_save_devicelog');

//Erstelle den Post Type Device
function dm_create_device() {
    register_post_type( 'dm_device', array(
        'labels' => array(
            'name' => __('Geräte'),
            'singular_name' => __('Gerät')
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-desktop',
        'rewrite' => array('slug' => 'devices'),
    ));

    add_metadata( 'dm_device', get_queried_object_id(), 'dm_log', 1, false);
}