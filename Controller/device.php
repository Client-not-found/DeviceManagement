<?php


add_action('init', 'dm_create_device');
add_action('add_meta_boxes', 'dm_add_worth');
add_action('save_post', 'dm_save_postdata');

//Erstelle den Post Type Device
function dm_create_device() {
    register_post_type( 'dm_device', array(
        'labels' => array(
            'name' => __('Geräte'),
            'singular_name' => __('Gerät')
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-desktop',
        'rewrite' => array('slug' => 'devices'),
    ));

    add_metadata( 'dm_device', get_queried_object_id(), 'dm_log', 1, false);
}

//Füge die meta box für den Wert hinzu
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
    $sel = get_post_meta(get_the_id(), "dm_worth", true);
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
//add_filter('the_content', 'dm_display_device_type');
function dm_display_worth( $content ) {
    if(get_post_type () != "dm_device") return $content;
    {
        if (user_can(wp_get_current_user(), 'show_worth')) {
            return $content . "<div class='worth'>" . get_post_meta(get_the_ID(), 'dm_worth', true) . " CHF</div>";
        }

    }
}

function dm_display_device_type( $content=null ) {
    $terms = get_the_terms( get_the_ID() , 'Geraete-Typen' );
    var_dump($terms);
    foreach ( $terms as $term ) {
        echo $term->name;
    }

}