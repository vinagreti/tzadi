$(document).ready(function(){

	var system = $(".system").clone();
	system.removeClass("hide");
	$("#system").remove();
	var customerAdd = $(".customerAdd").clone();
	customerAdd.removeClass("hide");
	$(".customerAdd").remove();
	var contact = $(".contact").clone();
	contact.removeClass("hide");
	$(".contact").remove();
	var productShare = $(".productShare").clone();
	productShare.removeClass("hide");
	$(".productShare").remove();
	var productShareByStaff = $(".productShareByStaff").clone();
	productShareByStaff.removeClass("hide");
	$(".productShareByStaff").remove();
	var budgetShare = $(".budgetShare").clone();
	budgetShare.removeClass("hide");
	$(".budgetShare").remove();
	var budgetShareByStaff = $(".budgetShareByStaff").clone();
	budgetShareByStaff.removeClass("hide");
	$(".productShareByStaff").remove();
	var productKnowMore = $(".productKnowMore").clone();
	productKnowMore.removeClass("hide");
	$(".productKnowMore").remove();
	var productKnowMoreByStaff = $(".productKnowMoreByStaff").clone();
	productKnowMoreByStaff.removeClass("hide");
	$(".productKnowMoreByStaff").remove();
	var timeline = $(".timeline");
	var budgetKnowMore = $(".budgetKnowMore").clone();
	budgetKnowMore.removeClass("hide");
	$(".budgetKnowMore").remove();
	var budgetKnowMoreByStaff = $(".budgetKnowMoreByStaff").clone();
	budgetKnowMoreByStaff.removeClass("hide");
	$(".budgetKnowMoreByStaff").remove();
	var timeline = $(".timeline");

	var url = base_url+'customer/getTimelineByID';
	var data = {
		tzadiToken : $('input[name=tzadiToken]').val()
		,customer_id : $('#customer_id').html()
	};
	var callback = function( e ){

		if( e.error ) $tzd.alert.error( e.error );

		if( e ){

			$.each( e, function( index, event ){

				switch( event.kind ){

					case "customer/add":
						var customerAddNew = customerAdd.clone();
						customerAddNew.find(".date").html( new $tzd.date(event.date).shortDateTime );
						timeline.append( customerAddNew );
						break;

					case "customer/getOrCreate":
						var systemNew = system.clone();
						systemNew.find(".date").html( new $tzd.date(event.date).shortDateTime );
						timeline.append( systemNew );
						break;

					case "contact":
						var contactNew = contact.clone();
						contactNew.find(".date").html( new $tzd.date(event.date).shortDateTime );
						contactNew.find(".mail_id").attr("href", base_url+"mail/"+event.mail_id );
						timeline.append( contactNew );
						break;

					case "product/share":

						var productShareNew;

						if( event.staff_id )
							productShareNew = productShareByStaff.clone();

						else
							productShareNew = productShare.clone();

						productShareNew.find(".date").html( new $tzd.date(event.date).shortDateTime );
						productShareNew.find(".mail_id").attr("href", base_url+"mail/"+event.mail_id );
						timeline.append( productShareNew );
						break;

					case "product/knowMore":

						var productKnowMoreNew;

						if( event.staff_id )
							productKnowMoreNew = productKnowMoreByStaff.clone();

						else
							productKnowMoreNew = productKnowMore.clone();

						productKnowMoreNew.find(".date").html( new $tzd.date(event.date).shortDateTime );
						productKnowMoreNew.find(".mail_id").attr("href", base_url+"mail/"+event.mail_id );
						timeline.append( productKnowMoreNew );
						break;

					case "product/shareBudget":

						var budgetShareNew;

						if( event.staff_id )
							budgetShareNew = budgetShareByStaff.clone();

						else
							budgetShareNew = budgetShare.clone();

						budgetShareNew.find(".date").html( new $tzd.date(event.date).shortDateTime );
						budgetShareNew.find(".mail_id").attr("href", base_url+"mail/"+event.mail_id );
						timeline.append( budgetShareNew );
						break;

					case "product/knowMoreBudget":

						var budgetKnowMoreNew;

						if( event.staff_id )
							budgetKnowMoreNew = budgetKnowMoreByStaff.clone();

						else
							budgetKnowMoreNew = budgetKnowMore.clone();

						budgetKnowMoreNew.find(".date").html( new $tzd.date(event.date).shortDateTime );
						budgetKnowMoreNew.find(".mail_id").attr("href", base_url+"mail/"+event.mail_id );
						timeline.append( budgetKnowMoreNew );
						break;
				}

			});

		}

	};

	$tzd.ajax.post(url, data, callback);

});