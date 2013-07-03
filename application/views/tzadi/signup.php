<h1><?=lang('su_page_p1')?></h1>
<p class="lead"><?=lang('su_page_p2')?></p>
<?=form_open()?>
<label><?=lang('su_plan')?></label>
<select class="span5" name="plan" id="plan" rel="tooltip" title="<?=lang('su_plan')?>" >
  <option value="1"><?=lang('su_plan_trial')?></option>
  <option value="2"><?=lang('su_plan_professional')?></option>
  <option value="3"><?=lang('su_plan_enterprise')?></option>
</select>
<br/><br/>
<div class="control-group input-append">
  <label class="control-label" for="inputSubdomain"><?=lang('su_subdomain')?></label>
  <div class="controls">
    <input type="text" class="span5" id="subdomain" name="subdomain">
    <span class="add-on">.tzadi.com</span>
  </div>
</div>
<div class="control-group">
  <label class="control-label" for="inputEmail"><?=lang('su_email')?></label>
  <div class="controls">
    <input type="text" class="span5" id="email" name="email">
  </div>
</div>
<div class="control-group">
  <label class="control-label" for="inputPassword"><?=lang('su_password')?></label>
  <div class="controls">
    <input type="password" class="span5" id="password" name="password">
  </div>
</div>
<?=form_close()?>
<p><a src="#" class="btn btn-large btn-primary" id="submitSignup"><?=lang('su_Send')?></a></p>

<div class="su_pleaseFillSubdomain hide"><?=lang("su_pleaseFillSubdomain")?></div>
<div class="su_pleaseFillValidEmail hide"><?=lang("su_pleaseFillValidEmail")?></div>
<div class="su_pleaseFillPassword hide"><?=lang("su_pleaseFillPassword")?></div>
