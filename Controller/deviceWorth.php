<?php
/**
 * erstellt die Metabox "Wert vom Gerät"
 *
 * Diese Funktion erstellt die Metabox in, welcher der Wert von einem Gerät gespeichert werden kann
 *
 * @since 1.0.1
 *
 * @return void.
 */
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

/**
 * HTML Code für die Metabox in welcher der Wert vom Gerät gespeichert wird.
 *
 * @since 1.0.1
 *
 * @return void.
 */
function dm_worth_box_html() {
    ?>
    <form>
        <label for="dm_worth">Wert:</label>
        <input type="number" min="1" step="any" id="dm_worth" name="dm_worth" value="<?php echo get_post_meta( get_the_ID(), "dm_worth", true) ?>"/> CHF
    </form>

    <?php
}

/**
 * Holt den Wert von einem Gerät aus der Datenbank
 *
 * Über die Post Id wird in der postmeta Tabelle den Eintrag mit dem key "dm_worth" gesucht.
 *
 * @since 1.0.1
 *
 * @return void.
 */
function dm_worth() {
    echo get_post_meta( get_the_ID(), "dm_worth", true). " CHF";
}

/**
 * Speichert den neuen Wert in der Datenbank
 *
 * Es wird die post_id, den postmeta key und den aktuell eingegeben Wert abgesendet
 *
 * @since 1.0.1
 *
 * @return void.
 */
function dm_save_postdata($post_id) {
    if (array_key_exists('dm_worth', $_POST)){
        update_post_meta(
            $post_id,
            'dm_worth',
            $_POST['dm_worth']
        );
    }
}

/**
 * Der aktuelle Wert von einem Gerät wird ausgegeben
 *
 * Es wird die post_id, den postmeta key und den aktuell eingegeben Wert abgesendet
 *
 * @since 1.0.1
 *
 * @return void.
 */
add_filter('the_content', 'dm_display_worth');
function dm_display_worth( $content ) {
    if(get_post_type () != "dm_device") return $content;
    {
        echo $content;

        if (user_can(wp_get_current_user(), 'show_worth')) {
            return "<div class='worth'>" . get_post_meta(get_the_ID(), 'dm_worth', true);
        }

    }
}