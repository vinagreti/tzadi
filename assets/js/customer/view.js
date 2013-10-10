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

							if( event.staff_id )
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

							if( event.staff_id )
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

						case "ownEvent":
							eventHTML = ownEvent.clone();
							eventHTML.find(".mail_subject").html( event.mail_subject );
							eventHTML.find(".date").html( new $tzd.date(event.date).shortDateTime );
							eventHTML.find(".eventTitle").html( event.title );
							eventHTML.find(".eventDetail").html( event.detail );
							break;

						case "customerEvent":
							eventHTML = customerEvent.clone();
							eventHTML.find(".mail_subject").html( event.mail_subject );
							eventHTML.find(".date").html( new $tzd.date(event.date).shortDateTime );
							eventHTML.find(".eventTitle").html( event.title );
							eventHTML.find(".eventDetail").html( event.detail );
							break;
					};

					if( event.creator_id == "customer" ){

						eventHTML.find(".creatorImg").attr( "src", $(".customerImg").attr("src") );

						eventHTML.find(".creatorName").html( $("h3").html() );

						eventHTML.find(".creatorLink").attr( "href", base_url + "customer/" + $('#customer_id').html() );

					}


					else {

						eventHTML.find(".creatorImg").attr( "src", event.creator_img );

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

			$('#tzadiDialogs').find('#deadLine').datetimepicker({

				language: 'pt-BR'

			}).data('datetimepicker').setLocalDate(new Date());

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

					, date : $('#tzadiDialogs').find("#deadLineDate").val()

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