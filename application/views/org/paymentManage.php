<h3><?=lang("tmpt_ConfigPayment")?></h3>

<div class="row-fluid">
	<div class="span8">
		<h4><?=lang("org_InCash")?></h4>
		<p><label class="checkbox"><input id="boleto" type="checkbox" <?php if($agency["payment"]["boleto"]) echo "checked"; ?> /><?=lang("org_boleto")?> <img class="imgMiniMicro" src="<?=assets_url()?>/img/payment/boleto.jpg"></label></p>
		<p><label class="checkbox"><input id="creditcard" type="checkbox" <?php if($agency["payment"]["creditcard"]) echo "checked"; ?> /><?=lang("org_creditcard")?> <img class="imgMiniMicro" src="<?=assets_url()?>/img/payment/credit.jpg"></label></p>
		<p><label class="checkbox"><input id="giftcard" type="checkbox" <?php if($agency["payment"]["giftcard"]) echo "checked"; ?> /><?=lang("org_giftcard")?> <img class="imgMiniMicro" src="<?=assets_url()?>/img/payment/prepayd.jpg"></label></p>
		<p><label class="checkbox"><input id="debitcard" type="checkbox" <?php if($agency["payment"]["debitcard"]) echo "checked"; ?> /><?=lang("org_debitcard")?> <img class="imgMiniMicro" src="<?=assets_url()?>/img/payment/debit.jpg"></label></p>
		<p><label class="checkbox"><input id="deposit" type="checkbox" <?php if($agency["payment"]["deposit"]) echo "checked"; ?> /><?=lang("org_deposit")?> <img class="imgMiniMicro" src="<?=assets_url()?>/img/payment/deposito.jpg"></label></p>
		<p><label class="checkbox"><input id="cash" type="checkbox" <?php if($agency["payment"]["cash"]) echo "checked"; ?> /><?=lang("org_cash")?> <img class="imgMiniMicro" src="<?=assets_url()?>/img/payment/dinheiro.jpg"></label></p>
		<p><label class="checkbox"><input id="pagseguro" type="checkbox" <?php if($agency["payment"]["pagseguro"]) echo "checked"; ?> /><?=lang("org_pagseguro")?> <img class="imgMiniMicro" src="<?=assets_url()?>/img/payment/pagseguro.jpg"></label></p>
		<p><label class="checkbox"><input id="paypal" type="checkbox" <?php if($agency["payment"]["paypal"]) echo "checked"; ?> /><?=lang("org_paypal")?> <img class="imgMiniMicro" src="<?=assets_url()?>/img/payment/paypal.jpg"></label></p>
	</div>
	<div class="span8">
		<h4><?=lang("org_ByInstallments")?></h4>
		<p><?=lang("org_until")?> <input id="installmentsWithNoInterests" class="span3" type="text" value="<?=$agency["payment"]["installmentsWithNoInterests"]?>" /> <?=lang("org_timesWithNoInterestRate")?></p>
		<p><?=lang("org_until")?> <input id="installmentsWithInterests" class="span3" type="text" value="<?=$agency["payment"]["installmentsWithInterests"]?>" /> <?=lang("org_timesWithInterestRate")?> <input id="interests" class="span3" type="text" value="<?=$agency["payment"]["interests"]?>" /> % <?=lang("org_perMonth")?></p>
		<p><label class="checkbox"><input id="installmentsBoleto" type="checkbox" <?php if($agency["payment"]["installmentsBoleto"]) echo "checked"; ?> /><?=lang("org_installmentsBoleto")?> <img class="imgMiniMicro" src="<?=assets_url()?>/img/payment/boleto.jpg"></label></p>
		<p><label class="checkbox"><input id="booklet" type="checkbox" <?php if($agency["payment"]["booklet"]) echo "checked"; ?> /><?=lang("org_booklet")?> <img class="imgMiniMicro" src="<?=assets_url()?>/img/payment/booklet.gif"></label></p>
		<p><label class="checkbox"><input id="installmentsCreditcard" type="checkbox" <?php if($agency["payment"]["installmentsCreditcard"]) echo "checked"; ?> /><?=lang("org_installmentsCreditcard")?> <img class="imgMiniMicro" src="<?=assets_url()?>/img/payment/credit.jpg"></label></p>
	</div>
	<div class="span8">
		<h4><?=lang("org_paymentFlag")?></h4>
		<p><label class="checkbox"><input id="ccAmericanExpress" type="checkbox" <?php if($agency["payment"]["ccAmericanExpress"]) echo "checked"; ?> /><?=lang("org_ccAmericanExpress")?> <img class="imgMiniMicro" src="<?=assets_url()?>/img/payment/americanexpress.jpg"></label></p>
		<p><label class="checkbox"><input id="ccAura" type="checkbox" <?php if($agency["payment"]["ccAura"]) echo "checked"; ?> /><?=lang("org_ccAura")?> <img class="imgMiniMicro" src="<?=assets_url()?>/img/payment/aura.jpg"></label></p>
		<p><label class="checkbox"><input id="ccBNDES" type="checkbox" <?php if($agency["payment"]["ccBNDES"]) echo "checked"; ?> /><?=lang("org_ccBNDES")?> <img class="imgMiniMicro" src="<?=assets_url()?>/img/payment/bndes.jpg"></label></p>
		<p><label class="checkbox"><input id="ccDinersClub" type="checkbox" <?php if($agency["payment"]["ccDinersClub"]) echo "checked"; ?> /><?=lang("org_ccDinersClub")?> <img class="imgMiniMicro" src="<?=assets_url()?>/img/payment/dinersclub.jpg"></label></p>
		<p><label class="checkbox"><input id="ccElo" type="checkbox" <?php if($agency["payment"]["ccElo"]) echo "checked"; ?> /><?=lang("org_ccElo")?> <img class="imgMiniMicro" src="<?=assets_url()?>/img/payment/elo.jpg"></label></p>
		<p><label class="checkbox"><input id="ccHipercard" type="checkbox" <?php if($agency["payment"]["ccHipercard"]) echo "checked"; ?> /><?=lang("org_ccHipercard")?> <img class="imgMiniMicro" src="<?=assets_url()?>/img/payment/hipercard.jpg"></label></p>
		<p><label class="checkbox"><input id="ccMastercard" type="checkbox" <?php if($agency["payment"]["ccMastercard"]) echo "checked"; ?> /><?=lang("org_ccMastercard")?> <img class="imgMiniMicro" src="<?=assets_url()?>/img/payment/mastercard.jpg"></label></p>
		<p><label class="checkbox"><input id="ccSorocred" type="checkbox" <?php if($agency["payment"]["ccSorocred"]) echo "checked"; ?> /><?=lang("org_ccSorocred")?> <img class="imgMiniMicro" src="<?=assets_url()?>/img/payment/sorocred.jpg"></label></p>
		<p><label class="checkbox"><input id="ccVisa" type="checkbox" <?php if($agency["payment"]["ccVisa"]) echo "checked"; ?> /><?=lang("org_ccVisa")?> <img class="imgMiniMicro" src="<?=assets_url()?>/img/payment/visa.jpg"></label></p>
	</div>
</div>

<a class="put btn btn-primary">Save</a>