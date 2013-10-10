<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <span class="lead"><?=lang("ctm_addEventTitle")?></span>
</div>

<div class="modal-body">

    <div class="row-fluid">
      <div class="span12">
        <select id="resp_id" class="input-block-level">
          <option value="<?=$this->session->userdata("_id")?>">eu</option>
          <option value="customer">o próprio cliente</option>
          <option value="5">Denise</option>
          <option value="3">usuario 3</option>
          <option value="4">usuario 4</option>
          <option value="5">usuario 5</option>
        </select>
      </div>

      <div class="span12">
        <div id="deadLine" class="input-prepend date">
          <span class="add-on">
            em
          </span>
          <input data-format="dd/MM/yyyy hh:mm:ss" type="text" id="deadLineDate"></input>
        </div>
      </div>
    </div>

    <div class="row-fluid">
      <div class="span24">
        <input class="input-block-level" id="eventTitle" type="text" placeholder="<?=lang('ctm_eventTitle')?>" />
      </div>
    </div>

    <div class="control-group">
        
    </div>

    <div class="control-group">
        <textarea id="eventDetail" rows="4" class="input-block-level" placeholder="<?=lang('ctm_eventDetails')?>"></textarea>
    </div>


</div>

<div class="modal-footer">
    <a class="send btn btn-success"><?=lang("ctm_add")?></a>
    <a class="closeModal btn" data-dismiss="modal"><?=lang("tmpt_Cancel")?></a>
</div>

<div id="ctm_fillTitle" class="hide"><?=lang("ctm_fillTitle")?></div>
<div id="ctm_fillDetail" class="hide"><?=lang("ctm_fillDetail")?></div>