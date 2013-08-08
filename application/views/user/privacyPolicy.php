<h3><?=lang('pvc_page_title')?></h3>
<?php 

if( isset($user["privacyPolicy"]) && $user["privacyPolicy"] != "<br>" &&  $user["privacyPolicy"] != "" ) echo $user["privacyPolicy"];

else {?><p><?=lang('pvc_notDefined')?> <span class="label label-success"><?=IDENTITY.".".ENVIRONMENT?></span></p><?php } ?>