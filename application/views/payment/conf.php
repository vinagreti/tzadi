<h3><?=lang("tmpt_ConfigPayment")?></h3>

<div class="row-fluid">
	<div class="span8">
		<h4><?=lang("pay_InCash")?></h4>
		<p><label class="checkbox"><input id="boleto" type="checkbox" <?php if($payment["boleto"]) echo "checked"; ?> /><?=lang("pay_boleto")?> <img class="imgMiniMicro" src="<?=assets_url()?>/img/payment/boleto.jpg"></label></p>
		<p><label class="checkbox"><input id="creditcard" type="checkbox" <?php if($payment["creditcard"]) echo "checked"; ?> /><?=lang("pay_creditcard")?> <img class="imgMiniMicro" src="<?=assets_url()?>/img/payment/credit.jpg"></label></p>
		<p><label class="checkbox"><input id="giftcard" type="checkbox" <?php if($payment["giftcard"]) echo "checked"; ?> /><?=lang("pay_giftcard")?> <img class="imgMiniMicro" src="<?=assets_url()?>/img/payment/prepayd.jpg"></label></p>
		<p><label class="checkbox"><input id="debitcard" type="checkbox" <?php if($payment["debitcard"]) echo "checked"; ?> /><?=lang("pay_debitcard")?> <img class="imgMiniMicro" src="<?=assets_url()?>/img/payment/debit.jpg"></label></p>
		<p><label class="checkbox"><input id="deposit" type="checkbox" <?php if($payment["deposit"]) echo "checked"; ?> /><?=lang("pay_deposit")?> <img class="imgMiniMicro" src="<?=assets_url()?>/img/payment/deposito.jpg"></label></p>
		<p><label class="checkbox"><input id="cash" type="checkbox" <?php if($payment["cash"]) echo "checked"; ?> /><?=lang("pay_cash")?> <img class="imgMiniMicro" src="<?=assets_url()?>/img/payment/dinheiro.jpg"></label></p>
		<p><label class="checkbox"><input id="pagseguro" type="checkbox" <?php if($payment["pagseguro"]) echo "checked"; ?> /><?=lang("pay_pagseguro")?> <img class="imgMiniMicro" src="<?=assets_url()?>/img/payment/pagseguro.jpg"></label></p>
		<p><label class="checkbox"><input id="paypal" type="checkbox" <?php if($payment["paypal"]) echo "checked"; ?> /><?=lang("pay_paypal")?> <img class="imgMiniMicro" src="<?=assets_url()?>/img/payment/paypal.jpg"></label></p>
	</div>
	<div class="span8">
		<h4><?=lang("pay_ByInstallments")?></h4>
		<p><?=lang("pay_until")?> <input id="installmentsWithNoInterests" class="span3" type="text" value="<?=$payment["installmentsWithNoInterests"]?>" /> <?=lang("pay_timesWithNoInterestRate")?></p>
		<p><?=lang("pay_until")?> <input id="installmentsWithInterests" class="span3" type="text" value="<?=$payment["installmentsWithInterests"]?>" /> <?=lang("pay_timesWithInterestRate")?> <input id="interests" class="span3" type="text" value="<?=$payment["interests"]?>" /> % <?=lang("pay_perMonth")?></p>
		<p><label class="checkbox"><input id="installmentsBoleto" type="checkbox" <?php if($payment["installmentsBoleto"]) echo "checked"; ?> /><?=lang("pay_installmentsBoleto")?> <img class="imgMiniMicro" src="<?=assets_url()?>/img/payment/boleto.jpg"></label></p>
		<p><label class="checkbox"><input id="booklet" type="checkbox" <?php if($payment["booklet"]) echo "checked"; ?> /><?=lang("pay_booklet")?> <img class="imgMiniMicro" src="<?=assets_url()?>/img/payment/booklet.gif"></label></p>
		<p><label class="checkbox"><input id="installmentsCreditcard" type="checkbox" <?php if($payment["installmentsCreditcard"]) echo "checked"; ?> /><?=lang("pay_installmentsCreditcard")?> <img class="imgMiniMicro" src="<?=assets_url()?>/img/payment/credit.jpg"></label></p>
	</div>
	<div class="span8">
		<h4><?=lang("pay_paymentFlag")?></h4>
		<p><label class="checkbox"><input id="ccAmericanExpress" type="checkbox" <?php if($payment["ccAmericanExpress"]) echo "checked"; ?> /><?=lang("pay_ccAmericanExpress")?> <img class="imgMiniMicro" src="<?=assets_url()?>/img/payment/americanexpress.jpg"></label></p>
		<p><label class="checkbox"><input id="ccAura" type="checkbox" <?php if($payment["ccAura"]) echo "checked"; ?> /><?=lang("pay_ccAura")?> <img class="imgMiniMicro" src="<?=assets_url()?>/img/payment/aura.jpg"></label></p>
		<p><label class="checkbox"><input id="ccBNDES" type="checkbox" <?php if($payment["ccBNDES"]) echo "checked"; ?> /><?=lang("pay_ccBNDES")?> <img class="imgMiniMicro" src="<?=assets_url()?>/img/payment/bndes.jpg"></label></p>
		<p><label class="checkbox"><input id="ccDinersClub" type="checkbox" <?php if($payment["ccDinersClub"]) echo "checked"; ?> /><?=lang("pay_ccDinersClub")?> <img class="imgMiniMicro" src="<?=assets_url()?>/img/payment/dinersclub.jpg"></label></p>
		<p><label class="checkbox"><input id="ccElo" type="checkbox" <?php if($payment["ccElo"]) echo "checked"; ?> /><?=lang("pay_ccElo")?> <img class="imgMiniMicro" src="<?=assets_url()?>/img/payment/elo.jpg"></label></p>
		<p><label class="checkbox"><input id="ccHipercard" type="checkbox" <?php if($payment["ccHipercard"]) echo "checked"; ?> /><?=lang("pay_ccHipercard")?> <img class="imgMiniMicro" src="<?=assets_url()?>/img/payment/hipercard.jpg"></label></p>
		<p><label class="checkbox"><input id="ccMastercard" type="checkbox" <?php if($payment["ccMastercard"]) echo "checked"; ?> /><?=lang("pay_ccMastercard")?> <img class="imgMiniMicro" src="<?=assets_url()?>/img/payment/mastercard.jpg"></label></p>
		<p><label class="checkbox"><input id="ccSorocred" type="checkbox" <?php if($payment["ccSorocred"]) echo "checked"; ?> /><?=lang("pay_ccSorocred")?> <img class="imgMiniMicro" src="<?=assets_url()?>/img/payment/sorocred.jpg"></label></p>
		<p><label class="checkbox"><input id="ccVisa" type="checkbox" <?php if($payment["ccVisa"]) echo "checked"; ?> /><?=lang("pay_ccVisa")?> <img class="imgMiniMicro" src="<?=assets_url()?>/img/payment/visa.jpg"></label></p>
	</div>
</div>

<a class="put btn btn-primary"><?=lang("tmpt_Save")?></a>