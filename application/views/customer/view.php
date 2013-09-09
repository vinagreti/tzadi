<h3><?=$customer["name"]?></h3>

<div class="row-fluid">
	<div class="span24 tzdTableRow">
		<div class="row-fluid">
			<div class="span8">
				<p><span class="text-warning"><?=lang("tmpt_creationDate")?>:</span> <?php if( isset( $customer["creation"] ) ) echo  date( "d/m/Y h:m", time($customer["creation"]) ); ?></p>
				<p><span class="text-warning"><?=lang("ctm_birth")?>:</span> <?php if( isset( $customer["birth"] ) ) echo  date( "d/m/Y", time($customer["birth"]) ); ?></p>
				<p><span class="text-warning"><?=lang("ctm_email")?>:</span> <?php if( isset( $customer["email"] ) ) echo $customer["email"]; ?></p>
				<p><span class="text-warning"><?=lang("ctm_phone")?>:</span> <?php if( isset( $customer["phone"] ) ) echo $customer["phone"]; ?></p>
				<p><span class="text-warning"><?=lang("ctm_cellphone")?>:</span> <?php if( isset( $customer["cellphone"] ) ) echo $customer["cellphone"]; ?></p>
			</div>
			<div class="span8">
				<p><span class="text-warning"><?=lang("ctm_status")?>:</span> <?= lang("ctm_".$customer["status"]) ?></p>
				<p><span class="text-warning"><?=lang("ctm_address")?>:</span> <?php if( isset( $customer["address"] ) ) echo $customer["address"]; ?></p>
				<p><span class="text-warning"><?=lang("ctm_city")?>:</span> <?php if( isset( $customer["city"] ) ) echo $customer["city"]; ?></p>
				<p><span class="text-warning"><?=lang("ctm_state")?>:</span> <?php if( isset( $customer["state"] ) ) echo $customer["state"]; ?></p>
				<p><span class="text-warning"><?=lang("ctm_country")?>:</span> <?php if( isset( $customer["country"] ) ) echo $customer["country"]; ?></p>
			</div>
			<div class="span8">
				<p><span class="text-warning"><?=lang("ctm_details")?>:</span> <?php if( isset( $customer["details"] ) ) echo $customer["details"]; ?></p>
			</div>
		</div>
	</div>
</div>

<h3 class="text-center">Timeline</h3>

<div class="row-fluid hideFromResponsive">
	<div class="span12 text-center">
		<?=lang("tmpt_Agency")?>
	</div>
	<div class="span12 text-center">
		<?=lang("tmpt_Customer")?>
	</div>
</div>

<div class="row-fluid">
	<div class="span12 offset12 tzdTableRow">
		<p><?=$customer["timeline"][0]["action"]["kind"];?></p>
		<p><a href="<?=base_url()."email/".$customer["timeline"][0]["mail_id"];?>">dd</a></p>
	</div>
</div>

<div class="row-fluid">
	<div class="span12 offset12 tzdTableRow">
		<p><?=$customer["timeline"][1]["action"]["kind"];?></p>
		<p><a href="<?=base_url()?>email/<?=$customer["timeline"][1]["mail_id"];?>">dd</a></p>
	</div>
</div>



 
