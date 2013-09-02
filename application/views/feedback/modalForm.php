<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h3><?=lang("fdb_mayWeHelp")?></h3>
</div>

<div class="modal-body">
    <input id="feedbackSubject" type="text" class="input-block-level" placeholder="<?=lang('fdb_name')?>" />
    <input id="feedbackMail" type="text" class="input-block-level <?=$uneditable?>" value="<?=$email?>" placeholder="<?=lang('fdb_email')?>" />
    <textarea id="feedbackMessage" class="input-block-level" placeholder="<?=lang('fdb_message')?>"></textarea>
</div>

<div class="modal-footer">
    <a href="#" class="tzdFeedbackSend btn btn-success" data-dismiss="modal"><?=lang("fdb_send")?></a>
    <a href="#" class="closeModal btn" data-dismiss="modal"><?=lang("fdb_cancel")?></a>
</div>