jQuery(document).ready(function() {
	
	//bind rebuild meta button
	jQuery('#nfpsmt_mail_test_send').click(function(){
		
		jQuery('.nfpsmt-success-mail-test').hide();
		jQuery('.nfpsmt-error-mail-test').hide();
		jQuery('.nfpsmt-preparing-mail-test').show();
		jQuery('#nfpsmt_mail_test_send').prop('disabled', true);
		
		var nfpsmtMailTestAddress = jQuery('#nfpsmt_mail_test_address').val();
	
		jQuery.ajax({
			type: 'POST',
			dataType: 'json',
			url: nfpsmt_mail_test_object.nfpsmt_mail_test_url,
			data: {
				'action': 'nfpsmt_mail_test',
				'nfpsmt_mail_test_nonce': nfpsmt_mail_test_object.nfpsmt_mail_test_nonce,
				'nfpsmt_mail_test_address': nfpsmtMailTestAddress
			},
			
			//deal with success
			success:function(data){
				
				if(data['result'] === true) {
						
					//mail test completed successfuly
					jQuery('.nfpsmt-preparing-mail-test').hide();
					jQuery('.nfpsmt-success-mail-test').show();
					jQuery('#nfpsmt_mail_test_send').prop('disabled', false);
					var nfpsmt_debug = (JSON.stringify(data['debug']));
					var nfpsmt_debug_splitted = nfpsmt_debug.split('-|-')

					jQuery.each( nfpsmt_debug_splitted, function( index, value ) {
						console.log(value);
					});	
					
					return;
					
				}
				
				else if(data['result'] === false) {

					//an error occurred during mail test
					jQuery('.nfpsmt-preparing-mail-test').hide();
					jQuery('.nfpsmt-error-mail-test').show();
					jQuery('#nfpsmt_mail_test_send').prop('disabled', false);
					var nfpsmt_debug = (JSON.stringify(data['debug']));
					var nfpsmt_debug_splitted = nfpsmt_debug.split('-|-')

					jQuery.each( nfpsmt_debug_splitted, function( index, value ) {
						console.log(value);
					});					
					
					return;					
					
				}
						
			},
			
			error: function(errorThrown){
								
				//an error occurred during mail test
				jQuery('.nfpsmt-preparing-mail-test').hide();
				jQuery('.nfpsmt-error-mail-test').show();
				jQuery('#nfpsmt_mail_test_send').prop('disabled', false);
				console.log("### NutsForPress SMTP Mail debug start ###");
				console.log("a not-debuggable error occurred");
				console.log("### NutsForPress SMTP Mail debug end ###");
				return;
				
			}
			
		});		
		
		
	})
              
});