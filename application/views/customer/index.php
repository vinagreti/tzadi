<h2><?=lang('ctm_listTitle')?></h2>

<div class="row">
  <div class="span24">
    <span class="input-append">
      <input type="text" id="search-query" placeholder="<?=lang('ctm_searchSample')?>">
      <a class="btn clearSearch"><i class="icon-remove"></i></a>
    </span>
    &nbsp;
    <a class="btn btn-success customerAdd" rel="tooltip" title="<?=lang('ctm_addBtnTitle')?>"><i class="icon-plus"></i> <?=lang('ctm_add')?></a>
    &nbsp;
    <span><a class="btn btn-info tzdTableRefresh" rel="tooltip" title="<?=lang('ctm_reloadTitle')?>"><i class="icon-refresh"></i> <?=lang('ctm_reload')?></a></span>   
  </div>
</div>

<br>

<div class="row">
  <div class="span24">
    <span class="text-warning"><span class="totalRows"></span> <?=lang('ctm_listTitle')?></span>
    <span class="text-warning"><?=lang('tmpt_withStatus')?></span>
    <span class="label label-success statusDivOpen cursorPointer" rel="tooltip" title="<?=lang('ctm_statusDivOpenTitle')?>"><?=lang('ctm_active')?></span>
    <span class="text-warning"><?=lang('ctm_orderdBy')?></span>
    <span class="label label-success orderDivOpen cursorPointer"  rel="tooltip" title="<?=lang('ctm_orderDivOpenTitle')?>"><?=lang('ctm_name')?> <i class="icon-chevron-down"></i></span>
  </div>
</div>
<div class="row statusDiv hide">
  <div class="span24">
    <span class="statusFilter text-success cursorPointer" id="all"><?=lang('ctm_all')?></span>
    <span class="statusFilter label label-success cursorPointer" id="active"><?=lang('ctm_active')?></span>
    <span class="statusFilter text-success cursorPointer" id="inactive"><?=lang('ctm_inactive')?></span>
    &nbsp;&nbsp;<i class="statusDivClose icon-remove"></i>
  </div>
</div>

<div class="row orderDiv hide">
  <div class="span24">
    <span class="order label label-success cursorPointer" id="name"><?=lang('ctm_name')?> <i class="icon-chevron-down"></i></span>
    &nbsp;&nbsp;<i class="orderDivClose icon-remove"></i>
  </div>
</div>

<br>

<div class="row tzdTable"> <!-- é toda a tabela -->
  <div class="span24">

    <div class="row tzdTableLine hide"> <!-- é/são as linhas da tabela ou cada linha da tabela -->
      <div class="span24 tzdTableRow">
        <div class="row tzdTableBrief"> <!-- é o conteúdo de cada linha da tabela, é onde se clica -->
          <div class="span2">
            <a class="btn customerActive btn-block" rel="tooltip" title="<?=lang('ctm_customerStatusBtnTitle')?>" ></a>
          </div>
          <div class="span2">
            <a class="openDetail btn btn-info btn-block"><?=lang("tmpt_open")?></a>
          </div>
          <div class="span20">
            <div class="row">
              <div class="span10 name" title="<?=lang('ctm_name')?>">>
                <!-- o valor NOME de cada class do span é jogado aqui -->
              </div>
              <div class="span10 customerEmail" title="<?=lang('ctm_email')?>">
                <!-- o valor EMAIL de cada class do span é jogado aqui -->
              </div>
            </div>
          </div>
        </div> <!-- \\\\ é o fim do conteúdo de cada linha da tabela -->
      </div>
    </div> <!-- \\\\ é o fim do conteúdo de cada linha da tabela -->

    <div class="row tzdTableDetail"> <!-- detalhe do cliente -->
      <div class="span24">
        <div class="row">
          <div class="span2">
            <a class="btn customerActive btn-block" rel="tooltip" title="<?=lang('ctm_customerStatusBtnTitle')?>" ></a>
          </div>
          <div class="span2">
            <a class="tableCancelButton btn btn-block"><?=lang('tmpt_Close')?></a>
          </div>
          <div class="span20">
            <input type="hidden" name="customerID" id="customerID" />
            <div class="control-group">
              <input type="text" class="input-block-level name" name="name" id="name" rel="tooltip" title="<?=lang('ctm_name')?>" />
            </div>
          </div>
        </div>
      </div>

      <div class="span24">
        <div class="row">
          <div class="span7">
            <p><span class="productKind label label-warning"></span>
            </p>
            <div class="thumbnail">
              <img src="<?=base_url()?>assets/img/no_photo_160x120.png" class="changeImg" alt="160x120">
              <div class="control-group">
                <input type="file" class="customerImg hide" />
              </div>
            </div>
            <div class="attachments">
              <p class="attachment"><a rel="tooltip" target="_blank"></a> <i class="icon-remove dropAttachment"></i></p>
            </div>
            <p>
              <a class="attach btn btn-primary btn-block"><i class="icon-plus"></i> <i class="icon-paste"></i></a>
              <input type="file" name="img" class="selectFile hide" multiple/>
            </p>
          </div>
          <div class="span17">
            <label><?=lang('ctm_email')?></label>
            <div class="control-group">
              <input type="text" class="input-block-level" name="customerEmail" id="customerEmail" rel="tooltip" title="<?=lang('ctm_email')?>" />
            </div>
          </div>
        </div>
      </div>

      <div class="span24">
        <div class="row">
          <div class="span24">
            <div class="pull-right">
              <a class="customerSave btn btn-primary"><?=lang('tmpt_Save')?></a>
              <a class="customerDrop btn btn-danger"><?=lang('tmpt_Remove')?></a>
              <a class="tableCancelButton btn"><?=lang('tmpt_Close')?></a>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- \\\\fim detalhe do cliente -->

  </div> <!-- \\\\é/são as linhas da tabela ou cada linha da tabela -->
</div> <!-- \\\\\é o fim toda a tabela -->
<div class="ctm_activate hide"><?=lang("ctm_activate")?></div>
<div class="ctm_inactivate hide"><?=lang("ctm_inactivate")?></div>
<div class="ctm_removeCustomer hide"><?=lang("ctm_removeCustomer")?></div>
<div class="ctm_saved hide"><?=lang("ctm_saved")?></div>
<div class="ctm_noChanges hide"><?=lang("ctm_noChanges")?></div>
<div class="ctm_pleaseFillName hide"><?=lang("ctm_pleaseFillName")?></div>
<div class="ctm_pleaseFillValidEmail hide"><?=lang("ctm_pleaseFillValidEmail")?></div>
<div class="ctm_removeAttachment hide"><?=lang("ctm_removeAttachment")?></div>

