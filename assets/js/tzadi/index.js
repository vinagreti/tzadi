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

	$( "#goToSchool" ).live("click", function() {
	  $(document).scrollTop( $("#school").offset().top );
	});
});