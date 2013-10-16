<h1><?=lang("clb_Helo")?> <?=$name?>,</h1>
<p><?=lang("clb_YouWereRegistered")?> <strong><?=$this->session->userdata("org_name")?></strong> <?=lang("clb_as")?> <strong><?=lang("clb_".$org_resp)?></strong></p>
<p><?=lang("clb_ToAccessPrivateArea")?> <?= tzd_url().lang("rt_login") ?> <?=lang("clb_andUseThisCredential")?>:</p>
<p><?=lang("clb_Email")?> = <?=$email?></p>
<p><?=lang("clb_Password")?> = <?=$password?> </p>
<p><small><?=lang("clb_ChangePasswdTip")?></small></p>