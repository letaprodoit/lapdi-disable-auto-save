<?php
    /*
    Plugin Name: 	LAPDI Disable Auto-Save
    Plugin URI: 	https://letaprodoit.com/apps/plugins/wordpress/disable-autosave-for-wordpress/
    Description:    Disable Auto-Save <strong>stops automatically saving duplicate copies of posts</strong> while editing. Powered by <strong><a href="http://wordpress.org/plugins/tsp-easy-dev/">LAPDI Easy Dev</a></strong>.
    Author: 		Let A Pro Do IT!
    Author URI: 	https://letaprodoit.com/
    Version: 		1.1.4
    Text Domain: 	tspdas
    Copyright: 		Copyright � 2021 Let A Pro Do IT!, LLC (www.letaprodoit.com). All rights reserved
    License: 		APACHE v2.0 (http://www.apache.org/licenses/LICENSE-2.0)
    */

    require_once(ABSPATH . 'wp-admin/includes/plugin.php' );

    define('TSPDAS_PLUGIN_FILE', 				__FILE__ );
    define('TSPDAS_PLUGIN_PATH',				plugin_dir_path( __FILE__ ) );
    define('TSPDAS_PLUGIN_URL', 				plugin_dir_url( __FILE__ ) );
    define('TSPDAS_PLUGIN_BASE_NAME', 			plugin_basename( __FILE__ ) );
    define('TSPDAS_PLUGIN_NAME', 				'tsp-disable-auto-save');
    define('TSPDAS_PLUGIN_TITLE', 				'LAPDI Disable Auto-Save');
    define('TSPDAS_PLUGIN_REQ_VERSION', 		"3.5.1");

    global $easy_dev_settings;

    if (file_exists( WP_PLUGIN_DIR . "/tsp-easy-dev/tsp-easy-dev.php" ))
    {
        include_once WP_PLUGIN_DIR . "/tsp-easy-dev/tsp-easy-dev.php";
    }//end else
    else
        return;

    require( TSPDAS_PLUGIN_PATH . 'TSP_Easy_Dev.config.php');
    require( TSPDAS_PLUGIN_PATH . 'TSP_Easy_Dev.extend.php');
    //--------------------------------------------------------
    // initialize the plugin
    //--------------------------------------------------------
    $diable_autosave 								= new TSP_Easy_Dev( TSPDAS_PLUGIN_FILE, TSPDAS_PLUGIN_REQ_VERSION );

    // Display the parent page but not the options page for this plugin
    $diable_autosave->set_options_handler( new TSP_Easy_Dev_Options_Auto_Save( $easy_dev_settings, true, false ) );

    $diable_autosave->add_link ( 'FAQ', 			preg_replace("/\%PLUGIN\%/", TSPDAS_PLUGIN_NAME, TSP_WORDPRESS_FAQ_URL ));
    $diable_autosave->add_link ( 'Rate Me', 		preg_replace("/\%PLUGIN\%/", TSPDAS_PLUGIN_NAME, TSP_WORDPRESS_RATE_URL ) );
    $diable_autosave->add_link ( 'Support', 		preg_replace("/\%PLUGIN\%/", 'wordpress-das', TSP_LAB_BUG_URL ));

    // Remove revisions actions
    remove_action('pre_post_update', 'wp_save_post_revision');

    $diable_autosave->remove_registered_scripts( array( 'autosave' ) );

    $diable_autosave->set_plugin_icon( TSP_EASY_DEV_ASSETS_IMAGES_URL . 'icon_16.png' );

    $diable_autosave->run( TSPDAS_PLUGIN_FILE );