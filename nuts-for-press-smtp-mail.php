<?php
/*
Plugin Name: 	NutsForPress SMTP Mail
Plugin URI:		https://www.nutsforpress.com/
Description: 	NutsForPress SMTP Mail is a simple and lightweight plugin that prevents emails sent by your website to be marked as spam from the recipient servers.
Version:     	1.5
Author:			Christian Gatti
Author URI:		https://profiles.wordpress.org/christian-gatti/
License:		GPL-2.0+
License URI:	http://www.gnu.org/licenses/gpl-2.0.txt
Text Domain:	nutsforpress-smtp-mail
*/

//if this file is called directly, die.
if(!defined('ABSPATH')) die('please, do not call this page directly');


//DEFINITIONS

if(!defined('NFPROOT_BASE_RELATIVE')) {define('NFPROOT_BASE_RELATIVE', dirname(plugin_basename( __FILE__ )).'/root');}
define('NFPSMT_BASE_PATH', plugin_dir_path( __FILE__ ));
define('NFPSMT_BASE_URL', plugins_url().'/'.plugin_basename( __DIR__ ).'/');
define('NFPSMT_BASE_RELATIVE', dirname( plugin_basename( __FILE__ )));
define('NFPSMT_DEBUG', false);


//NUTSFORPRESS ROOT CONTENT
	
//add NutsForPress parent menu page
require_once NFPSMT_BASE_PATH.'root/nfproot-settings.php';
add_action('admin_menu', 'nfproot_settings');

//add NutsForPress save settings function and make it available through ajax
require_once NFPSMT_BASE_PATH.'root/nfproot-save-settings.php';
add_action('wp_ajax_nfproot_save_settings', 'nfproot_save_settings');

//add NutsForPress saved settings and make them available through the global varibales $nfproot_current_language_settings and $nfproot_options_name
require_once NFPSMT_BASE_PATH.'root/nfproot-saved-settings.php';
add_action('plugins_loaded', 'nfproot_saved_settings');

//register NutsForPress styles and scripts
require_once NFPSMT_BASE_PATH.'root/nfproot-styles-and-scripts.php';
add_action('admin_enqueue_scripts', 'nfproot_styles_and_scripts');
	
//add NutsForPress settings structure that contains nfproot_options_structure function invoked by plugin settings
require_once NFPSMT_BASE_PATH.'root/nfproot-settings-structure.php';


//PLUGIN INCLUDES

//add activate actions
require_once NFPSMT_BASE_PATH.'includes/nfpsmt-plugin-activate.php';
register_activation_hook(__FILE__, 'nfpsmt_plugin_activate');

//add deactivate actions
require_once NFPSMT_BASE_PATH.'includes/nfpsmt-plugin-deactivate.php';
register_deactivation_hook(__FILE__, 'nfpsmt_plugin_deactivate');

//add uninstall actions
require_once NFPSMT_BASE_PATH.'includes/nfpsmt-plugin-uninstall.php';
register_uninstall_hook(__FILE__, 'nfpsmt_plugin_uninstall');

//styles and scripts
require_once NFPSMT_BASE_PATH.'includes/nfpsmt-styles-and-scripts.php';
add_action('admin_enqueue_scripts', 'nfpsmt_styles_and_scripts');


//PLUGIN SETTINGS

//add plugin settings
require_once NFPSMT_BASE_PATH.'admin/nfpsmt-settings.php';
add_action('admin_menu', 'nfpsmt_settings');


//ADMIN INCLUDES CONDITIONALLY

//load size actions
require_once NFPSMT_BASE_PATH.'admin/includes/nfpsmt-smtp-mail.php';
add_action('phpmailer_init', 'nfpsmt_smtp_mail');

//mail test ajax functions
require_once NFPSMT_BASE_PATH.'admin/includes/nfpsmt-mail-test.php';
add_action('wp_ajax_nfpsmt_mail_test', 'nfpsmt_mail_test');