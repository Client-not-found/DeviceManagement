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
        <label for="<?php echo dm_getMetaId() ?>">Geräte History:</label>
        <input type="text" id="<?php echo dm_getMetaId() ?>" name="<?php echo dm_getMetaId() ?>" />

    <?php
}

function dm_devicehistory() {
    echo get_post_meta( get_the_ID(), dm_getMetaId(), true);
}

function dm_save_devicehistory($post_id) {
    if (array_key_exists(dm_getMetaId(), $_POST)){
        update_post_meta(
            $post_id,
            dm_getMetaId(),
            $_POST[dm_getMetaId()]
        );
    }

}

add_filter('the_content', 'dm_display_devicehistory');
function dm_display_devicehistory($content ) {
    if(get_post_type () != "dm_device") return $content;
    {
        if (user_can(wp_get_current_user(), 'show_history')) {
            return dm_getHistory(get_the_ID());
        }

    }

}