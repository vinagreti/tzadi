<div class="row-fluid">
	<div class="span24 tzdTableRow">
		<div class="row-fluid">
			<div class="span12">
				<p><span class="text-warning"><?=lang("mail_from")?>:</span> <?=$mail["from"]?></p>
				<p><span class="text-warning"><?=lang("mail_to")?>:</span> <?=$mail["to"]?></p>
				<p><span class="text-warning"><?=lang("mail_cc")?>:</span> <?php if(isset($mail["cc"])) echo $mail["cc"];?></p>
				<p><span class="text-warning"><?=lang("mail_bcc")?>:</span> <?php if(isset($mail["bcc"])) echo $mail["bcc"];?></p>
			</div>
			<div class="span12">
				<p><span class="text-warning"><?=lang("mail_kind")?>:</span> <?=lang("mail_".$mail["kind"])?></p>
				<p><span class="text-warning"><?=lang("mail_status")?>:</span> <?=$mail["status"]?></p>
				<p><span class="text-warning"><?=lang("mail_queue_date")?>:</span> <?=date( "d/m/Y h:m:i", time($mail["queue_date"]))?></p>
				<p><span class="text-warning"><?=lang("mail_sent_date")?>:</span> <?php if(isset($mail["sent_date"])) echo date( "d/m/Y h:m:i", time($mail["sent_date"])); ?></p>
			</div>
		</div>
	</div>
</div>

<hr>

<h4><p><span class="text-warning"><?=lang("mail_subject")?>:</span> <?=$mail["subject"]?></p></h4>
<hr>

<p><?=$mail["message"]?></p>