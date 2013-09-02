$(document).ready(function(){

	var checkSamePassword = function( str1, str2, message ){

		if( str1.val() != str2.val() ){

			$tzd.alert.error(message);

			return false;

		} else {

			return true;

		}

	}

	$("#changePassword").live("click", function(){

		if( ! $(this).hasClass("disabled") ){

	    var valid = true;
	   
	    valid = valid && $tzd.form.checkMask.range($('#passwdOld'), 1, 255, $("#usr_fill_passwdOld").html());

	    valid = valid && $tzd.form.checkMask.range($('#passwdNew'), 1, 255, $("#usr_fill_passwdNew").html());

	    valid = valid && $tzd.form.checkMask.range($('#passwdNewConf'), 1, 255, $("#usr_fill_passwdNewConf").html());

	    valid = valid && checkSamePassword($('#passwdNewConf'), $('#passwdNew'), $("#usr_fill_passwdNewConfDoNotConf").html());

	    if ( valid ) {

	      var url = base_url+'user/changePassword';

	      var data = {

	        tzadiToken : tzadiToken

	        , passwdOld : $('#passwdOld').val()

	        , passwdNew : $('#passwdNew').val()

	        , passwdNewConf : $('#passwdNewConf').val()

	      };

	      var callback = function( res ) {

	        if( res.error ) $tzd.alert.error( res.error );

	        if( res.success ){

	        	$("#changePassword").addClass("disabled");

	        	$tzd.alert.success( res.success );

	        }
	        
	      }

	      $tzd.ajax.post(url, data, callback);

	    }

		}

	})

});