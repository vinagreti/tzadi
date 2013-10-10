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
	<a id="<?=$customer['email']?>" class="addEvent btn btn-success"><i class="icon-plus"></i> <?=lang("ctm_addEvent")?></a>
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
					<div class="span4">
						<div class="thumbnail">
							<img class="creatorImg" src="" style="max-height:50px;"/>
						</div>
					</div>
					<div class="span20">
						<strong><a class="creatorLink"><span class="creatorName"></span></a></strong>
						<small><span class="text-warning"><?=lang("ctm_createdTheCustomer")?></span></small>
					</div>
				</div>
			</div>
			<div class="span4 tzdTableRow"><p class="date text-center"></p></div>
		</div>

		<div class="row-fluid created hide">
			<div class="span10 tzdTableRow">
				<div class="row-fluid">
					<div class="span4">
						<div class="thumbnail">
							<img class="creatorImg" src="" style="max-height:50px;"/>
						</div>
					</div>
					<div class="span20">
						<strong><a class="creatorLink"><span class="creatorName"></span></a></strong>
						<small><span class="text-warning"><?=lang("ctm_autoCreated")?></span></small>
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
							<img class="creatorImg" src="" style="max-height:50px;"/>
						</div>
					</div>
					<div class="span20">
						<strong><a class="creatorLink"><span class="creatorName"></span></a></strong>
						<small><span class="text-warning"><?=lang("ctm_autoCreated")?></span></small>
						<p><small><?=lang("ctm_autoCreatedTip")?></small></p>
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
							<img class="creatorImg" src="" style="max-height:50px;"/>
						</div>
					</div>
					<div class="span20">
						<strong><a class="creatorLink"><span class="creatorName"></span></a></strong>
						<small><span class="text-warning"><?=lang("ctm_contact")?></span></small>
						<p><small><a class="mail_id mail_subject" target="_blank"></a></small></p>
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
							<img class="creatorImg" src="" style="max-height:50px;"/>
						</div>
					</div>
					<div class="span20">
						<strong><a class="creatorLink"><span class="creatorName"></span></a></strong>
						<small><span class="text-warning"><?=lang("ctm_shareProduct")?></span></small>
						<p><small><a class="mail_id mail_subject" target="_blank"></a></small></p>
					</div>
				</div>
			</div>
		</div>

		<div class="row-fluid productShareByStaff hide">
			<div class="span10 tzdTableRow">
				<div class="row-fluid">
					<div class="span4">
						<div class="thumbnail">
							<img class="creatorImg" src="" style="max-height:50px;"/>
						</div>
					</div>
					<div class="span20">
						<strong><a class="creatorLink"><span class="creatorName"></span></a></strong>
						<small><span class="text-warning"><?=lang("ctm_shareProductByStaff")?></span></small>
						<p><small><a class="mail_id mail_subject" target="_blank"></a></small></p>
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
							<img class="creatorImg" src="" style="max-height:50px;"/>
						</div>
					</div>
					<div class="span20">
						<strong><a class="creatorLink"><span class="creatorName"></span></a></strong>
						<small><span class="text-warning"><?=lang("ctm_knowMoreProduct")?></span></small>
						<p><small><a class="mail_id mail_subject" target="_blank"></a></small>
					</div>
				</div>
			</div>
		</div>

		<div class="row-fluid budgetShare hide">
			<div class="span10"></div>
			<div class="span4 tzdTableRow"><p class="date text-center"></p></div>
			<div class="span10 tzdTableRow">
				<div class="row-fluid">
					<div class="span4">
						<div class="thumbnail">
							<img class="creatorImg" src="" style="max-height:50px;"/>
						</div>
					</div>
					<div class="span20">
						<strong><a class="creatorLink"><span class="creatorName"></span></a></strong>
						<small><span class="text-warning"><?=lang("ctm_shareBudget")?></span></small>
						<p><small><a class="mail_id mail_subject" target="_blank"></a></small>
					</div>
				</div>
			</div>
		</div>

		<div class="row-fluid budgetShareByStaff hide">
			<div class="span10 tzdTableRow">
				<div class="row-fluid">
					<div class="span4">
						<div class="thumbnail">
							<img class="creatorImg" src="" style="max-height:50px;"/>
						</div>
					</div>
					<div class="span20">
						<strong><a class="creatorLink"><span class="creatorName"></span></a></strong>
						<small><span class="text-warning"><?=lang("ctm_shareBudgetByStaff")?></span></small>
						<p><small><a class="mail_id mail_subject" target="_blank"></a></small>
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
							<img class="creatorImg" src="" style="max-height:50px;"/>
						</div>
					</div>
					<div class="span20">
						<strong><a class="creatorLink"><span class="creatorName"></span></a></strong>
						<small><span class="text-warning"><?=lang("ctm_knowMoreBudget")?></span></small>
						<p><small><a class="mail_id mail_subject" target="_blank"></a></small>
					</div>
				</div>
			</div>
		</div>

		<div class="row-fluid replyReceived hide">
			<div class="span10"></div>
			<div class="span4 tzdTableRow"><p class="date text-center"></p></div>
			<div class="span10 tzdTableRow">
				<div class="row-fluid">
					<div class="span4">
						<div class="thumbnail">
							<img class="creatorImg" src="" style="max-height:50px;"/>
						</div>
					</div>
					<div class="span20">
						<strong><a class="creatorLink"><span class="creatorName"></span></a></strong>
						<small><span class="text-warning"><?=lang("ctm_replyReceived")?></span></small>
						<p><small><a class="mail_id mail_subject" target="_blank"></a></small>
					</div>
				</div>
			</div>
		</div>

		<div class="row-fluid sentMessage hide">
			<div class="span10 tzdTableRow">
				<div class="row-fluid">
					<div class="span4">
						<div class="thumbnail">
							<img class="creatorImg" src="" style="max-height:50px;"/>
						</div>
					</div>
					<div class="span20">
						<strong><a class="creatorLink"><span class="creatorName"></span></a></strong>
						<small><span class="text-warning"><?=lang("ctm_sentMessage")?></span></small>
						<p><small><a class="mail_id mail_subject" target="_blank"></a></small>
					</div>
				</div>
			</div>
			<div class="span4 tzdTableRow"><p class="date text-center"></p></div>
		</div>

		<div class="row-fluid repliedMessage hide">
			<div class="span10 tzdTableRow">
				<div class="row-fluid">
					<div class="span4">
						<div class="thumbnail">
							<img class="creatorImg" src="" style="max-height:50px;"/>
						</div>
					</div>
					<div class="span20">
						<strong><a class="creatorLink"><span class="creatorName"></span></a></strong>
						<small><span class="text-warning"><?=lang("ctm_repliedMessage")?></span></small>
						<p><small><a class="mail_id mail_subject" target="_blank"></a></small>
					</div>
				</div>
			</div>
			<div class="span4 tzdTableRow"><p class="date text-center"></p></div>
		</div>

		<div class="row-fluid ownEvent hide">
			<div class="span10 tzdTableRow">
				<div class="row-fluid">
					<div class="span4">
						<div class="thumbnail">
							<img class="creatorImg" src="" style="max-height:50px;"/>
						</div>
					</div>
					<div class="span20">
						<strong><a class="creatorLink"><span class="creatorName"></span></a></strong>
						<small><span class="text-warning eventTitle"></span></small>
						<p><small><span class="eventDetail"></span></small></p>
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
							<img class="creatorImg" src="" style="max-height:50px;"/>
						</div>
					</div>
					<div class="span20">
						<strong><a class="creatorLink"><span class="creatorName"></span></a></strong>
						<small><span class="text-warning eventTitle"></span></small>
						<p><small><span class="eventDetail"></span></small></p>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
