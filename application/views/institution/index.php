<h2><?=lang('inst_InstitutionList')?></h2>

<ul class="nav nav-pills"> 
  <li class="navTab institutionKind kindSchool active"><a id="navTabHeadquarters" rel='tooltip' title="<?=lang('inst_Headquarters')?>">Escolas</a></li>
  <li class="navTab institutionKind kindOther active"><a id="navTabHeadquarters" rel='tooltip' title="<?=lang('inst_Headquarters')?>">Outros</a></li>
</ul>

<div> <!-- inicio do formulário de filto e inserção -->
<?=form_open("", array("class" => "form-search"))?>
  <input type="hidden" id="inst_PleaseInsertName" value="<?=lang('inst_PleaseInsertName')?>">
  <div class="control-group">
    <div class="controls">
      <div class="row">
        <div class="span12 text-warning">
          <div class="input-prepend input-append">
            <span class="add-on"><?=lang('inst_searchBy')?></span>
            <input type="text" id="search-query" placeholder="<?=lang('inst_searchSample')?>">
            <a class="btn clearSearch"><i class="icon-undo"></i></a>
          </div>
          <span class="help-inline"><?=lang('inst_didNotFind')?></span>
          <a  class="btn create btn-success"><?=lang('inst_Add')?></a>
          <input type="hidden" id="inst_PleaseInsertName" value="<?=lang('inst_PleaseInsertName')?>">
        </div>
      </div>
    </div>
  </div>
<?=form_close()?>
</div> <!-- fim do formulário de filto e inserção -->

<div class="row tzdTableControl"><!-- inicio do indicador de total de tarefas retornadas e botão de ordenação -->
  <div class="span12">
    <div class="row">
      <div class="span4">
        <span class="text-warning"><?=lang('inst_thereIs')?> <span class="totalRows"></span> <?=lang('inst_institutions')?></span>
        <span class="text-warning"><?=lang('inst_withStatus')?></span>
        <span class="label statusFilter statusFilterActive label-info"><?=lang('inst_active')?></span>
        <span class="label statusFilter statusFilterInactive label-info"><?=lang('inst_inactive')?></span>
      </div>
      <div class="span8 text-warning">
        <span class="pull-right">
          <div class="input-prepend">
            <span class="add-on"><?=lang('inst_ordering_by')?></span>
            <div class="btn-group">
              <button class="btn dropdown-toggle" data-toggle="dropdown">
                <?=lang('inst_orderByDateLast')?>
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu">
                <li><a class="reorder" href="#reorder" id="orderByDateLast"><?=lang('inst_orderByDateLast')?></a></li>
                <li><a class="reorder" href="#reorder" id="orderByDateFirst"><?=lang('inst_orderByDateFirst')?></a></li>
                <li><a class="reorder" href="#reorder" id="orderByNameAsc"><?=lang('inst_orderByNameAsc')?></a></li>
                <li><a class="reorder" href="#reorder" id="orderByNameDesc"><?=lang('inst_orderByNameDesc')?></a></li>
                <li><a class="reorder" href="#reorder" id="orderByCountryAsc"><?=lang('inst_orderByCountryAsc')?></a></li>
                <li><a class="reorder" href="#reorder" id="orderByCountryDesc"><?=lang('inst_orderByCountryDesc')?></a></li>
              </ul>
            </div>
          </div>
        </span>
      </div>
    </div>
  </div>
</div><!-- fim do indicador de total de tarefas retornadas e botão de ordenação -->

<!-- 
Inicio da tabela de institutionTable
-->
<div class="row institutionTable"> <!-- inicio da tabela : institutionTable -->
  <div class="span12 tzdTableHeader"> <!-- inicio do cabeçalho : tzdTableHeader -->
    <div class="row">
      <div class="span1 text-warning">
        <?=lang('inst_status')?>
      </div>
      <div class="span4 text-warning">
        <?=lang('inst_name')?> - <?=lang('inst_headquartersCountry')?> - <?=lang('inst_headquartersCity')?>
      </div>
      <div class="span3 text-warning"><?=lang('inst_contactName')?></div>
      <div class="span4 text-warning"><?=lang('inst_contactPhone')?></div>
    </div>
  </div> <!-- fim do cabeçalho : tzdTableHeader -->

  <div class="tzdTableBody"> <!-- inicio do corpo : tzdTableBody-->

    <div class="span12 tzdTableRow hide"> <!-- inicio da linha : tzdTableRow -->
      <div class="row"> <!-- inicio do row da linha : tzdTableRow-->

        <div class="span12 tzdTableBrief"> <!-- inicio do resumo sobre a linha : tzdTableBrief -->
          <div class="row">
            <div class="span1">
              <a class="institutionChangeStatus btn btn-small" rel="tooltip" title="<?=lang('inst_Check_to_activate_the_inst')?>"><i class="icon-check-empty tzd-font-green"></i></a>
            </div>
            <div class="span11 tzdTableBriefContent"> <!-- inicio do resumo sobre a linha : tzdTableBrief -->
              <div class="row">
                <div class="span4">
                  <span id="headSpan1"></span>
                </div>
                <div class="span3" id="headSpan2" rel="tooltip" title=""></div>
                <div class="span4" id="headSpan3"></div>
              </div>
            </div>
          </div>
        </div> <!-- fim do resumo sobre a linha : tzdTableBrief -->
 

        <div class="span12 tzdTableCampusName hide">
          <div class="pull-right">
            <a class="tableCancelButton"><i class="icon-remove icon-2x tzd-font-green"></i></a>
          </div>
          <input type="text" class="span11" name="institutionName" id="institutionName" rel="tooltip" title="<?=lang('inst_institution')?>" />
        </div>

        <div class="span12 tzdTableCampusNav hide"> <!-- inicio do navegador de detalhe da linha da tabela da tzadi -->
          <ul class="nav nav-tabs"> 
            <li class="navTab navTabItem hide"><a><span class="navTabName"></span> <i class="icon-remove removeCampus"></i></a></li>
            <li class="navTab active"><a id="navTabHeadquarters" rel='tooltip' title="<?=lang('inst_Headquarters')?>"><span class="navTabName"></span></a></li>
            <li class="newNavTab"><a rel='tooltip' title="<?=lang('inst_clickToAddNewCampus')?>"><i class="icon-plus"></i></a></li>
          </ul>
        </div> <!-- fim do navegador de detalhe da linha da tabela da tzadi -->

        <div class="span12 tzdTableCampus hide"> <!-- inicio do detalhe da linha da tabela da tzadi -->
          <?=form_open("", array("class" => "campusForm"))?>
          <div class="row">
            <div class="span4">
              <input type="hidden" name="campusID" id="campusID" />
              <input type="hidden" name="institutionName" id="institutionNameField" />
              <input type="hidden" name="institutionID" id="institutionIdField" />
              <label><?=lang('inst_campus')?></label>
              <input type="text" class="input-block-level" name="campusName" id="campusName" rel="tooltip" title="<?=lang('inst_campus')?>" />
              <label><?=lang('inst_cep')?></label>
              <input type="text" class="input-block-level" name="campusCep" id="campusCep" rel="tooltip" title="<?=lang('inst_cep')?>" />
              <label><?=lang('inst_address')?></label>
              <input type="text" class="input-block-level" name="campusAddress" id="campusAddress" rel="tooltip" title="<?=lang('inst_address')?>" />
              <label><?=lang('inst_city')?></label>
              <input type="text" class="input-block-level" name="campusCity" id="campusCity" rel="tooltip" title="<?=lang('inst_city')?>" />
              <label><?=lang('inst_state')?></label>
              <input type="text" class="input-block-level" name="campusState" id="campusState" rel="tooltip" title="<?=lang('inst_state')?>" />
              <label><?=lang('inst_country')?></label>
              <input type="text" class="input-block-level" name="campusCountry" id="campusCountry" rel="tooltip" title="<?=lang('inst_country')?>" />
            </div>
            <div class="span4">
              <label><?=lang('inst_email')?></label>
              <input type="text" class="input-block-level" name="campusEmail" id="campusEmail" rel="tooltip" title="<?=lang('inst_email')?>" />
              <label><?=lang('inst_phone')?></label>
              <input type="text" class="input-block-level" name="campusPhone" id="campusPhone" rel="tooltip" title="<?=lang('inst_phone')?>" />
              <label><?=lang('inst_mobile')?></label>
              <input type="text" class="input-block-level" name="campusMobile" id="campusMobile" rel="tooltip" title="<?=lang('inst_mobile')?>" />
              <label><?=lang('inst_contactName')?></label>
              <input type="text" class="input-block-level" name="campusContactName" id="campusContactName" rel="tooltip" title="<?=lang('inst_contactName')?>" />
              <label><?=lang('inst_contactEmail')?></label>
              <input type="text" class="input-block-level" name="campusContactEmail" id="campusContactEmail" rel="tooltip" title="<?=lang('inst_contactEmail')?>" />
              <label><?=lang('inst_contactPhone')?></label>
              <input type="text" class="input-block-level" name="campusContactPhone" id="campusContactPhone" rel="tooltip" title="<?=lang('inst_contactPhone')?>" />
            </div>
            <div class="span4">
              <label><?=lang('inst_contactMobile')?></label>
              <input type="text" class="input-block-level" name="campusContactMobile" id="campusContactMobile" rel="tooltip" title="<?=lang('inst_contactMobile')?>" />
              <label><?=lang('inst_details')?></label>
              <textarea rows="12" class="input-block-level" name="campusDetails" id="campusDetails" rel="tooltip" title="<?=lang('inst_details')?>"></textarea>
              <a class="tzdTableRowAttachButton btn btn-primary" rel="tooltip" title="<?=lang('tmpt_Attachments')?>"><i class="icon-paste tzd-font-green"></i></a>
              <div class="pull-right">
                <a class="tableDetailSaveButton btn btn-success"><?=lang('tmpt_Save')?></a>
                <a class="tableDetailDropButton btn btn-danger"><?=lang('tmpt_Remove')?></a>
                <a class="tableCancelButton"><?=lang('tmpt_Cancel')?></a>
              </div>
            </div>
          </div>
          <?=form_close()?>
        </div> <!-- fim do detalhe : tzdTableCampus -->

        <div class="span12 tzdTableAttach hide"> <!-- inicio do anexo : tzdTableAttach-->
          <h3><?=lang('tmpt_Attachments')?> (<span class="totalAttach"></span>)</h3>
          <input type="hidden" name="campusID" class="campusID" />
          <input type="file" name="userfile" class="userfile" size="20" multiple/>
          <div><?=lang('tmpt_Max_upload_size')?> (2Mb)</div>
          <div><?=lang('tmpt_Supported_files')?> (jpg, jpeg, doc, docx, pdf, xls, xlsx, pdf, ppt, pptx, ai, cdr, png, htm, html, txt, xml, xps, bmp, gif, tif, tiff, msg, psd, swf, mp3, zip, rar, sql)</div>
          <br></br>
        </div> <!-- fim do anexo : tzdTableAttach -->

      </div><!-- fim do row da linha da tabela : tzdTableRow -->
    </div><!-- fim da linha da tabela : tzdTableRow -->
  </div> <!-- fim do corpo de tabela : tzdTableBody -->
</div> <!-- fim da tabela : institutionTable -->

