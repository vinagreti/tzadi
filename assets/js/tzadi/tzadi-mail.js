/*!
 * Tzadi Product Plugin v1.0
 * Extends TzadiJS Plugin v1.0
 * https://github.com/tzadiinc/tzadi-product
 *
 * Copyright 2013 Bruno da Silva Joao
 * Released under the MIT license
 */
TzadiJS.prototype.mail = new function(){

  // share product by e-mail
  this.write = new function() {

    this.messageModal = false;

    this.eventsApplied = false;

    this.open = function( email ) {

      if( this.messageModal ) {

        this.showModal( email );

      } else {

        var self = this;

        var url = base_url+'mail/write';

        var data = {

          tzadiToken : tzadiToken

        };

        var callback = function( modal ){

          self.messageModal = modal;

          self.showModal( email );

        };

        $tzd.ajax.post(url, data, callback);        
      }

    };

    this.showModal = function ( email ){

      $('#tzadiDialogs').html( this.messageModal );

      $('#tzadiDialogs').modal('show');

      if( ! this.eventsApplied ) {

        this.eventsApplied = true;

        var self = this;

        $('#tzadiDialogs').find(".send").live("click", function(){

          self.send(email);
          
        });

      }

    }

    this.send = function( email ){

      var valid = true;

      valid = valid && $tzd.form.checkMask.range($('#tzadiDialogs').find("#mailSubject"), 1, 255, $("#mail_pleaseFillSubject").html());

      valid = valid && $tzd.form.checkMask.range($('#tzadiDialogs').find("#mailMessage"), 1, 1024, $("#mail_pleaseFillMessage").html());

      if( valid ){

        var url = base_url+'mail/write';
        
        var data = {

          tzadiToken : tzadiToken

          , subject : $('#tzadiDialogs').find("#mailSubject").val()

          , message : $('#tzadiDialogs').find("#mailMessage").val()
        
          , email : email

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