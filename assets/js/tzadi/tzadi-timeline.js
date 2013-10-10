/*!
 * Tzadi Timeline Plugin v1.0
 * Extends TzadiJS Plugin v1.0
 * https://github.com/tzadiinc/tzadi-product
 *
 * Copyright 2013 Bruno da Silva Joao
 * Released under the MIT license
 */
TzadiJS.prototype.timeline = new function(){

  // share product by e-_id
  this.addEvent = new function(){

		this.messageModal = false;

		this.eventsApplied = false;

		this.open = function( _id ) {

			if( this.messageModal ) {

				this.showModal( _id );

			} else {

				var self = this;

				var url = base_url+'customer/addEvent';

				var data = {

					tzadiToken : tzadiToken

				};

				var callback = function( modal ){

					self.messageModal = modal;

					self.showModal( _id );

				};

				$tzd.ajax.post(url, data, callback);        
			}

		};

		this.showModal = function ( _id ){

			$('#tzadiDialogs').html( this.messageModal );

			$('#tzadiDialogs').modal('show');

			if( ! this.eventsApplied ) {

				this.eventsApplied = true;

				var self = this;

				$('#tzadiDialogs').find(".send").live("click", function(){

					self.send(_id);

				});

				$("#deadLineDate").live("focus", function(){
					$(this).parent().find(".add-on").click();
				});

			}

			$('#tzadiDialogs').find('#deadLine').datetimepicker({

				language: 'pt-BR'

			}).data('datetimepicker').setLocalDate(new Date());

		}

		this.send = function( _id ){

			var valid = true;

			valid = valid && $tzd.form.checkMask.range($('#tzadiDialogs').find("#eventTitle"), 1, 255, $("#ctm_fillTitle").html());

			valid = valid && $tzd.form.checkMask.range($('#tzadiDialogs').find("#eventDetail"), 1, 1024, $("#ctm_fillDetail").html());

			if( valid ){

				var url = base_url+'customer/addEvent';

				var data = {

					tzadiToken : tzadiToken

					, title : $('#tzadiDialogs').find("#eventTitle").val()

					, detail : $('#tzadiDialogs').find("#eventDetail").val()

					, _id : _id

					, resp_id : $('#tzadiDialogs').find("#resp_id").val()

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

}