$(document).ready(function(){
	$( ".beInTouch" ).live("click", function() {
	  $tzd.beInTouch.open();
	});

	$( "#goToAgency" ).live("click", function() {
	  $(document).scrollTop( $("#agency").offset().top );
	});

	$( "#goToStudent" ).live("click", function() {
	  $(document).scrollTop( $("#student").offset().top );
	});

	$( "#goToInstitution" ).live("click", function() {
	  $(document).scrollTop( $("#institution").offset().top );
	});
});