<h3><?=lang("ctc_todayRate")?> <?=$currency["day"]?></h3>

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
