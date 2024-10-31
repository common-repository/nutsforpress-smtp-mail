<?php
 //if this file is called directly, abort.
if(!defined('ABSPATH')) die('please, do not call this page directly');

//ACTIVATE

//plugin activate function
if(!function_exists('nfpsmt_plugin_activate')){

	function nfpsmt_plugin_activate() {
				
		//get NutsForPress setting
		global $nfproot_plugins_settings;
		
		//define plugin installaton type
		$nfproot_plugins_settings['nfpsmt']['prefix'] = 'nfpsmt';
		$nfproot_plugins_settings['nfpsmt']['slug'] = 'nfpsmt-settings';
		$nfproot_plugins_settings['nfpsmt']['edition'] = 'repository';
		$nfproot_plugins_settings['nfpsmt']['name'] = 'SMTP Mail';
		
		//update NutsForPress setting
		update_option('_nfproot_plugins_settings', $nfproot_plugins_settings, false);
	
	}
		
}  else {
	
	error_log('NUTSFORPRESS ERROR: function "nfpsmt_plugin_activate" already exists');
	
}