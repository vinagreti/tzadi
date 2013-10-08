<span class="pull-right">
    <a class="btn btn-small" href="<?=base_url()?>vitrineIframe"><?=lang("tmpt_Products")?></a>
    <a class="btn btn-small" href="<?=base_url()?>budgetIframe"><i class="icon-flag"></i> <?=lang('tmpt_Budget')?> <span class="label label-warning budgetTotal"></span></a>
    <a class="changeCurrency btn btn-small" rel="tooltip" title="<?=lang("tmpt_select_currency")?>"><span class="currencyCode"></span> <i class="icon-caret-down"></i></a>
    <a class="btn btn-small" href="<?=base_url()?>currencyIframe"><?=lang("tmpt_todayRates")?></a>
</span>

<h3><?=lang("crc_todayRate")?> <?=$currency["day"]?></h3>

<div class="row-fluid">
	<div class="span4">
		<?php $i = 0; foreach($currency as $key => $val) {
			if($key != "day" && $key != "_id") {
				$val = number_format($val,4);
				if($i %6 == 0 && $i != 0) echo '</div><div class="span4">';
				echo "<p><strong class='text-warning'>$key</strong>: $val</p>";
				$i++;
			}
		}?>
	</div>
</div>
