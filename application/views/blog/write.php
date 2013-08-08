<div class="row-fluid">
	<div class="span22 offset1">
		<label><?=lang("blg_title")?></label>
		<div class="control-group"><input id="title" type="text" class="input-block-level" /></div>
		<label><?=lang("blg_subtitle")?></label>
		<div class="control-group"><input id="subtitle" type="text" class="input-block-level" /></div>
		<div class="control-group"><div id="text" class="input-content-editable" style="min-height: 100px;" contentEditable="true"><?=lang("blg_text")?></div></div>
		<div class="pull-right">
			<a id="savePost"class="btn btn-success"><?=lang("blg_savePost")?></a>
			<a id="cancel" class="btn" href="HTTP://<?=$this->session->userdata("identity").".".ENVIRONMENT?>/blog"><?=lang("blg_cancel")?></a>
		</div>
	</div>
</div>

<div class="blg_validate_title hide"><?=lang("blg_validate_title")?></div>
<div class="blg_validate_subtitle hide"><?=lang("blg_validate_subtitle")?></div>
<div class="blg_validate_text hide"><?=lang("blg_validate_text")?></div>