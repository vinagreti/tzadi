$(document).ready(function(){
  
  $("#savePost").live("click", function() {

    var valid = true;
   
    valid = valid && $tzd.form.checkMask.range($('#title'), 1, 255, $(".blg_validate_title").html());

    valid = valid && $tzd.form.checkMask.range($('#subtitle'), 0, 255, $(".blg_validate_subtitle").html());

    valid = valid && $tzd.form.checkMask.range($('#text'), 1, 32768, $(".blg_validate_text").html());


    if ( valid ) {

      var url = base_url+'blog/write';

      var data = {

        tzadiToken : tzadiToken

        , title : $("#title").val()

        , subtitle : $("#subtitle").val()

        , text : $("#text").html()

      };

      var callback = function( res ) {

        if( res.error ) $tzd.alert.error( res.error );

        if( res.url ) window.location = res.url;

      }

      $tzd.ajax.post(url, data, callback);

    }

  });

});