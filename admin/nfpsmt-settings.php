<?php
//if this file is called directly, die.
if(!defined('ABSPATH')) die('please, do not call this page directly');

//with this function we will create the NutsForPress menu page
if(!function_exists('nfpsmt_settings')) {
	
	function nfpsmt_settings() {	
		
		global $nfproot_plugins_settings;
		$nfpsmt_pro = null;
		
		if(
		
			!empty($nfproot_plugins_settings) 
			&& !empty($nfproot_plugins_settings['installed_plugins']['nfpsmt']['edition'])
			&& $nfproot_plugins_settings['installed_plugins']['nfpsmt']['edition'] === 'registered'
			
		) {
			
			$nfpsmt_pro = ' <span class="dashicons dashicons-saved"></span>';
			
		}
		
		add_submenu_page(
	
			'nfproot-settings',
			'SMTP Mail',
			'SMTP Mail'.$nfpsmt_pro,
			'manage_options',
			'nfpsmt-settings',
			'nfpsmt_settings_callback'
		
		);
		
		
	}
	
} else {
	
	error_log('NUTSFORPRESS ERROR: function "nfpsmt_base_options" already exists');
	
}
	
//with this function we will define the NutsForPress menu page content
if(!function_exists('nfpsmt_settings_callback')) {
	
	function nfpsmt_settings_callback() {
		
		?>
		
		<div class="wrap nfproot-settings-wrap">
			
			<h1>SMTP Mail settings</h1>
			
			<div class="nfproot-settings-main-container">
		
				<?php
				
				//include option content page
				require_once NFPSMT_BASE_PATH.'admin/nfpsmt-settings-content.php';
				
				//define contents as result of the function nfpsmt_settings_content
				$nfpsmt_settings_content = nfpsmt_settings_content();
				
				//invoke nfproot_options_structure functions included into /root/options/nfproot-options-structure.php
				nfproot_settings_structure($nfpsmt_settings_content);
				
				?>
			
			</div>
		
		</div>
		
		<?php
		
	}
	
} else {
	
	error_log('NUTSFORPRESS ERROR: function "nfpsmt_settings" already exists');
	
}