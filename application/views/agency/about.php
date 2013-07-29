<h2><?=lang('abt_page_title')?></h2>
<?php 
	if(isset($about))
		echo "<p>".$about."</p>";

	else 
		echo '<p>Ainda não foram definidas as informações da agência <span class="label label-success">'.SUBDOMAIN.'.'.ENVIRONMENT.'</span></p>';
?>

