<?php

function getHistory($post_id) {
    global $wpdb;
    $sql = $wpdb->get_results( "SELECT meta_value FROM {$wpdb->prefix}postmeta WHERE  post_id = ". $post_id ." AND meta_key = 'dm_devicehistory'");

    return $sql;
}