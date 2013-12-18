/*!
 * Tzadi Product Plugin v1.0
 * Extends TzadiJS Plugin v1.0
 * https://github.com/tzadiinc/tzadi-product
 *
 * Copyright 2013 Bruno da Silva Joao
 * Released under the MIT license
 */
TzadiJS.prototype.product = new function(){

  this.like = function( _id ){

    var url = base_url+'product/like';

    var data = { tzadiToken : tzadiToken, _id : _id };

    var callback = function( likes ){ $(".likes").html(likes); };

    $tzd.ajax.post(url, data, callback);

  };

  // share product by e-mail
  this.share = new function() {

    this.shareModal = false;

    this.eventsApplied = false;

    this.open = function( product_id ) {

      if( this.shareModal ) {

        this.showModal( product_id );

      } else {

        var self = this;

        var url = base_url+'product/share';

        var data = {

          tzadiToken : tzadiToken

          , product_id : product_id

        };

        var callback = function( modal ){

          self.shareModal = modal;

          self.showModal( product_id );

        };

        $tzd.ajax.post(url, data, callback);        
      }

    };

    this.showModal = function ( product_id ){

      $('#tzadiDialogs').html( this.shareModal );

      $('#tzadiDialogs').modal('show');

      if( ! this.eventsApplied ) {

        this.eventsApplied = true;

        var self = this;

        $(".shareProduct").live("click", function(){

          self.send(product_id);
          
        });

      }

    }
    this.send = function( product_id ){

      var valid = true;

      valid = valid && $tzd.form.checkMask.range($('#tzadiDialogs').find(".mailYourName"), 1, 255, $("#pdt_fillName").html());

      valid = valid && $tzd.form.checkMask.range($('#tzadiDialogs').find(".mailEmail"), 1, 512, $("#pdt_fillAtLeastOneEmail").html());

      if( valid ){

        var name = $('#tzadiDialogs').find(".mailYourName").val();

        var message = $('#tzadiDialogs').find(".mailMessage").val();

        var addresses = $('#tzadiDialogs').find(".mailEmail").val();

        var url = base_url+'product/share';
        
        var data = {

          tzadiToken : tzadiToken

          , name : name

          , message : message
        
          , product_id : product_id
        
          , addresses : addresses

        };
        
        var callback = function( e ){

          if(e.error) $tzd.alert.error( e.error );

          if(e.success){

            $('#tzadiDialogs').find(".closeModal").click();

            $tzd.alert.success( e.success );

          }

        };
        
        $tzd.ajax.post(url, data, callback);

      }

    };

  }

  // ask for more info about a product
  this.knowMore = new function() {

    this.knowMoreModal = false;

    this.eventsApplied = false;

    this.open = function( product_id ) {

      if( this.knowMoreModal ) {

        this.showModal( product_id );

      } else {

        var self = this;

        var url = base_url+'product/knowMore';

        var data = {

          tzadiToken : tzadiToken

          , product_id : product_id

        };

        var callback = function( modal ){

          self.knowMoreModal = modal;

          self.showModal( product_id );

        };

        $tzd.ajax.post(url, data, callback);        
      }

    };

    this.showModal = function ( product_id ){

      $('#tzadiDialogs').html( this.knowMoreModal );

      $('#tzadiDialogs').modal('show');

      if( ! this.eventsApplied ) {

        this.eventsApplied = true;

        var self = this;

        $(".knowMoreProduct").live("click", function(){

          self.send(product_id);
          
        });

      }

    }
    this.send = function( product_id ){

      var valid = true;

      valid = valid && $tzd.form.checkMask.range($('#tzadiDialogs').find(".knowMoreYourName"), 1, 255, $("#pdt_fillName").html());

      valid = valid && $tzd.form.checkMask.email($('#tzadiDialogs').find(".knowMoreEmail"), $("#pdt_fillValidEmail").html());

      valid = valid && $tzd.form.checkMask.range($('#tzadiDialogs').find(".knowMoreQuestions"), 1, 255, $("#pdt_fillQuestions").html());

      if( valid ){

        var url = base_url+'product/knowMore';
        
        var data = {

          tzadiToken : tzadiToken

          , name : $('#tzadiDialogs').find(".knowMoreYourName").val()

          , questions : $('#tzadiDialogs').find(".knowMoreQuestions").val()
        
          , product_id : product_id
        
          , address : $('#tzadiDialogs').find(".knowMoreEmail").val()

        };
        
        var callback = function( e ){

          if(e.error) $tzd.alert.error( e.error );

          if(e.success){

            $('#tzadiDialogs').find(".closeModal").click();

            $tzd.alert.success( e.success );

          }

        };
        
        $tzd.ajax.post(url, data, callback);

      }

    };

  }

}