$(document).ready(function(){

    var company = {

      all : []

      , add : function( ){

        var url = base_url+'signup/add';

        var data = {

          tzadiToken : tzadiToken

          , subdomain : $('#subdomain').val()

          , plan : $('#plan').val()

          , email : $('#email').val()

          , password : $('#password').val()

        };

        var callback = function( registered ){

          if ( registered == true ) {

            var url = base_url+'user/authenticate';

            var data = {

              tzadiToken : tzadiToken

              , email : $('#email').val()

              , password : $('#password').val()

            };

            var callback = function( error ){

              if( error ) $tzd.alert.error( error );

              else window.location = base_url;
                
            };

            $tzd.ajax.post(url, data, callback);


          } else {

            $tzd.alert.error(registered);

          }

        };

        $tzd.ajax.post(url, data, callback);

      }

      , checkSubdomain : function(subdomain) {

        var url = base_url+'signup/checkSubdomain';

        var data = {

          tzadiToken : tzadiToken

          , subdomain : subdomain

        };

        var callback = function( exist ){

          if(exist){

            $("#subdomain").parent().addClass("error");

            $tzd.alert.error(exist);

          } else {

            $(".companyAddress").html(subdomain+".tzadi.com");

            $("#subdomain").parent().removeClass("error");

          }


        };

        $tzd.ajax.post(url, data, callback);

      }

      , checkEmail : function(email) {

        var url = base_url+'signup/checkEmail';

        var data = {

          tzadiToken : tzadiToken

          , email : email

        };

        var callback = function( exist ){

          if(exist){

            $("#email").parent().addClass("error");

            $tzd.alert.error(exist);

          }

          else $("#email").parent().removeClass("error");

        };

        $tzd.ajax.post(url, data, callback);

      }

    };

    $('#subdomain').mask('A{1,9}?A{0,9}?A{0,9}?A{0,2}');
    $("#subdomain").blur(function() {

      if( $(this).val() != "" ) company.checkSubdomain($(this).val() );

    });

    $('#email').mask('Z{1,9}?Z{0,9}?Z{0,9}?Z{0,2}', {translation: {'Z': "[A-Za-Z]?"}});
    $("#email").blur(function() {

      if( $(this).val() != "" ) company.checkEmail($(this).val() );

    });

    $("#submitSignup").live("click", function(){

      var valid = true;

      valid = valid && $tzd.form.checkMask.range( $('#subdomain'), 1, 32, $(".su_pleaseFillSubdomain").html() );

      valid = valid && $tzd.form.checkMask.email( $('#email'), $(".su_pleaseFillValidEmail").html() );

      valid = valid && $tzd.form.checkMask.range( $('#password'), 1, 32, $(".su_pleaseFillPassword").html() );

      if ( valid ) {

        company.add();

      }

    });

});