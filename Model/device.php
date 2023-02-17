<?php

add_action('init', 'dm_getMetaId');

function dm_getMetaId() {
    global $wpdb;

    //Sende ein Select befehl welcher die höchste ID ausgibt
    $sql = $wpdb->get_results('SELECT meta_id FROM U3RH3eLEAQ_postmeta ORDER BY meta_id DESC LIMIT 0, 1');

    //Lese die meta_id aus dem Array
    $resultArray = $sql[0]->meta_id;

    //zähle eins hinzu
    $resultArray = $resultArray + 1;

    //Erstellt den Formular name für die Metabox
    $result = 'dm_devicelog' . $resultArray;

    return $result;
}

function dm_getLog($post_id)
{
    global $wpdb;

    $sql = $wpdb->get_results("SELECT meta_value FROM U3RH3eLEAQ_postmeta WHERE meta_key Like 'dm_devicelog%' AND post_id = " . $post_id);
    foreach ($sql as $log) {
        echo $log->meta_value; ?> <br><?php
    }

}