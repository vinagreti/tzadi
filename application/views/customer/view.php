<h3><?=$customer["name"]?></h3>

<div class="row-fluid">
	<div class="span24 tzdTableRow">
		<div class="row-fluid">
			<div class="span8">
				<p>creation: <?php if( isset( $customer["creation"] ) ) echo  date( "d/m/Y h:m", time($customer["creation"]) ); ?></p>
				<p>birth: <?php if( isset( $customer["birth"] ) ) echo  date( "d/m/Y", time($customer["birth"]) ); ?></p>
				<p>email: <?php if( isset( $customer["email"] ) ) echo $customer["email"]; ?></p>
				<p>phone: <?php if( isset( $customer["phone"] ) ) echo $customer["phone"]; ?></p>
				<p>cellphone: <?php if( isset( $customer["cellphone"] ) ) echo $customer["cellphone"]; ?></p>
			</div>
			<div class="span8">
				<p>status: <?php if( isset( $customer["status"] ) ) echo $customer["status"]; ?></p>
				<p>address: <?php if( isset( $customer["address"] ) ) echo $customer["address"]; ?></p>
				<p>city: <?php if( isset( $customer["city"] ) ) echo $customer["city"]; ?></p>
				<p>state: <?php if( isset( $customer["state"] ) ) echo $customer["state"]; ?></p>
				<p>country: <?php if( isset( $customer["country"] ) ) echo $customer["country"]; ?></p>
			</div>
			<div class="span8">
				<p>details: <?php if( isset( $customer["details"] ) ) echo $customer["details"]; ?></p>
			</div>
		</div>
	</div>
</div>

<h3 class="text-center">Timeline</h3>

<div class="row-fluid hideFromResponsive">
	<div class="span12 text-center">
		Agency
	</div>
	<div class="span12 text-center">
		Customer
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



 
