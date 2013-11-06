<div class="row-fluid">
	<div class="span24">
		<h3><?=lang('agc_SettingsOf')?> <span class="orgName text-success"><?=$this->session->userdata("orgName")?></span></h3>
	</div>
</div>

<div class="row-fluid">

	<div class="span5">
	    <div class="thumbnail">
	      <img src="<?=$agency["img"]?>" class="changeImg imgMedium" alt="160x120">
	      <div class="control-group">
	        <input type="file" class="orgPhoto hide" />
	      </div>
	    </div>
	</div>

	<div class="span18 offset1">

		<label class="text-warning"><span><?=lang('agc_chooseYourName')?></span>
			<div class="control-group">
			  <input id="name" type="text" class="input-block-level" name="name" value="<?=$agency["name"]?>">
			</div>
		</label>

		<label class="text-warning"><span><?=lang('agc_tellUsAboutYou')?></span>
			<div class="control-group">
			  <textarea id="about" rows="5" class="input-block-level" name="about"><?=$agency["about"]?></textarea>
			</div>
		</label>

		<div class="pull-right">
			<a id="save" class="btn btn-primary"><?=lang('agc_save')?></a>
		</div>
	</div>
</div>

<div class="agc_pleaseFillName hide"><?=lang("agc_pleaseFillName")?></div>
<div class="agc_aboutWrongSize hide"><?=lang("agc_aboutWrongSize")?></div>