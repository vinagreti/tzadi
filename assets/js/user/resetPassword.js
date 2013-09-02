$(document).ready(function(){


	$("#resetPassword").live("click", function(){

		if( ! $(this).hasClass("disabled") ){

	    var valid = true;
	   
	    valid = valid && $tzd.form.checkMask.email($('#email'), $("#usr_validate_mail").html());

	    if ( valid ) {

	      var url = base_url+'user/resetPassword';

	      var data = {

	        tzadiToken : tzadiToken
	        , email : $('#email').val()

	      };

	      var callback = function( res ) {

	        if( res.error ) $tzd.alert.error( res.error );

	        if( res.success ){

	        	$("#resetPassword").addClass("disabled");

	        	$tzd.alert.success( res.success );

	        }
	        
	      }

	      $tzd.ajax.post(url, data, callback);

	    }

		}

	})

});