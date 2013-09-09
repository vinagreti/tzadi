<div class="row-fluid">
	<div class="span24 tzdTableRow">
		<div class="row-fluid">
			<div class="span12">
				<p>from: <?=$mail["from"]?></p>
				<p>to: <?=$mail["to"]?></p>
				<p>cc: <?php if(isset($mail["cc"])) echo $mail["cc"];?></p>
				<p>bcc: <?php if(isset($mail["bcc"])) echo $mail["bcc"];?></p>
			</div>
			<div class="span12">
				<p>kind: <?=$mail["kind"]?></p>
				<p>status: <?=$mail["status"]?></p>
				<p>queue_date: <?=date( "d/m/Y h:m:i", time($mail["queue_date"]))?></p>
				<p>sent_date: <?php if(isset($mail["sent_date"])) echo date( "d/m/Y h:m:i", time($mail["sent_date"])); ?></p>
			</div>
		</div>
	</div>
</div>

<hr>

<h4><p>subject: <?=$mail["subject"]?></p></h4>
<hr>

<p><?=$mail["message"]?></p>