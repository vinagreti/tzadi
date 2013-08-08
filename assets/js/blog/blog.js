$(document).ready(function(){

  $(".dropPost").live("click", function() {

  	if( $tzd.confirm($(".blg_wantToDelete").html() + "?") ) {

	    var url = base_url+"blog/drop/";

	    var data = {

	      tzadiToken : tzadiToken

	      , url : $(this).attr("id")

	    };

	    var callback = function( res ) {

	      if( res.error ) $tzd.alert.error( res.error );

	      if( res.success ) $tzd.alert.success( res.success );

	      if( res.url ) window.location = res.url;
	      
	    }

	    $tzd.ajax.post(url, data, callback);

	  	}

  });

});