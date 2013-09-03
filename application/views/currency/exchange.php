<h3><?=lang("crc_changeExchangeRate")?></h3>

<div class="row-fluid">
	<div class="span10">

		<?php foreach($currency as $key => $val) {
			if($key != "day" && $key != "_id") {

				$exchanged = number_format($profileCurrency[$key],4);

				$val = number_format($val,4); ?>

				<p style="border-bottom: 1px solid;">

					<strong class='text-warning'><?=$key?></strong>

					<b class="text-success"><?=lang("crc_todayRateBuy")?>:</b> <?=$val?>

					<b class="text-success"><?=lang("crc_todayRateSell")?>:</b> <?=$exchanged?>

				</p>
				
			<?php }
		}?>
	</div>
</div>



