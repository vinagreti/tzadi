$(document).ready(function(){
	$('#myTab a').click(function (e) {
	  e.preventDefault();
	  $(this).tab('show');
	});

	$tzd.geocomplete("#campusAddress", function( result ){
		$("<p></p>").html(result.city + " - " + result.state + " - " + result.country + " ").append($("<a></a>").addClass("dropLocality").html($("<i></i>").addClass("icon-remove"))).insertAfter("#campusAddress");
		$("#campusAddress").html("");
	});

  $("#campusAddress").attr("placeholder", "");

  $(".dropLocality").live("click", function(){
  	$(this).parent().remove();
  });

});