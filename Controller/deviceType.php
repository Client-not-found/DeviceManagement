<?php

function dm_device() {
	//Erstelle eine neue Kategorie für den Geräte Typ
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

add_action('init', 'dm_device');