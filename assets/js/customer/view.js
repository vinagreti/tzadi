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

						case "replyReceived":
							var newReplyReceived = replyReceived.clone();
							newReplyReceived.find(".date").html( new $tzd.date(event.date).shortDateTime );
							newReplyReceived.find(".mail_id").attr("href", base_url+"mail/"+event.mail_id );
							newReplyReceived.find(".mail_referer_id").html( event.mail_referer_id );
							timeline.append( newReplyReceived );
							break;

						case "repliedMessage":
							var newrepliedMessage = repliedMessage.clone();
							newrepliedMessage.find(".date").html( new $tzd.date(event.date).shortDateTime );
							newrepliedMessage.find(".mail_id").attr("href", base_url+"mail/"+event.mail_id );
							newrepliedMessage.find(".mail_referer_id").html( event.mail_referer_id );
							timeline.append( newrepliedMessage );
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

						case "sentMessage":
							var newsentMessage = sentMessage.clone();
							newsentMessage.find(".date").html( new $tzd.date(event.date).shortDateTime );
							newsentMessage.find(".mail_id").attr("href", base_url+"mail/"+event.mail_id );
							timeline.append( newsentMessage );
							break;

						case "ownEvent":
							var ownEventNew = ownEvent.clone();
							ownEventNew.find(".date").html( new $tzd.date(event.date).shortDateTime );
							ownEventNew.find(".eventTitle").html( event.title );
							ownEventNew.find(".eventDetail").html( event.detail );
							timeline.append( ownEventNew );
							break;

						case "customerEvent":
							var customerEventNew = customerEvent.clone();
							customerEventNew.find(".date").html( new $tzd.date(event.date).shortDateTime );
							customerEventNew.find(".eventTitle").html( event.title );
							customerEventNew.find(".eventDetail").html( event.detail );
							timeline.append( customerEventNew );
							break;
					}

				});

			}

		};

		$tzd.ajax.post(url, data, callback);

	};

	refreshTimeline();

	var addEvent = new function(){

		this.messageModal = false;

		this.eventsApplied = false;

		this.open = function( mail ) {

			if( this.messageModal ) {

				this.showModal( mail );

			} else {

				var self = this;

				var url = base_url+'customer/addEvent';

				var data = {

					tzadiToken : tzadiToken

				};

				var callback = function( modal ){

					self.messageModal = modal;

					self.showModal( mail );

				};

				$tzd.ajax.post(url, data, callback);        
			}

		};

		this.showModal = function ( mail ){

			$('#tzadiDialogs').html( this.messageModal );

			$('#tzadiDialogs').modal('show');

			if( ! this.eventsApplied ) {

				this.eventsApplied = true;

				var self = this;

				$('#tzadiDialogs').find(".send").live("click", function(){

					self.send(mail);

				});

			}

		}

		this.send = function( mail ){

			var valid = true;

			valid = valid && $tzd.form.checkMask.range($('#tzadiDialogs').find("#eventTitle"), 1, 255, $("#ctm_fillTitle").html());

			valid = valid && $tzd.form.checkMask.range($('#tzadiDialogs').find("#eventDetail"), 1, 1024, $("#ctm_fillDetail").html());

			if( valid ){

				var url = base_url+'customer/addEvent';

				var data = {

					tzadiToken : tzadiToken

					, title : $('#tzadiDialogs').find("#eventTitle").val()

					, detail : $('#tzadiDialogs').find("#eventDetail").val()

					, mail : mail

					, kind : $('#tzadiDialogs').find("#eventKind:checked").val()

				};

				var callback = function( e ){

					if(e.error) $tzd.alert.error( e.error );

					if(e.success){

						$('#tzadiDialogs').find(".closeModal").click();

						$tzd.alert.success( e.success );

						$("#refreshTimeline").click();

					}

				};

				$tzd.ajax.post(url, data, callback);

			}

		};

	}

	$(".sendMessage").live("click", function() {
		$tzd.mail.write.open( $(this).attr("id") );
	});

	$(".addEvent").live("click", function() {
		addEvent.open( $(this).attr("id") );
	});

	$("#refreshTimeline").live("click", function() {
		refreshTimeline();
	});
});