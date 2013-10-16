<h3><?=lang("clb_CollaboratorMngTitle")?></h3>

<div class="branchs">
	<div class="row-fluid branch hide">
		<div class="span24 branchContent">

			<div class="row-fluid">
				<div class="span24 tzdListHeader">
					<span class="lead">
						<span class="branch_id"></span>
						<span class="branch_name"></span>
						<span class="pull-right text-right">
							<a class="openAddModal btn btn-success btn-small"> <?=lang("clb_insertCollaborator")?> </a>
						</span>
					</span>
				</div>
			</div>

			<div class="row-fluid">
				<div class="span24 collaborators">
					<div class="row-fluid collaborator">
						<div class="span24 tzdTableRow">
							<div class="row-fluid">
								<div class="span2 text-center">
									<img class="img3Rows" src="" />
								</div>
								<div class="span7">
									<p><?=lang("clb_name")?>: <span class="name"></span></p>
									<p><?=lang("clb_email")?>: <span class="email"></span></p>
								</div>
								<div class="span5">
									<p><?=lang("clb_createdBy")?>: <span class="creator_name"></span></p>
									<p><?=lang("clb_creationDate")?>: <span class="register"></span></p>
									<p><?=lang("clb_code")?>: <span class="_id"></span></p>
								</div>
								<div class="span5">
									<p><?=lang("clb_branch")?>: <span class="org_branch"></span></p>
									<p><?=lang("clb_position")?>: <span class="org_resp"></span></p>
									<p><?=lang("clb_status")?>: <span class="status"></span></p>
								</div>
								<div class="span5 text-right">
									<a class="facebook_id btn btn-small btn-primary hide" href="http://www.facebook.com/profile.php?id=" target="_blank"><i class="icon-facebook"></i></a>
									<a class="google_id btn btn-small btn-danger hide" href="https://plus.google.com/" target="_blank"><i class="icon-google-plus"></i></a>
									<a class="linkedin_id btn btn-small btn-info hide" href="http://www.linkedin.com/profile/view?id=" target="_blank"><i class="icon-linkedin"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="addModal" class="modal hide">
	<div class="modal-header">
	  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	  <span class="lead"><?=lang("clb_addCollaboratorToThisBranch")?> <span class="branch_name text-warning"></span></span>
	</div>

	<div class="modal-body">
		<div class="control-group">
			<input class="name input-block-level" type="text" placeholder="* nome" />
		</div>
		<div class="control-group">
			<input class="email input-block-level" type="text" placeholder="* e-mail" />
		</div>
		<div class="control-group">
			<select class="org_resp input-block-level">
				<option value="seller" selected><?=lang("clb_sellerBrief")?></option>
				<option value="manager"><?=lang("clb_managerBrief")?></option>
				<option value="admin"><?=lang("clb_adminBrief")?></option>
			</select>
		</div>
	</div>

	<div class="modal-footer">
	  <a class="addCollaborator btn btn-success"><?=lang("clb_create")?></a>
	  <a class="closeModal btn" data-dismiss="modal"><?=lang("clb_cancel")?></a>
	</div>

	<div class="org_branch hide"></div>
	<div id="pdt_fillValidEmail" class="hide"><?=lang("clb_fillValidMail")?></div>
	<div id="pdt_fillName" class="hide"><?=lang("clb_fillName")?></div>
</div>