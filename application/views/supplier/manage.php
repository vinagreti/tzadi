<h3><?=lang('splr_listTitle')?></h3>
<div class="row-fluid">
  <div class="span24">
    <span class="input-append">
      <input type="text" id="search-query" placeholder="<?=lang('splr_searchSample')?>">
      <a class="btn clearSearch" rel="tooltip" title="<?=lang('splr_clearSearchTitle')?>"><i class="icon-remove"></i></a>
    </span>
    &nbsp;
    <a class="btn btn-success addSupplier" rel="tooltip" title="<?=lang('splr_addBtnTitle')?>"><i class="icon-plus"></i> <?=lang('splr_add')?></a>
    &nbsp;
    <span><a class="btn btn-info reload" rel="tooltip" title="<?=lang('splr_reloadTitle')?>"><i class="icon-refresh"></i> <?=lang('splr_reload')?></a></span>
  </div>
</div>
<br>
<div class="row-fluid">
  <div class="span24">
    <span class="text-warning"><span class="totalRows"></span> <?=lang('tmpt_suppliers')?></span>
    <span class="text-warning"><?=lang('tmpt_withStatus')?></span>
    <span class="label label-success statusDivOpen cursorPointer" rel="tooltip" title="<?=lang('splr_statusDivOpenTitle')?>"><?=lang('tmpt_active')?></span>
    <span class="text-warning"><?=lang('splr_groupedBy')?></span>
    <span class="label label-success"><?=lang('splr_name')?> <i class="icon-chevron-down"></i></span>
  </div>
</div>
<div class="row-fluid statusDiv hide">
  <div class="span24">
    <span class="statusFilter text-success cursorPointer" id="all"><?=lang('splr_all')?></span>
    <span class="statusFilter label label-success cursorPointer" id="active"><?=lang('tmpt_active')?></span>
    <span class="statusFilter text-success cursorPointer" id="inactive"><?=lang('tmpt_inactive')?></span>
    &nbsp;&nbsp;<i class="statusDivClose icon-remove"></i>
  </div>
</div>
<br>
<div class="row-fluid tzdTable">
  <div class="span24">
    <div class="row-fluid tzdTableLine hide">
      <div class="span24 tzdTableRow">
        <div class="row-fluid tzdTableBrief">
          <div class="span2">
            <a class="btn supplierStatus btn-block" rel="tooltip" title="<?=lang('splr_supplierStatusBtnTitle')?>"></a>
          </div>
          <div class="span2">
            <a class="openDetail btn btn-info btn-block" rel="tooltip" title="<?=lang('tmpt_open')?>"><?=lang('tmpt_open')?></a>
          </div>
          <div class="span20">
            <div class="row-fluid">
              <div class="span11 name" rel="tooltip" title="<?=lang('splr_name')?>">ss</div>
            </div>
          </div>
        </div>
        <div class="row-fluid tzdTableDetail">
          <div class="span24 tzdTableDetailContent">
            <div class="row-fluid">
              <div class="span2">
                <a class="supplierStatus btn btn-block"  rel="tooltip" title="<?=lang('splr_supplierStatusBtnTitle')?>"></a>
              </div>
              <div class="span2">
                <a class="closeDetail btn btn-block"><?=lang('tmpt_Close')?></a>
              </div>
              <div class="span2">
                <a class="save btn btn-primary btn-block"><?=lang('tmpt_Save')?></a>
              </div>
              <div class="span18">
                <input type="text" class="name input-block-level" />
              </div>
            </div>
            <div class="row-fluid">
              <div class="span6">
                <p>
                  <div class="thumbnail">
                    <img src="<?=base_url()?>assets/img/no_photo_160x120.png" alt="160x120" class="changeImg imgMedium" alt="160x120">
                    <input type="file" name="img" class="supplierImg hide" />
                  </div>
                </p>
                <div class="attachments">
                  <p class="attachment"><a rel="tooltip" target="_blank"></a> <i class="icon-remove dropAttachment"></i></p>
                </div>
                  </p>
                <p>
                  <a class="attach btn btn-primary btn-block"><i class="icon-plus"></i> <i class="icon-paste"></i></a>
                  <input type="file" name="img" class="selectFile hide" multiple/>
                </p>
              </div>
              <div class="span18">
                <div class="row-fluid">
                  <div class="span24 tzdTableCampusNav">
                    <ul class="nav nav-tabs">
                      <li class="navTab campusNavTab"><a><span class="name"></span> <i class="icon-remove campusRemove"></i></a></li>
                      <li class="navTab campusNavAdd"><a><i class="icon-plus"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="row-fluid tzdTableCampus">
                  <div class="span24">
                    <div class="row-fluid">
                      <div class="span8">
                        <label><?=lang('splr_campus')?>
                          <input type="text" class="campusName input-block-level" />
                        </label>
                        <label><?=lang('splr_address')?>
                          <input type="text" class="address input-block-level" />
                        </label>
                        <label><?=lang('splr_cep')?>
                          <input type="text" class="cep input-block-level" />
                        </label>
                      </div>
                      <div class="span8">
                        <label><?=lang('splr_city')?>
                          <input type="text" class="city input-block-level" />
                        </label>
                        <label><?=lang('splr_state')?>
                          <input type="text" class="state input-block-level" />
                        </label>
                        <label><?=lang('splr_country')?>
                          <input type="text" class="country input-block-level" />
                        </label>
                      </div>
                      <div class="span8">
                        <label><?=lang('splr_email')?>
                          <input type="text" class="email input-block-level" />
                        </label>
                        <label><?=lang('splr_phone')?>
                          <input type="text" class="phone input-block-level" />
                        </label>
                        <label><?=lang('splr_mobile')?>
                          <input type="text" class="mobile input-block-level" />
                        </label>
                      </div>
                    </div>
                    <div class="row-fluid">
                      <div class="span24">
                        <div class="row-fluid">
                          <label><?=lang('splr_details')?>
                            <div class="control-group">
                              <div class="details input-block-level input-content-editable" contentEditable="true"></div>
                            </div>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row-fluid">
              <div class="pull-right">
                <a class="save btn btn-primary"><?=lang('tmpt_Save')?></a>
                <a class="clone btn btn-warning" href="#"><?=lang('tmpt_Clone')?></a>
                <a class="drop btn btn-danger"><?=lang('tmpt_Remove')?></a>
                <a class="closeDetail btn"><?=lang('tmpt_Close')?></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="splr_active hide"><?=lang("splr_active")?></div>
<div class="splr_inactive hide"><?=lang("splr_inactive")?></div>
<div class="splr_removeSupplier hide"><?=lang("splr_removeSupplier")?></div>
<div class="splr_removeCampus hide"><?=lang("splr_removeCampus")?></div>
<div class="splr_removeAttachment hide"><?=lang("splr_removeAttachment")?></div>
<div class="splr_noChange hide"><?=lang("splr_noChange")?></div>
<div class="tmpt_changesSaved hide"><?=lang("tmpt_changesSaved")?></div>
<div class='splr_invalidName hide'><?=lang("splr_invalidName")?></div>
<div class='splr_invalidCampusName hide'><?=lang("splr_invalidCampusName")?></div>
<div class='splr_invalidCep hide'><?=lang("splr_invalidCep")?></div>