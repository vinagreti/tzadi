<div class="row-fluid">
	<div class="span24 well well-mini">
		<h4><?=lang("org_paymentMethods")?></h4>

		<?php if( $boleto || $giftcard || $creditcard || $debitcard || $deposit || $cash || $pagseguro || $paypal ) { ?>
		<div class="row-fluid">
			<div class="span24">
				<h5><?=lang("org_InCash")?></h5>
				<div class="row-fluid">
					<?php if($boleto) echo '<div class="span3 text-center"><strong class="font8">' . lang("org_boleto") . '</strong><p><img class="imgSmallMini" src="' . assets_url() . '/img/payment/boleto.jpg"></p></div>';?>
					<?php if($giftcard) echo '<div class="span3 text-center"><strong class="font8">' . lang("org_giftcard") . '</strong><p><img class="imgSmallMini" src="' . assets_url() . '/img/payment/prepayd.jpg"></p></div>';?>
					<?php if($creditcard) echo '<div class="span3 text-center"><strong class="font8">' . lang("org_creditcard") . '</strong><p><img class="imgSmallMini" src="' . assets_url() . '/img/payment/credit.jpg"></p></div>';?>
					<?php if($debitcard) echo '<div class="span3 text-center"><strong class="font8">' . lang("org_debitcard") . '</strong><p><img class="imgSmallMini" src="' . assets_url() . '/img/payment/debit.jpg"></p></div>';?>
					<?php if($deposit) echo '<div class="span3 text-center"><strong class="font8">' . lang("org_deposit") . '</strong><p><img class="imgSmallMini" src="' . assets_url() . '/img/payment/deposito.jpg"></p></div>';?>
					<?php if($cash) echo '<div class="span3 text-center"><strong class="font8">' . lang("org_cash") . '</strong><p><img class="imgSmallMini" src="' . assets_url() . '/img/payment/dinheiro.jpg"></p></div>';?>
					<?php if($pagseguro) echo '<div class="span3 text-center"><strong class="font8">' . lang("org_pagseguro") . '</strong><p><img class="imgSmallMini" src="' . assets_url() . '/img/payment/pagseguro.jpg"></p></div>';?>
					<?php if($paypal) echo '<div class="span3 text-center"><strong class="font8">' . lang("org_paypal") . '</strong><p><img class="imgSmallMini" src="' . assets_url() . '/img/payment/paypal.jpg"></p></div>';?>
				</div>
			</div>
		</div>
		<?php } ?>

		<?php if( $installmentsCreditcard || $installmentsBoleto || $booklet ) { ?>
		<hr>
		<div class="row-fluid">
			<div class="span24">
				<h5><?=lang("org_ByInstallments")?></h5>
				<div class="row-fluid">
					<?php if( $installmentsCreditcard ) echo '<div class="span3 text-center"><strong class="font8">' . lang("org_installmentsCreditcard") . '</strong><p><img class="imgSmallMini" src="' . assets_url() . '/img/payment/credit.jpg"></p></div>';?>
					<?php if( $installmentsBoleto ) echo '<div class="span3 text-center"><strong class="font8">' . lang("org_installmentsBoleto") . '</strong><p><img class="imgSmallMini" src="' . assets_url() . '/img/payment/boleto.jpg"></p></div>';?>
					<?php if( $booklet ) echo '<div class="span3 text-center"><strong class="font8">' . lang("org_booklet") . '</strong><p><img class="imgSmallMini" src="' . assets_url() . '/img/payment/booklet.gif"></p></div>';?>
					<div class="span7">
						<p><strong class="font12"><?=lang("org_until")?> <span class="text-success"><?=$installmentsWithNoInterests?>x</span> <?=lang("org_timesWithNoInterestRate")?></strong></p>
						<p><strong class="font12"><?=lang("org_until")?> <span class="text-success"><?=$installmentsWithInterests?>x</span> <?=lang("org_timesWithInterestRate")?> <span class="text-success"><?=$interests?></span> % <?=lang("org_perMonth")?></strong></p>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>

		<?php if( $installmentsCreditcard && ( $ccAmericanExpress || $ccAura || $ccBNDES || $ccDinersClub || $ccElo || $ccHipercard || $ccMastercard || $ccSorocred || $ccVisa )  ) { ?>
		<hr>
		<div class="row-fluid">
			<div class="span24">
				<h5><?=lang("org_paymentFlag")?></h5>
				<div class="row-fluid">
					<?php if( $ccAmericanExpress ) echo '<div class="span3 text-center"><strong class="font8">' . lang("org_ccAmericanExpress") . '</strong><p><img class="imgSmallMini" src="' . assets_url() . '/img/payment/americanexpress.jpg"></p></div>';?>
					<?php if( $ccAura ) echo '<div class="span3 text-center"><strong class="font8">' . lang("org_ccAura") . '</strong><p><img class="imgSmallMini" src="' . assets_url() . '/img/payment/aura.jpg"></p></div>';?>
					<?php if( $ccBNDES ) echo '<div class="span3 text-center"><strong class="font8">' . lang("org_ccBNDES") . '</strong><p><img class="imgSmallMini" src="' . assets_url() . '/img/payment/bndes.jpg"></p></div>';?>
					<?php if( $ccDinersClub ) echo '<div class="span3 text-center"><strong class="font8">' . lang("org_ccDinersClub") . '</strong><p><img class="imgSmallMini" src="' . assets_url() . '/img/payment/dinersclub.jpg"></p></div>';?>
					<?php if( $ccElo ) echo '<div class="span2 text-center"><strong class="font8">' . lang("org_ccElo") . '</strong><p><img class="imgSmallMini" src="' . assets_url() . '/img/payment/elo.jpg"></p></div>';?>
					<?php if( $ccHipercard ) echo '<div class="span3 text-center"><strong class="font8">' . lang("org_ccHipercard") . '</strong><p><img class="imgSmallMini" src="' . assets_url() . '/img/payment/hipercard.jpg"></p></div>';?>
					<?php if( $ccMastercard ) echo '<div class="span3 text-center"><strong class="font8">' . lang("org_ccMastercard") . '</strong><p><img class="imgSmallMini" src="' . assets_url() . '/img/payment/mastercard.jpg"></p></div>';?>
					<?php if( $ccSorocred ) echo '<div class="span2 text-center"><strong class="font8">' . lang("org_ccSorocred") . '</strong><p><img class="imgSmallMini" src="' . assets_url() . '/img/payment/sorocred.jpg"></p></div>';?>
					<?php if( $ccVisa ) echo '<div class="span2 text-center"><strong class="font8">' . lang("org_ccVisa") . '</strong><p><img class="imgSmallMini" src="' . assets_url() . '/img/payment/visa.jpg"></p></div>';?>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
</div>