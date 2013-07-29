<h3><?=lang('usr_finishSignup')?></h3>

<p><?=lang('usr_finishSignup1')?></p>

<p>
	<label class="text-warning"><?=lang('usr_whatBringYouHere')?></label>
	<label class="radio">
	  <input class="accountKind" type="radio" name="optionsRadios" id="optionsRadios2" value="supplier" checked>
	  	<?=lang("usr_supplier")?>
	</label>
	<label class="radio">
	  <input class="accountKind" type="radio" name="optionsRadios" id="optionsRadios2" value="student">
	  	<?=lang("usr_student")?>
	</label>
	<label class="radio">
	  <input class="accountKind" type="radio" name="optionsRadios" id="optionsRadios1" value="agency">
	  	<?=lang("usr_agency")?>
	</label>
</p>

<div id="setSubdomain" class="hide">

	<label class="text-warning"><span><?=lang('usr_chooseYourAgencyName')?></span></label>
	<div class="control-group">
	  <input id="name" type="text" class="input-block-level" name="name">
	</div>

	<label class="text-warning"><span><?=lang('usr_chooseYourSubdomain')?></span> <span class="text-success"><strong><?=lang('usr_subdomainSample')?></strong></span></label>
	<div class="control-group">
	  <input id="subdomain" type="text" class="input-block-level" name="subdomain">
	  <h4>Seu endereço tzadi é: <strong><span id="address" class="text-success"><span ></span></strong></h4>
	</div>

</div>

<p><button id="finishSignup" class="btn btn-primary"><?=lang('usr_finishSignupButton')?></button><p>

<div class="usr_pleaseFillEverithing hide"><?=lang("usr_pleaseFillEverithing")?></div>
