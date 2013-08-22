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

        , text : $("#text").val()

      };

      var callback = function( res ) {

        if( res.error ) $tzd.alert.error( res.error );

        if( res.url ) window.location = res.url;

      }

      $tzd.ajax.post(url, data, callback);

    }

  });

  $('#text').wysihtml5({
    "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
    "emphasis": true, //Italics, bold, etc. Default true
    "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
    "html": true, //Button which allows you to edit the generated HTML. Default false
    "link": true, //Button to insert a link. Default true
    "image": true, //Button to insert an image. Default true,
    "color": true //Button to change color of font  
  });

});