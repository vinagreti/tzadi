/*!
* Tzadi Confirm Plugin v1.0
* Extends TzadiJS Plugin v1.0
* https://github.com/tzadiinc/tzadi-confirm
*
* Copyright 2013 Bruno da Silva Joao
* Released under the MIT license
*/
TzadiJS.prototype.feedback = new function( ){

	var self = this;

	this.open = function( ) {

		var self = this;

		var url = base_url+'feedback/open';

		var data = {

			tzadiToken : tzadiToken

		};

		var callback = function( modal ){

			self.modal = modal;

			$('#tzadiDialogs').html( modal );

			$('#tzadiDialogs').find(".selectCurrency").select2();

			$('#tzadiDialogs').modal('show');

		};

		$tzd.ajax.post(url, data, callback);

	};

	this.send = function( subject, email, message ) {

		var self = this;

		var url = base_url+'feedback/send';

		var data = {

			tzadiToken : tzadiToken

			, email : email

			, subject : subject

			, message : message

		};

		var callback = function( modal ){

			$('#tzadiDialogs').modal('close');

		};

		$tzd.ajax.post(url, data, callback);

	}

	$(".tzdFeedbackOpen").live("click", function(){

		self.open();

	});

	$(".tzdFeedbackSend").live("click", function(){

    var valid = true;

    valid = valid && $tzd.form.checkMask.range($('#feedbackSubject'), 1, 255, $(".fdb_pleaseFillName").html());

    valid = valid && $tzd.form.checkMask.email($('#feedbackMail'), $(".fdb_pleaseFillEmail").html());

    valid = valid && $tzd.form.checkMask.range($('#feedbackMessage'), 1, 255, $(".fdb_pleaseFillMessage").html());

    if ( valid ) {

			var subject = $("#feedbackSubject").val();

			var email = $("#feedbackMail").val();

			var message = $("#feedbackMessage").val();

			self.send( subject, email, message );

		}

	});

}