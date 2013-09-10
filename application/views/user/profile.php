<div class="row-fluid">
	<div class="span24">
		<h3><?=lang('usr_Profile')." ".$this->session->userdata("profileName")?></h3>
	</div>
</div>

<div class="row-fluid">

	<div class="span5">
    <div class="thumbnail">
      <img src="<?=$user["img"]?>" class="changeImg" alt="160x120">
      <div class="control-group">
        <input type="file" class="userPhoto hide" />
      </div>
    </div>
	</div>

	<div class="span18 offset1">

		<p><span class="text-warning">e-mail: </span> <?=$user["email"]?></p>

		<p><span class="text-warning"><?=lang("usr_password")?>: </span>***** <a href="https://<?=ENVIRONMENT?>/<?=lang('rt_changePassword')?>"><?=lang("usr_changePassword")?></a></p>

		<label class="text-warning"><span><?=lang('usr_chooseYourAgencyName')?></span>
			<div class="control-group">
			  <input id="name" type="text" class="input-block-level" name="name" value="<?=$user["name"]?>">
			</div>
		</label>

		<label class="text-warning"><span><?=lang('usr_tellUsAboutYou')?></span>
			<div class="control-group">
			  <textarea id="about" rows="5" class="input-block-level" name="about"><?=$user["about"]?></textarea>
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