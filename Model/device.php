<?php

add_action('init', 'dm_getLastMetaId');

function dm_getLastMetaId() {
    global $wpdb;

    $resultArray = $wpdb->get_results('SELECT meta_id FROM U3RH3eLEAQ_postmeta ORDER BY meta_id DESC LIMIT 0, 1');

    $result = $resultArray[0];
    return $result;
}