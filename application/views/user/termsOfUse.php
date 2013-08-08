<h3><?=lang('term_page_title')?></h3>
<?php 

if( isset($user["termsOfUse"]) && $user["termsOfUse"] != "<br>" &&  $user["termsOfUse"] != "" ) echo $user["termsOfUse"];

else {?><p><?=lang('term_notDefined')?> <span class="label label-success"><?=IDENTITY.".".ENVIRONMENT?></span></p><?php } ?>