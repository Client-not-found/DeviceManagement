<?php

function dm_location() {
    //Erstelle die Kategorie für die Orte
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