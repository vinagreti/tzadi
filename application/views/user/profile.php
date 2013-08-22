<div class="row-fluid">
	<div class="span22 offset1">
		<h3><?=lang('usr_Profile')?></h3>
	</div>
</div>

<div class="row-fluid">

	<div class="span4 offset1">
    <div class="thumbnail">
      <img src="<?=$user["img"]?>" class="changeImg" alt="160x120">
      <div class="control-group">
        <input type="file" class="userPhoto hide" />
      </div>
    </div>
	</div>

	<div class="span17 offset1">
		<label class="text-warning"><span><?=lang('usr_chooseYourAgencyName')?></span></label>
		<div class="control-group">
		  <input id="name" type="text" class="input-block-level" name="name" value="<?=$user["name"]?>">
		</div>

		<label class="text-warning">
			<?=lang('usr_tellAboutYou')?></span> <span class="text-success">
			<strong>
				<a href="http://<?=IDENTITY.".".ENVIRONMENT."/".lang("rt_about")?>" target="_blank"><?=IDENTITY.".".ENVIRONMENT."/".lang("rt_about")?></a>
			</strong>

			<div class="control-group">
				<textarea id="about" rows="15" class="input-block-level"><?if(isset($user["about"])) echo $user["about"];?></textarea>
			</div>
		</label>

		<label class="text-warning">
			<?=lang('usr_insertTermsOfUse')?></span> <span class="text-success">
			<strong>
				<a href="http://<?=IDENTITY.".".ENVIRONMENT."/".lang("rt_termsOfUse")?>" target="_blank"><?=IDENTITY.".".ENVIRONMENT."/".lang("rt_termsOfUse")?></a>
			</strong>

			<div class="control-group">
				<textarea id="termsOfUse" rows="15" class="input-block-level"><?if(isset($user["termsOfUse"])) echo $user["termsOfUse"];?></textarea>
			</div>
		</label>

		<label class="text-warning">
			<?=lang('usr_insertPrivacyPolicy')?></span> <span class="text-success">
			<strong>
				<a href="http://<?=IDENTITY.".".ENVIRONMENT."/".lang("rt_privacyPolicy")?>" target="_blank"><?=IDENTITY.".".ENVIRONMENT."/".lang("rt_privacyPolicy")?></a>
			</strong>

			<div class="control-group">
				<textarea id="privacyPolicy" rows="15" class="input-block-level"><?if(isset($user["privacyPolicy"])) echo $user["privacyPolicy"];?></textarea>
			</div>
		</label>

		<div class="pull-right">
			<a id="save" class="btn btn-primary"><?=lang('usr_save')?></a>
		</div>
	</div>
</div>

<div class="usr_pleaseFillName hide"><?=lang("usr_pleaseFillName")?></div>
<div class="usr_aboutWrongSize hide"><?=lang("usr_aboutWrongSize")?></div>
<div class="usr_termsOfUseWrongSize hide"><?=lang("usr_termsOfUseWrongSize")?></div>
<div class="usr_privacyPolicyWrongSize hide"><?=lang("usr_privacyPolicyWrongSize")?></div>