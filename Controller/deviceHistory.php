<?php

/**METABOX Device-History**/
function dm_add_devicehistory() {

    $screens = ['dm_device'];
    foreach($screens as $screen) {
        add_meta_box(
            'dm_box_devicehistory', //id
            'History Einträge vom Gerät', //Box title
            'dm_devicehistory_box_html', //Content callback
            $screen
        );
    }

}

function dm_devicehistory_box_html() {
    ?>
        <label for="dm_devicehistory">Geräte History:</label>
        <input type="text" id="dm_devicehistory" name="dm_devicehistory" />

    <?php
}

function dm_devicehistory() {
    echo get_post_meta( get_the_ID(), "dm_devicehistory", true);
}

function dm_save_devicehistory($post_id) {
    $history = get_post_meta(get_the_ID(), 'dm_devicehistory', true);
if ($history != null) {
    array_push($history, ['Eintrag' => $_POST['dm_devicehistory'], 'Zeit' => date("d-m-y h:i", time())]);
} else {
    $history = [0 => ['Eintrag' => $_POST['dm_devicehistory'], 'Zeit' => date("d-m-y h:i", time())]];
}
    if (array_key_exists('dm_devicehistory', $_POST)){
        update_post_meta(
            $post_id,
            'dm_devicehistory',
            $history
        );
    }

}

add_filter('the_content', 'dm_display_devicehistory');
function dm_display_devicehistory($content ) {
    if(get_post_type () != "dm_device") return $content;
    {
        //if (user_can(wp_get_current_user(), 'show_history')) {
        $eintraege = get_post_meta(get_the_ID(), 'dm_devicehistory', true);
        foreach ($eintraege as $eintrag) {
            echo "<div class='dm_devicehistory'>". $eintrag['Eintrag'] . " <br>" . $eintrag['Zeit'] . "<div />";
        }
    }
        //}

}