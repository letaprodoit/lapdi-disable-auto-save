<?php
/*
Plugin Name: 	TSP Disable Auto-Save
Plugin URI: 	http://www.thesoftwarepeople.com/software/plugins/wordpress/disable-autosave-for-wordpress.html
Description: 	Plugin to prevent WordPress from automatically saving duplicate copies of posts while editing.
Author: 		The Software People
Author URI: 	http://www.thesoftwarepeople.com/
Version: 		1.0.1
Copyright: 		Copyright © 2013 The Software People, LLC (www.thesoftwarepeople.com). All rights reserved
License: 		APACHE v2.0 (http://www.apache.org/licenses/LICENSE-2.0)
*/

define( 'TSPDAS_REQUIRED_WP_VERSION', '3.5.1' );
define( 'TSPDAS_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

require_once(ABSPATH . 'wp-admin/includes/plugin.php' );

// Get the plugin path
if (!defined('WP_CONTENT_DIR')) define('WP_CONTENT_DIR', ABSPATH . 'wp-content');
if (!defined('DIRECTORY_SEPARATOR')) {
    if (strpos(php_uname('s') , 'Win') !== false) define('DIRECTORY_SEPARATOR', '\\');
    else define('DIRECTORY_SEPARATOR', '/');
}

// Set the abs plugin path
define('PLUGIN_ABS_PATH', ABSPATH . PLUGINDIR );
$plugin_abs_path = PLUGIN_ABS_PATH . DIRECTORY_SEPARATOR . "tsp-disable-auto-save";
define('TSPDAS_ABS_PATH', $plugin_abs_path);
$plugin_url = WP_CONTENT_URL . '/plugins/' . plugin_basename(dirname(__FILE__)) . '/';
define('TSPDAS_URL_PATH', $plugin_url);

// Set the file path
$file_path    = $plugin_abs_path . DIRECTORY_SEPARATOR . basename(__FILE__);

// Set the absolute path
$asolute_path = dirname(__FILE__) . DIRECTORY_SEPARATOR;
define('TSPDAS_ABSPATH', $asolute_path);


include_once(TSPDAS_ABS_PATH . '/includes/settings.inc.php');


register_activation_hook( __FILE__, 'fn_tspdas_install' );
register_uninstall_hook( __FILE__, 'fn_tspdas_uninstall' );
//--------------------------------------------------------
// install plugin
//--------------------------------------------------------
function fn_tspdas_install()
{
}
//--------------------------------------------------------
// uninstall plugin
//--------------------------------------------------------
function fn_tspdas_uninstall()
{
}
//--------------------------------------------------------
function fn_tspdas() 
{
	wp_deregister_script('autosave');
}

add_action( 'wp_print_scripts', 'fn_tspdas' );

?>