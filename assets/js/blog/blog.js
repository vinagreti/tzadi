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

  // Load the FACEBOOK SDK asynchronously - like
  (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=532888376778430";
      fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
      
  // Load the GOOGLE plusone asynchronously
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
  
});