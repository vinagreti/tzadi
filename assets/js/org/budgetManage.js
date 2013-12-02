getFormData = function(){

	var budgetConf = {};

	if( ! ($("#timelife").val() >= 1) ){
		$("#timelife").val(1);
	}

	budgetConf["timelife"] = $("#timelife").val();

	return budgetConf;

}

var put = function(budgetConf){

	var url = base_url+'org/budget';

	var data = {
		tzadiToken : tzadiToken,
		budgetConf : JSON.stringify(budgetConf)
	};

	var callback = function( res ){

		$tzd.alert[res.status]( res.message );

	};

	$tzd.ajax.put(url, data, callback);

}

$(".put").live("click", function(){
	var budgetConf = getFormData();
	put(budgetConf);
});