<?php

/**
 * Diese Funktion holt alle Geräte History Einträge aus der Datenbank
 *
 *
 * @since 1.1.5

 * @global type $wpdb Datenbankverbindung.
 *
 * @return Array Gibt ein Array mit allen Geräte History Einträge zurück.
 */
function getHistory($post_id) {
    global $wpdb;
    $sql = $wpdb->get_results( "SELECT meta_value FROM {$wpdb->prefix}postmeta WHERE  post_id = ". $post_id ." AND meta_key = 'dm_devicehistory'");

    return $sql;
}