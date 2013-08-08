<h3><?=lang('abt_page_title')?></h3>
<?php

	if(isset($user["about"]) && $user["about"] != "<br>" &&  $user["about"] != "" )
		echo "<p>".$user["about"]."</p>";

	else 
		echo '<p>Ainda não foram definidas as informações de <span class="label label-success">'.IDENTITY.'.'.ENVIRONMENT.'</span></p>';
?>

