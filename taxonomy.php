<?php

function dm_init() {
	//create a new taxonomy
	register_taxonomy(
		'Geraete-Typen',
		array('category', 'dm_device'),
		array (
			'label' => __('Geräte-Typen'),
			'rewrite' => array('slug' => 'geraete-typen'),
            'hierarchical' => true
		)
	);
}

add_action('init', 'dm_init');