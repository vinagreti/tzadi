/*!
 * Tzadi Email Plugin v1.0
 * Extends TzadiJS Plugin v1.0
 * https://github.com/tzadiinc/tzadi-mmail
 *
 * Copyright 2013 Bruno da Silva Joao
 * Released under the MIT license
 */
TzadiJS.prototype.register = new function(){

  this.modal = false;

  this.setModal = function( modal ) {

    this.modal = modal;
    
  }

  this.shareProduct = new function() {

    this.eventsApplied = false;

    this.open = function( productID ) {

      var self = this;

        var url = base_url+'mail/shareProduct';

        var data = {

          tzadiToken : tzadiToken

          , productID : productID

        };

        var callback = function( modal ){

          $('#tzadiDialogs').html( modal );

          $('#tzadiDialogs').modal('show');

          if( ! self.eventsApplied ) {

            self.eventsApplied = true;

            $(".shareProduct").live("click", function(){

              self.send(productID);
              
            });

          }

        };

        $tzd.ajax.post(url, data, callback);

    };

    this.send = function( productID ){

      var name = $('#tzadiDialogs').find(".mailYourName").val();

      var message = $('#tzadiDialogs').find(".mailMessage").val();

      var addresses = $('#tzadiDialogs').find(".mailEmail").val();

      var url = base_url+'mail/shareProduct';
      
      var data = {

        tzadiToken : tzadiToken

        , name : name

        , message : message
      
        , productID : productID
      
        , addresses : addresses

      };
      
      var callback = function( e ){

        if(e) $tzd.alert.error( e );

        else var addresses = $('#tzadiDialogs').find(".closeModal").click();

      };
      
      $tzd.ajax.post(url, data, callback);

    };

  }

};