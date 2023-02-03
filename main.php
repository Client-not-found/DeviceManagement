<?php
/*
 * Plugin Name:       DeviceManagement
 * Plugin URI:        https://business-design.ch
 * Description:       Dient zum Verwalten der internen IT-Geräten
 * Version:           1.0.0
 * Requires at least: 6.1
 * Requires PHP:      8.1
 * Author:            Nicolas Rhyner
 * Author URI:        https://www.business-design.ch/ueber-uns/team/
 */

require_once plugin_dir_path(__FILE__) . 'admin-menu.php';
require_once plugin_dir_path(__FILE__) . 'View/settingspage.php';
require_once plugin_dir_path(__FILE__) . 'device.php';
require_once plugin_dir_path(__FILE__) . 'taxonomy.php';

/*register_activation_hook(

);

register_deactivation_hook(

);*/