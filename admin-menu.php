<?php
//add top-level administrative menu
function dm_add_toplevel_menu() {
    add_menu_page(
        'DeviceManagement',
        'DeviceManagement',
        'manage_options',
        'devicemanagement',
        'dm_settings_page',
        'dashicons-admin-generic',
        null
    );

}
add_action('admin_menu', 'dm_add_toplevel_menu');
