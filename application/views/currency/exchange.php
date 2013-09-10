<h3><?=lang("crc_changeExchangeRate")?></h3>

<div class="row-fluid">
	<div class="span24 form-inline">

		<?=lang("crc_exchangeFeesByEURO")?> <input id="value" type="text" value="<?=$exchangeRate['value']?>" class="span2"/>

		<select id="kind" class="span5" rel="tooltip" title="<?=lang('crc_changeCurrency')?>">
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

		<a id="exchange" class="btn">definir</a>

	</div>

</div>

<br>

<div class="row-fluid">

	<div class="span10">

		<?php foreach($currency as $key => $val) {
			if($key != "day" && $key != "_id") {

				$exchanged = number_format($profileCurrency[$key],4);

				$val = number_format($val,4); ?>

				<p style="border-bottom: 1px solid;">

					<strong class='text-warning'><?=$key?></strong>

					<b class="text-success">&nbsp;&nbsp;&nbsp;<?=lang("crc_todayRateBuy")?>:</b> <?=$val?>

					<b class="text-success">&nbsp;&nbsp;&nbsp;<?=lang("crc_todayRateSell")?>:</b> <?=$exchanged?>

				</p>
				
			<?php }
		}?>
	</div>
</div>

<div id="crc_pleaseFillKinAndValue" class="hide"><?=lang("crc_pleaseFillKinAndValue")?></div>