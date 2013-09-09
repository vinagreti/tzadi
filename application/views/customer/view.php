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
				<div id="customer_id" class="hide"><?=$customer["_id"]?></div>
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
	<div class="span24 timeline">

		<div class="row-fluid customerAdd hide">
			<div class="offset12 span12 tzdTableRow">
				<p class="date"></p>
				<p><?=lang("ctm_created")?></p>
			</div>
		</div>

		<div class="row-fluid system hide">
			<div class="span12 tzdTableRow">
				<p class="date"></p>
				<p><?=lang("ctm_createdBySystem")?></p>
			</div>
		</div>

		<div class="row-fluid contact hide">
			<div class="span12 offset12 tzdTableRow">
				<p class="date"></p>
				<p><a class="mail_id"><?=lang("ctm_contact")?></a></p>
			</div>
		</div>

		<div class="row-fluid productShare hide">
			<div class="span12 offset12 tzdTableRow">
				<p class="date"></p>
				<p><a class="mail_id"><?=lang("ctm_shareProduct")?></a></p>
			</div>
		</div>

		 <div class="row-fluid productKnowMore hide">
			<div class="span12 offset12 tzdTableRow">
				<p class="date"></p>
				<p><a class="mail_id"><?=lang("ctm_knowMoreProduct")?></a></p>
			</div>
		</div>
	</div>
</div>