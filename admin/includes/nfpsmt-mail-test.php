<?php
 //if this file is called directly, abort.
if(!defined('ABSPATH')) die('please, do not call this page directly');

//ajax function
if(!function_exists('nfpsmt_mail_test')){
	
	function nfpsmt_mail_test() {
		
		//check role
		if(!current_user_can('update_core')) {return;}

		if(!empty($_POST['nfpsmt_mail_test_nonce'])) {

			//check nonce (if fails, dies)
			check_ajax_referer('nfpsmt-mail-test-nonce', 'nfpsmt_mail_test_nonce');					
			
			//get mail_test_address
			$nfpsmt_mail_test_address = $_POST['nfpsmt_mail_test_address'];
			
			$nfpsmt_mail_test_result = array();
			
			global $nfpsmt_is_test;
			$nfpsmt_is_test = true;
			
			if(!is_email($nfpsmt_mail_test_address)){
				
				$nfpsmt_mail_test_result['result'] = false;
				$nfpsmt_mail_test_result['debug'] = '### NutsForPress SMTP Mail debug start ###';
				$nfpsmt_mail_test_result['debug'] .= '-|-';
				$nfpsmt_mail_test_result['debug'] .= 'the entered email address is not valid';
				$nfpsmt_mail_test_result['debug'] .= '-|-';
				$nfpsmt_mail_test_result['debug'] .= '### NutsForPress SMTP Mail debug end ###';
				
				echo json_encode($nfpsmt_mail_test_result);
			
			} else {
				
				$nfpsmt_mail_test_address = sanitize_email($nfpsmt_mail_test_address);
				$nfpsmt_mail_test_subject = __('Message from','nutsforpress-smtp-mail').' '.get_bloginfo('name');
				
				$nfpsmt_mail_test_message  = __('Hi','nutsforpress-smtp-mail').'!'."\n";
				$nfpsmt_mail_test_message .= __('This is a plain text message from','nutsforpress-smtp-mail').' '.get_bloginfo('name').'.'."\n\n";
				$nfpsmt_mail_test_message .= __('This email message has been sent in order to check if the entered settings prevent email from being marked as spam and redirected to junk folder','nutsforpress-smtp-mail').'. '."\n\n";
				$nfpsmt_mail_test_message .= __('If you have found this message is in the incoming folder, half of the job is done','nutsforpress-smtp-mail').'!'."\n\n";
				$nfpsmt_mail_test_message .= __('As a further step you should send a test email to','nutsforpress-smtp-mail').' https://www.mail-tester.com/ '.__('and see the score you get','nutsforpress-smtp-mail').': ';
				$nfpsmt_mail_test_message .= __('if you did a good job, you can easily achieve full marks (providing that SPF and DMARK are correctly set)','nutsforpress-smtp-mail').'.'."\n\n";
				$nfpsmt_mail_test_message .= __('Enjoy','nutsforpress-smtp-mail').'!';
				
				$nfpsmt_mail_test = wp_mail(
					
					$nfpsmt_mail_test_address, 
					$nfpsmt_mail_test_subject, 
					$nfpsmt_mail_test_message
					
				);
						
				if($nfpsmt_mail_test === true){
					
					$nfpsmt_mail_test_result['result'] = true;
					$nfpsmt_mail_test_result['debug'] = '### NutsForPress SMTP Mail debug start ###';
					$nfpsmt_mail_test_result['debug'] .= '-|-';
					$nfpsmt_mail_test_result['debug'] .= 'mail test completed successfully';
					$nfpsmt_mail_test_result['debug'] .= '-|-';
					$nfpsmt_mail_test_result['debug'] .= '### NutsForPress SMTP Mail debug end ###';
					
				}
						
				else if($nfpsmt_mail_test === false || $nfpsmt_mail_test !== true){

					$nfpsmt_mail_test_result['result'] = false;
					
					global $phpmailer;
					
					if(empty($phpmailer->ErrorInfo)) {
						
						$nfpsmt_mail_test_result['debug'] = '### NutsForPress SMTP Mail debug start ###';
						$nfpsmt_mail_test_result['debug'] .= '-|-';
						$nfpsmt_mail_test_result['debug'] .= 'a generic error occurred';
						$nfpsmt_mail_test_result['debug'] .= '-|-';
						$nfpsmt_mail_test_result['debug'] .= '### NutsForPress SMTP Mail debug end ###';
												
					} else {
						
						$nfpsmt_mail_test_result['debug'] = '### NutsForPress SMTP Mail debug start ###';

						global $nfpsmt_phpmailer_debug;
						if(!empty($nfpsmt_phpmailer_debug)){
							
							$nfpsmt_mail_test_result['debug'] .= $nfpsmt_phpmailer_debug;						
						
						} else {
							
							$nfpsmt_mail_test_result['debug'] .= '-|-';
							$nfpsmt_mail_test_result['debug'] .= $phpmailer->ErrorInfo;
														
							
						}
						
						$nfpsmt_mail_test_result['debug'] .= '-|-';	
						$nfpsmt_mail_test_result['debug'] .= '### NutsForPress SMTP Mail debug end ###';
						
					}	

				} 
								
				echo json_encode($nfpsmt_mail_test_result);

			}
			
		} 
	
		wp_die();	
		
	}
	
} else {
	
	error_log('NUTSFORPRESS ERROR: function "nfpsmt_mail_test" already exists');
}