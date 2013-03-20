<div class="row-fluid">
  <h1><?=lang('ct_page_p1')?></h1>
  <p class="lead"><?=lang('ct_page_p2')?></br><?=lang('ct_page_p3')?></p>
  <?=form_open()?>
  <p><input type="text" class="input-block-level" placeholder="<?=lang('ct_email')?>" id="email" name="email"></p>
  <p><input type="text" class="input-block-level" placeholder="<?=lang('ct_subject')?>" id="subject" name="subject"></p>
  <p><textarea rows="7" type="text" class="input-block-level" placeholder="<?=lang('ct_message')?>" id="message" name="message"></textarea></p>
  <?=form_close()?>
  <p><a src="#" class="btn btn-large btn-primary" id="submitLogin"><?=lang('ct_Send')?></a></p>
</div> <!-- /container -->

<script type="text/javascript">
  window.onload=function(){
    $("#submitLogin").live("click", function() {
      var valid = true;
     
      valid = valid && globalValidateInput('email', $('#email').val(), "<?=lang('tmpt_insert_valid_mail')?>");
      valid = valid && globalValidateLenght(1, 65535, $('#subject').val(), "<?=lang('tmpt_insert_subject')?>");
      valid = valid && globalValidateLenght(1, 65535, $('#message').val(), "<?=lang('tmpt_insert_message')?>");

      if ( valid ) {
         $.post(base_url+"contact", {
          email : $("#email").val(),
          subject : $("#subject").val(),
          message : $("#message").val(),
          tzadiToken : $('input[name=tzadiToken]').val()
        }, function( e ) {
          if( e.success ) {
            globalAlert('alert-success', e.message);
            window.setTimeout(function (a,b) {
              window.location = "<?=base_url()?>";
            },1500);
          }
          else globalAlert('alert-error', e.message);
        }, "json");       
      }
    });

    $("#subject").keyup(function(event){
        if(event.keyCode == 13){
            $("#submitLogin").click();
        }
    });
    $("#email").keyup(function(event){
        if(event.keyCode == 13){
            $("#submitLogin").click();
        }
    });
  };
</script>
</body>
</html>
