<?php
/*
 * Plugin Name:       DeviceManagement
 * Plugin URI:        https://business-design.ch
 * Description:       Dient zum verwalten der internen IT-Geräten
 * Version:           1.1.4
 * Requires at least: 6.1
 * Requires PHP:      8.1
 * Author:            Nicolas Rhyner
 * Author URI:        https://www.business-design.ch/ueber-uns/team/
 */

require_once plugin_dir_path(__FILE__) . 'Controller/device.php';
require_once plugin_dir_path(__FILE__) . 'Controller/deviceLocation.php';
require_once plugin_dir_path(__FILE__) . 'Controller/deviceHistory.php';
require_once plugin_dir_path(__FILE__) . 'Controller/deviceType.php';
require_once plugin_dir_path(__FILE__) . 'Controller/deviceWorth.php';
require_once plugin_dir_path(__FILE__) . 'Model/deviceHistory.php';

/**
 * Wenn das Plugin aktiviert wird, wird diese funktion ausgeführt.
 *
 * In dieser Funktion werden die Rollen it-administrator und it-mitarbeiter hinzugefügt.
 * Zusätzlich wird die Berechtigung "show_worth" und "show_devicehistory" hinzugefügt.
 *
 * @since 1.1.4
 *
 * @param type $var Description.
 * @param type $var Optional. Description. Default.
 * @return void.
 */
function dm_activate()
{
    add_role('it-administrator', 'IT-Administrator', array(get_role( 'administrator' )->capabilities,));
    add_role('it-mitarbeiter', 'IT-Mitarbeiter', array(get_role( 'editor' )->capabilities,));

    $role = get_role('it-administrator');
    $role->add_cap( 'show_history');
    $role->add_cap( 'show_worth' );

    $rolemitarbeiter = get_role('it-mitarbeiter');
    $rolemitarbeiter->add_cap( 'show_history');
}

function dm_deactivate()
{
    remove_role('it-administrator');
    remove_role('it-mitarbeiter');
}

register_activation_hook( __FILE__, 'dm_activate' );
register_deactivation_hook( __FILE__, 'dm_deactivate' );