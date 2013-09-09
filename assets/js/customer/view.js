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
	var productKnowMore = $(".productKnowMore").clone();
	productKnowMore.removeClass("hide");
	$(".productKnowMore").remove();
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

				var date = new $tzd.date();

				switch( event.action.kind ){

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
						contactNew.find(".mail_id").attr("href", base_url+"mail/"+event.action.mail_id );
						timeline.append( contactNew );
						break;

					case "product/share":
						var productShareNew = productShare.clone();
						productShareNew.find(".date").html( new $tzd.date(event.date).shortDateTime );
						productShareNew.find(".mail_id").attr("href", base_url+"mail/"+event.action.mail_id );
						timeline.append( productShareNew );
						break;

					case "product/knowMore":
						var productKnowMoreNew = productKnowMore.clone();
						productKnowMoreNew.find(".date").html( new $tzd.date(event.date).shortDateTime );
						productKnowMoreNew.find(".mail_id").attr("href", base_url+"mail/"+event.action.mail_id );
						timeline.append( productKnowMoreNew );
						break;
				}

			});

		}

	};

	$tzd.ajax.post(url, data, callback);

});