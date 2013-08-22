$(document).ready(function(){

	$("#save").live("click", function(){

    var valid = true;

    valid = valid && $tzd.form.checkMask.range($('#name'), 1, 255, $(".usr_pleaseFillName").html());

    valid = valid && $tzd.form.checkMask.range($('#about'), 0, 65535, $(".usr_aboutWrongSize").html());

    valid = valid && $tzd.form.checkMask.range($('#termsOfUse'), 0, 65535, $(".usr_termsOfUseWrongSize").html());

    valid = valid && $tzd.form.checkMask.range($('#privacyPolicy'), 0, 65535, $(".usr_privacyPolicyWrongSize").html());

    if ( valid ) {

      $(".brand").find("a").html( $("#name").val() );

      var url = base_url+'user/profile';

      var data = {

        tzadiToken : tzadiToken
        , name : $("#name").val()
        , about : $("#about").val()
        , termsOfUse : $("#termsOfUse").val()
        , privacyPolicy : $("#privacyPolicy").val()

      };

      var callback = function( res ) {

        if( res.error ) $tzd.alert.error( res.error );

        if( res.success ) {

          $tzd.alert.success( res.success );

          $('.profileName').html( $("#name").val() );

          $('.loggedMenuName').html( $("#name").val() );

        }
        
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

  $('#about').wysihtml5({
    "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
    "emphasis": true, //Italics, bold, etc. Default true
    "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
    "html": true, //Button which allows you to edit the generated HTML. Default false
    "link": true, //Button to insert a link. Default true
    "image": true, //Button to insert an image. Default true,
    "color": true //Button to change color of font  
  });

  $('#termsOfUse').wysihtml5({
    "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
    "emphasis": true, //Italics, bold, etc. Default true
    "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
    "html": true, //Button which allows you to edit the generated HTML. Default false
    "link": true, //Button to insert a link. Default true
    "image": true, //Button to insert an image. Default true,
    "color": true //Button to change color of font  
  });

  $('#privacyPolicy').wysihtml5({
    "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
    "emphasis": true, //Italics, bold, etc. Default true
    "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
    "html": true, //Button which allows you to edit the generated HTML. Default false
    "link": true, //Button to insert a link. Default true
    "image": true, //Button to insert an image. Default true,
    "color": true //Button to change color of font  
  });
});