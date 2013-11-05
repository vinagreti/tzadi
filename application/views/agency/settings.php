<div class="row-fluid">
	<div class="span24">
		<h3><?=lang('agc_SettingsOf')?> <span class="orgName text-success"><?=$this->session->userdata("orgName")?></span></h3>
	</div>
</div>

<div class="row-fluid">

	<div class="span5">
	    <div class="thumbnail">
	      <img src="<?=$agency["img"]?>" class="changeImg" alt="160x120">
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

		<label class="text-warning"><span><?=lang('agc_Theme')?></span>

			<select class="changeTheme input-block-level">
				<option <?php if( isset($agency["theme"]) && $agency["theme"] == "aqua" ) echo "selected" ?> value="aqua"> <?=lang("tmpt_aqua")?> </option>
				<option <?php if( isset($agency["theme"]) && $agency["theme"] == "aqua_compact" ) echo "selected" ?> value="aqua_compact"> <?=lang("tmpt_aqua_compact")?> </option>
				<option <?php if( isset($agency["theme"]) && $agency["theme"] == "blue" ) echo "selected" ?> value="blue"> <?=lang("tmpt_blue")?> </option>
				<option <?php if( isset($agency["theme"]) && $agency["theme"] == "blue_compact" ) echo "selected" ?> value="blue_compact"> <?=lang("tmpt_blue_compact")?> </option>
				<option <?php if( isset($agency["theme"]) && $agency["theme"] == "green" ) echo "selected" ?> value="green"> <?=lang("tmpt_green")?> </option>
				<option <?php if( isset($agency["theme"]) && $agency["theme"] == "green_compact" ) echo "selected" ?> value="green_compact"> <?=lang("tmpt_green_compact")?> </option>
				<option <?php if( isset($agency["theme"]) && $agency["theme"] == "orange" ) echo "selected" ?> value="orange"> <?=lang("tmpt_orange")?> </option>
				<option <?php if( isset($agency["theme"]) && $agency["theme"] == "orange_compact" ) echo "selected" ?> value="orange_compact"> <?=lang("tmpt_orange_compact")?> </option>
				<option <?php if( isset($agency["theme"]) && $agency["theme"] == "purple" ) echo "selected" ?> value="purple"> <?=lang("tmpt_purple")?> </option>
				<option <?php if( isset($agency["theme"]) && $agency["theme"] == "purple_compact" ) echo "selected" ?> value="purple_compact"> <?=lang("tmpt_purple_compact")?> </option>
				<option <?php if( isset($agency["theme"]) && $agency["theme"] == "red" ) echo "selected" ?> value="red"> <?=lang("tmpt_red")?> </option>
				<option <?php if( isset($agency["theme"]) && $agency["theme"] == "red_compact" ) echo "selected" ?> value="red_compact"> <?=lang("tmpt_red_compact")?> </option>
				<option <?php if( isset($agency["theme"]) && $agency["theme"] == "yellow" ) echo "selected" ?> value="yellow"> <?=lang("tmpt_yellow")?> </option>
				<option <?php if( isset($agency["theme"]) && $agency["theme"] == "yellow_compact" ) echo "selected" ?> value="yellow_compact"> <?=lang("tmpt_yellow_compact")?> </option>
			</select>

		</label>

		<div class="pull-right">
			<a id="save" class="btn btn-primary"><?=lang('agc_save')?></a>
		</div>
	</div>
</div>

<div class="agc_pleaseFillName hide"><?=lang("agc_pleaseFillName")?></div>
<div class="agc_aboutWrongSize hide"><?=lang("agc_aboutWrongSize")?></div>