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
    $result = 'dm_devicehistory' . $resultArray;

    return $result;
}

function dm_getHistory($post_id)
{
    global $wpdb;
    $prefix = $wpdb->prefix;

    $sql = $wpdb->get_results("SELECT meta_value FROM " .$prefix ."postmeta WHERE meta_key Like 'dm_devicehistory%' AND post_id = " . $post_id);
    foreach ($sql as $history) {
        echo "<div class='dm_devicehistory'>" . $history->meta_value . "</div><br>";
    }

}