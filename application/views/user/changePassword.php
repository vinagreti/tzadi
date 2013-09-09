<h3><?=lang("usr_ChangePassword")?></h3>

<div class="row">
	<div class="span8">
		<?=lang("usr_currentPassword")?>
		<div class="control-group">
			<input type="password" id="passwdOld" class="input-block-level" />
		</div>
		<?=lang("usr_newPassword")?>
		<div class="control-group">
			<input type="password" id="passwdNew" class="input-block-level" />
		</div>
		<?=lang("usr_confirmNewPassword")?>
		<div class="control-group">
			<input type="password" id="passwdNewConf" class="input-block-level" />
		</div>
		<a id="changePassword" class="btn btn-primary"><?=lang("usr_changePassword")?></a>
	</div>
</div>

<div id="usr_fill_passwdOld" class="hide"><?=lang("usr_fill_passwdOld")?></div>
<div id="usr_fill_passwdNew" class="hide"><?=lang("usr_fill_passwdNew")?></div>
<div id="usr_fill_passwdNewConf" class="hide"><?=lang("usr_fill_passwdNewConf")?></div>
<div id="usr_fill_passwdNewConfDoNotConf" class="hide"><?=lang("usr_fill_passwdNewConfDoNotConf")?></div>


