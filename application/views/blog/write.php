<div class="row-fluid">
	<div class="span24">
		<label><?=lang("blg_title")?>
			<div class="control-group"><input id="title" type="text" class="input-block-level" /></div>
		</label>
		<label><?=lang("blg_subtitle")?>
			<div class="control-group"><input id="subtitle" type="text" class="input-block-level" /></div>
		</label>

		<label><?=lang("blg_text")?>
			<textarea id="text" rows="25" class="input-block-level" placeholder="<?=lang("blg_text")?> ..."></textarea>
		</label>

		<div class="pull-right">
			<a id="savePost"class="btn btn-success"><?=lang("blg_savePost")?></a>
			<a id="cancel" class="btn" href="<?=myOrg_url()?>blog"><?=lang("blg_cancel")?></a>
		</div>
	</div>
</div>

<div class="blg_validate_title hide"><?=lang("blg_validate_title")?></div>
<div class="blg_validate_subtitle hide"><?=lang("blg_validate_subtitle")?></div>
<div class="blg_validate_text hide"><?=lang("blg_validate_text")?></div>