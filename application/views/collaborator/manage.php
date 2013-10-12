<h3>Colaboradores</h3>

<div class="branchs">
	<div class="row-fluid branch hide" id="5">
		<div class="span24 branchContent">

			<div class="row-fluid">
				<div class="span24 tzdListHeader">
					<span class="lead">
						<span class="branch_id"></span>
						<span class="branch_name"></span>
						<span class="pull-right text-right">
							<a class="add_collaborator btn btn-success btn-small"> inserir colaborador </a>
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
									<img src="" />
								</div>
								<div class="span7">
									<p>código: <span class="_id"></span></p>
									<p>nome: <span class="name"></span></p>
									<p>e-mail: <span class="email"></span></p>
								</div>
								<div class="span5">
									<p>data de criação: <span class="register"></span></p>
								</div>
								<div class="span5">
									<p>filial: <span class="org_branch"></span></p>
									<p>posição: <span class="org_resp"></span></p>
									<p>tipo: <span class="kind"></span></p>
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
	  <span class="lead">adicionar colaborador à filial <span class="branch_id"></span> - <span class="branch_name"></span></span>
	</div>

	<div class="modal-body">
		<div class="control-group">
			<input class="newName input-block-level" type="text" placeholder="* nome" />
		</div>
		<div class="control-group">
			<input class="newEmail input-block-level" type="text" placeholder="* e-mail" />
		</div>
		<div class="control-group">
			<select class="newKind input-block-level">
				<option value="seller">Vendedor - pode gerar orçamentos e interagir com clientes.</option>
				<option value="manager">Gerente - pode gerenciar todas as informações de sua filial (produtos, clientes, colaboradores)</option>
				<option value="admin">Administrador - pode gerenciar qualquer parte do sistema com exeção da gestão de Administradores que cabe apenas ao dono da organização.</option>
			</select>
		</div>
	</div>

	<div class="modal-footer">
	  <a class="knowMoreProduct btn btn-success">criar</a>
	  <a class="closeModal btn" data-dismiss="modal">cancelar</a>
	</div>

	<div id="pdt_fillValidEmail" class="hide">insira um e-mail válido</div>
	<div id="pdt_fillName" class="hide">insira o nome do novo colaborador</div>
</div>