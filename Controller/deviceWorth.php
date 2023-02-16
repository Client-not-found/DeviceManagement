<?php
/** METABOX WERT **/
function dm_add_worth() {

    $screens = ['dm_device'];
    foreach($screens as $screen) {
        add_meta_box(
            'dm_box_worth', //id
            'Wert vom Gerät', //Box title
            'dm_worth_box_html', //Content callback
            $screen
        );
    }

}

function dm_worth_box_html() {
    ?>
    <form>
        <label for="dm_worth">Wert:</label>
        <input type="number" min="1" step="any" id="dm_worth" name="dm_worth" value="<?php echo get_post_meta( get_the_ID(), "dm_worth", true) ?>"/> CHF
    </form>

    <?php
}

function dm_worth() {
    echo get_post_meta( get_the_ID(), "dm_worth", true). " CHF";
}

function dm_save_postdata($post_id) {
    if (array_key_exists('dm_worth', $_POST)){
        update_post_meta(
            $post_id,
            'dm_worth',
            $_POST['dm_worth']
        );
    }
}

add_filter('the_content', 'dm_display_worth');
function dm_display_worth( $content ) {
    if(get_post_type () != "dm_device") return $content;
    {
        var_dump(dm_getLastMetaId()->meta_id);
        if (user_can(wp_get_current_user(), 'show_worth')) {
            return $content . "<div class='worth'>" . get_post_meta(get_the_ID(), 'dm_worth', true);
        }

    }
}
/**END METABOX WERT **/