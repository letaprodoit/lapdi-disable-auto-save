<?php									
/**
* Every plugin that uses Easy Dev must define the DS variable that sets the path deliminter
*
* @var string
*/
if (!defined('DS')) {
    if (strpos(php_uname('s') , 'Win') !== false) define('DS', '\\');
    else define('DS', '/');
}//endif

$easy_dev_settings = get_plugin_data( TSPDAS_PLUGIN_FILE, false, false );

$easy_dev_settings['name'] 				= TSPDAS_PLUGIN_NAME;
$easy_dev_settings['title'] 			= TSPDAS_PLUGIN_TITLE;
$easy_dev_settings['file']	 			= TSPDAS_PLUGIN_FILE;
$easy_dev_settings['base_name']	 		= TSPDAS_PLUGIN_BASE_NAME;
$easy_dev_settings['plugin_options']	= array(
	'category_fields'			=> array(),
	'post_fields'				=> array(),
	'widget_fields'				=> array(),
	'settings_fields'			=> array(),
	'shortcode_fields'			=> array(),
);
?>