<?php
//if this file is called directly, die.
if(!defined('ABSPATH')) die('please, do not call this page directly');
	
//with this function we will define the NutsForPress menu page content
if(!function_exists('nfpsmt_settings_content')) {
	
	function nfpsmt_settings_content() {
	
		$nfpsmt_settings_content = array(
		
			array(
			
				'container-title'	=> __('Send email through SMTP','nutsforpress-smtp-mail'),
				
				'container-id'		=> 'nfpsmt_smtp_settings_container',
				'container-class' 	=> 'nfpsmt-smtp-settings-container',
				'input-name'		=> 'nfproot_smtp_settings',
				'add-to-settings'	=> 'global',
				'data-save'			=> 'nfpsmt',
				'input-id'			=> 'nfpsmt_smtp_settings',
				'input-class'		=> 'nfpsmt-smtp-settings',
				'input-description'	=> __('If switched on, all the emails sent from this website by WordPress PHPMailer are routed through the SMTP server defined here','nutsforpress-smtp-mail'),
				'arrow-before'		=> true,
				'after-input'		=> '',
				'input-type' 		=> 'switch',
				'input-value'		=> '1',
				
				'childs'			=> array(

					array(
						
						'container-title'	=> __('Server encryption','nutsforpress-smtp-mail'),
					
						'container-id'		=> 'nfpsmt_smtp_encryption_container',
						'container-class' 	=> 'nfpsmt-smtp-encryption-container',					
						'input-name' 		=> 'nfproot_smtp_encryption',
						'add-to-settings'	=> 'global',
						'data-save'			=> 'nfpsmt',
						'input-id' 			=> 'nfpsmt_smtp_encryption',
						'input-class'		=> 'nfpsmt-smtp-encryption',
						'input-description' => __('Select the encryption protocol used by your SMTP server','nutsforpress-smtp-mail'),
						'arrow-before'		=> false,
						'after-input'		=> '',
						'input-type' 		=> 'radio',
						'input-value'		=> array(

							array(
						
								'radio-value' 		=> 'none',
								'radio-text' 		=> __('None','nutsforpress-smtp-mail'),
								'radio-checked' 	=> 'checked'
								
							),
							
							array(
						
								'radio-value' 		=> 'SSL',
								'radio-text' 		=> 'SSL',
								'radio-checked' 	=> ''
								
							),
							
							array(
						
								'radio-value' 		=> 'TLS',
								'radio-text' 		=> 'TLS',
								'radio-checked' 	=> ''
								
							),
							
						),
						
					),
					
					array(
					
						'container-title'	=> __('SMTP port','nutsforpress-smtp-mail'),
					
						'container-id'		=> 'nfpsmt_smtp_port_container',
						'container-class' 	=> 'nfpsmt-smtp-port-container',					
						'input-name' 		=> 'nfproot_smtp_port',
						'add-to-settings'	=> 'global',
						'data-save'			=> 'nfpsmt',
						'input-id' 			=> 'nfpsmt_smtp_port',
						'input-class'		=> 'nfpsmt-smtp-port',
						'input-description' => __('Select the port used by your SMTP server','nutsforpress-smtp-mail'),
						'arrow-before'		=> false,
						'after-input'		=> '',
						'input-type' 		=> 'dropdown',
						'input-value'		=> array(

							array(
						
								'option-value' 		=> 25,
								'option-text' 		=> '25',
								'option-selected' 	=> 'selected'
								
							),
							
							array(
						
								'option-value' 		=> 465,
								'option-text' 		=> '465',
								'option-selected' 	=> ''
								
							),
							
							array(
						
								'option-value' 		=> 587,
								'option-text' 		=> '587',
								'option-selected' 	=> ''
								
							),

							array(
						
								'option-value' 		=> 2525,
								'option-text' 		=> '2525',
								'option-selected' 	=> ''
								
							),
							
							array(
						
								'option-value' 		=> 2526,
								'option-text' 		=> '2526',
								'option-selected' 	=> ''
								
							),
							
						),
						
					),
					
					array(
					
						'container-title'	=> __('Outgoing email server address','nutsforpress-smtp-mail'),
						
						'container-id'		=> 'nfpsmt_smtp_server_container',
						'container-class' 	=> 'nfpsmt-smtp-server-container',					
						'input-name' 		=> 'nfproot_smtp_server',
						'add-to-settings'	=> 'global',
						'data-save'			=> 'nfpsmt',
						'input-id' 			=> 'nfpsmt_smtp_server',
						'input-class'		=> 'nfpsmt-smtp-server',
						'input-description' => __('Enter the address of your SMTP server','nutsforpress-smtp-mail'),
						'arrow-before'		=> false,
						'after-input'		=> '',
						'input-type' 		=> 'text',
						'input-value'		=> 'localhost'
						
					),
					
					array(
					
						'container-title'	=> __('Sender address','nutsforpress-smtp-mail'),
						
						'container-id'		=> 'nfpsmt_from_address_container',
						'container-class' 	=> 'nfpsmt-from-address-container',					
						'input-name' 		=> 'nfproot_from_address',
						'add-to-settings'	=> 'global',
						'data-save'			=> 'nfpsmt',
						'input-id' 			=> 'nfpsmt_from_address',
						'input-class'		=> 'nfpsmt-from-address',
						'input-description' => __('Enter the email address that you want to use for outgoing email','nutsforpress-smtp-mail'),
						'arrow-before'		=> false,
						'after-input'		=> '',
						'input-type' 		=> 'email',
						'input-value'		=> 'noreply@'.str_replace('www.','',(wp_parse_url(home_url())['host']))
						
					),
					
					array(
					
						'container-title'	=> __('Sender name','nutsforpress-smtp-mail'),
						
						'container-id'		=> 'nfpsmt_from_name_container',
						'container-class' 	=> 'nfpsmt-from-name-container',					
						'input-name' 		=> 'nfproot_from_name',
						'add-to-settings'	=> 'global',
						'data-save'			=> 'nfpsmt',
						'input-id' 			=> 'nfpsmt_from_name',
						'input-class'		=> 'nfpsmt-from-name',
						'input-description' => __('Enter the name that you want to use for outgoing email','nutsforpress-smtp-mail'),
						'arrow-before'		=> false,
						'after-input'		=> '',
						'input-type' 		=> 'text',
						'input-value'		=> get_bloginfo('name')
						
					),

					array(
					
						'container-title'	=> __('SMTP authentication','nutsforpress-smtp-mail'),
						
						'container-id'		=> 'nfpsmt_smtp_authentication_container',
						'container-class' 	=> 'nfpsmt-smtp-authentication-container',
						'input-name'		=> 'nfproot_smtp_authentication',
						'add-to-settings'	=> 'global',
						'data-save'			=> 'nfpsmt',
						'input-id'			=> 'nfpsmt_smtp_authentication',
						'input-class'		=> 'nfpsmt-smtp-authentication',
						'input-description'	=> __('Switch on if your SMTP server requires authentication in order to send email messages','nutsforpress-smtp-mail'),
						'arrow-before'		=> true,
						'after-input'		=> '',
						'input-type' 		=> 'switch',
						'input-value'		=> '1',
						
						'childs'			=> array(
						
							array(
							
								'container-title'	=> __('Authentication address','nutsforpress-smtp-mail'),
								
								'container-id'		=> 'nfpsmt_authentication_address_container',
								'container-class' 	=> 'nfpsmt-authentication-address-container',					
								'input-name' 		=> 'nfproot_authentication_address',
								'add-to-settings'	=> 'global',
								'data-save'			=> 'nfpsmt',
								'input-id' 			=> 'nfpsmt_authentication_address',
								'input-class'		=> 'nfpsmt-authentication-address',
								'input-description' => __('Enter the email address that you want to use for authentication','nutsforpress-smtp-mail'),
								'arrow-before'		=> false,
								'after-input'		=> '',
								'input-type' 		=> 'text',
								'input-value'		=> ''
								
							),		

							array(
							
								'container-title'	=> __('Password','nutsforpress-smtp-mail'),
								
								'container-id'		=> 'nfpsmt_authentication_password_container',
								'container-class' 	=> 'nfpsmt-authentication-password-container',					
								'input-name' 		=> 'nfproot_authentication_password',
								'add-to-settings'	=> 'global',
								'data-save'			=> 'nfpsmt',
								'input-id' 			=> 'nfpsmt_authentication_password',
								'input-class'		=> 'nfpsmt-authentication-password',
								'input-description' => __('Enter the password for the authentication address above','nutsforpress-smtp-mail'),
								'arrow-before'		=> false,
								'after-input'		=> '',
								'input-type' 		=> 'password',
								'input-value'		=> ''
								
							),							
						
						),
						
					),	
				
				),
				
			),
			
			array(

				'container-title'	=> __('Send a test email message','nutsforpress-smtp-mail'),
				
				'container-id'		=> 'nfpsmt_mail_test_container',
				'container-class' 	=> 'nfpsmt-mail-test-container',
				'input-name'		=> 'nfproot_mail_test',
				'add-to-settings'	=> 'global',
				'data-save'			=> 'nfpsmt',
				'input-id'			=> 'nfpsmt_mail_test',
				'input-class'		=> 'nfpsmt-mail-test',
				'input-description'	=> '',
				'arrow-before'		=> true,
				'after-input'		=> array(
				
					array(
					
						'type' 		=> 'paragraph',
						'id' 		=> 'nfpsmt_mail_test_description',
						'class' 	=> 'nfproot-after-input nfpsmt-mail-test-description',
						'hidden' 	=> false,
						'content' 	=> __('Click on the arrow to display the email test functions','nutsforpress-smtp-mail'),
						'value'		=> ''
					
					),
				
				),
				'input-type' 		=> 'arrow',
				'input-value'		=> '1',
			
				'childs'			=> array(

					array(
					
						'container-title'	=> __('Recipient address for the test message','nutsforpress-smtp-mail'),
					
						'container-id'		=> 'nfpsmt_mail_test_address_container',
						'container-class' 	=> 'nfpsmt-mail-test-address-container',					
						'input-name' 		=> 'nfproot_mail_test_address',
						'add-to-settings'	=> 'global',
						'data-save'			=> 'nfpsmt',
						'input-id' 			=> 'nfpsmt_mail_test_address',
						'input-class'		=> 'nfpsmt-mail-test-address',
						'input-description' => __('Enter a recipient address for your email test message','nutsforpress-smtp-mail'),
						'arrow-before'		=> false,
						'after-input'		=> '',
						'input-type' 		=> 'text',
						'input-value'		=> get_option('admin_email')
						
					),
					
					array(
					
						'container-title'	=> '',
						
						'container-id'		=> 'nfpsmt_mail_test_send_container',
						'container-class' 	=> 'nfpsmt-mail-test-send-container',					
						'input-name' 		=> 'nfproot_mail_test_send',
						'add-to-settings'	=> 'global',
						'data-save'			=> 'nfpsmt',
						'input-id' 			=> 'nfpsmt_mail_test_send',
						'input-class'		=> 'nfpsmt-mail-test-send',
						'input-description' => '',
						'arrow-before'		=> false,
						'after-input'		=> array(
						
							array(
							
								'type' 		=> 'paragraph',
								'id' 		=> 'nfpsmt_preparing_thumbnails_rebuild',
								'class' 	=> 'nfproot-after-input nfproot-after-input-bold nfpsmt-preparing-mail-test',
								'hidden' 	=> true,
								'content' 	=> __('Sending email, please wait','nutsforpress-smtp-mail'),
								'value'		=> ''
							
							),
													
							array(
							
								'type' 		=> 'paragraph',
								'id' 		=> 'nfpsmt_ending_thumbnails_rebuild',
								'class' 	=> 'nfproot-after-input nfproot-after-input-bold nfpsmt-success-mail-test',
								'hidden' 	=> true,
								'content' 	=> __('Message sent successfuly','nutsforpress-smtp-mail'),
								'value'		=> ''
							
							),

							array(
							
								'type' 		=> 'paragraph',
								'id' 		=> 'nfpsmt_ending_thumbnails_rebuild',
								'class' 	=> 'nfproot-after-input nfproot-after-input-bold nfpsmt-error-mail-test',
								'hidden' 	=> true,
								'content' 	=> __('An error occurred, please check your settings and retry','nutsforpress-smtp-mail'),
								'value'		=> ''
							
							),
						
						),
						'input-type' 		=> 'button',
						'input-value'		=> __('Send email','nutsforpress-smtp-mail')
						
					),
				
				),
				
			),
				
		);
						
		return $nfpsmt_settings_content;
		
	}
	
} else {
	
	error_log('NUTSFORPRESS ERROR: function "nfpsmt_settings_content" already exists');
	
}