<?php
 //if this file is called directly, abort.
if(!defined('ABSPATH')) die('please, do not call this page directly');

if(!function_exists('nfpsmt_smtp_mail')){

	function nfpsmt_smtp_mail($nfpsmt_phpmailer) {
		
		//get saved data
		global $nfproot_current_language_settings;

		//if SMTP is enabled
		if(

			!empty($nfproot_current_language_settings['nfpsmt']) 
			&& $nfproot_current_language_settings['nfpsmt']['nfproot_smtp_settings'] === '1'
		
		) {
			
			if(!is_object($nfpsmt_phpmailer)){
				
				$nfpsmt_phpmailer = (object)$nfpsmt_phpmailer;
			
			}		
			
			$nfpsmt_smtp_encryption = $nfproot_current_language_settings['nfpsmt']['nfproot_smtp_encryption'];
			$nfpsmt_smtp_port = $nfproot_current_language_settings['nfpsmt']['nfproot_smtp_port'];
			$nfpsmt_smtp_server = $nfproot_current_language_settings['nfpsmt']['nfproot_smtp_server'];
			
			$nfpsmt_smtp_from_address = $nfproot_current_language_settings['nfpsmt']['nfproot_from_address'];
			$nfpsmt_smtp_from_name = $nfproot_current_language_settings['nfpsmt']['nfproot_from_name'];

			$nfpsmt_smtp_authentication = $nfproot_current_language_settings['nfpsmt']['nfproot_smtp_authentication'];
			$nfpsmt_smtp_authentication_address = $nfproot_current_language_settings['nfpsmt']['nfproot_authentication_address'];
			$nfpsmt_smtp_authentication_password = $nfproot_current_language_settings['nfpsmt']['nfproot_authentication_password'];
		
			//setup SMTP
			$nfpsmt_phpmailer->isSMTP();
			$nfpsmt_phpmailer->Mailer = 'smtp';
			$nfpsmt_phpmailer->Host = $nfpsmt_smtp_server;
			$nfpsmt_phpmailer->Port = $nfpsmt_smtp_port;
			
			if($nfpsmt_smtp_authentication === '1') {

				$nfpsmt_phpmailer->SMTPAuth = true;
				$nfpsmt_phpmailer->Username = $nfpsmt_smtp_authentication_address;
				$nfpsmt_phpmailer->Password = $nfpsmt_smtp_authentication_password;
				
			}
						
			//conditional elements
			if($nfpsmt_smtp_encryption !== 'none') {

				$nfpsmt_phpmailer->SMTPSecure = strtolower($nfpsmt_smtp_encryption);
				
			} else {
				
				$nfpsmt_phpmailer->SMTPAutoTLS = false;

			}
			
			if(!empty($nfpsmt_smtp_from_address)) {

				$nfpsmt_phpmailer->From = $nfpsmt_smtp_from_address;
				
			}
			
			if(!empty($nfpsmt_smtp_from_name)) {

				$nfpsmt_phpmailer->FromName = $nfpsmt_smtp_from_name;
				
			}
			
			global $nfpsmt_is_test;
			
			if($nfpsmt_is_test === true){
			
				$nfpsmt_phpmailer->SMTPDebug = true;
				
				$nfpsmt_phpmailer->Debugoutput = function($str, $level){
					
					global $nfpsmt_phpmailer_debug;
					
					$nfpsmt_phpmailer_debug .= '-|-';
					$nfpsmt_phpmailer_debug .= $str;
					
				};
				
			} 
			
		}
						
	}
		
} else {
	
	error_log('NUTSFORPRESS ERROR: function "nfpsmt_smtp_mail" already exists');

}