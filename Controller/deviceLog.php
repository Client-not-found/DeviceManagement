<?php
/**METABOX DEVICE-LOG**/
function dm_add_devicelog() {

    $screens = ['dm_device'];
    foreach($screens as $screen) {
        add_meta_box(
            'dm_box_devicelog', //id
            'Log Einträge vom Gerät', //Box title
            'dm_devicelog_box_html', //Content callback
            $screen
        );
    }

}

function dm_devicelog_box_html() {
    ?>
        <label for="dm_devicelog">Geräte Log:</label>
        <input type="text" id="dm_devicelog" name="dm_devicelog" />

    <?php
}

function dm_devicelog() {
    echo get_post_meta( get_the_ID(), "dm_devicelog", true);
}

function dm_save_devicelog($post_id) {
    if (array_key_exists('dm_devicelog', $_POST)){
        update_post_meta(
            $post_id,
            'dm_devicelog',
            $_POST['dm_devicelog']
        );
    }

}

add_filter('the_content', 'dm_display_devicelog');
function dm_display_devicelog( $content ) {
    if(get_post_type () != "dm_device") return $content;
    {
        if (user_can(wp_get_current_user(), 'show_devicelog')) {
            return $content . "<div class='dm_devicelog'>" . get_post_meta(get_the_ID(), 'dm_devicelog', true);
        }

    }

}