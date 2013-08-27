$(document).ready(function(){
	$('#myTab a').click(function (e) {
	  e.preventDefault();
	  $(this).tab('show');
	});

	$tzd.geocomplete("#interestPlaces", function( result ){
		$("<p></p>").html(result.city + " - " + result.state + " - " + result.country + " ").append($("<a></a>").addClass("dropLocality").html($("<i></i>").addClass("icon-remove"))).insertAfter("#interestPlaces");
		$("#interestPlaces").html("");
	});

  $("#interestPlaces").attr("placeholder", "");

  $(".dropLocality").live("click", function(){
  	$(this).parent().remove();
  });


	$(".interests").live("change changeproperty", function(){

		var type = $(this).attr("type");
		var value;

		if(type == "checkbox")
			value = $(this).attr("checked");

		else
			value = $(this).val();

    var url = base_url+'user/interests';

    var data = {

      tzadiToken : tzadiToken

    };

    data[$(this).attr('id')] = value;

    var callback = function( res ) {

      if( res.error ) $tzd.alert.error( res.error );

      if( res.url ) window.location = res.url;

      else $tzd.alert.success( "salvo" );

    }

    $tzd.ajax.post(url, data, callback);
	});

});