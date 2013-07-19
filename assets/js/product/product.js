/*!
 * Tzadi Product Plugin v1.0
 * Extends TzadiJS Plugin v1.0
 * https://github.com/tzadiinc/tzadi-product
 *
 * Copyright 2013 Bruno da Silva Joao
 * Released under the MIT license
 */
TzadiJS.prototype.product = new function(){

  this.setModal = function( modal ) {

    this.modal = modal;
    
  }

  this.like = function( _id ){

    var url = base_url+'product/like';

    var data = { tzadiToken : tzadiToken, _id : _id };

    var callback = function( likes ){ $(".likes").html(likes); };

    $tzd.ajax.post(url, data, callback);

  };

  this.share = new function() {

    this.modal = false;

    this.eventsApplied = false;

    this.open = function( productID ) {

      if( this.modal ) {

        this.showModal( productID );

      } else {

        var self = this;

        var url = base_url+'product/share';

        var data = {

          tzadiToken : tzadiToken

          , productID : productID

        };

        var callback = function( modal ){

          self.modal = modal;

          self.showModal( productID );

        };

        $tzd.ajax.post(url, data, callback);        
      }

    };

    this.showModal = function ( productID ){

      $('#tzadiDialogs').html( this.modal );

      $('#tzadiDialogs').modal('show');

      if( ! this.eventsApplied ) {

        this.eventsApplied = true;

        var self = this;

        $(".shareProduct").live("click", function(){

          self.send(productID);
          
        });

      }

    }
    this.send = function( productID ){

      var name = $('#tzadiDialogs').find(".mailYourName").val();

      var message = $('#tzadiDialogs').find(".mailMessage").val();

      var addresses = $('#tzadiDialogs').find(".mailEmail").val();

      var url = base_url+'product/share';
      
      var data = {

        tzadiToken : tzadiToken

        , name : name

        , message : message
      
        , productID : productID
      
        , addresses : addresses

      };
      
      var callback = function( e ){

        if(e) $tzd.alert.error( e );

        else $('#tzadiDialogs').find(".closeModal").click();

      };
      
      $tzd.ajax.post(url, data, callback);

    };

  }

}