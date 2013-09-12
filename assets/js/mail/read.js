$(document).ready(function(){

	$(".reply").live("click", function() {
		$tzd.mail.reply.open( $(this).attr("id") );
	});

});