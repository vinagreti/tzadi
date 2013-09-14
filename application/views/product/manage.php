<h3><?=lang('pdt_listTitle')?></h3>
<div class="row-fluid">
  <div class="span24">
    <span class="input-append">
      <input type="text" id="search-query" placeholder="<?=lang('pdt_searchSample')?>" rel="tooltip" title="<?=lang('pdt_searchCreateExplain')?>" />
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
        <li><a class="productAdd" id="service" tabindex="-1"><?=lang('pdt_service')?></a></li>
      </ul>
    </span>
    &nbsp;
    <span><a class="btn btn-info tzdTableRefresh" rel="tooltip" title="<?=lang('pdt_tzdTableRefresh')?>"><i class="icon-refresh"></i> <?=lang('pdt_tzdTableRefresh')?></a></span>
  </div>
</div>
<p>
  <div class="row-fluid">
    <div class="span24">
      <ul class="nav nav-pills">
        <li class="filterKind active" id="all"><a><?=lang('pdt_all')?> (<span class="found">0</span>)</a></li>
        <li class="filterKind hide" id="accommodation"><a><?=lang('pdt_accommodation')?> (<span class="found">0</span>)</a></li>
        <li class="filterKind hide" id="course"><a><?=lang('pdt_course')?> (<span class="found">0</span>)</a></li>
        <li class="filterKind hide" id="package"><a><?=lang('pdt_package')?> (<span class="found">0</span>)</a></li>
        <li class="filterKind hide" id="pass"><a><?=lang('pdt_pass')?> (<span class="found">0</span>)</a></li>
        <li class="filterKind hide" id="ensurance"><a><?=lang('pdt_ensurance')?> (<span class="found">0</span>)</a></li>
        <li class="filterKind hide" id="tourism"><a><?=lang('pdt_tourism')?> (<span class="found">0</span>)</a></li>
        <li class="filterKind hide" id="transfer"><a><?=lang('pdt_transfer')?> (<span class="found">0</span>)</a></li>
        <li class="filterKind hide" id="work"><a><?=lang('pdt_work')?> (<span class="found">0</span>)</a></li>
        <li class="filterKind hide" id="service"><a><?=lang('pdt_service')?> (<span class="found">0</span>)</a></li>
        <li class="filterKind hide" id="regularProduct"><a><?=lang('pdt_others')?> (<span class="found">0</span>)</a></li>
      </ul>  
    </div>
  </div>
</p>
<div class="row-fluid">
  <div class="span24">
    <span class="text-warning"><span class="totalRows"></span> <?=lang('tmpt_products')?></span>
    <span class="text-warning"><?=lang('tmpt_withStatus')?></span>
    <span class="label label-success statusDivOpen cursorPointer" rel="tooltip" title="<?=lang('pdt_statusDivOpenTitle')?>"><?=lang('tmpt_active')?></span>
    <span class="text-warning"><?=lang('pdt_groupedBy')?></span>
    <span class="label label-success orderDivOpen cursorPointer"  rel="tooltip" title="<?=lang('pdt_orderDivOpenTitle')?>"><?=lang('pdt_name')?> <i class="icon-chevron-down"></i></span>
  </div>
</div>
<div class="row-fluid statusDiv hide">
  <div class="span24">
    <span class="statusFilter text-success cursorPointer" id="all"><?=lang('pdt_all')?></span>
    <span class="statusFilter label label-success cursorPointer" id="active"><?=lang('tmpt_active')?></span>
    <span class="statusFilter text-success cursorPointer" id="inactive"><?=lang('tmpt_inactive')?></span>
    &nbsp;&nbsp;<i class="statusDivClose icon-remove"></i>
  </div>
</div>
<div class="row-fluid orderDiv hide">
  <div class="span24">
    <span class="order label label-success cursorPointer" id="name"><?=lang('pdt_name')?> <i class="icon-chevron-down"></i></span>
    <span class="order text-success cursorPointer" id="kind"><?=lang('pdt_kind')?> <i></i></span>
    <span class="order text-success cursorPointer" id="supplier"><?=lang('pdt_supplier')?> <i></i></span>
    &nbsp;&nbsp;<i class="orderDivClose icon-remove"></i>
  </div>
</div>
<br>
<div class="row-fluid tzdTable">
  <div class="span24">
    <div class="row-fluid hideFromResponsive tzdTableHeader">
      <div class="span4"></div>
      <div class="span11">
        <?=lang("pdt_name")?>
      </div>
      <div class="span4">
        <?=lang("pdt_kind")?>
      </div>
      <div class="span4">
        <?=lang("pdt_supplier")?>
      </div>
    </div>
    <div class="row-fluid tzdTableLine hide">
      <div class="span24 tzdTableRow">
        <div class="row-fluid tzdTableBrief">
          <div class="span24 tzdTableBriefContent">
            <div class="row-fluid">
              <div class="span2">
                <a class="btn productStatus btn-small btn-block" rel="tooltip" title="<?=lang('pdt_productStatusBtnTitle')?>" ></a>
              </div>
              <div class="span2">
                <a class="openDetail btn btn-info btn-small btn-block"><?=lang("tmpt_Edit")?></a>
              </div>
              <div class="span11 name" rel="tooltip" title="<?=lang('pdt_name')?>"></div>
              <div class="span4 productKind" rel="tooltip" title="<?=lang('pdt_kind')?>"></div>
              <div class="span4 productSupplier" rel="tooltip" title="<?=lang('pdt_supplier')?>"></div>
              <div class="span1" rel="tooltip" title="<?=lang('tmpt_open')?>"><a class="openView" target="_blank"><i class="icon-external-link icon-2x"></i></a></div>
            </div>
          </div>
        </div>
        <div class="row-fluid tzdTableDetail">
          <div class="span24 tzdTableDetailContent">
            <div class="row-fluid">
              <div class="span24">
                <div class="row-fluid">
                  <div class="span2">
                    <a class="productStatus btn btn-block btn-small" rel="tooltip" title="<?=lang('pdt_productStatusBtnTitle')?>" ></a>
                  </div>
                  <div class="span2">
                    <a class="closeDetail btn btn-block btn-small"><?=lang("tmpt_Close")?></a>
                  </div>
                  <div class="span2">
                    <a class="productSave btn btn-block btn-small btn-primary"><?=lang("tmpt_Save")?></a>
                  </div>
                  <div class="span17">
                    <div class="control-group">
                      <input type="text" class="input-block-level name nameInput" />
                    </div>
                  </div>
                  <div class="span1" rel="tooltip" title="<?=lang('tmpt_open')?>"><a class="openView" target="_blank"><i class="icon-external-link icon-2x"></i></a></div>
                </div>
              </div>
            </div>
            <div class="row-fluid">
              <div class="span7">
                <p><span class="productKind label label-warning"></span></p>
                <input type="file" class="productImg hide" multiple/>
                <div class="thumbnail">
                  <p>
                    <a class="attachImg" rel="tooltip" title="<?=lang('pdt_attachImgTitle')?>"><i class="icon-plus"></i> <?=lang('pdt_attachImg')?></a>
                    &nbsp;&nbsp;&nbsp;&nbsp;<a class="cover"  rel="tooltip" title="<?=lang('pdt_coverTitle')?>"><?=lang('pdt_cover')?> <i class="icon-check"></i> </a>
                    <a class="removeImg pull-right"  rel="tooltip" title="<?=lang('pdt_removeImgTitle')?>"><i class="icon-remove"></i></a>
                  </p>
                  <p>
                    <a class="prevImg btn btn-warning"  rel="tooltip" title="<?=lang('pdt_prevImgTitle')?>"><i class="icon-arrow-left"></i> <?=lang('pdt_prevImg')?></a>
                    &nbsp;&nbsp;<span class="imgNumber">0</span>/<span class="imgAmount">0</span>
                    <a class="nextImg pull-right btn btn-warning"  rel="tooltip" title="<?=lang('pdt_nextImgTitle')?>"><?=lang('pdt_nextImg')?> <i class="icon-arrow-right"></i></a>
                  </p>
                  <img src="<?=base_url()?>assets/img/no_photo_160x120.png" class="img imgMedium" alt="160x120" name="default">
                </div>
              </div>
              <div class="span17">
                <div class="row-fluid">
                  <div class="span24">
                    <div class="row-fluid">
                      <div class="span12 standardForm">
                        <div class="row-fluid">
                          <div class="span8">
                            <label><?=lang('pdt_purchase')?>
                              <div class="control-group">
                                <input type="text" class="input-block-level purchase"/>
                              </div>
                            </label>
                          </div>
                          <div class="span8">
                            <label><?=lang('pdt_currency')?>
                              <select class="input-block-level currency">
                                <option value="USD">dollar (US$)</option>
                                <option value="EUR">euro (€)</option>
                                <option value="GBP">pound (£)</option>
                                <option value="BRL">real (R$)</option>
                              </select>
                            </label>
                          </div>
                          <div class="span8">
                            <label><?=lang('pdt_vitrine')?>
                              <select class="input-block-level vitrine">
                                <option value="no"><?=lang("pdt_no")?></option>
                                <option value="yes"><?=lang("pdt_yes")?></option>
                              </select>
                            </label>
                          </div>
                        </div>
                        <div class="row-fluid">
                          <div class="span8">
                            <label><?=lang('pdt_sellPrice')?>
                              <div class="control-group">
                                <input type="text" class="input-block-level price"/>
                              </div>
                            </label>
                          </div>
                          <div class="span8">
                            <label><?=lang('pdt_gain')?>
                              <div class="control-group">
                                <input type="text" class="input-block-level gain"/>
                              </div>
                            </label>
                          </div>
                          <div class="span8">
                            <label>%
                              <div class="control-group">
                                <input type="text" class="input-block-level percent"/>
                              </div>
                            </label>
                          </div>
                        </div>
                        <label><?=lang('pdt_supplier')?>
                          <select class="input-block-level supplier">
                            <option value="0"><?=lang('pdt_ownProduct')?></option>
                          </select>
                        </label>
                        <div class="campus">
                          <label><?=lang('pdt_campus')?>
                            <select class="input-block-level supplier_campus"></select>
                          </label>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="kindForm">
                          <div class="courseForm"> <!-- inicio courseForm -->
                            <div class="row-fluid">
                              <div class="span8">
                                <label><?=lang('pdt_courseKind')?>
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
                                    <option value="vacation"><?=lang('pdt_vacation')?></option>
                                  </select>
                                </label>
                              </div>
                              <div class="span8">
                                <label><?=lang('pdt_modality')?>
                                  <select class="input-block-level courseModality">
                                    <option value="classroom"><?=lang('pdt_classroom')?></option>
                                    <option value="online"><?=lang('pdt_online')?></option>
                                    <option value="semiClassroom"><?=lang('pdt_semiClassroom')?></option>
                                  </select>
                                </label>
                              </div>
                              <div class="span8">
                                <label><?=lang('pdt_period')?>
                                  <select class="input-block-level coursePeriod">
                                    <option value="m"><?=lang('pdt_mPeriod')?></option>
                                    <option value="a"><?=lang('pdt_aPeriod')?></option>
                                    <option value="e"><?=lang('pdt_ePeriod')?></option>
                                    <option value="ma"><?=lang('pdt_maPeriod')?></option>
                                    <option value="ae"><?=lang('pdt_aePeriod')?></option>
                                    <option value="me"><?=lang('pdt_mePeriod')?></option>
                                    <option value="mae"><?=lang('pdt_maePeriod')?></option>
                                  </select>
                                </label>
                              </div>
                            </div>
                            <div class="row-fluid">
                              <div class="span8">
                                <label><?=lang('pdt_courseEnrollmentFees')?>
                                  <div class="control-group">
                                    <input type="text" class="input-block-level courseEnrollmentFees"/>
                                  </div>
                                </label>
                              </div>
                              <div class="span8">
                                <label><?=lang('pdt_courseAdministrativeFees')?>
                                  <div class="control-group">
                                    <input type="text" class="input-block-level courseAdministrativeFees"/>
                                  </div>
                                </label>
                              </div>
                              <div class="span8">
                                <label><?=lang('pdt_courseBook')?>
                                  <div class="control-group">
                                    <input type="text" class="input-block-level courseBook"/>
                                  </div>
                                </label>
                              </div>
                            </div>
                            <div class="row-fluid">
                              <div class="span8">
                                <label><?=lang('pdt_courseDuration')?>
                                  <div class="control-group">
                                    <input type="text" class="input-block-level courseDurationValue" />
                                  </div>
                                </label>
                              </div>
                              <div class="span8">
                                <label><?=lang('pdt_in')?>
                                  <select class="input-block-level courseDurationScale"> 
                                    <option value="days"><?=lang('pdt_days')?></option>
                                    <option value="weeks"><?=lang('pdt_weeks')?></option>
                                    <option value="months"><?=lang('pdt_months')?></option>
                                    <option value="years"><?=lang('pdt_years')?></option>
                                  </select>
                                </label>
                              </div>
                              <div class="span8">
                                <label><?=lang('pdt_courseLanguage')?>
                                  <div class="control-group">
                                    <input type="text" class="input-block-level courseLanguage" />
                                  </div>
                                </label>
                              </div>
                            </div>
                            <label><?=lang('pdt_courseRequirements')?>
                              <textarea rows="2" class="input-block-level courseRequirements"></textarea>
                            </label>
                          </div><!-- fim courseForm -->
                          <div class="ensuranceForm"> <!-- inicio ensuranceForm -->
                            <label><?=lang('pdt_duration')?>
                              <div class="row-fluid">
                                <div class="span12">
                                  <div class="control-group">
                                    <input type="text" class="input-block-level ensuranceDurationValue" />
                                  </div>
                                </div>
                                <div class="span12">
                                  <select class="input-block-level ensuranceDurationScale">
                                    <option value="days"><?=lang('pdt_days')?></option>
                                    <option value="weeks"><?=lang('pdt_weeks')?></option>
                                    <option value="months"><?=lang('pdt_months')?></option>
                                    <option value="years"><?=lang('pdt_years')?></option>
                                  </select>
                                </div>
                              </div>
                            </label>
                          </div> <!-- fim ensuranceForm -->
                          <div class="accommodationForm"> <!-- inicio accommodationForm -->
                            <div class="row-fluid">
                              <div class="span12">
                                <label><?=lang('pdt_accommodationKind')?>
                                  <select class="input-block-level accommodationKind">
                                    <option value="familly"><?=lang('pdt_familly')?></option>
                                    <option value="hotel"><?=lang('pdt_hotel')?></option>
                                    <option value="homeswap"><?=lang('pdt_homeswap')?></option>
                                    <option value="hostel"><?=lang('pdt_hostel')?></option>
                                    <option value="school"><?=lang('pdt_school')?></option>
                                  </select>
                                </label>
                              </div>
                              <div class="span12">
                                <label><?=lang('pdt_accommodationPeopleNumber')?>
                                  <div class="control-group">
                                    <input type="text" class="input-block-level accommodationPeopleNumber"/>
                                  </div>
                                </label>
                              </div>
                            </div>
                            <label><?=lang('pdt_duration')?>
                              <div class="row-fluid">
                                <div class="span12">
                                  <div class="control-group">
                                    <input type="text" class="input-block-level accommodationDurationValue"/>
                                  </div>
                                </div>
                                <div class="span12">
                                  <select class="input-block-level accommodationDurationScale" >
                                    <option value="days"><?=lang('pdt_days')?></option>
                                    <option value="weeks"><?=lang('pdt_weeks')?></option>
                                    <option value="months"><?=lang('pdt_months')?></option>
                                    <option value="years"><?=lang('pdt_years')?></option>
                                  </select>
                                </div>
                              </div>
                            </label>
                            <label><?=lang('pdt_accommodationFood')?>
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
                            </label>
                          </div> <!-- fim accommodationForm -->
                          <div class="passForm"> <!-- inicio passForm -->
                            <div class="row-fluid">
                              <div class="span12">
                                <label><?=lang('pdt_passTransportKind')?>
                                  <select class="input-block-level passTransportKind">
                                    <option value="bus"><?=lang('pdt_busTransportKind')?></option>
                                    <option value="ship"><?=lang('pdt_shipTransportKind')?></option>
                                    <option value="flight"><?=lang('pdt_flightTransportKind')?></option>
                                    <option value="rail"><?=lang('pdt_railTransportKind')?></option>
                                  </select>
                                </label>
                              </div>
                              <div class="span12">
                                <label><?=lang('pdt_passTransportWays')?>
                                  <select class="input-block-level passTransportWays">
                                    <option value="oneWay"><?=lang('pdt_oneWay')?></option>
                                    <option value="return"><?=lang('pdt_return')?></option>
                                  </select>
                                </label>
                              </div>
                            </div>
                            <label><?=lang('pdt_passFrom')?>
                              <div class="control-group">
                                <input type="text" class="input-block-level passFrom"/>
                              </div>
                            </label>
                            <label><?=lang('pdt_passTo')?>
                              <div class="control-group">
                                <input type="text" class="input-block-level passTo"/>
                              </div>
                            </label>
                          </div> <!-- fim passForm -->
                          <div class="workForm"> <!-- inicio workForm -->
                            <label><?=lang('pdt_workKind')?>
                              <select class="input-block-level workKind">
                                <option value="workFree"><?=lang('pdt_workFreeKind')?></option>
                                <option value="work"><?=lang('pdt_workKind')?></option>
                                <option value="traineeFree"><?=lang('pdt_traineeFreeKind')?></option>
                                <option value="trainee"><?=lang('pdt_traineeKind')?></option>
                              </select>
                            </label>
                          </div> <!-- fim workForm -->
                          <div class="packageForm"> <!-- inicio workForm -->
                            <label><?=lang('pdt_addPackageProductTitle')?>
                              <div class="control-group">
                                <input class="addPackageProduct input-block-level"/>
                              </div>
                            </label>
                            <label><?=lang('pdt_packageItens')?>
                              <div class="packageItem alert alert-block alert-success">
                                <h4 class="alert-heading"><a class="btn btn-danger dropPackageItem"><i class="icon-remove"></i></a> <a class="packageProductName"></a> (<?=lang("pdt_price")?>: <span class="packageProductPrice"></span>) </h4>
                                <p class="packageProductDetail"></p>
                                <p>
                                  <div class="control-group">
                                    <?=lang("pdt_amount")?>: <input class="packageProductQtd span2" type="number" />
                                  </div>
                                  <?=lang("pdt_total")?>: <span class="packageProductTotalPrice"></span>
                                </p>
                              </div>
                            </label>
                            <div class="packageItens"></div>
                            <div class="pull-right">
                              <span><?=lang("pdt_totalValue")?>:</span> <span class="packageTotal"></span>
                            </div>
                          </div> <!-- fim workForm -->
                        </div>
                      </div>
                      <div class="row-fluid">
                        <div class="span24">
                          <label><?=lang('pdt_detail')?>
                            <div class="control-group">
                              <div class="detail input-block-level input-content-editable" contentEditable="true"></div>
                            </div>
                          </label>
                        </div>
                      </div>
                    </div><!-- fim row-fluid -->
                  </div>
                </div>
                <div class="row-fluid">
                  <div class="span24">
                    <div class="pull-right">
                      <a class="btn btn-primary productSave"><?=lang("tmpt_Save")?></a>
                      <a class="btn btn-warning productClone" href="#"><?=lang("tmpt_Clone")?></a>
                      <a class="btn btn-danger productDrop" rel="tooltip" title="<?=lang("productDropTitle")?>"><?=lang("tmpt_Remove")?></a>
                      <a class="closeDetail btn"><?=lang("tmpt_Cancel")?></a>
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
<div class="pdt_removeImg hide"><?=lang("pdt_removeImg")?></div>
<div class="pdt_cannotRemoveOnlyImg hide"><?=lang("pdt_cannotRemoveOnlyImg")?></div>
<div class="pdt_activate hide"><?=lang("pdt_activate")?></div>
<div class="pdt_inactivate hide"><?=lang("pdt_inactivate")?></div>
<div class="pdt_saved hide"><?=lang("pdt_saved")?></div>
<div class="pdt_noChanges hide"><?=lang("pdt_noChanges")?></div>
<div class="pdt_removeProduct hide"><?=lang("pdt_removeProduct")?></div>
<div class="pdt_ownProduct hide"><?=lang('pdt_ownProduct')?></div>
<div class="pdt_packageNeedsAtLeast1Product hide"><?=lang('pdt_packageNeedsAtLeast1Product')?></div>
<div class="pdt_canotAddSamePackage hide"><?=lang('pdt_canotAddSamePackage')?></div>
<div class="pdt_invalidTitle hide"><?=lang("pdt_invalidTitle")?></div>
<div class="pdt_invalidDetail hide"><?=lang("pdt_invalidDetail")?></div>
<div class="pdt_invalidRequirements hide"><?=lang("pdt_invalidRequirements")?></div>
<div class="pdt_invalidFrom hide"><?=lang("pdt_invalidFrom")?></div>
<div class="pdt_invalidTo hide"><?=lang("pdt_invalidTo")?></div>
<div class="pdt_invalidPurchase hide"><?=lang("pdt_invalidPurchase")?></div>
<div class="pdt_invalidPrice hide"><?=lang("pdt_invalidPrice")?></div>
<div class="pdt_invalidCourseDurationValue hide"><?=lang("pdt_invalidCourseDurationValue")?></div>
<div class="pdt_invalidCourseLanguage hide"><?=lang("pdt_invalidCourseLanguage")?></div>
<div class="pdt_invalidCourseEnrollmentFees hide"><?=lang("pdt_invalidCourseEnrollmentFees")?></div>
<div class="pdt_invalidCourseAdministrativeFees hide"><?=lang("pdt_invalidCourseAdministrativeFees")?></div>
<div class="pdt_invalidCourseBook hide"><?=lang("pdt_invalidCourseBook")?></div>
<div class="pdt_invalidEnsuranceDurationValue hide"><?=lang("pdt_invalidEnsuranceDurationValue")?></div>
<div class="pdt_invalidAccommodationPeopleNumber hide"><?=lang("pdt_invalidAccommodationPeopleNumber")?></div>
<div class="pdt_invalidAccommodationDurationValue hide"><?=lang("pdt_invalidAccommodationDurationValue")?></div>