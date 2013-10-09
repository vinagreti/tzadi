<h3><?=$customer["name"]?></h3>

<div class="row-fluid">
	<div class="span24 tzdTableRow">
		<div class="row-fluid">
			<div class="span4">
				<p class="text-center"><img class="customerImg imgSmallMedium" src="<?=$customer['img']?>" ></p>
			</div>
			<div class="span7">
				<p><span class="text-warning"><?=lang("tmpt_creationDate")?>:</span> <?php if( isset( $customer["creation"] ) ) echo  date( "d/m/Y h:m", time($customer["creation"]) ); ?></p>
				<p><span class="text-warning"><?=lang("ctm_birth")?>:</span> <?php if( isset( $customer["birth"] ) ) echo  date( "d/m/Y", time($customer["birth"]) ); ?></p>
				<p><span class="text-warning"><?=lang("ctm_email")?>:</span> <?php if( isset( $customer["email"] ) ) echo $customer["email"]; ?></p>
				<p><span class="text-warning"><?=lang("ctm_phone")?>:</span> <?php if( isset( $customer["phone"] ) ) echo $customer["phone"]; ?></p>
				<p><span class="text-warning"><?=lang("ctm_cellphone")?>:</span> <?php if( isset( $customer["cellphone"] ) ) echo $customer["cellphone"]; ?></p>
			</div>
			<div class="span7">
				<p><span class="text-warning"><?=lang("ctm_status")?>:</span> <?= lang("ctm_".$customer["status"]) ?></p>
				<p><span class="text-warning"><?=lang("ctm_address")?>:</span> <?php if( isset( $customer["address"] ) ) echo $customer["address"]; ?></p>
				<p><span class="text-warning"><?=lang("ctm_city")?>:</span> <?php if( isset( $customer["city"] ) ) echo $customer["city"]; ?></p>
				<p><span class="text-warning"><?=lang("ctm_state")?>:</span> <?php if( isset( $customer["state"] ) ) echo $customer["state"]; ?></p>
				<p><span class="text-warning"><?=lang("ctm_country")?>:</span> <?php if( isset( $customer["country"] ) ) echo $customer["country"]; ?></p>
			</div>
			<div class="span6">
				<p><span class="text-warning"><?=lang("ctm_details")?>:</span> <?php if( isset( $customer["details"] ) ) echo $customer["details"]; ?></p>
				<div id="customer_id" class="hide"><?=$customer["_id"]?></div>
			</div>
		</div>
	</div>
</div>

<h3 class="text-center">Timeline <a id="refreshTimeline" class="btn btn-info"><i class="icon-refresh"></i></a></h3>

<div class="text-center">
	<?php if( isset( $customer["email"] ) && $customer["email"] != "" ) { ?>
		<a id="<?=$customer['email']?>" class="sendMessage btn btn-primary"><i class="icon-envelope"></i> <?=lang("ctm_email")?></a>
	<?php } ?>
	<a id="<?=$customer['email']?>" class="addEvent btn btn-success"><i class="icon-plus"></i> <?=lang("ctm_event")?></a>
</div>

<div class="row-fluid hideFromResponsive">
	<div class="span12 text-center">
		<?=lang("tmpt_Agency")?>
	</div>
	<div class="span12 text-center">
		<?=lang("tmpt_Customer")?>
	</div>
</div>

<div class="row-fluid">
	<div class="span24 timeline">

		<div class="row-fluid customerAdd hide">
			<div class="span10 tzdTableRow">
				<div class="row-fluid">
					<div class="span20">
						<p class="text-warning"><?=lang("ctm_created")?></p>
					</div>
					<div class="span4">
						<div class="thumbnail">
							<img class="creatorImg" src="" />
							<a class="creatorLink"><span class="creatorName"></span></a>
						</div>
					</div>
				</div>
			</div>
			<div class="span4 tzdTableRow"><p class="date text-center"></p></div>
		</div>

		<div class="row-fluid created hide">
			<div class="span10 tzdTableRow">
				<div class="row-fluid">
					<div class="span20">
						<p class="text-warning"><?=lang("ctm_created")?></p>
					</div>
					<div class="span4">
						<div class="thumbnail">
							<img class="creatorImg" src="" />
							<a class="creatorLink"><span class="creatorName"></span></a>
						</div>
					</div>
				</div>
			</div>
			<div class="span4 tzdTableRow"><p class="date text-center"></p></div>
		</div>

		<div class="row-fluid autoCreated hide">
			<div class="span10"></div>
			<div class="span4 tzdTableRow"><p class="date text-center"></p></div>
			<div class="span10 tzdTableRow">
				<div class="row-fluid">
					<div class="span4">
						<div class="thumbnail">
							<img class="creatorImg" src="" />
							<a class="creatorLink"><span class="creatorName"></span></a>
						</div>
					</div>
					<div class="span20">
						<p class="text-warning"><?=lang("ctm_createdBySystem")?></p>
					</div>
				</div>
			</div>
		</div>

		<div class="row-fluid contact hide">
			<div class="span10"></div>
			<div class="span4 tzdTableRow"><p class="date text-center"></p></div>
			<div class="span10 tzdTableRow">
				<div class="row-fluid">
					<div class="span4">
						<div class="thumbnail">
							<img class="creatorImg" src="" />
							<a class="creatorLink"><span class="creatorName"></span></a>
						</div>
					</div>
					<div class="span20">
						<p><span class="text-warning"><?=lang("ctm_contact")?></span> <a class="mail_id mail_subject" target="_blank"></a></p>
					</div>
				</div>
			</div>
		</div>

		<div class="row-fluid productShare hide">
			<div class="span10"></div>
			<div class="span4 tzdTableRow"><p class="date text-center"></p></div>
			<div class="span10 tzdTableRow">
				<div class="row-fluid">
					<div class="span4">
						<div class="thumbnail">
							<img class="creatorImg" src="" />
							<a class="creatorLink"><span class="creatorName"></span></a>
						</div>
					</div>
					<div class="span20">
						<p><span class="text-warning"><?=lang("ctm_shareProduct")?></span> <a class="mail_id mail_subject" target="_blank"></a></p>
					</div>
				</div>
			</div>
		</div>

		<div class="row-fluid productShareByStaff hide">
			<div class="span10 tzdTableRow">
				<div class="row-fluid">
					<div class="span20">
						<p><span class="text-warning"><?=lang("ctm_shareProductByStaff")?></span> <a class="mail_id mail_subject" target="_blank"></a></p>
					</div>
					<div class="span4">
						<div class="thumbnail">
							<img class="creatorImg" src="" />
							<a class="creatorLink"><span class="creatorName"></span></a>
						</div>
					</div>
				</div>
			</div>
			<div class="span4 tzdTableRow"><p class="date text-center"></p></div>
		</div>

		 <div class="row-fluid productKnowMore hide">
			<div class="span10"></div>
			<div class="span4 tzdTableRow"><p class="date text-center"></p></div>
			<div class="span10 tzdTableRow">
				<div class="row-fluid">
					<div class="span4">
						<div class="thumbnail">
							<img class="creatorImg" src="" />
							<a class="creatorLink"><span class="creatorName"></span></a>
						</div>
					</div>
					<div class="span20">
						<p><span class="text-warning"><?=lang("ctm_knowMoreProduct")?></span> <a class="mail_id mail_subject" target="_blank"></a></p>
					</div>
				</div>
			</div>
		</div>

		 <div class="row-fluid productKnowMoreByStaff hide">
			<div class="span10 tzdTableRow">
				<div class="row-fluid">
					<div class="span20">
						<p><span class="text-warning"><?=lang("ctm_knowMoreProductByStaff")?></span> <a class="mail_id mail_subject" target="_blank"></a></p>
					</div>
					<div class="span4">
						<div class="thumbnail">
							<img class="creatorImg" src="" />
							<a class="creatorLink"><span class="creatorName"></span></a>
						</div>
					</div>
				</div>
			</div>
			<div class="span4 tzdTableRow"><p class="date text-center"></p></div>
		</div>

		<div class="row-fluid budgetShare hide">
			<div class="span10"></div>
			<div class="span4 tzdTableRow"><p class="date text-center"></p></div>
			<div class="span10 tzdTableRow">
				<div class="row-fluid">
					<div class="span4">
						<div class="thumbnail">
							<img class="creatorImg" src="" />
							<a class="creatorLink"><span class="creatorName"></span></a>
						</div>
					</div>
					<div class="span20">
						<p><span class="text-warning"><?=lang("ctm_shareBudget")?></span> <a class="mail_id mail_subject" target="_blank"></a></p>
					</div>
				</div>
			</div>
		</div>

		<div class="row-fluid budgetShareByStaff hide">
			<div class="span10 tzdTableRow">
				<div class="row-fluid">
					<div class="span20">
						<p><span class="text-warning"><?=lang("ctm_shareBudgetByStaff")?></span> <a class="mail_id mail_subject" target="_blank"></a></p>
					</div>
					<div class="span4">
						<div class="thumbnail">
							<img class="creatorImg" src="" />
							<a class="creatorLink"><span class="creatorName"></span></a>
						</div>
					</div>
				</div>
			</div>
			<div class="span4 tzdTableRow"><p class="date text-center"></p></div>
		</div>

		 <div class="row-fluid budgetKnowMore hide">
			<div class="span10"></div>
			<div class="span4 tzdTableRow"><p class="date text-center"></p></div>
			<div class="span10 tzdTableRow">
				<div class="row-fluid">
					<div class="span4">
						<div class="thumbnail">
							<img class="creatorImg" src="" />
							<a class="creatorLink"><span class="creatorName"></span></a>
						</div>
					</div>
					<div class="span20">
						<p><span class="text-warning"><?=lang("ctm_knowMoreBudget")?></span> <a class="mail_id mail_subject" target="_blank"></a></p>
					</div>
				</div>
			</div>
		</div>

		 <div class="row-fluid budgetKnowMoreByStaff hide">
			<div class="span10 tzdTableRow">
				<div class="row-fluid">
					<div class="span20">
						<p><span class="text-warning"><?=lang("ctm_knowMoreBudgetByStaff")?></span> <a class="mail_id mail_subject" target="_blank"></a></p>
					</div>
					<div class="span4">
						<div class="thumbnail">
							<img class="creatorImg" src="" />
							<a class="creatorLink"><span class="creatorName"></span></a>
						</div>
					</div>
				</div>
			</div>
			<div class="span4 tzdTableRow"><p class="date text-center"></p></div>
		</div>

		<div class="row-fluid replyReceived hide">
			<div class="span10"></div>
			<div class="span4 tzdTableRow"><p class="date text-center"></p></div>
			<div class="span10 tzdTableRow">
				<div class="row-fluid">
					<div class="span4">
						<div class="thumbnail">
							<img class="creatorImg" src="" />
							<a class="creatorLink"><span class="creatorName"></span></a>
						</div>
					</div>
					<div class="span20">
						<p><span class="text-warning"><?=lang("ctm_replyReceived")?></span> <a class="mail_id mail_subject" target="_blank"></a></p>
					</div>
				</div>
			</div>
		</div>

		<div class="row-fluid sentMessage hide">
			<div class="span10 tzdTableRow">
				<div class="row-fluid">
					<div class="span20">
						<p><span class="text-warning"><?=lang("ctm_sentMessage")?></span> <a class="mail_id mail_subject" target="_blank"></a></p>
					</div>
					<div class="span4">
						<div class="thumbnail">
							<img class="creatorImg" src="" />
							<a class="creatorLink"><span class="creatorName"></span></a>
						</div>
					</div>
				</div>
			</div>
			<div class="span4 tzdTableRow"><p class="date text-center"></p></div>
		</div>

		<div class="row-fluid repliedMessage hide">
			<div class="span10 tzdTableRow">
				<div class="row-fluid">
					<div class="span20">
						<p><span class="text-warning"><?=lang("ctm_repliedMessage")?></span> <a class="mail_id mail_subject" target="_blank"></a></p>
					</div>
					<div class="span4">
						<div class="thumbnail">
							<img class="creatorImg" src="" />
							<a class="creatorLink"><span class="creatorName"></span></a>
						</div>
					</div>
				</div>
			</div>
			<div class="span4 tzdTableRow"><p class="date text-center"></p></div>
		</div>

		<div class="row-fluid ownEvent hide">
			<div class="span10 tzdTableRow">
				<div class="row-fluid">
					<div class="span20">
						<p><span class="text-warning eventTitle"></span></p>
						<small><span class="eventDetail"></span></small>
					</div>
					<div class="span4">
						<div class="thumbnail">
							<img class="creatorImg" src="" />
							<a class="creatorLink"><span class="creatorName"></span></a>
						</div>
					</div>
				</div>
			</div>
			<div class="span4 tzdTableRow"><p class="date text-center"></p></div>
		</div>

		 <div class="row-fluid customerEvent hide">
			<div class="span10"></div>
			<div class="span4 tzdTableRow"><p class="date text-center"></p></div>
			<div class="span10 tzdTableRow">
				<div class="row-fluid">
					<div class="span4">
						<div class="thumbnail">
							<img class="creatorImg" src="" />
							<a class="creatorLink"><span class="creatorName"></span></a>
						</div>
					</div>
					<div class="span20">
						<p><span class="text-warning eventTitle"></span></p>
						<small><span class="eventDetail"></span></small>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
