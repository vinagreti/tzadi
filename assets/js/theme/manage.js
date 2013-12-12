$(document).ready(function(){

	$(".changeTheme").select2();

	$(".changeTheme").live("change propertychange", function(){

		var url = base_url+'theme/changeTheme';

		var theme = $(this).select2('data').id;

		var data = {

			tzadiToken : tzadiToken,

			theme : theme

		};

		var callback = function( res ){

			location.reload();

		};

		$tzd.ajax.post(url, data, callback);

	});

});