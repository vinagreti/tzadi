<div class="row-fluid">
	<div class="span24">
		<h3><?=lang('usr_Profile')?></h3>
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
		<label class="text-warning"><span><?=lang('usr_chooseYourAgencyName')?></span></label>
		<div class="control-group">
		  <input id="name" type="text" class="input-block-level" name="name" value="<?=$user["name"]?>">
		</div>

		<div class="pull-right">
			<a id="save" class="btn btn-primary"><?=lang('usr_save')?></a>
		</div>
	</div>
</div>

<div class="usr_pleaseFillName hide"><?=lang("usr_pleaseFillName")?></div>
<div class="usr_aboutWrongSize hide"><?=lang("usr_aboutWrongSize")?></div>
<div class="usr_termsOfUseWrongSize hide"><?=lang("usr_termsOfUseWrongSize")?></div>
<div class="usr_privacyPolicyWrongSize hide"><?=lang("usr_privacyPolicyWrongSize")?></div>