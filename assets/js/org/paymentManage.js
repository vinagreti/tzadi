var getFormData = function(){

	var paymentMethods = {};

	if( ! ($("#installmentsWithNoInterests").val() >= 1) ){
		$("#installmentsWithNoInterests").val(1);
	}
	if( ! ($("#installmentsWithInterests").val() >= 1) ){
		$("#installmentsWithInterests").val(1);
	}
	if( ! ($("#interests").val() >= 0) ){
		$("#interests").val(1);
	}

	paymentMethods["boleto"] = $("#boleto").is(':checked') ? 1 : 0;
	paymentMethods["creditcard"] = $("#creditcard").is(':checked') ? 1 : 0;
	paymentMethods["giftcard"] = $("#giftcard").is(':checked') ? 1 : 0;
	paymentMethods["debitcard"] = $("#debitcard").is(':checked') ? 1 : 0;
	paymentMethods["deposit"] = $("#deposit").is(':checked') ? 1 : 0;
	paymentMethods["cash"] = $("#cash").is(':checked') ? 1 : 0;
	paymentMethods["pagseguro"] = $("#pagseguro").is(':checked') ? 1 : 0;
	paymentMethods["paypal"] = $("#paypal").is(':checked') ? 1 : 0;
	paymentMethods["installmentsBoleto"] = $("#installmentsBoleto").is(':checked') ? 1 : 0;
	paymentMethods["booklet"] = $("#booklet").is(':checked') ? 1 : 0;
	paymentMethods["installmentsCreditcard"] = $("#installmentsCreditcard").is(':checked') ? 1 : 0;
	paymentMethods["ccAmericanExpress"] = $("#ccAmericanExpress").is(':checked') ? 1 : 0;
	paymentMethods["ccAura"] = $("#ccAura").is(':checked') ? 1 : 0;
	paymentMethods["ccBNDES"] = $("#ccBNDES").is(':checked') ? 1 : 0;
	paymentMethods["ccDinersClub"] = $("#ccDinersClub").is(':checked') ? 1 : 0;
	paymentMethods["ccElo"] = $("#ccElo").is(':checked') ? 1 : 0;
	paymentMethods["ccHipercard"] = $("#ccHipercard").is(':checked') ? 1 : 0;
	paymentMethods["ccMastercard"] = $("#ccMastercard").is(':checked') ? 1 : 0;
	paymentMethods["ccSorocred"] = $("#ccSorocred").is(':checked') ? 1 : 0;
	paymentMethods["ccVisa"] = $("#ccVisa").is(':checked') ? 1 : 0;
	paymentMethods["installmentsWithNoInterests"] = $("#installmentsWithNoInterests").val();
	paymentMethods["installmentsWithInterests"] = $("#installmentsWithInterests").val();
	paymentMethods["interests"] = $("#interests").val();

	return paymentMethods;

}

var put = function(paymentMethods){

	console.log(paymentMethods);

	var url = base_url+'org/payment';

	var data = {
		tzadiToken : tzadiToken,
		paymentMethods : JSON.stringify(paymentMethods)
	};

	var callback = function( res ){

		$tzd.alert[res.status]( res.message );

	};

	$tzd.ajax.post(url, data, callback);

}

$(".put").live("click", function(){
	var paymentMethods = getFormData();
	put(paymentMethods);
});