<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h3><?=lang("ctm_addEvent")?></h3>
</div>

<div class="modal-body">

    <div class="control-group">
        <input id="eventTitle" type="text" class="input-block-level" placeholder="<?=lang('ctm_title')?>" />
    </div>
    
    <div class="control-group">
        <textarea id="eventDetail" rows="6" class="input-block-level" placeholder="<?=lang('ctm_details')?>"></textarea>
    </div>

    <label class="radio inline">
      <input type="radio" name="eventKind" id="eventKind" value="ownEvent" checked>
      <?=lang("ctm_doneByMe")?>
    </label>

    <label class="radio inline">
      <input type="radio" name="eventKind" id="eventKind" value="customerEvent">
      <?=lang("ctm_doneByCustomer")?>
    </label>

</div>

<div class="modal-footer">
    <a class="send btn btn-success"><?=lang("ctm_add")?></a>
    <a class="closeModal btn" data-dismiss="modal"><?=lang("tmpt_Cancel")?></a>
</div>

<div id="ctm_fillTitle" class="hide"><?=lang("ctm_fillTitle")?></div>
<div id="ctm_fillDetail" class="hide"><?=lang("ctm_fillDetail")?></div>