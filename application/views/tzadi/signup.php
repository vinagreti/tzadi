<h1><?=lang('su_page_p1')?></h1>
<p class="lead"><?=lang('su_page_p2')?></p>

<p>
	<label class="text-warning"><?=lang('su_pleaseSelectAccountKind')?></label>
	<label class="accountKind radio">
	  <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
	  	<?=lang("su_agency")?>
	</label>
	<label class="accountKind radio">
	  <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" disabled>
	  	<?=lang("su_institution")?>
	</label>
	<label class="accountKind radio">
	  <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" disabled>
	  	<?=lang("su_exchange_student")?>
	</label>
</p>

<label class="text-warning"><span><?=lang('su_subdomain')?></span> <span class="text-success"><strong>.tzadi.com</strong></span>. <span><?=lang('su_subdomainDesc1')?></span> <strong><span class="companyAddress text-success">tzadi</span></strong> <span><?=lang('su_subdomainDesc2')?></span></label>
<div class="control-group">
  <input type="text" class="input-block-level" id="subdomain" name="subdomain">
</div>

<label class="text-warning"><?=lang('su_pleaseFillValidEmail')?></label>
<div class="control-group">
  <input type="text" class="input-block-level" id="email" name="email">
</div>

<label class="text-warning"><?=lang('su_pleaseFillPassword')?></label>
<div class="control-group">
  <input type="password" class="input-block-level" id="password" name="password">
</div>

<label class="text-warning"><?=lang('su_plan')?></label>
<select class="input-block-level" name="plan" id="plan" rel="tooltip" title="<?=lang('su_plan')?>" >
  <option value="1"><?=lang('su_plan_trial')?></option>
</select>

<p>
	<small>* <?=lang('su_agreedByClick')?> <a href="<?=base_url()?><?=lang("rt_termsOfUse")?>" target="_blanck"><?=lang('su_termsOfUse')?></a></small>
	<br>
	<small>** <?=lang('su_agreedByClick')?> <a href="<?=base_url()?><?=lang("rt_privacyPolicy")?>" target="_blanck"><?=lang('su_privacyPolicy')?></a></small>
</p>

<p><a src="#" class="btn btn-large btn-primary" id="submitSignup"><?=lang('su_Send')?></a></p>

<div class="su_pleaseFillSubdomain hide"><?=lang("su_pleaseFillSubdomain")?></div>
<div class="su_pleaseFillValidEmail hide"><?=lang("su_pleaseFillValidEmail")?></div>
<div class="su_pleaseFillPassword hide"><?=lang("su_pleaseFillPassword")?></div>
