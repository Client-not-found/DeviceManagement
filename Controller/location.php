<?php

function dm_location() {
    //create a new taxonomy
    register_taxonomy(
        'standort',
        array('category', 'dm_device'),
        array (
            'label' => __('Standort'),
            'rewrite' => array('slug' => 'standort'),
            'hierarchical' => true
        )
    );
}

add_action('init', 'dm_location');