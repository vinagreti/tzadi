<h3><?=lang("crc_changeExchangeRate")?></h3>

<div class="row-fluid">
	<div class="span24 form-inline">

		<?=lang("crc_exchangeFeesByEURO")?> <input id="value" name="value" type="number" class="input-mini" maxlength="3" value="<?=$exchangeRate['value']?>" />

		<select id="kind" name="kind" class="input-medium" rel="tooltip" title="<?=lang('crc_changeCurrency')?>">
			<option value="<?=$exchangeRate['kind']?>"><?=lang("crc_".$exchangeRate['kind'])?></option>
			<option value="percent"><?=lang("crc_percent")?></option>
			<option value="AUD"><?=lang("crc_AUD")?></option>
			<option value="BGN"><?=lang("crc_BGN")?></option>
			<option value="BRL"><?=lang("crc_BRL")?></option>
			<option value="CAD"><?=lang("crc_CAD")?></option>
			<option value="CHF"><?=lang("crc_CHF")?></option>
			<option value="CNY"><?=lang("crc_CNY")?></option>
			<option value="CZK"><?=lang("crc_CZK")?></option>
			<option value="DKK"><?=lang("crc_DKK")?></option>
			<option value="EUR"><?=lang("crc_EUR")?></option>
			<option value="GBP"><?=lang("crc_GBP")?></option>
			<option value="HKD"><?=lang("crc_HKD")?></option>
			<option value="HRK"><?=lang("crc_HRK")?></option>
			<option value="HUF"><?=lang("crc_HUF")?></option>
			<option value="IDR"><?=lang("crc_IDR")?></option>
			<option value="ILS"><?=lang("crc_ILS")?></option>
			<option value="INR"><?=lang("crc_INR")?></option>
			<option value="JPY"><?=lang("crc_JPY")?></option>
			<option value="KRW"><?=lang("crc_KRW")?></option>
			<option value="LTL"><?=lang("crc_LTL")?></option>
			<option value="LVL"><?=lang("crc_LVL")?></option>
			<option value="MXN"><?=lang("crc_MXN")?></option>
			<option value="MYR"><?=lang("crc_MYR")?></option>
			<option value="NOK"><?=lang("crc_NOK")?></option>
			<option value="NZD"><?=lang("crc_NZD")?></option>
			<option value="PHP"><?=lang("crc_PHP")?></option>
			<option value="PLN"><?=lang("crc_PLN")?></option>
			<option value="RON"><?=lang("crc_RON")?></option>
			<option value="RUB"><?=lang("crc_RUB")?></option>
			<option value="SEK"><?=lang("crc_SEK")?></option>
			<option value="SGD"><?=lang("crc_SGD")?></option>
			<option value="THB"><?=lang("crc_THB")?></option>
			<option value="TRY"><?=lang("crc_TRY")?></option>
			<option value="USD"><?=lang("crc_USD")?></option>
			<option value="ZAR"><?=lang("crc_ZAR")?></option>
		</select>

		<a id="exchange" class="btn btn-primary">definir</a>

	</div>

</div>

<br>

<div id="demo">
	<table class="tablesorter">
		<thead>
			<tr>
				<th class="text-success"><?=lang("crc_currency")?></th>
				<th class="text-success"><?=lang("crc_buyPrice")?></th>
				<th class="text-success"><?=lang("crc_sellPrice")?></th>
				<th class="text-success"><?=lang("crc_difference")?></th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th class="text-success"><?=lang("crc_currency")?></th>
				<th class="text-success"><?=lang("crc_buyPrice")?></th>
				<th class="text-success"><?=lang("crc_sellPrice")?></th>
				<th class="text-success"><?=lang("crc_difference")?></th>
			</tr>
			<tr>
				<th colspan="7" class="ts-pager form-horizontal">
					<div class="text-center">
						<button type="button" class="btn first"><i class="icon-step-backward glyphicon glyphicon-step-backward"></i></button>
						<button type="button" class="btn prev"><i class="icon-arrow-left glyphicon glyphicon-backward"></i></button>
						<span class="pagedisplay"></span> <!-- this can be any element, including an input -->
						<button type="button" class="btn next"><i class="icon-arrow-right glyphicon glyphicon-forward"></i></button>
						<button type="button" class="btn last"><i class="icon-step-forward glyphicon glyphicon-step-forward"></i></button>
						<select class="pagesize input-mini" title="Select page size">
							<option selected="selected" value="10">10</option>
							<option value="20">20</option>
							<option value="30">30</option>
							<option value="40">40</option>
						</select>
						<select class="pagenum input-mini" title="Select page number"></select>
					</div>
				</th>
			</tr>
		</tfoot>
		<tbody>
		<?php foreach($currency as $key => $val) {
			if($key != "day" && $key != "_id") {

				$exchanged = number_format($profileCurrency[$key],4);

				$val = number_format($val,4); ?>

				<tr>

					<td class="text-warning"><b><?=lang("crc_".$key)?></b></td>

					<td><?=$val?></td>

					<td><?=$exchanged?></td>

					<td><?=($exchanged - $val)?></td>

				</tr>
				
			<?php }
		}?>
		</tbody>
	</table>
</div>

<div id="crc_pleaseFillKinAndValue" class="hide"><?=lang("crc_pleaseFillKinAndValue")?></div>