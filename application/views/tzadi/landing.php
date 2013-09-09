<div class="g-plus" data-action="share" data-annotation="bubble"></div>
<div class="fb-like" data-href="http://facebook.com/tzadiinc" data-width="450" data-layout="button_count" data-show-faces="true" data-send="true"></div>

<div class="row-fluid">
  <div class="span24 home-phrase-bg">
    <div class="row-fluid">
      <div class="span20 offset2">
        <h1 class="text-center"><?=lang('idx_phrase')?></h1>
        <div class="row-fluid">
          <div class="span12 pull-right">
            <br>
            <h3 class="lead text-center"><?=lang('idx_explanation')?></h3>
            <ul>
              <p><i class="icon-ok"></i> <?=lang("idx_explanation1")?>.</p>
              <p><i class="icon-ok"></i> <?=lang("idx_explanation2")?>.</p>
              <p><i class="icon-ok"></i> <?=lang("idx_explanation3")?>.</p>
              <p><i class="icon-ok"></i> <?=lang("idx_explanation4")?>.</p>
              <p><i class="icon-ok"></i> <?=lang("idx_explanation5")?>.</p>
              <p><i class="icon-ok"></i> <?=lang("idx_explanation6")?>?</p>
              <p><i class="icon-ok"></i> <?=lang("idx_explanation7")?>.</p>
            </ul>
            <p class='text-center'><?=lang("idx_explanation8")?>.</p>
          </div>
          <div class="span12 text-center pull-left">
            <br></br><br>
            <p><?=lang("idx_explanation9")?>?</p>
            <div class="control-group">
              <input type="text" class="span20" placeholder="<?=lang("usr_enter_mail")?>" id="email" name="email">
            </div>
            <div class="control-group">
              <input type="password" class="span20" placeholder="<?=lang("usr_enter_passwd")?>" id="password" name="password">
            </div>
            <div class="row-fluid">
              <div class="span20 offset2">
                <a src="#" class="btn btn-large btn-success btn-block" id="submitLogin"> <?=lang("tmpt_signup")?></a>
              </div>
            </div>
            <br>
            <p class="text-center"><?=lang("usr_orUse")?></p>

            <a id="facebook" class="btn  btn-primary"><i class="icon-facebook icon-large"></i> facebook</a>
            <a id="google" class="btn  btn-danger"><i class="icon-google-plus icon-large"></i> google</a>
            <a id="linkedin" class="btn  btn-info"><i class="icon-linkedin icon-large"></i> linkedin</a>

            <div class="usr_validate_mail hide"><?=lang("usr_validate_mail")?></div>
            <div class="usr_validate_password hide"><?=lang("usr_validate_password")?></div>
            <div id="buttonContent" style="display: none;"></div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  // Load the GOOGLE plusone asynchronously
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>