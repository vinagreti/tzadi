<h3><?=$customer["name"]?></h3>

<div class="row-fluid">
	<div class="span24 tzdTableRow">
		<div class="row-fluid">
			<div class="span8">
				<p>creation: <?= date( "d/m/Y h:m", time($customer["creation"]) ) ?></p>
				<p>birth: <?= date( "d/m/Y", time($customer["birth"]) ) ?></p>
				<p>email: <?=$customer["email"]?></p>
				<p>phone: <?=$customer["phone"]?></p>
				<p>cellphone: <?=$customer["cellphone"]?></p>
			</div>
			<div class="span8">
				<p>status: <?=$customer["status"]?></p>
				<p>address: <?=$customer["address"]?></p>
				<p>city: <?=$customer["city"]?></p>
				<p>state: <?=$customer["state"]?></p>
				<p>country: <?=$customer["country"]?></p>
			</div>
			<div class="span8">
				<p>details: <?=$customer["details"]?></p>
			</div>
		</div>
	</div>
</div>

<h3 class="text-center">Timeline</h3>

<div class="row-fluid">
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
		<p><a href="<?=base_url()."email/".$customer["timeline"][0]["_id"];?>">dd</a></p>
	</div>
</div>

<div class="row-fluid">
	<div class="span12 offset12 tzdTableRow">
		<p><?=$customer["timeline"][1]["action"]["kind"];?></p>
		<p><a href="<?=base_url()?>email/<?=$customer["timeline"][1]["_id"];?>">dd</a></p>
	</div>
</div>



 
