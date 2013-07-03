<div class="span4 offset4 well">
  <?=form_open("", array('class' => 'form-horizontal form-signin'))?>
    <h4 class="form-signin-heading">Tzadi <?=lang("lgn_sign_In")?></h4>
    <p><input type="text" class="input-block-level" placeholder="<?=lang("lgn_enter_mail")?>" id="email" name="email"></p>
    <p><input type="password" class="input-block-level" placeholder="<?=lang("lgn_enter_passwd")?>" id="password" name="password"></p>
    <p><a src="#" class="btn btn-large btn-primary btn-block" id="submitLogin"><?=lang("lgn_Sign_In")?></a></p>
  <?=form_close()?>
</div>

<script type="text/javascript">
  window.onload=function(){
    $("#submitLogin").live("click", function() {
      var valid = true;
     
      valid = valid && globalValidateInput('email', $('#email').val(), "<?=lang('lgn_validate_mail')?>");
      valid = valid && globalValidateLenght(1, 65535, $('#password').val(), "<?=lang('lgn_validate_password')?>");

      if ( valid ) {
        $.post(base_url+"user/authenticate", {
          email : $("#email").val(),
          password : $("#password").val(),
          tzadiToken : $('input[name=tzadiToken]').val()
        }, function( e ) {
          if( e ) {
            http_referer = "<?=$this->session->flashdata('HTTP_REFERER')?>";
            if (http_referer) window.location = http_referer;
            else window.location = "<?=base_url()?>";
          } else {
            globalAlert("alert-error", "<?=lang('lgn_invalid_credential')?>")
          }
        }, "json");
      }
    });

    $("#password").keyup(function(event){
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
