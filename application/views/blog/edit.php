<div class="row-fluid">
	<div class="span24">

		<label><?=lang("blg_title")?>
			<div class="control-group"><input id="title" type="text" class="input-block-level" value="<?=$post["title"]?>" /></div>
		</label>
		
		<label><?=lang("blg_subtitle")?>
			<div class="control-group"><input id="subtitle" type="text" class="input-block-level" value="<?=$post["subtitle"]?>" /></div>
		</label>
		
		<label><?=lang("blg_text")?>
			<textarea id="text" rows="25" class="input-block-level" ><?=$post["text"]?></textarea>
		</label>

		<div class="pull-right">
			<a id="<?=$post["url"]?>" class="savePost btn btn-success"><?=lang("blg_savePost")?></a>
			<a id="<?=$post["url"]?>" class="dropPost btn btn-danger"><?=lang("blg_dropPost")?></a>
			<a id="cancel" class="btn" href="HTTP://<?=$this->session->userdata("identity").".".ENVIRONMENT?>/blog"><?=lang("blg_cancel")?></a>
		</div>
	</div>
</div>

<div class="blg_validate_title hide"><?=lang("blg_validate_title")?></div>
<div class="blg_validate_subtitle hide"><?=lang("blg_validate_subtitle")?></div>
<div class="blg_validate_text hide"><?=lang("blg_validate_text")?></div>
<div class="title hide"><?=$post["title"]?></div>
<div class="blg_wantToDelete hide"><?=lang("blg_wantToDelete")?></div>