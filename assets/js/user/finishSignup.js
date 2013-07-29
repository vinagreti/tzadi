$(document).ready(function(){

	$(".accountKind").live("change keyup propertychange", function(){

		if( $(this).val() == "agency" ) $("#setSubdomain").show();

		else $("#setSubdomain").hide();

	});

	$("#subdomain").live("change keyup propertychange", function(){

		if($(this).val() == "")
			$("#address").html("");

		else
			$("#address").html($(this).val()+".tzadi.com");

	});

	$("#finishSignup").live("click", function(){

    var valid = true;

    if( $(".accountKind:checked").val() == "agency" ) {

	    valid = valid && $tzd.form.checkMask.range($('#name'), 1, 65535, $(".usr_pleaseFillEverithing").html());

	    valid = valid && $tzd.form.checkMask.range($('#subdomain'), 1, 65535, $(".usr_pleaseFillEverithing").html());
    
    }
   
    if ( valid ) {

      var url = base_url+'user/finishSignup';

      var data = {

        tzadiToken : tzadiToken
        , name : $("#name").val()
        , subdomain : $("#subdomain").val()
        , kind : $(".accountKind:checked").val()

      };

      var callback = function( error ) {

        if( error ) $tzd.alert.error( error );

        else window.location = base_url;
        
      }

      $tzd.ajax.post(url, data, callback);

    }

	})

});