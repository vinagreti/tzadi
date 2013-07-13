var TzadiJS = function(){
  this.creator = "Bruno da Silva João";
  this.version = "1.0";

  this.beInTouch = new function() {

    this.modal = false;

    this.eventsApplied = false;

    this.open = function( productID ) {

      if( this.modal ) {

        this.showModal( productID );

      } else {

        var self = this;

        var url = base_url+'company/beInTouch';

        var data = {

          tzadiToken : tzadiToken

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

        $(".beInTouchSubmit").live("click", function(){

          self.send(productID);
          
        });

      }

    }

    this.send = function( productID ){

      var name = $('#tzadiDialogs').find(".name").val();

      var email = $('#tzadiDialogs').find(".email").val();

      var message = $('#tzadiDialogs').find(".message").val();

      var url = base_url+'company/beInTouch';
      
      var data = {

        tzadiToken : tzadiToken

        , name : name

        , email : email

        , message : message
      
      };
      
      var callback = function( e ){

        if(e) {

          $('#tzadiDialogs').find(".closeModal").click();

          $tzd.alert.error( e );

        }

        else $('#tzadiDialogs').find(".closeModal").click();

      };
      
      $tzd.ajax.post(url, data, callback);

    };

  }
};

var $tzd = new TzadiJS;

// abstrair as funcionalidades abaixo
// criando seus respectivos plugins e extendendo a classe TzadJS
var tzadiToken = $('input[name=tzadiToken]').val();

jQuery.fn.reset = function () {
  $(this).each (function() { this.reset(); });
}