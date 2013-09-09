$(document).ready(function(){
  
  $("#submitLogin").live("click", function() {

    var valid = true;

    valid = valid && $tzd.form.checkMask.email($('#email'), $(".ct_insert_valid_mail").html());

    valid = valid && $tzd.form.checkMask.range($('#subject'), 1, 512, $(".ct_insert_subject").html());

    valid = valid && $tzd.form.checkMask.range($('#message'), 1, 65535, $(".ct_insert_message").html());

    if ( valid ) {

      var url = base_url+'contact';

      var data = {

        tzadiToken : tzadiToken

        , email : $("#email").val()

        , subject : $("#subject").val()

        , message : $("#message").val()

      };

      var callback = function( e ) {

        if( e.error ) $tzd.alert.error(e.error);

        if( e.success ) {

          $tzd.alert.success(e.success);

          $("#email").val("");

          $("#subject").val("");

          $("#message").val("");

        }

      }

      $tzd.ajax.post(url, data, callback);

    }

  });

});