<h2><?=lang('ctm_listTitle')?></h2>
<div class="row-fluid">
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
<div class="row-fluid">
  <div class="span24">
    <span class="text-warning"><span class="totalRows"></span> <?=lang('ctm_listTitle')?></span>
    <span class="text-warning"><?=lang('tmpt_withStatus')?></span>
    <span class="label label-success statusDivOpen cursorPointer" rel="tooltip" title="<?=lang('ctm_statusDivOpenTitle')?>"><?=lang('ctm_active')?></span>
    <span class="text-warning"><?=lang('ctm_orderdBy')?></span>
    <span class="label label-success orderDivOpen cursorPointer"  rel="tooltip" title="<?=lang('ctm_orderDivOpenTitle')?>"><?=lang('ctm_name')?> <i class="icon-chevron-down"></i></span>
  </div>
</div>
<div class="row-fluid statusDiv hide">
  <div class="span24">
    <span class="statusFilter text-success cursorPointer" id="all"><?=lang('ctm_all')?></span>
    <span class="statusFilter label label-success cursorPointer" id="active"><?=lang('ctm_active')?></span>
    <span class="statusFilter text-success cursorPointer" id="inactive"><?=lang('ctm_inactive')?></span>
    &nbsp;&nbsp;<i class="statusDivClose icon-remove"></i>
  </div>
</div>
<div class="row-fluid orderDiv hide">
  <div class="span24">
    <span class="order label label-success cursorPointer" id="name"><?=lang('ctm_name')?> <i class="icon-chevron-down"></i></span>
    &nbsp;&nbsp;<i class="orderDivClose icon-remove"></i>
  </div>
</div>
<br>
<div class="row-fluid tzdTable"> <!-- é toda a tabela -->
  <div class="span24">
    <div class="row-fluid tzdTableLine hide"> <!-- é/são as linhas da tabela ou cada linha da tabela -->
      <div class="span24 tzdTableRow">
        <div class="row-fluid tzdTableBrief"> <!-- é o conteúdo de cada linha da tabela, é onde se clica -->
          <div class="span2">
            <a class="btn customerActive btn-block" rel="tooltip" title="<?=lang('ctm_customerStatusBtnTitle')?>" ></a>
          </div>
          <div class="span2">
            <a class="openDetail btn btn-info btn-block"><?=lang("tmpt_open")?></a>
          </div>
          <div class="span20">
            <div class="row-fluid">
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
    <div class="row-fluid tzdTableDetail hide"> <!-- detalhe do cliente -->
      <div class="row-fluid">
        <div class="span24">
          <div class="row-fluid">
            <div class="span2">
              <a class="btn customerActive btn-block" rel="tooltip" title="<?=lang('ctm_customerStatusBtnTitle')?>" ></a>
            </div>
            <div class="span2">
              <a class="tableCancelButton btn btn-block"><?=lang('tmpt_Close')?></a>
            </div>
            <div class="span2">
              <a class="customerSave btn btn-primary btn-block"><?=lang('tmpt_Save')?></a>
            </div>
            <div class="span18">
              <input type="hidden" name="customerID" id="customerID" />
              <div class="control-group">
                <input type="text" class="input-block-level name" name="name" id="name" rel="tooltip" title="<?=lang('ctm_name')?>" />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row-fluid">
        <div class="span24">
          <div class="row-fluid">
            <div class="span6">
              <p>
                <div class="thumbnail">
                  <img src="<?=base_url()?>assets/img/no_photo_160x120.png" alt="160x120" class="changeImg" alt="160x120">
                  <input type="file" name="img" class="customerImg hide" />
                </div>
              </p>
              <div class="attachments">
                <p class="attachment"><a rel="tooltip" target="_blank"></a> <i class="icon-remove dropAttachment"></i></p>
              </div>
                </p>
              <p>
                <a class="attach btn btn-primary btn-block"><i class="icon-plus"></i> <i class="icon-paste"></i> <?=lang('tmpt_attach')?></a>
                <input type="file" name="img" class="selectFile hide" multiple/>
              </p>
            </div>
            <div class="span18">
              <div class="row-fluid">
                <div class="span12">
                  <label><?=lang('ctm_email')?>
                    <div class="control-group">
                      <input type="text" class="input-block-level" name="customerEmail" id="customerEmail" rel="tooltip" title="<?=lang('ctm_email')?>" />
                    </div>
                  </label>
                </div>
                <div class="span12">
                  <div class="row-fluid">
                    <div class="span12">
                      <label><?=lang('ctm_phone')?>
                        <div class="control-group">
                          <span class="vaimudar"></span><input type="text" class="input-block-level" id="phone" rel="tooltip" title="<?=lang('ctm_phone')?>" />
                        </div>
                      </label>
                    </div>
                    <div class="span12">
                      <label><?=lang('ctm_cellphone')?>
                        <div class="control-group">
                          <input type="text" class="input-block-level" id="cellphone" rel="tooltip" title="<?=lang('ctm_cellphone')?>" />
                        </div>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row-fluid">
                <div class="span8">
                  <label><?=lang('ctm_birth')?>
                    <div class="control-group">
                      <span class="vaimudar"></span><input type="text" class="input-block-level" id="birth" rel="tooltip" title="<?=lang('ctm_birth')?>" />
                    </div>
                  </label>
                </div>
                <div class="span16">
                  <label><?=lang('ctm_address')?>
                    <div class="control-group">
                      <span class="vaimudar"></span><input type="text" class="input-block-level" id="address" rel="tooltip" title="<?=lang('ctm_address')?>" />
                    </div>
                  </label>
                </div>
              </div>
              <div class="row-fluid">
                <div class="span8">
                  <label><?=lang('ctm_city')?>
                    <div class="control-group">
                      <input type="text" class="input-block-level" id="city" rel="tooltip" title="<?=lang('ctm_city')?>" />
                    </div>
                  </label>
                </div>
                <div class="span8">
                  <label><?=lang('ctm_state')?>
                    <div class="control-group">
                      <span class="vaimudar"></span><input type="text" class="input-block-level" id="state" rel="tooltip" title="<?=lang('ctm_state')?>" />
                    </div>
                  </label>
                </div>
                <div class="span8">
                  <label><?=lang('ctm_country')?>
                    <div class="control-group">
                      <input type="text" class="input-block-level" id="country" rel="tooltip" title="<?=lang('ctm_country')?>" />
                    </div>
                  </label>
                </div>
              </div>
              <div class="row-fluid">
                <label><?=lang('ctm_details')?>
                  <div class="control-group">
                    <textarea rows="5" class="input-block-level" id="details" rel="tooltip" title="<?=lang('ctm_details')?>"></textarea>
                  </div>
                </label>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row-fluid">
        <div class="span24">
          <div class="pull-right">
            <a class="customerSave btn btn-primary"><?=lang('tmpt_Save')?></a>
            <a class="customerDrop btn btn-danger"><?=lang('tmpt_Remove')?></a>
            <a class="tableCancelButton btn"><?=lang('tmpt_Close')?></a>
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
<div class="ctm_pleaseFillValidPhone hide"><?=lang("ctm_pleaseFillValidPhone")?></div>
<div class="ctm_pleaseFillValidCellphone hide"><?=lang("ctm_pleaseFillValidCellphone")?></div>
<div class="ctm_pleaseFillValidBirth hide"><?=lang("ctm_pleaseFillValidBirth")?></div>
<div class="ctm_pleaseFillValidAddress hide"><?=lang("ctm_pleaseFillValidAddress")?></div>
<div class="ctm_pleaseFillValidCity hide"><?=lang("ctm_pleaseFillValidCity")?></div>
<div class="ctm_pleaseFillValidState hide"><?=lang("ctm_pleaseFillValidState")?></div>
<div class="ctm_pleaseFillValidCountry hide"><?=lang("ctm_pleaseFillValidCountry")?></div>
<div class="ctm_pleaseFillValiDetails hide"><?=lang("ctm_pleaseFillValiDetails")?></div>