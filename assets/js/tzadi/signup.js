window.onload=function(){
    var company = {
      all : []
      ,add : function( ){
        var url = base_url+'signup/add';
        var data = {
          tzadiToken : tzadiToken
          ,subdomain : $('#subdomain').val()
          ,plan : $('#plan').val()
          ,email : $('#email').val()
          ,password : $('#password').val()
        };
        var callback = function( registered ){
          if ( registered == true ) {
            var url = base_url+'user/authenticate';
            var data = {
              tzadiToken : $('input[name=tzadiToken]').val()
              ,email : $('#email').val()
              ,password : $('#password').val()
            };
            var callback = function( logged ){
              if( logged == true) {
                window.location = base_url;
              } else {
                globalAlert("alert-error", "invalid credential")
              }
            };
            var ajax = new tzdAjaxCall();
            ajax.post(url, data, callback);

          } else {
            globalAlert("alert-error", registered)
          }
        };
        var ajax = new tzdAjaxCall();
        ajax.post(url, data, callback);
      }
      ,checkSubdomain : function(subdomain) {
        var url = base_url+'signup/checkSubdomain';
        var data = {
          tzadiToken : $('input[name=tzadiToken]').val()
          , subdomain : subdomain
        };
        var callback = function( exist ){
          if(exist){
            $("#subdomain").val("");
            globalAlert("alert-error", exist)
          }
        };
        var ajax = new tzdAjaxCall();
        ajax.post(url, data, callback);
      }
      ,checkEmail : function(email) {
        var url = base_url+'signup/checkEmail';
        var data = {
          tzadiToken : $('input[name=tzadiToken]').val()
          , email : email
        };
        var callback = function( exist ){
          if(exist){
            $("#email").val("");
            globalAlert("alert-error", exist)
          }
        };
        var ajax = new tzdAjaxCall();
        ajax.post(url, data, callback);
      }
    };

    $("#subdomain").blur(function() {
     if($(this).val() != "") company.checkSubdomain($(this).val());
    });
    $("#email").blur(function() {
     if($(this).val() != "") company.checkEmail($(this).val());
    });
    $("#submitSignup").live("click", function(){
      var cen = 'oi';
      var valid = true;
      valid = valid && globalValidateLenght(1, 65535, $('#subdomain').val(), $(".su_pleaseFillSubdomain").html());
      valid = valid && globalValidateInput('email', $('#email').val(), $(".su_pleaseFillValidEmail").html());
      valid = valid && globalValidateLenght(1, 65535, $('#password').val(), $(".su_pleaseFillPassword").html());
      if ( valid ) {
       company.add();
      }
    });
};