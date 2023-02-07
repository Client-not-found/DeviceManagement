<?php
/*
 * Plugin Name:       DeviceManagement
 * Plugin URI:        https://business-design.ch
 * Description:       Dient zum verwalten der internen IT-Geräten
 * Version:           1.1.0
 * Requires at least: 6.1
 * Requires PHP:      8.1
 * Author:            Nicolas Rhyner
 * Author URI:        https://www.business-design.ch/ueber-uns/team/
 */

require_once plugin_dir_path(__FILE__) . 'Controller/device.php';
require_once plugin_dir_path(__FILE__) . 'Controller/devicetype.php';
require_once plugin_dir_path(__FILE__) . 'Controller/location.php';

function dm_activate()
{
    add_role('it-administrator', 'IT-Administrator', array(get_role( 'administrator' )->capabilities,));

    $role = get_role('it-administrator');
    $role->add_cap( 'show_worth' );
}

function dm_deactivate()
{
    remove_role('it-administrator');
}

register_activation_hook( __FILE__, 'dm_activate' );
register_deactivation_hook( __FILE__, 'dm_deactivate' );