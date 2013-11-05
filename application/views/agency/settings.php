<div class="row-fluid">
	<div class="span24">
		<h3><?=lang('agc_SettingsOf')?> <span class="orgName text-success"><?=$this->session->userdata("orgName")?></span></h3>
	</div>
</div>

<div class="tabbable"> <!-- Only required for left/right tabs -->

  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">Básico</a></li>
    <li><a href="#tab2" data-toggle="tab">Cores</a></li>
    <li><a href="#tab3" data-toggle="tab">Orçamentos</a></li>
    <li><a href="#tab4" data-toggle="tab">Pagamento</a></li>
  </ul>

  <div class="tab-content">
    <div class="tab-pane active" id="tab1">
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

				<div class="pull-right">
					<a id="save" class="btn btn-primary"><?=lang('agc_save')?></a>
				</div>
			</div>
		</div>
    </div>

    <div class="tab-pane" id="tab2">
      <p>Howdy, I'm in Section 2.</p>
    </div>

    <div class="tab-pane" id="tab3">
      <p>Howdy, I'm in Section 3.</p>
    </div>

    <div class="tab-pane" id="tab4">
      <p>Howdy, I'm in Section 4.</p>
    </div>

  </div>
</div>

<div class="agc_pleaseFillName hide"><?=lang("agc_pleaseFillName")?></div>
<div class="agc_aboutWrongSize hide"><?=lang("agc_aboutWrongSize")?></div>