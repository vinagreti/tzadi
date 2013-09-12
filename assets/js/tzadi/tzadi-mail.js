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

    this.open = function( mail ) {

      if( this.messageModal ) {

        this.showModal( mail );

      } else {

        var self = this;

        var url = base_url+'mail/write';

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

      valid = valid && $tzd.form.checkMask.range($('#tzadiDialogs').find("#mailSubject"), 1, 255, $("#mail_pleaseFillSubject").html());

      valid = valid && $tzd.form.checkMask.range($('#tzadiDialogs').find("#mailMessage"), 1, 1024, $("#mail_pleaseFillMessage").html());

      if( valid ){

        var url = base_url+'mail/write';
        
        var data = {

          tzadiToken : tzadiToken

          , subject : $('#tzadiDialogs').find("#mailSubject").val()

          , message : $('#tzadiDialogs').find("#mailMessage").val()
        
          , mail : mail

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

  // share product by e-mail
  this.reply = new function() {

    this.messageModal = false;

    this.eventsApplied = false;

    this.open = function( mail_id ) {

      if( this.messageModal ) {

        this.showModal( mail_id );

      } else {

        var self = this;

        var url = base_url+'mail/reply';

        var data = {

          tzadiToken : tzadiToken

          , mail_id : mail_id

        };

        var callback = function( modal ){

          self.messageModal = modal;

          self.showModal( mail_id );

        };

        $tzd.ajax.post(url, data, callback);        
      }

    };

    this.showModal = function ( mail_id ){

      $('#tzadiDialogs').html( this.messageModal );

      $('#tzadiDialogs').modal('show');

      if( ! this.eventsApplied ) {

        this.eventsApplied = true;

        var self = this;

        $('#tzadiDialogs').find(".send").live("click", function(){

          self.send(mail_id);
          
        });

      }

    }

    this.send = function( mail_id ){

      var valid = true;

      valid = valid && $tzd.form.checkMask.range($('#tzadiDialogs').find("#mailMessage"), 1, 1024, $("#mail_pleaseFillMessage").html());

      if( valid ){

        var url = base_url+'mail/reply';
        
        var data = {

          tzadiToken : tzadiToken

          , message : $('#tzadiDialogs').find("#mailMessage").val()
        
          , mail_id : mail_id

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