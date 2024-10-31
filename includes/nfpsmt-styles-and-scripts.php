<?php
 //if this file is called directly, abort.
if(!defined('ABSPATH')) die('please, do not call this page directly');

//STYLES AND SCRIPTS

//admin styles
if(!function_exists('nfpsmt_styles_and_scripts')){
	
	function nfpsmt_styles_and_scripts() {

		//mail test script and ajax		
		wp_enqueue_script('nfpsmt-mail-test', NFPSMT_BASE_URL.'admin/includes/js/nfpsmt-mail-test.js', array('jquery'), '', true );
		wp_localize_script('nfpsmt-mail-test', 'nfpsmt_mail_test_object', array(
		
			'nfpsmt_mail_test_url' => admin_url('admin-ajax.php'),
			'nfpsmt_mail_test_nonce' => wp_create_nonce('nfpsmt-mail-test-nonce')
			
		));				
		
	}
			
} else {
	
	error_log('NUTSFORPRESS ERROR: function "nfpsmt_styles_and_scripts" already exists');
	
}