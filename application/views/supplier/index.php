<h2><?=lang('splr_listTitle')?></h2>
<div class="row">
  <div class="span12">
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
<div class="row">
  <div class="span12">
    <span class="text-warning"><span class="totalRows"></span> <?=lang('tmpt_suppliers')?></span>
    <span class="text-warning"><?=lang('tmpt_withStatus')?></span>
    <span class="label label-success statusDivOpen cursorPointer" rel="tooltip" title="<?=lang('splr_statusDivOpenTitle')?>"><?=lang('tmpt_active')?></span>
    <span class="text-warning"><?=lang('splr_groupedBy')?></span>
    <span class="label label-success"><?=lang('splr_name')?> <i class="icon-chevron-down"></i></span>
  </div>
</div>
<div class="row statusDiv hide">
  <div class="span12">
    <span class="statusFilter text-success cursorPointer" id="all"><?=lang('splr_all')?></span>
    <span class="statusFilter label label-success cursorPointer" id="active"><?=lang('tmpt_active')?></span>
    <span class="statusFilter text-success cursorPointer" id="inactive"><?=lang('tmpt_inactive')?></span>
    &nbsp;&nbsp;<i class="statusDivClose icon-remove"></i>
  </div>
</div>
<br>
<div class="row tzdTable">
  <div class="span12">
    <div class="row tzdTableLine hide">
      <div class="span12 tzdTableRow">
        <div class="row tzdTableBrief">
          <div class="span1">
            <a class="btn supplierStatus btn-block" rel="tooltip" title="<?=lang('splr_supplierStatusBtnTitle')?>"></a>
          </div>
          <div class="span11 tzdTableBriefContent">
            <div class="row openDetail">
              <div class="span11 name" rel="tooltip" title="<?=lang('splr_name')?>">ss</div>
            </div>
          </div>
        </div>
        <div class="row tzdTableDetail">
          <div class="span12 tzdTableDetailContent">
            <div class="row">
              <div class="span12">
                <div class="row">
                  <div class="span1">
                    <a class="supplierStatus btn btn-block"  rel="tooltip" title="<?=lang('splr_supplierStatusBtnTitle')?>"></a>
                  </div>
                  <div class="span11">
                    <input type="text" class="name input-block-level" />
                  </div>
                </div>
              </div>
              <div class="span12">
                <div class="row">
                  <div class="span3">
                    <p>
                      <div class="thumbnail">
                        <img src="<?=base_url()?>assets/img/no_photo_160x120.png" alt="160x120" class="changeImg" alt="160x120">
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
                  <div class="span9">
                    <div class="row">
                      <div class="span9 tzdTableCampusNav">
                        <ul class="nav nav-tabs">
                          <li class="navTab campusNavTab"><a><span class="name"></span> <i class="icon-remove campusRemove"></i></a></li>
                          <li class="navTab campusNavAdd"><a><i class="icon-plus"></i></a></li>
                        </ul>
                      </div>
                      <div class="span9 tzdTableCampus">
                        <div class="row">
                          <div class="span9">
                            <div class="row">
                              <div class="span3">
                                <label><?=lang('splr_campus')?></label>
                                <input type="text" class="campusName input-block-level" />
                                <label><?=lang('splr_address')?></label>
                                <input type="text" class="address input-block-level" />
                                <label><?=lang('splr_cep')?></label>
                                <input type="text" class="cep input-block-level" />
                              </div>
                              <div class="span3">
                                <label><?=lang('splr_city')?></label>
                                <input type="text" class="city input-block-level" />
                                <label><?=lang('splr_state')?></label>
                                <input type="text" class="state input-block-level" />
                                <label><?=lang('splr_country')?></label>
                                <input type="text" class="country input-block-level" />
                              </div>
                              <div class="span3">
                                <label><?=lang('splr_email')?></label>
                                <input type="text" class="email input-block-level" />
                                <label><?=lang('splr_phone')?></label>
                                <input type="text" class="phone input-block-level" />
                                <label><?=lang('splr_mobile')?></label>
                                <input type="text" class="mobile input-block-level" />
                              </div>
                            </div>
                          </div>
                          <div class="span9">
                            <label><?=lang('splr_details')?></label>
                            <textarea rows="3" class="details input-block-level"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>   
                </div>
              </div> 
              <div class="span12">
                <div class="pull-right">
                  <a class="save btn btn-success"><?=lang('tmpt_Save')?></a>
                  <a class="drop btn btn-danger"><?=lang('tmpt_Remove')?></a>
                  <a class="closeDetail"><?=lang('tmpt_Close')?></a>
                </div>
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