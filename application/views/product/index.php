<h2><?=lang('pdt_listTitle')?></h2>

<div class="row">
  <div class="span12">
    <span class="input-append">
      <input type="text" id="search-query" placeholder="<?=lang('pdt_searchSample')?>">
      <a class="btn clearSearch" rel="tooltip" title="<?=lang('pdt_removeClearSearchQuery')?>"><i class="icon-remove"></i></a>
    </span>
    &nbsp;
    <span class="dropdown">
      <a class="btn btn-success dropdown-toggle" data-toggle="dropdown" data-target="#" rel="tooltip" title="<?=lang('pdt_addBtnTitle')?>"><i class="icon-plus"></i> <span class="add"><?=lang('pdt_add')?></span></a>
      <ul class="dropdown-menu">
        <li><a class="productAdd" id="regularProduct" tabindex="-1" href="#newregularProduct"><?=lang('pdt_regularProduct')?></a></li>  
        <li><a class="productAdd" id="accommodation" tabindex="-1" href="#newaccommodation"><?=lang('pdt_accommodation')?></a></li>
        <li><a class="productAdd" id="tourism" tabindex="-1" href="#newtourism"><?=lang('pdt_tourism')?></a></li>
        <li><a class="productAdd" id="course" tabindex="-1" href="#newcourse"><?=lang('pdt_course')?></a></li>
        <li><a class="productAdd" id="pass" tabindex="-1" href="#newpass"><?=lang('pdt_pass')?></a></li>
        <li><a class="productAdd" id="work" tabindex="-1" href="#newwork"><?=lang('pdt_work')?></a></li>
        <li><a class="productAdd" id="transfer" tabindex="-1" href="#newtransfer"><?=lang('pdt_transfer')?></a></li>
        <li><a class="productAdd" id="ensurance" tabindex="-1" href="#newensurance"><?=lang('pdt_ensurance')?></a></li>
      </ul>
    </span>
    &nbsp;
    <span><a class="btn btn-info tzdTableRefresh" rel="tooltip" title="<?=lang('pdt_tzdTableRefresh')?>"><i class="icon-refresh"></i> <?=lang('pdt_tzdTableRefresh')?></a></span>
  </div>
</div>

<br>

<div class="row">
  <div class="span12">
    <span class="text-warning"><span class="totalRows"></span> <?=lang('tmpt_products')?></span>
    <span class="text-warning"><?=lang('tmpt_withStatus')?></span>
    <span class="label label-success statusDivOpen cursorPointer" rel="tooltip" title="<?=lang('statusDivOpenTitle')?>"><?=lang('tmpt_active')?></span>
    <span class="text-warning"><?=lang('pdt_groupedBy')?></span>
    <span class="label label-success orderDivOpen cursorPointer"  rel="tooltip" title="<?=lang('orderDivOpenTitle')?>"><?=lang('pdt_name')?> <i class="icon-chevron-down"></i></span>
  </div>
</div>
<div class="row statusDiv hide">
  <div class="span12">
    <span class="statusFilter text-success cursorPointer" id="all"><?=lang('pdt_all')?></span>
    <span class="statusFilter label label-success cursorPointer" id="active"><?=lang('tmpt_active')?></span>
    <span class="statusFilter text-success cursorPointer" id="inactive"><?=lang('tmpt_inactive')?></span>
    &nbsp;&nbsp;<i class="statusDivClose icon-remove"></i>
  </div>
</div>
<div class="row orderDiv hide">
  <div class="span12">
    <span class="order label label-success cursorPointer" id="name"><?=lang('pdt_name')?> <i class="icon-chevron-down"></i></span>
    <span class="order text-success cursorPointer" id="kind"><?=lang('pdt_kind')?> <i></i></span>
    <span class="order text-success cursorPointer" id="supplier"><?=lang('pdt_supplier')?> <i></i></span>
    &nbsp;&nbsp;<i class="orderDivClose icon-remove"></i>
  </div>
</div>
<br>

<div class="row tzdTable">
  <div class="span12">
    <div class="row tzdTableLine hide">
      <div class="span12 tzdTableRow">
        <div class="row tzdTableBrief">
          <div class="span1">
            <a class="btn productStatus btn-block" rel="tooltip" title="<?=lang('pdt_productStatusBtnTitle')?>" ></a>
          </div>
          <div class="span11 tzdTableBriefContent">
            <div class="row openDetail">
              <div class="span5 name" rel="tooltip" title="<?=lang('pdt_name')?>"></div>
              <div class="span3 productKind" rel="tooltip" title="<?=lang('pdt_kind')?>"></div>
              <div class="span3 productSupplier" rel="tooltip" title="<?=lang('pdt_supplier')?>"></div>
            </div>
          </div>
        </div>
        <div class="row tzdTableDetail">
          <div class="span12 tzdTableDetailContent">
            <div class="row">
              <div class="span2">
                <p><a class="btn productStatus btn-block" rel="tooltip" title="<?=lang('pdt_productStatusBtnTitle')?>" ></a></p>
                <p><span class="productKind label label-warning"></span><p>
                <div class="thumbnail">
                  <img src="<?=base_url()?>assets/img/160x120.png" class="changeImg" alt="160x120">
                  <input type="file" name="img" class="productImg hide" />
                </div>
              </div>
              <div class="span10">
                <div class="row">
                  <div class="span10">
                    <div class="row">
                      <div class="span4 standardForm">
                        <label><?=lang('pdt_name')?></label>
                        <input type="text" class="input-block-level name nameInput" name="name" rel="tolltip" title="productName" />
                        <div class="row">
                          <div class="span2">
                            <label><?=lang('pdt_purchase')?></label>
                            <input type="text" class="input-block-level purchase" name="purchase" rel="tooltip" title="preço de compra" value="0" />
                          </div>
                          <div class="span2">
                            <label><?=lang('pdt_currency')?></label>
                            <select class="input-block-level currency" name="currency" rel="tolltip" title="currency">
                              <option value="USD">dollar ($)</option>
                              <option value="EUR">euro (€)</option>
                              <option value="GBP">pound (£)</option>
                              <option value="BRL">real (R$)</option>
                            </select>
                          </div>
                        </div>
                        <label><?=lang('pdt_supplier')?></label>
                        <select class="input-block-level supplier" name="supplier" rel="tolltip" title="fornecedor">
                          <option value="0"><?=lang('pdt_ownProduct')?></option>
                        </select>
                        <div class="campus">
                          <label><?=lang('pdt_campus')?></label>
                          <select class="input-block-level supplier_campus" name="supplier_campus" rel="tolltip" title="unidade">
                          </select>
                        </div>
                      </div>

                      <div class="span6">
                        <div class="kindForm">

                          <div class="courseForm"> <!-- inicio courseForm -->
                            <div class="row">
                              <div class="span2">
                                <label><?=lang('pdt_courseKind')?></label>
                                <select class="input-block-level courseKind" name="courseKind" rel="tolltip" title="tipo de curso">
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
                              <div class="span2">
                                <label><?=lang('pdt_modality')?></label>
                                <select class="input-block-level courseModality" name="courseModality" rel="tolltip" title="modalidade do curso">
                                  <option value="classroom"><?=lang('pdt_classroom')?></option>
                                  <option value="online"><?=lang('pdt_online')?></option>
                                  <option value="semiClassroom"><?=lang('pdt_semiClassroom')?></option>
                                </select>
                              </div>
                              <div class="span2">
                                <label><?=lang('pdt_period')?></label>
                                <select class="input-block-level coursePeriod" name="coursePeriod" rel="tolltip" title="período do dia">
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
                              <div class="span2">
                                <label><?=lang('pdt_courseEnrollmentFees')?></label>
                                <input type="text" class="input-block-level courseEnrollmentFees" value="0" />
                              </div>
                              <div class="span2">
                                <label><?=lang('pdt_courseAdministrativeFees')?></label>
                                <input type="text" class="input-block-level courseAdministrativeFees" value="0" />
                              </div>
                              <div class="span2">
                                <label><?=lang('pdt_courseBook')?></label>
                                <input type="text" class="input-block-level courseBook" value="0" />
                              </div>
                            </div>
                            <div class="row">
                              <div class="span2">
                                <label><?=lang('pdt_courseDuration')?></label>
                                <input type="text" class="input-block-level courseDurationValue" name="courseDurationValue" rel="tooltip" title="duração" />
                              </div>
                              <div class="span2">
                                <label><?=lang('pdt_in')?></label>
                                <select class="input-block-level courseDurationScale" name="courseDurationScale" rel="tolltip" title="escala de duração">
                                  <option value="days"><?=lang('pdt_days')?></option>
                                  <option value="weeks"><?=lang('pdt_weeks')?></option>
                                  <option value="months"><?=lang('pdt_months')?></option>
                                  <option value="years"><?=lang('pdt_years')?></option>
                                </select>
                              </div>
                              <div class="span2">
                                <label><?=lang('pdt_courseLanguage')?></label>
                                <input type="text" class="input-block-level courseLanguage" />
                              </div>
                            </div>
                            <label><?=lang('pdt_courseRequirements')?></label>
                            <textarea rows="2" class="input-block-level courseRequirements" name="courseRequirements" rel="tolltip" title="Requerimentos"></textarea>
                          </div><!-- fim courseForm -->

                          <div class="ensuranceForm"> <!-- inicio ensuranceForm -->
                            <label><?=lang('pdt_duration')?></label>
                            <div class="row">
                              <div class="span3">
                                <input type="text" class="input-block-level ensuranceDurationValue" name="ensuranceDurationValue" rel="tooltip" title="duração" />
                              </div>
                              <div class="span3">
                                <select class="input-block-level ensuranceDurationScale" name="ensuranceDurationScale" rel="tolltip" title="escala de duração">
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
                              <div class="span3">
                                <label><?=lang('pdt_accommodationKind')?></label>
                                <select class="input-block-level accommodationKind" name="accommodationKind" rel="tolltip" title="tipo de acomodação">
                                  <option value="familly"><?=lang('pdt_familly')?></option>
                                  <option value="hotel"><?=lang('pdt_hotel')?></option>
                                  <option value="hostel"><?=lang('pdt_hostel')?></option>
                                  <option value="school"><?=lang('pdt_school')?></option>
                                </select>
                              </div>
                              <div class="span3">
                                <label><?=lang('pdt_accommodationPeopleNumber')?></label>
                                <input type="text" class="input-block-level accommodationPeopleNumber" name="accommodationPeopleNumber" rel="tooltip" title="número de pessoas" />
                              </div>
                            </div>
                            <label><?=lang('pdt_duration')?></label>
                            <div class="row">
                              <div class="span3">
                                <input type="text" class="input-block-level accommodationDurationValue" name="accommodationDurationValue" rel="tooltip" title="duração" />
                              </div>
                              <div class="span3">
                                <select class="input-block-level accommodationDurationScale" name="accommodationDurationScale" rel="tolltip" title="escala de duração">
                                  <option value="days"><?=lang('pdt_days')?></option>
                                  <option value="weeks"><?=lang('pdt_weeks')?></option>
                                  <option value="months"><?=lang('pdt_months')?></option>
                                  <option value="years"><?=lang('pdt_years')?></option>
                                </select>
                              </div>
                            </div>
                            <label><?=lang('pdt_accommodationFood')?></label>
                            <select class="input-block-level accommodationFood" name="accommodationFood" rel="tolltip" title="tipo de acomodação">
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
                            <select class="input-block-level passTransportKind" name="passTransportKind" rel="tolltip" title="tipo de transporte">
                              <option value="bus"><?=lang('pdt_busTransportKind')?></option>
                              <option value="ship"><?=lang('pdt_shipTransportKind')?></option>
                              <option value="flight"><?=lang('pdt_flightTransportKind')?></option>
                              <option value="rail"><?=lang('pdt_railTransportKind')?></option>
                            </select>
                            <div class="row">
                              <div class="span3">
                                <label><?=lang('pdt_passFrom')?></label>
                                <input type="text" class="input-block-level passFrom" name="passFrom" rel="tooltip" title="origem da viagem" />
                              </div>
                              <div class="span3">
                                <label><?=lang('pdt_passTo')?></label>
                                <input type="text" class="input-block-level passTo" name="passTo" rel="tooltip" title="destino da viagem" />                              </div>
                            </div>
                          </div> <!-- fim passForm -->

                          <div class="workForm"> <!-- inicio workForm -->
                            <label><?=lang('pdt_workKind')?></label>
                            <select class="input-block-level workKind" name="workKind" rel="tolltip" title="tipo de trabalho">
                              <option value="workFree"><?=lang('pdt_workFreeKind')?></option>
                              <option value="work"><?=lang('pdt_workKind')?></option>
                              <option value="traineeFree"><?=lang('pdt_traineeFreeKind')?></option>
                              <option value="trainee"><?=lang('pdt_traineeKind')?></option>
                            </select>
                          </div> <!-- fim workForm -->

                        </div>
                        <label><?=lang('pdt_detail')?></label>
                        <textarea rows="6" class="input-block-level detail" name="detail" rel="tolltip" title="detail"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="span10">
                    <div class="pull-right">
                      <a class="btn btn-success productSave"><?=lang("tmpt_Save")?></a>
                      <a class="btn btn-danger productDrop" rel="tooltip" title="<?=lang("productDropTitle")?>"><?=lang("tmpt_Remove")?></a>
                      <a class="closeDetail"><?=lang("tmpt_Close")?></a>
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
<div class="ptd_saved hide"><?=lang("ptd_saved")?></div>
<div class="ptd_noChanges hide"><?=lang("ptd_noChanges")?></div>
<div class="pdt_removeProduct hide"><?=lang("pdt_removeProduct")?></div>
<div class="pdt_ownProduct hide"><?=lang('pdt_ownProduct')?></div>