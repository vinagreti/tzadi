$(document).ready(function(){
	$("#value").mask('000000000000000.00', {reverse: true});

	$("#exchange").live("click", function(){

	    var valid = true;

	    valid = valid && $tzd.form.checkMask.range($('#value'), 1, 18, $("#crc_pleaseFillKinAndValue").html());

	    if ( valid ) {

			$(".brand").find("a").html( $("#name").val() );

			var url = base_url+'currency/changeExchangeRate';

			var data = {

				tzadiToken : tzadiToken

				, kind : $("#kind").val()

				, value : $("#value").val()

			};

			var callback = function( res ) {

				if( res.error ) $tzd.alert.error( res.error );

				if( res.url ) window.location = res.url;

			}

			$tzd.ajax.post(url, data, callback);

		}

	});
});