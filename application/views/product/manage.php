<h2><?=lang('pdt_listTitle')?></h2>

<div class="row">
  <div class="span24">
    <span class="input-append">
      <input type="text" id="search-query" placeholder="<?=lang('pdt_searchSample')?>" rel="tooltip" title="<?=lang('pdt_searchCreateExplain')?>">
      <a class="btn clearSearch" rel="tooltip" title="<?=lang('pdt_removeClearSearchQuery')?>"><i class="icon-remove"></i></a>
    </span>
    &nbsp;
    <span class="dropdown">
      <a class="btn btn-success dropdown-toggle" data-toggle="dropdown" data-target="#" rel="tooltip" title="<?=lang('pdt_addBtnTitle')?>"><i class="icon-plus"></i> <span class="add"><?=lang('pdt_add')?></span></a>
      <ul class="dropdown-menu">
        <li><a class="productAdd" id="regularProduct" tabindex="-1"><?=lang('pdt_regularProduct')?></a></li>  
        <li><a class="productAdd" id="accommodation" tabindex="-1"><?=lang('pdt_accommodation')?></a></li>
        <li><a class="productAdd" id="tourism" tabindex="-1"><?=lang('pdt_tourism')?></a></li>
        <li><a class="productAdd" id="course" tabindex="-1"><?=lang('pdt_course')?></a></li>
        <li><a class="productAdd" id="pass" tabindex="-1"><?=lang('pdt_pass')?></a></li>
        <li><a class="productAdd" id="work" tabindex="-1"><?=lang('pdt_work')?></a></li>
        <li><a class="productAdd" id="transfer" tabindex="-1"><?=lang('pdt_transfer')?></a></li>
        <li><a class="productAdd" id="ensurance" tabindex="-1"><?=lang('pdt_ensurance')?></a></li>
        <li><a class="productAdd" id="package" tabindex="-1"><?=lang('pdt_package')?></a></li>
      </ul>
    </span>
    &nbsp;
    <span><a class="btn btn-info tzdTableRefresh" rel="tooltip" title="<?=lang('pdt_tzdTableRefresh')?>"><i class="icon-refresh"></i> <?=lang('pdt_tzdTableRefresh')?></a></span>
  </div>
</div>
<br>
<div class="row">
  <div class="span24">
    <span class="text-warning"><span class="totalRows"></span> <?=lang('tmpt_products')?></span>
    <span class="text-warning"><?=lang('tmpt_withStatus')?></span>
    <span class="label label-success statusDivOpen cursorPointer" rel="tooltip" title="<?=lang('pdt_statusDivOpenTitle')?>"><?=lang('tmpt_active')?></span>
    <span class="text-warning"><?=lang('pdt_groupedBy')?></span>
    <span class="label label-success orderDivOpen cursorPointer"  rel="tooltip" title="<?=lang('pdt_orderDivOpenTitle')?>"><?=lang('pdt_name')?> <i class="icon-chevron-down"></i></span>
  </div>
</div>
<div class="row statusDiv hide">
  <div class="span24">
    <span class="statusFilter text-success cursorPointer" id="all"><?=lang('pdt_all')?></span>
    <span class="statusFilter label label-success cursorPointer" id="active"><?=lang('tmpt_active')?></span>
    <span class="statusFilter text-success cursorPointer" id="inactive"><?=lang('tmpt_inactive')?></span>
    &nbsp;&nbsp;<i class="statusDivClose icon-remove"></i>
  </div>
</div>
<div class="row orderDiv hide">
  <div class="span24">
    <span class="order label label-success cursorPointer" id="name"><?=lang('pdt_name')?> <i class="icon-chevron-down"></i></span>
    <span class="order text-success cursorPointer" id="kind"><?=lang('pdt_kind')?> <i></i></span>
    <span class="order text-success cursorPointer" id="supplier"><?=lang('pdt_supplier')?> <i></i></span>
    &nbsp;&nbsp;<i class="orderDivClose icon-remove"></i>
  </div>
</div>
<br>
<div class="row tzdTable">
  <div class="span24">
    <div class="row tzdTableLine hide">
      <div class="span24 tzdTableRow">
        <div class="row tzdTableBrief">
          <div class="span24 tzdTableBriefContent">
            <div class="row">
              <div class="span2">
                <a class="btn productStatus btn-block" rel="tooltip" title="<?=lang('pdt_productStatusBtnTitle')?>" ></a>
              </div>
              <div class="span2">
                <a class="openDetail btn btn-info btn-block"><?=lang("tmpt_open")?></a>
              </div>
              <div class="span12 name" rel="tooltip" title="<?=lang('pdt_name')?>"></div>
              <div class="span4 productKind" rel="tooltip" title="<?=lang('pdt_kind')?>"></div>
              <div class="span4 productSupplier" rel="tooltip" title="<?=lang('pdt_supplier')?>"></div>
            </div>
          </div>
        </div>
        <div class="row tzdTableDetail">
          <div class="span24 tzdTableDetailContent">
            <div class="row">
              <div class="span24">
                <div class="row">
                  <div class="span2">
                    <a class="productStatus btn btn-block" rel="tooltip" title="<?=lang('pdt_productStatusBtnTitle')?>" ></a>
                  </div>
                  <div class="span2">
                    <a class="closeDetail btn btn-block"><?=lang("tmpt_Close")?></a>
                  </div>
                  <div class="span20">
                    <input type="text" class="input-block-level name nameInput" />
                  </div>
                </div>
              </div>
              <div class="span24">
                <div class="row">
                  <div class="span7">
                    <p><span class="productKind label label-warning"></span><p>
                    <div class="thumbnail">
                      <img src="<?=base_url()?>assets/img/no_photo_160x120.png" class="changeImg" alt="160x120">
                      <input type="file" class="productImg hide" />
                    </div>
                  </div>
                  <div class="span17">
                    <div class="row">
                      <div class="span17">
                        <div class="row">
                          <div class="span8 standardForm">
                            <div class="row">
                              <div class="span4">
                                <label><?=lang('pdt_purchase')?></label>
                                <input type="text" class="input-block-level purchase" value="0" />
                              </div>
                              <div class="span4">
                                <label><?=lang('pdt_currency')?></label>
                                <select class="input-block-level currency">
                                  <option value="USD">dollar ($)</option>
                                  <option value="EUR">euro (€)</option>
                                  <option value="GBP">pound (£)</option>
                                  <option value="BRL">real (R$)</option>
                                </select>
                              </div>
                            </div>
                            <div class="row">
                              <div class="span4">
                                <label><?=lang('pdt_sellPrice')?></label>
                                <input type="text" class="input-block-level price" value="0" />
                              </div>
                              <div class="span2">
                                <label><?=lang('pdt_gain')?></label>
                                <input type="text" class="input-block-level gain" value="0" />
                              </div>
                              <div class="span2">
                                <label>%</label>
                                <input type="text" class="input-block-level percent" value="0" />
                              </div>
                            </div>
                            <label><?=lang('pdt_supplier')?></label>
                            <select class="input-block-level supplier">
                              <option value="0"><?=lang('pdt_ownProduct')?></option>
                            </select>
                            <div class="campus">
                              <label><?=lang('pdt_campus')?></label>
                              <select class="input-block-level supplier_campus">
                              </select>
                            </div>
                          </div>
                          <div class="span9">
                            <div class="kindForm">
                              <div class="courseForm"> <!-- inicio courseForm -->
                                <div class="row">
                                  <div class="span3">
                                    <label><?=lang('pdt_courseKind')?></label>
                                    <select class="input-block-level courseKind">
                                      <option value="language"><?=lang('pdt_language')?></option>
                                      <option value="profissional"><?=lang('pdt_profissional')?></option>
                                      <option value="highSchool"><?=lang('pdt_highSchool')?></option>
                                      <option value="3degree"><?=lang('pdt_3degree')?></option>
                                      <option value="mba"><?=lang('pdt_mba')?></option>
                                      <option value="pos3degree"><?=lang('pdt_pos3degree')?></option>
                                      <option value="master"><?=lang('pdt_master')?></option>
                                      <option value="doctor"><?=lang('pdt_doctor')?></option>
                                      <option value="posDoc"><?=lang('pdt_posDoc')?></option>
                                    </select>
                                  </div>
                                  <div class="span3">
                                    <label><?=lang('pdt_modality')?></label>
                                    <select class="input-block-level courseModality">
                                      <option value="classroom"><?=lang('pdt_classroom')?></option>
                                      <option value="online"><?=lang('pdt_online')?></option>
                                      <option value="semiClassroom"><?=lang('pdt_semiClassroom')?></option>
                                    </select>
                                  </div>
                                  <div class="span3">
                                    <label><?=lang('pdt_period')?></label>
                                    <select class="input-block-level coursePeriod">
                                      <option value="m"><?=lang('pdt_mPeriod')?></option>
                                      <option value="a"><?=lang('pdt_aPeriod')?></option>
                                      <option value="e"><?=lang('pdt_ePeriod')?></option>
                                      <option value="ma"><?=lang('pdt_maPeriod')?></option>
                                      <option value="ae"><?=lang('pdt_aePeriod')?></option>
                                      <option value="me"><?=lang('pdt_mePeriod')?></option>
                                      <option value="mae"><?=lang('pdt_maePeriod')?></option>
                                    </select>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="span3">
                                    <label><?=lang('pdt_courseEnrollmentFees')?></label>
                                    <input type="text" class="input-block-level courseEnrollmentFees" value="0" />
                                  </div>
                                  <div class="span3">
                                    <label><?=lang('pdt_courseAdministrativeFees')?></label>
                                    <input type="text" class="input-block-level courseAdministrativeFees" value="0" />
                                  </div>
                                  <div class="span3">
                                    <label><?=lang('pdt_courseBook')?></label>
                                    <input type="text" class="input-block-level courseBook" value="0" />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="span3">
                                    <label><?=lang('pdt_courseDuration')?></label>
                                    <input type="text" class="input-block-level courseDurationValue" />
                                  </div>
                                  <div class="span3">
                                    <label><?=lang('pdt_in')?></label>
                                    <select class="input-block-level courseDurationScale"> 
                                      <option value="days"><?=lang('pdt_days')?></option>
                                      <option value="weeks"><?=lang('pdt_weeks')?></option>
                                      <option value="months"><?=lang('pdt_months')?></option>
                                      <option value="years"><?=lang('pdt_years')?></option>
                                    </select>
                                  </div>
                                  <div class="span3">
                                    <label><?=lang('pdt_courseLanguage')?></label>
                                    <input type="text" class="input-block-level courseLanguage" />
                                  </div>
                                </div>
                                <label><?=lang('pdt_courseRequirements')?></label>
                                <textarea rows="2" class="input-block-level courseRequirements"></textarea>
                              </div><!-- fim courseForm -->
                              <div class="ensuranceForm"> <!-- inicio ensuranceForm -->
                                <label><?=lang('pdt_duration')?></label>
                                <div class="row">
                                  <div class="span5">
                                    <input type="text" class="input-block-level ensuranceDurationValue" />
                                  </div>
                                  <div class="span4">
                                    <select class="input-block-level ensuranceDurationScale">
                                      <option value="days"><?=lang('pdt_days')?></option>
                                      <option value="weeks"><?=lang('pdt_weeks')?></option>
                                      <option value="months"><?=lang('pdt_months')?></option>
                                      <option value="years"><?=lang('pdt_years')?></option>
                                    </select>
                                  </div>
                                </div>
                              </div> <!-- fim ensuranceForm -->
                              <div class="accommodationForm"> <!-- inicio accommodationForm -->
                                <div class="row">
                                  <div class="span5">
                                    <label><?=lang('pdt_accommodationKind')?></label>
                                    <select class="input-block-level accommodationKind">
                                      <option value="familly"><?=lang('pdt_familly')?></option>
                                      <option value="hotel"><?=lang('pdt_hotel')?></option>
                                      <option value="hostel"><?=lang('pdt_hostel')?></option>
                                      <option value="school"><?=lang('pdt_school')?></option>
                                    </select>
                                  </div>
                                  <div class="span4">
                                    <label><?=lang('pdt_accommodationPeopleNumber')?></label>
                                    <input type="text" class="input-block-level accommodationPeopleNumber"/>
                                  </div>
                                </div>
                                <label><?=lang('pdt_duration')?></label>
                                <div class="row">
                                  <div class="span5">
                                    <input type="text" class="input-block-level accommodationDurationValue"/>
                                  </div>
                                  <div class="span4">
                                    <select class="input-block-level accommodationDurationScale" >
                                      <option value="days"><?=lang('pdt_days')?></option>
                                      <option value="weeks"><?=lang('pdt_weeks')?></option>
                                      <option value="months"><?=lang('pdt_months')?></option>
                                      <option value="years"><?=lang('pdt_years')?></option>
                                    </select>
                                  </div>
                                </div>
                                <label><?=lang('pdt_accommodationFood')?></label>
                                <select class="input-block-level accommodationFood">
                                  <option value="none"><?=lang('pdt_noneFood')?></option>
                                  <option value="b"><?=lang('pdt_bFood')?></option>
                                  <option value="l"><?=lang('pdt_lFood')?></option>
                                  <option value="d"><?=lang('pdt_dFood')?></option>
                                  <option value="bl"><?=lang('pdt_blFood')?></option>
                                  <option value="bd"><?=lang('pdt_bdFood')?></option>
                                  <option value="ld"><?=lang('pdt_ldFood')?></option>
                                  <option value="bld"><?=lang('pdt_bldFood')?></option>
                                </select>
                              </div> <!-- fim accommodationForm -->
                              <div class="passForm"> <!-- inicio passForm -->
                                <label><?=lang('pdt_passTransportKind')?></label>
                                <select class="input-block-level passTransportKind">
                                  <option value="bus"><?=lang('pdt_busTransportKind')?></option>
                                  <option value="ship"><?=lang('pdt_shipTransportKind')?></option>
                                  <option value="flight"><?=lang('pdt_flightTransportKind')?></option>
                                  <option value="rail"><?=lang('pdt_railTransportKind')?></option>
                                </select>
                                <div class="row">
                                  <div class="span3">
                                    <label><?=lang('pdt_passFrom')?></label>
                                    <input type="text" class="input-block-level passFrom"/>
                                  </div>
                                  <div class="span3">
                                    <label><?=lang('pdt_passTo')?></label>
                                    <input type="text" class="input-block-level passTo"/>
                                  </div>
                                </div>
                              </div> <!-- fim passForm -->
                              <div class="workForm"> <!-- inicio workForm -->
                                <label><?=lang('pdt_workKind')?></label>
                                <select class="input-block-level workKind">
                                  <option value="workFree"><?=lang('pdt_workFreeKind')?></option>
                                  <option value="work"><?=lang('pdt_workKind')?></option>
                                  <option value="traineeFree"><?=lang('pdt_traineeFreeKind')?></option>
                                  <option value="trainee"><?=lang('pdt_traineeKind')?></option>
                                </select>
                              </div> <!-- fim workForm -->
                              <div class="packageForm"> <!-- inicio workForm -->
                                <label><?=lang('pdt_addPackageProductTitle')?></label>
                                <input class="addPackageProduct input-block-level"/>
                                <label><?=lang('pdt_packageItens')?></label>
                                <div class="packageItem alert alert-block alert-success">
                                  <h4 class="alert-heading"><a class="btn btn-danger dropPackageItem"><i class="icon-remove"></i></a> <a class="packageProductName"></a> (<?=lang("pdt_price")?>: <span class="packageProductPrice"></span>) </h4>
                                  <p class="packageProductDetail"></p>
                                  <p>
                                    <?=lang("pdt_amount")?>: <input class="packageProductQtd span2" type="number" />
                                    <?=lang("pdt_total")?>: <span class="packageProductTotalPrice"></span>
                                  </p>
                                </div>
                                <div class="packageItens"></div>
                                <div class="pull-right">
                                  <span><?=lang("pdt_totalValue")?>:</span> <span class="packageTotal"></span>
                                </div>
                              </div> <!-- fim workForm -->
                            </div>
                            <label><?=lang('pdt_detail')?></label>
                            <textarea rows="6" class="input-block-level detail"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="span17">
                        <div class="pull-right">
                          <a class="btn btn-primary productSave"><?=lang("tmpt_Save")?></a>
                          <a class="btn btn-danger productDrop" rel="tooltip" title="<?=lang("productDropTitle")?>"><?=lang("tmpt_Remove")?></a>
                          <a class="closeDetail btn"><?=lang("tmpt_Close")?></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="pdt_activate hide"><?=lang("pdt_activate")?></div>
<div class="pdt_inactivate hide"><?=lang("pdt_inactivate")?></div>
<div class="pdt_saved hide"><?=lang("pdt_saved")?></div>
<div class="pdt_noChanges hide"><?=lang("pdt_noChanges")?></div>
<div class="pdt_removeProduct hide"><?=lang("pdt_removeProduct")?></div>
<div class="pdt_ownProduct hide"><?=lang('pdt_ownProduct')?></div>
<div class="pdt_packageNeedsAtLeast1Product hide"><?=lang('pdt_packageNeedsAtLeast1Product')?></div>
<div class="pdt_canotAddSamePackage hide"><?=lang('pdt_canotAddSamePackage')?></div>