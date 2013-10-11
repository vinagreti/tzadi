$(document).ready(function(){

	var created = $(".created").clone();
	created.removeClass("hide");
	$("#created").remove();
	var autoCreated = $(".autoCreated").clone();
	autoCreated.removeClass("hide");
	$("#autoCreated").remove();
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
	var timeline = $(".timeline");
	var budgetKnowMore = $(".budgetKnowMore").clone();
	budgetKnowMore.removeClass("hide");
	$(".budgetKnowMore").remove();
	var replyReceived = $(".replyReceived").clone();
	replyReceived.removeClass("hide");
	$(".replyReceived").remove();
	var repliedMessage = $(".repliedMessage").clone();
	repliedMessage.removeClass("hide");
	$(".repliedMessage").remove();
	var sentMessage = $(".sentMessage").clone();
	sentMessage.removeClass("hide");
	$(".sentMessage").remove();
	var ownEvent = $(".ownEvent").clone();
	ownEvent.removeClass("hide");
	$(".ownEvent").remove();
	var customerEvent = $(".customerEvent").clone();
	customerEvent.removeClass("hide");
	$(".customerEvent").remove();
	var timeline = $(".timeline");

	var refreshTimeline = function(){

		timeline.empty();

		var url = base_url+'customer/getTimelineByID';
		var data = {
			tzadiToken : $('input[name=tzadiToken]').val()
			,customer_id : $('#customer_id').html()
		};
		var callback = function( e ){

			var eventHTML;

			if( e.error ) $tzd.alert.error( e.error );

			if( e ){

				$.each( e, function( index, event ){

					switch( event.kind ){

						case "customer/add":
							eventHTML = customerAdd.clone();
							eventHTML.find(".date").html( new $tzd.date(event.date).shortDateTime );
							break;

						case "customer/created":
							eventHTML = created.clone();
							eventHTML.find(".date").html( new $tzd.date(event.date).shortDateTime );
							break;

						case "customer/autoCreated":
							eventHTML = autoCreated.clone();
							eventHTML.find(".date").html( new $tzd.date(event.date).shortDateTime );
							break;

						case "contact":
							eventHTML = contact.clone();
							eventHTML.find(".mail_subject").html( event.mail_subject );
							eventHTML.find(".date").html( new $tzd.date(event.date).shortDateTime );
							eventHTML.find(".mail_id").attr("href", base_url+"mail/"+event.mail_id );
							break;

						case "replyReceived":
							eventHTML = replyReceived.clone();
							eventHTML.find(".mail_subject").html( event.mail_subject );
							eventHTML.find(".date").html( new $tzd.date(event.date).shortDateTime );
							eventHTML.find(".mail_id").attr("href", base_url+"mail/"+event.mail_id );
							break;

						case "repliedMessage":
							eventHTML = repliedMessage.clone();
							eventHTML.find(".mail_subject").html( event.mail_subject );
							eventHTML.find(".date").html( new $tzd.date(event.date).shortDateTime );
							eventHTML.find(".mail_id").attr("href", base_url+"mail/"+event.mail_id );
							break;
							
						case "product/share":

							if( event.collaborator_id )
								eventHTML = productShareByStaff.clone();

							else
								eventHTML = productShare.clone();

							eventHTML.find(".mail_subject").html( event.mail_subject );
							eventHTML.find(".date").html( new $tzd.date(event.date).shortDateTime );
							eventHTML.find(".mail_id").attr("href", base_url+"mail/"+event.mail_id );
							break;

						case "product/knowMore":

							eventHTML = productKnowMore.clone();
							eventHTML.find(".mail_subject").html( event.mail_subject );
							eventHTML.find(".date").html( new $tzd.date(event.date).shortDateTime );
							eventHTML.find(".mail_id").attr("href", base_url+"mail/"+event.mail_id );
							break;

						case "product/shareBudget":

							if( event.collaborator_id )
								eventHTML = budgetShareByStaff.clone();

							else
								eventHTML = budgetShare.clone();

							eventHTML.find(".mail_subject").html( event.mail_subject );
							eventHTML.find(".date").html( new $tzd.date(event.date).shortDateTime );
							eventHTML.find(".mail_id").attr("href", base_url+"mail/"+event.mail_id );
							break;

						case "product/knowMoreBudget":

							eventHTML = budgetKnowMore.clone();
							eventHTML.find(".mail_subject").html( event.mail_subject );
							eventHTML.find(".date").html( new $tzd.date(event.date).shortDateTime );
							eventHTML.find(".mail_id").attr("href", base_url+"mail/"+event.mail_id );
							break;

						case "sentMessage":
							eventHTML = sentMessage.clone();
							eventHTML.find(".mail_subject").html( event.mail_subject );
							eventHTML.find(".date").html( new $tzd.date(event.date).shortDateTime );
							eventHTML.find(".mail_id").attr("href", base_url+"mail/"+event.mail_id );
							break;

						case "eventCreated":

							if( event.resp_id == "customer" )
								eventHTML = customerEvent.clone();

							else
								eventHTML = ownEvent.clone();

							eventHTML.find(".mail_subject").html( event.mail_subject );
							eventHTML.find(".date").html( new $tzd.date(event.date).shortDateTime );
							eventHTML.find(".eventTitle").html( event.title );
							eventHTML.find(".eventDetail").html( event.detail );
							break;
					};

					if( event.resp_id == "customer" ){

						eventHTML.find(".respImg").attr( "src", $(".customerImg").attr("src") );

						eventHTML.find(".respName").html( $("h3").html() );

						eventHTML.find(".respLink").attr( "href", base_url + "customer/" + $('#customer_id').html() );

					} else {

						eventHTML.find(".respImg").attr( "src", event.resp_img );

						eventHTML.find(".respName").html( event.resp_name );

						eventHTML.find(".respLink").attr( "href", base_url + "collaborator/" + event.resp_id );

					}

					if( event.creator_id == "customer" ){

						eventHTML.find(".creatorName").html( $("h3").html() );

						eventHTML.find(".creatorLink").attr( "href", base_url + "customer/" + $('#customer_id').html() );

					} else {

						eventHTML.find(".creatorName").html( event.creator_name );

						eventHTML.find(".creatorLink").attr( "href", base_url + "collaborator/" + event.creator_id );

					}

					timeline.append( eventHTML );

				});

			}

		};

		$tzd.ajax.post(url, data, callback);

	};

	refreshTimeline();

	$(".sendMessage").live("click", function() {
		$tzd.mail.write.open( $(this).attr("id") );
	});

	$(".addEvent").live("click", function() {
		$tzd.timeline.addEvent.open( $(this).attr("id") );
	});

	$("#refreshTimeline").live("click", function() {
		refreshTimeline();
	});
});