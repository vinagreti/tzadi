$(document).ready(function(){

	$("#save").live("click", function(){

    var valid = true;

    valid = valid && $tzd.form.checkMask.range($('#name'), 1, 255, $(".usr_pleaseFillName").html());

    if ( valid ) {

      var url = base_url+'user/profile';

      var data = {

        tzadiToken : tzadiToken
        , name : $("#name").val()
        , about : $("#about").val()

      };

      var callback = function( res ) {

        if( res.error ) $tzd.alert.error( res.error );

        if( res.success ) {

          $tzd.alert.success( res.success );

          $('.loggedMenuName').html( $("#name").val() );

        }
        
      }

      $tzd.ajax.post(url, data, callback);

    }

	})


  $('.changeImg').live("click", function() {

    $('.userPhoto').click();
    
  });

  $(".userPhoto").live("change propertychange", function(){
    
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

          $('.userImg').css("background-image", "url("+res.img+")");

        }
          
      };

      $tzd.ajax.upload(url, data, callback);

  });

});