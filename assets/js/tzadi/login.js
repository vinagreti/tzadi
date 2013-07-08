$(document).ready(function(){
  
  $("#submitLogin").live("click", function() {

    var valid = true;
   
    valid = valid && $tzd.form.checkMask.email($('#email'), $(".lgn_validate_mail").html());

    valid = valid && $tzd.form.checkMask.range($('#password'), 1, 65535, $(".lgn_validate_password").html());


    if ( valid ) {

      var url = base_url+'user/authenticate';

      var data = {

        tzadiToken : tzadiToken

        , email : $("#email").val()

        , password : $("#password").val()

      };

      var callback = function( error ) {

        if( error ) $tzd.alert.error( error );

        else window.location = base_url;
        
      }

      $tzd.ajax.post(url, data, callback);

    }

  });

  $("#password").keyup(function(event){

      if(event.keyCode == 13) $("#submitLogin").click();

  });

  $("#email").keyup(function(event){

      if(event.keyCode == 13) $("#submitLogin").click();
      
  });

});