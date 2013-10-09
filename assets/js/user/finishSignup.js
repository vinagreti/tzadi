$(document).ready(function(){

  $("#identity").mask("A{0,9}A{0,9}A{0,9}A{1,2}");

	$("#identity").live("change keyup propertychange", function(){

		if($(this).val() == "")
			$("#address").html("");

		else
			$("#address").html($(this).val()+".tzadi.com");

	});

	$("#finishSignup").live("click", function(){

    var valid = true;

    valid = valid && $tzd.form.checkMask.range($('#name'), 1, 65535, $(".usr_pleaseFillEverithing").html());

    valid = valid && $tzd.form.checkMask.range($('#identity'), 1, 32, $(".usr_pleaseFillEverithing").html());

    valid = valid && $tzd.form.checkMask.identity($('#identity'), $(".usr_pleaseFillEverithing").html());
   
    if ( valid ) {

      var url = base_url+'user/finishSignup';

      var data = {

        tzadiToken : tzadiToken
        , name : $("#name").val()
        , orgName : $("#orgName").val()
        , identity : $("#identity").val()
        //, kind : $(".accountKind:checked").val()

      };

      var callback = function( res ) {

        if( res.error ) $tzd.alert.error( res.error );

        if( res.url ) window.location = res.url;
        
      }

      $tzd.ajax.post(url, data, callback);

    }

	})


  $('.changeImg').live("click", function() {
    $('.userImg').click();
  });

  $(".userImg").live("change propertychange", function(){
    
      var files = this.files;

      var url = base_url+'user/changeImg';

      var data = {
        tzadiToken : tzadiToken,
        files : files
      };

      var callback = function( res ){
        if( res.error )
          $tzd.alert.error(e.error);

        else {

          $("img").attr("src", res.img )

          $('a.brand').css("background-image", "url("+res.img+")");

        }
      };

      $tzd.ajax.upload(url, data, callback);

  });

});