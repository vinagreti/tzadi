<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<h3><?=lang("crc_todayRate")?> <?=$currency["day"]?></h3>

<table class="table table-bordered table-hover table-striped table-condensed">
	<thead>
		<tr>
			<th>Moeda</th>
			<th>Valor</th>
		</tr>
	</thead>
	<tbody>
		<?php $i = 0; foreach($currency as $key => $val) {
			if($key != "day" && $key != "_id") {
				$val = number_format($val,4);
				echo "<tr><td><strong class='text-warning'>$key</strong></td><td>$val</td></tr>";
				$i++;
			}
		}?>
	</tbody>
</table>
