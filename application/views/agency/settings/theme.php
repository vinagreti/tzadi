<h3>Alterar tema</h3>

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