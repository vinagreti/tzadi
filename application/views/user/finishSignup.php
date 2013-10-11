<div class="row-fluid">
	<div class="span22 offset1">
		<h3><?=lang('usr_finishSignup')?></h3>
	</div>
</div>

<div class="row-fluid">
	<div class="span4 offset1">
		<label class="text-warning"><span><?=lang('usr_profileImg')?></span></label>
	    <div class="thumbnail">
	      <img src="<?=$this->session->userdata("img")?>" class="changeImg" alt="160x120">
	      <div class="control-group">
	        <input type="file" class="userImg hide" />
	      </div>
	    </div>
	    <small>Clique para na imagem acima para adicionar uma foto</small>
	</div>
	<div class="span17 offset1">
		<label class="text-warning"><span><?=lang('usr_chooseYourName')?></span></label>
		<div class="control-group">
		  <input id="name" type="text" class="input-block-level" name="name" value="<?=$this->session->userdata("name")?>">
		</div>
		<label class="text-warning"><span><?=lang('usr_chooseYourAgencyName')?></span></label>
		<div class="control-group">
		  <input id="org_name" type="text" class="input-block-level" name="org_name" value="<?=$this->session->userdata("org_name")?>">
		</div>
		<label class="text-warning"><span><?=lang('usr_chooseYourSubdomain')?></span> <span class="text-success"><strong><?=lang('usr_identitySample')?></strong></span></label>
		<div class="control-group">
		  <input id="org_id" type="text" class="input-block-level" name="org_id">
		  <h4><?=lang("usr_addressLabel")?>: <span id="address" class="text-success"><span ></span></h4>
		</div>
		<p><button id="finishSignup" class="btn btn-primary"><?=lang('usr_finishSignupButton')?></button><p>
		<div class="usr_pleaseFillEverithing hide"><?=lang("usr_pleaseFillEverithingCorrectly")?></div>
	</div>
</div>

<!-- <div class="row-fluid">
	<div class="span22 offset1">
		<p>
			<label class="text-warning"><?=lang('usr_whatBringYouHere')?></label>
			<label class="radio">
			  <input class="accountKind" type="radio" name="optionsRadios" id="optionsRadios2" value="student" checked>
			  	<?=lang("usr_student")?>
			</label>
			<label class="radio">
			  <input class="accountKind" type="radio" name="optionsRadios" id="optionsRadios1" value="agency">
			  	<?=lang("usr_agency")?>
			</label>
			<label class="radio">
			  <input class="accountKind" type="radio" name="optionsRadios" id="optionsRadios2" value="supplier">
			  	<?=lang("usr_supplier")?>
			</label>
		</p>
	</div>
</div> -->